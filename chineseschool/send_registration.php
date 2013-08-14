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
	$email_address = $_REQUEST['email_address'] ;
	$subject = "Registration Request";
	$student_name = $_REQUEST['sname1'];
	$content = "Class Registration Request by " . $student_name;
	
	// If the user tries to access this script directly, redirect them to feedback form,
	if (!isset($_REQUEST['email_address'])) {
	header( "Location: ../index.html?path=chineseschool/registration.html" );
	}
	
	// If the form fields are empty, redirect to the error page.
	elseif (empty($email_address) || empty($student_name)) {
	header( "Location: ../index.html?path=aboutus/error_registration.html" );
	}
	
	// If email injection is detected, redirect to the error page.
	elseif ( isInjected($email_address) ) {
	header( "Location: ../index.html?path=aboutus/error_registration.html" );
	}
	
	// If we passed all previous tests, send the email!
	else {
	mail( "admin@ccanb.ca", $subject, $content, "From: $email_address" );
	header( "Location: ../index.html?path=chineseschool/complete_registration.html" );
	}
?>