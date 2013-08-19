<?php
	// This function checks for email injection. Specifically, it checks for carriage returns - typically used by spammers to inject a CC list.
	function isInjected($str) {
		$injections = array('(\n+)',
		'(\r+)',
		'(\t+)',
		'(%0A+)',
		'(%0D+)',
		'(%08+)',
		'(%09+)'
		);
		$inject = join('|', $injections);
		$inject = "/$inject/i";
		if(preg_match($inject,$str)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	// Load form field data into variables.
	global $membercontents, $memprice, $memberage, $memtype, $mfname1, $mfname2, $mfname3, $mfname4, $mfname5, $mfname6, $coursecount, $membercount, $mid;
	$membercontents = $memtype = $memberage = $mfname1 = $mfname2 = $mfname3 = $mfname4 = $mfname5 = $mfname6 = '';
	$memprice = $membercount = $coursecount = $mid = 0;
	$curYear = date('Y');
	$email_address = $_REQUEST['email_address'];

	$mname = $_REQUEST['mname'];
	$maddr = $_REQUEST['maddr'];
	$mpcode = $_REQUEST['mpcode'];
	$mhphone = $_REQUEST['mhphone'];
	$mwphone = $_REQUEST['mwphone'];
	$mcphone = $_REQUEST['mcphone'];
	$mtype = $_POST['mtype'];
	$mage = $_POST['mage'];
	
	if ($mtype == 'ind') {
		if ($mage == 're')
		{
			$memberage = "Regular";
			$memprice = 15;
		}
		else if ($mage == 'se')
		{
			$memberage = "Senior";
			$memprice = 10;
		}
		else if ($mage == 'st')
		{
			$memberage = "Student";
			$memprice = 5;
		}
		
		$memtype = "Individual";
		$membertype = $memtype . $membercontents;
	}
	else if ($mtype == 'fam')
	{
		if ($mage == 're')
		{
			$memberage = "Regular";
			$memprice = 25;
		}
		else if ($mage == 'se')
		{
			$memberage = "Senior";
			$memprice = 25;
		}
		else if ($mage == 'st')
		{
			$memberage = "Student";
			$memprice = 10;
		}
		
		$mfname1 = $_REQUEST['mfname1'];
		$mfname2 = $_REQUEST['mfname2'];
		$mfname3 = $_REQUEST['mfname3'];
		$mfname4 = $_REQUEST['mfname4'];
		$mfname5 = $_REQUEST['mfname5'];
		$mfname6 = $_REQUEST['mfname6'];
		$membercontents = "\nNames of other family members: " . $mfname1 . "\n" . $mfname2 . "\n" . $mfname3 
		. "\n" . $mfname4 . "\n" . $mfname5 . "\n" . $mfname6 . "\n";
		$memtype = "Family";
		$membertype = $memtype . $membercontents;
	}
	else
	{
		$memtype = "N/A";
		$membertype = $memtype . $membercontents;
	}
	
	$subject = "Membership Registration Request From " . $email_address;
	$content = 
	"Membership Registration Request by " . $email_address
	 . "\n\nCCANB Membership Registration\n\nMembership Name: " . $mname
	 . "\nAddress: " . $maddr
	 . "\nPostal Code: " . $mpcode
	 . "\nTelephone Number:\n(Home): " . $mhphone . "\n(Work/Office)" . $mwphone . "\n(Cell): " . $mcphone
	 . "\nType of Membership: " . $membertype
	 . "\nAge Category: " . $memberage
	 . "\n\nMembership Price: " . $memprice
	;
	
	// If the user tries to access this script directly, redirect them to feedback form,
	if (!isset($_REQUEST['email_address'])) {
		header( "Location: ../index.html?path=ccanb/membership.html" );
	}
	
	// If the form fields are empty, redirect to the error page.
	elseif (empty($email_address) || empty($mname)) {
		header( "Location: ../index.html?path=ccanb/error_registration.html" );
	}
	
	// If email injection is detected, redirect to the error page.
	elseif ( isInjected($email_address) ) {
		header( "Location: ../index.html?path=ccanb/error_registration.html" );
	}
	
	elseif ( !filter_var($email_address, FILTER_VALIDATE_EMAIL) ){
		header( "Location: ../index.html?path=ccanb/error_registration.html" );
	}
	
	// If we passed all previous tests, send the email!
	else {
		$con=mysqli_connect("ccanbca.ipagemysql.com","ccanb","ccanbadmin","ccanb");
		
		// Check connection
		if (mysqli_connect_errno($con))
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		$existresult = mysqli_query($con,"SELECT count(*) as membercount FROM membership where email = '$email_address' and memberyear = $curYear");
		while ($row = mysqli_fetch_array($existresult))
		{
			$membercount = $row['membercount'];
		}
		
		if ( $membercount > 0 )
		{
			header( "Location: ../index.html?path=ccanb/alreadymember.html" );
		}
		
		$result = mysqli_query($con,"SELECT count(*) as coursecount FROM courseregistration where email = '$email_address' and courseyear = $curYear");
		while ($row = mysqli_fetch_array($result))
		{
			$coursecount = $row['coursecount'];
		}
		
		mysqli_query($con,"INSERT INTO membership (email, mname, address, postalcode, hphone, ophone, cphone, membertype, fname1, fname2, fname3, fname4, fname5, fname6, memberyear, registrationtime, memberage, memberprice)
		VALUES ('$email_address', '$mname', '$maddr', '$mpcode', '$mhphone', '$mwphone', '$mcphone', '$memtype', '$mfname1', '$mfname2', '$mfname3', '$mfname4', '$mfname5', '$mfname6', $curYear, now(), '$memberage', $memprice)");
//		echo "INSERT INTO membership (email, mname, address, postalcode, hphone, ophone, cphone, membertype, fname1, fname2, fname3, fname4, fname5, fname6, memberyear, registrationtime, memberage, memberprice)
//		VALUES ('$email_address', '$mname', '$maddr', '$mpcode', '$mhphone', '$mwphone', '$mcphone', '$memtype', '$mfname1', '$mfname2', '$mfname3', '$mfname4', '$mfname5', '$mfname6', $curYear, now(), '$memberage', $memprice)";
		
		if ($coursecount > 0)
		{
			$memberresult = mysqli_query($con,"SELECT id FROM membership where email = '$email_address' and memberyear = $curYear order by id desc limit 1");
			while ($row = mysqli_fetch_array($memberresult))
			{
				$mid = $row['id'];
			}
			if ($mid != 0)
			{
				mysqli_query($con,"UPDATE courseregistration SET mid = $mid WHERE email = '$email_address' and courseyear = $curYear");
			}
		}
		
		mysqli_close($con);
		
		mail( "ccanb@ccanb.ca", $subject, $content, "From: $email_address" );
		mail( $email_address, $subject, $content, "From: admin@ccanb.ca" );
		header( "Location: ../index.html?path=ccanb/complete_registration.html" );
	}
?>