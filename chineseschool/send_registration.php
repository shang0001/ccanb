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

/*
	function VerifyMailAddress($address)
	{
		$Syntax='#^[w.-]+@[w.-]+.[a-zA-Z]{2,5}$#';
		if(preg_match($Syntax,$address))
			return true;
		else
			return false;
	}
*/
	// Load form field data into variables.
	global $membercontents;
	global $price, $price1, $price2, $price3, $price4, $memprice, $count;
	$course1 = $course2 = $course3 = $course4 = $membercontents = '';
	$price = $price1 = $price2 = $price3 = $price4 = $memprice = $count = 0;
	$courseprice = array('Language' => 110, 'Child/Youth Dance' => 60, 'Adult Dance' => 110, 'Math' => 60);
	$email_address = $_REQUEST['email_address'];
	if (isset($_POST['member']))
	{
		$registration = 'yes';
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
		
	}
	else
	{
		$registration = 'no';
	}

	$membership = $_REQUEST['membership'];
	$sname1 = $_REQUEST['sname1'];
	$sbirth1 = $_REQUEST['sbirth1'];
	$smum1 = $_REQUEST['smum1'];
	$saddr1 = $_REQUEST['saddr1'];
	$spcode1 = $_REQUEST['spcode1'];
	$shphone1 = $_REQUEST['shphone1'];
	$sophone1 = $_REQUEST['sophone1'];
	$sephone1 = $_REQUEST['sephone1'];
	$sgname1 = $_REQUEST['sgname1'];
	$sname2 = $_REQUEST['sname2'];
	$sbirth2 = $_REQUEST['sbirth2'];
	$smum2 = $_REQUEST['smum2'];
	$saddr2 = $_REQUEST['saddr2'];
	$spcode2 = $_REQUEST['spcode2'];
	$shphone2 = $_REQUEST['shphone2'];
	$sophone2 = $_REQUEST['sophone12'];
	$sephone2 = $_REQUEST['sephone2'];
	$sgname2 = $_REQUEST['sgname2'];
	$sname3 = $_REQUEST['sname3'];
	$sbirth3 = $_REQUEST['sbirth3'];
	$smum3 = $_REQUEST['smum3'];
	$saddr3 = $_REQUEST['saddr3'];
	$spcode3 = $_REQUEST['spcode3'];
	$shphone3 = $_REQUEST['shphone3'];
	$sophone3 = $_REQUEST['sophone3'];
	$sephone3 = $_REQUEST['sephone3'];
	$sgname3 = $_REQUEST['sgname3'];
	$sname4 = $_REQUEST['sname4'];
	$sbirth4 = $_REQUEST['sbirth4'];
	$smum4 = $_REQUEST['smum4'];
	$saddr4 = $_REQUEST['saddr4'];
	$spcode4 = $_REQUEST['spcode4'];
	$shphone4 = $_REQUEST['shphone4'];
	$sophone4 = $_REQUEST['sophone4'];
	$sgname4 = $_REQUEST['sgname4'];

    if(isset($_POST['courses1'])){
        $courses1 = $_POST['courses1'];
        foreach ($courses1 as $value)
        {
        	$price1 = $price1 + $courseprice[$value];
        	$count = $count + 1;
        }
        
        if ((in_array("Language", $courses1) && in_array("Child/Youth Dance", $courses1)) || (in_array("Language", $courses1) && in_array("Adult Dance", $courses1)) ) {
        	$price1 = $price1 - 10;
        }
		$course1 = implode(", ", $courses1);
    }

    if(isset($_POST['courses2'])){
        $courses2 = $_POST['courses2'];
        foreach ($courses2 as $value)
        {
        	$price2 = $price2 + $courseprice[$value];
        	$count = $count + 1;
        }
        
        if ((in_array("Language", $courses2) && in_array("Child/Youth Dance", $courses2)) || (in_array("Language", $courses2) && in_array("Adult Dance", $courses2)) ) {
        	$price2 = $price2 - 10;
        }
        $price2 = $price2 * 0.9;
		$course2 = implode(", ", $courses2);
    }

    if(isset($_POST['courses3'])){
        $courses3 = $_POST['courses3'];
		foreach ($courses3 as $value)
		{
			$price3 = $price3 + $courseprice[$value];
			$count = $count + 1;
		}
		
		if ((in_array("Language", $courses3) && in_array("Child/Youth Dance", $courses3)) || (in_array("Language", $courses3) && in_array("Adult Dance", $courses3)) ) {
			$price3 = $price3 - 10;
		}
		$price3 = $price3 * 0.9;
		$course3 = implode(", ", $courses3);
    }

    if(isset($_POST['courses4'])){
        $courses4 = $_POST['courses4'];
		foreach ($courses4 as $value)
		{
			$price4 = $price4 + $courseprice[$value];
			$count = $count + 1;
		}
		
		if ((in_array("Language", $courses4) && in_array("Child/Youth Dance", $courses4)) || (in_array("Language", $courses4) && in_array("Adult Dance", $courses4)) ) {
			$price4 = $price4 - 10;
		}
		$price4 = $price4 * 0.9;
		$course4 = implode(", ", $courses4);
    }

    $price = $price1 + $price2 + $price3 + $price4;
    
    // $10 off if they are a member for registration
    if (isset($_POST['member']))
    {
    	$price = $price - 10 * $count;
    }
    
    $totalprice = $price + $memprice;
	
	$subject = "Registration Request From " . $email_address;
	$content = 
	"Class Registration Request by " . $email_address
	 . "\n\nCCANB Membership Registration\nMembership Registration: " . $registration
	 . "\nName: " . $mname
	 . "\nAddress: " . $maddr
	 . "\nPostal Code: " . $mpcode
	 . "\nTelephone Number:\n(Home): " . $mhphone . "\n(Work/Office)" . $mwphone . "\n(Cell): " . $mcphone
	 . "\nType of Membership: " . $membertype
	 . "\nAge Category: " . $memberage

	 . "\n\nClass Registration\nStudent Name: " . $sname1
	 . "\nDate of Birth (yyyy/mm/dd): " . $sbirth1
	 . "\nMedicare Number: " . $smum1
	 . "\nAddress: " . $saddr1
	 . "\nPostal Code: " . $spcode1
	 . "\nTelephone Number:\n(Home): " . $shphone1 . "\n(Office)" . $sophone1 . "\n(Emergencies): " . $sephone1
	 . "\nGuardians Names (if the student is not an adult): " . $sgname1
	 . "\nThe courses selected: " . $course1
	 . "\n\nStudent Name: " . $sname2
	 . "\nDate of Birth (yyyy/mm/dd): " . $sbirth2
	 . "\nMedicare Number: " . $smum2
	 . "\nAddress: " . $saddr2
	 . "\nPostal Code: " . $spcode2
	 . "\nTelephone Number:\n(Home): " . $shphone2 . "\n(Office)" . $sophone2 . "\n(Emergencies): " . $sephone2
	 . "\nGuardians Names (if the student is not an adult): " . $sgname2
	 . "\nThe courses selected: " . $course2
	 . "\n\nStudent Name: " . $sname3
	 . "\nDate of Birth (yyyy/mm/dd): " . $sbirth3
	 . "\nMedicare Number: " . $smum3
	 . "\nAddress: " . $saddr3
	 . "\nPostal Code: " . $spcode3
	 . "\nTelephone Number:\n(Home): " . $shphone3 . "\n(Office)" . $sophone3 . "\n(Emergencies): " . $sephone3
	 . "\nGuardians Names (if the student is not an adult): " . $sgname3
	 . "\nThe courses selected: " . $course3
	 . "\n\nStudent Name: " . $sname4
	 . "\nDate of Birth (yyyy/mm/dd): " . $sbirth4
	 . "\nMedicare Number: " . $smum4
	 . "\nAddress: " . $saddr4
	 . "\nPostal Code: " . $spcode4
	 . "\nTelephone Number:\n(Home): " . $shphone4 . "\n(Office)" . $sophone4 . "\n(Emergencies): " . $sephone4
	 . "\nGuardians Names (if the student is not an adult): " . $sgname4
	 . "\nThe courses selected: " . $course4
	 . "\n\nThe Membership Price is: " . $memprice
	 . "\nThe Total Course Price is: " . $price
	 . "\nThe Total Price is: " . $totalprice
	;
	
	// If the user tries to access this script directly, redirect them to feedback form,
	if (!isset($_REQUEST['email_address'])) {
		header( "Location: ../index.html?path=chineseschool/registration.html" );
	}
	
	// If the form fields are empty, redirect to the error page.
	elseif (empty($email_address) || empty($sname1)) {
		header( "Location: ../index.html?path=chineseschool/error_registration.html" );
	}
	
	// If email injection is detected, redirect to the error page.
	elseif ( isInjected($email_address) ) {
		header( "Location: ../index.html?path=chineseschool/error_registration.html" );
	}
	
//	elseif ( !VerifyMailAddress($email_address) ){
//		header( "Location: ../index.html?path=chineseschool/error_registration.html" );
//	}
	
	elseif ( !filter_var($email_address, FILTER_VALIDATE_EMAIL) ){
		header( "Location: ../index.html?path=chineseschool/error_registration.html" );
	}
	
	// If we passed all previous tests, send the email!
	else {
		mail( "chineseschool@ccanb.ca", $subject, $content, "From: $email_address" );
		mail( $email_address, $subject, $content, "From: admin@ccanb.ca" );
		header( "Location: ../index.html?path=chineseschool/complete_registration.html" );
	}
?>