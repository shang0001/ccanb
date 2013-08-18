<?php
	$course1 = $course2 = $course3 = $course4 = '';
	$price = 0;
	$price = $price + 10;
	$courseprice = array(110, 60, 110, 60);
	$email_address = $_REQUEST['email_address'];
	$membership = $_REQUEST['membership'];
	$sname1 = $_REQUEST['sname1'];
	$sbirth1 = $_REQUEST['sbirth1'];
	$saddr1 = $_REQUEST['saddr1'];
	$spcode1 = $_REQUEST['spcode1'];
	$shphone1 = $_REQUEST['shphone1'];
	$sophone1 = $_REQUEST['sophone1'];
	$sephone1 = $_REQUEST['sephone1'];
	$sname2 = $_REQUEST['sname2'];
	$sbirth2 = $_REQUEST['sbirth2'];
	$saddr2 = $_REQUEST['saddr2'];
	$spcode2 = $_REQUEST['spcode2'];
	$shphone2 = $_REQUEST['shphone2'];
	$sophone2 = $_REQUEST['sophone12'];
	$sephone2 = $_REQUEST['sephone2'];
	$sname3 = $_REQUEST['sname3'];
	$sbirth3 = $_REQUEST['sbirth3'];
	$saddr3 = $_REQUEST['saddr3'];
	$spcode3 = $_REQUEST['spcode3'];
	$shphone3 = $_REQUEST['shphone3'];
	$sophone3 = $_REQUEST['sophone3'];
	$sephone3 = $_REQUEST['sephone3'];
	$sname4 = $_REQUEST['sname4'];
	$sbirth4 = $_REQUEST['sbirth4'];
	$saddr4 = $_REQUEST['saddr4'];
	$spcode4 = $_REQUEST['spcode4'];
	$shphone4 = $_REQUEST['shphone4'];
	$sophone4 = $_REQUEST['sophone4'];

    if(isset($_POST['courses1'])){
        $courses1 = $_POST['courses1'];
		$course1 = implode(",", $courses1);
    }

    if(isset($_POST['courses2'])){
        $courses2 = $_POST['courses2'];
		$course2 = implode(",", $courses2);
    }

    if(isset($_POST['courses3'])){
        $courses3 = $_POST['courses3'];
		$course3 = implode(",", $courses3);
    }

    if(isset($_POST['courses4'])){
        $courses4 = $_POST['courses4'];
		$course4 = implode(",", $courses4);
    }

	header( "Location: ../index.html?path=chineseschool/confirmation.html" );
?>