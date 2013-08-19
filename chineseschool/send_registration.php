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
	global $price, $price1, $price2, $price3, $price4, $count, $registration, $mid;
	$course1 = $course2 = $course3 = $course4 = '';
	$price = $price1 = $price2 = $price3 = $price4 = $registration = $count = $mid = 0;
	$courseprice = array('Language' => 110, 'Child/Youth Dance' => 60, 'Adult Dance' => 110, 'Math' => 60);
	$email_address = $_REQUEST['email_address'];
	$member = $_POST['member'];
	if ( $member == 'registermem' || $member == 'memyes' )
	{
		$membership = 'Yes';
	}
	else if ( $member == 'memno' )
	{
		$membership = 'No';
	}

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

    if (isset($_POST['courses1'])){
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

    if (isset($_POST['courses2'])){
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

    if (isset($_POST['courses3'])){
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

    if (isset($_POST['courses4'])){
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
    if ( $membership == 'yes')
    {
    	$price = $price - 10 * $count;
    }
	
	$subject = "Class Registration Request From " . $email_address;
	$content = 
	"Class Registration Request by " . $email_address
	 . "\n\nCCANB Membership: " . $membership
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
	 . "\n\nThe Total Course Price is: " . $price
	;
	
	// If the user tries to access this script directly, redirect them to feedback form,
	if (!isset($_REQUEST['email_address'])) {
		header( "Location: ../index.html?path=chineseschool/registration.html" );
	}
	
	// If the form fields are empty, redirect to the error page.
	else if (empty($email_address) || empty($sname1)) {
		header( "Location: ../index.html?path=chineseschool/error_registration.html" );
	}
	
	// If email injection is detected, redirect to the error page.
	else if ( isInjected($email_address) ) {
		header( "Location: ../index.html?path=chineseschool/error_registration.html" );
	}
	
//	elseif ( !VerifyMailAddress($email_address) ){
//		header( "Location: ../index.html?path=chineseschool/error_registration.html" );
//	}
	
	else if ( !filter_var($email_address, FILTER_VALIDATE_EMAIL) ){
		header( "Location: ../index.html?path=chineseschool/error_registration.html" );
	}
	
	// If we passed all previous tests, send the email!
	else {
		// Create connection
		$con=mysqli_connect("ccanbca.ipagemysql.com","ccanb","ccanbadmin","ccanb");
		
		// Check connection
		if (mysqli_connect_errno($con))
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		if ( $member == 'registermem')
		{
			$registration = 1;
		}
		else if ( $member == 'memyes' )
		{
			$registration = 1;
			$result = mysqli_query($con,"SELECT id FROM membership where email = $email_address order by id desc limit 1");
			while ($row = mysqli_fetch_array($result))
			{
				$mid = $row['id'];
			}

		}
		
		mysqli_query($con,"INSERT INTO courseregistration (sname, email, birthday, medicare, address, postalcode, hphone, ophone, cphone, pname, course, courseprice, membership, mid)
				VALUES ($sname1, $email_address, $sbirth1, $smum1, $saddr1, $spcode1, $shphone1, $sophone1, $sephone1, $sgname1, $course1, $price1, $registration, $mid)");
		
		if (isset($sname2))
		{
			mysqli_query($con,"INSERT INTO courseregistration (sname, email, birthday, medicare, address, postalcode, hphone, ophone, cphone, pname, course, courseprice, membership, mid)
					VALUES ($sname2, $email_address, $sbirth2, $smum2, $saddr2, $spcode2, $shphone2, $sophone2, $sephone2, $sgname2, $course2, $price2, $registration, $mid)");
		}
		
		if (isset($sname3))
		{
			mysqli_query($con,"INSERT INTO courseregistration (sname, email, birthday, medicare, address, postalcode, hphone, ophone, cphone, pname, course, courseprice, membership, mid)
					VALUES ($sname3, $email_address, $sbirth3, $smum3, $saddr3, $spcode3, $shphone3, $sophone3, $sephone3, $sgname3, $course3, $price3, $registration, $mid)");
		}
		
		if (isset($sname4))
		{
			mysqli_query($con,"INSERT INTO courseregistration (sname, email, birthday, medicare, address, postalcode, hphone, ophone, cphone, pname, course, courseprice, membership, mid)
					VALUES ($sname4, $email_address, $sbirth4, $smum4, $saddr4, $spcode4, $shphone4, $sophone4, $sephone4, $sgname4, $course4, $price4, $registration, $mid)");;
		}
		
		mysqli_close($con);
		
		mail( "chineseschool@ccanb.ca", $subject, $content, "From: $email_address" );
		mail( $email_address, $subject, $content, "From: admin@ccanb.ca" );
		if ( $member == 'registermem' ){
			header( "Location: ../index.html?path=ccanb/membership.html" );
		}
		else
		{
			header( "Location: ../index.html?path=chineseschool/complete_registration.html" );
		}
	}
?>