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
	global $membercontents;
	global $memprice;
	$membercontents = '';
	$memprice = 0;
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
		
		$membertype = "Individual" . $membercontents;
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
		$membertype = "Family" . $membercontents;
	}
	else
	{
		$membertype = "N/A" . $membercontents;
	}
	
	$subject = "Membership Registration Request From " . $email_address;
	$content = 
	"Membership Registration Request by " . $email_address
	 . "\n\nCCANB Membership Registration\nMembership Registration: " . $registration
	 . "\nName: " . $mname
	 . "\nAddress: " . $maddr
	 . "\nPostal Code: " . $mpcode
	 . "\nTelephone Number:\n(Home): " . $mhphone . "\n(Work/Office)" . $mwphone . "\n(Cell): " . $mcphone
	 . "\nType of Membership: " . $membertype
	 . "\nAge Category: " . $memberage
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
		mail( "ccanb@ccanb.ca", $subject, $content, "From: $email_address" );
		mail( $email_address, $subject, $content, "From: admin@ccanb.ca" );
		header( "Location: ../index.html?path=chineseschool/complete_registration.html" );
	}
?>