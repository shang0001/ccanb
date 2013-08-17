<?php
	$course1 = $course2 = $course3 = $course4 = '';
	$price = 0;
	$courseprice = array(110, 60, 110, 60);
	$email_address = $_REQUEST['email_address'];
	$membership = $_REQUEST['membership'];
	$sname1 = $_REQUEST['sname1']
	$sbirth1 = $_REQUEST['sbirth1']
	$saddr1 = $_REQUEST['saddr1']
	$spcode1 = $_REQUEST['spcode1']
	$shphone1 = $_REQUEST['shphone1']
	$sophone1 = $_REQUEST['sophone1']
	$sephone1 = $_REQUEST['sephone1']
	$sname2 = $_REQUEST['sname2']
	$sbirth2 = $_REQUEST['sbirth2']
	$saddr2 = $_REQUEST['saddr2']
	$spcode2 = $_REQUEST['spcode2']
	$shphone2 = $_REQUEST['shphone2']
	$sophone2 = $_REQUEST['sophone12]
	$sephone2 = $_REQUEST['sephone2']
	$sname3 = $_REQUEST['sname3']
	$sbirth3 = $_REQUEST['sbirth3']
	$saddr3 = $_REQUEST['saddr3']
	$spcode3 = $_REQUEST['spcode3']
	$shphone3 = $_REQUEST['shphone3']
	$sophone3 = $_REQUEST['sophone3']
	$sephone3 = $_REQUEST['sephone3']
	$sname4 = $_REQUEST['sname4']
	$sbirth4 = $_REQUEST['sbirth4']
	$saddr4 = $_REQUEST['saddr4']
	$spcode4 = $_REQUEST['spcode4']
	$shphone4 = $_REQUEST['shphone4']
	$sophone4 = $_REQUEST['sophone4']

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
?>

<div class="post">
    <form id="registrationConfirmation" name="confirmationform" action="chineseschool/send_registration.php" method="post" enctype="application/x-www-form-urlencoded" onsubmit="return checkform()">
        <h2 class="title">CCANB Membership & Chinese School Registration Confirmation</h2>
        
        <div class="entry">
            <p>
                E-mail Address: <?php echo $email_address; ?>
            </p>
        </div>

        <h4>CCANB Membership Registration:</h4>

        <div class="entry">
            <p>
                <input id="membercheckbox" type="checkbox" name="member" value="yes" onclick="onClick_ShowHide(this, 'membercheckbox', '#membership')">Yes, I would like to be a member of CCANB:
            </p>
            <div id="membership">
	            <p>
	                Name:<input type="text" size="40" name="mname">
	                <br />
	                Address:<input type="text" size="80" name="maddr">
	                <br />
	                Postal Code:<input type="text" name="mpcode">
	                <br />
	                Telephone #:
	                <br />
	                (Home)<input type="text" name="mhphone">
	                (Work/Office)<input type="text" name="mwphone">
	                (Cell)<input type="text" name="mcphone">
	                <!-- <br />
	                E-mail Address:<input type="text" size="40" maxlength="150" name="memail"> -->
	            </p>
	            <p>
	                TYPE OF MEMBERSHIP:
	            <br />
	                <input id="individual" type="radio" name="mtype" value="ind">INDIVIDUAL (AGE 16 YEARS AND OLDER)
	            <br />
	                <input id="family" type="radio" name="mtype" value="fam" checked="checked">FAMILY
	            </p>
	            <p id="familymember">
	                Names of other family members:
	            <br />
	                Name 1:
	            <input type="text" size="40" name="mfname1"><br />
	                Name 2:
	            <input type="text" size="40" name="mfname2"><br />
	                Name 3:
	            <input type="text" size="40" name="mfname3"><br />
	                Name 4:
	            <input type="text" size="40" name="mfname4"><br />
	                Name 5:
	            <input type="text" size="40" name="mfname5"><br />
	                Name 6:
	            <input type="text" size="40" name="mfname6"><br />
	            </p>
	            <p>
	                <span lang="EN-US">AGE Category: </span>
	                <input type="radio" name="mage" value="re" checked="checked">Regular 
	            <input type="radio" name="mage" value="se">Senior
	            <input type="radio" name="mage" value="st">Student
	            </p>
            </div>
        </div>

        <h4>Class Registration:</h4>
            <p>
				Student Name: <?php echo $sname1 ?>
				<br />
                Date of Birth (<span>yyyy/mm/dd</span>): <?php echo $sbirth1; ?>
                <br />
                Medicare Number: <?php echo $smnum1; ?>
               	<br />
                Address: <?php echo $saddr1; ?>
               	<br />
                Postal Code: <?php echo $spcode1; ?>
               	<br />
                Telephone: (Home) <?php echo $shphone1; ?>
                (Office) <?php echo $sophone1; ?>
                (For Emergencies) <?php echo $sephone1; ?>
           		<br />
                Guardians Names (if the student is not an adult): <?php echo $sgname1; ?>
            </p>
            <p>
                COURSE SELECTIONS
            	<br />
				The courses <?php echo $sname1; ?> selected: <?php echo $course1; ?>
            </p>

            <p>
				Student Name: <?php echo $sname2; ?>
				<br />
                Date of Birth (<span>yyyy/mm/dd</span>): <?php echo $sbirth2; ?>
                <br />
                Medicare Number: <?php echo $smnum2; ?>
               	<br />
                Address: <?php echo $saddr2; ?>
               	<br />
                Postal Code: <?php echo $spcode2; ?>
               	<br />
                Telephone: (Home) <?php echo $shphone2; ?>
                (Office) <?php echo $sophone2; ?>
                (For Emergencies) <?php echo $sephone2; ?>
           		<br />
                Guardians Names (if the student is not an adult): <?php echo $sgname2; ?>
            </p>
            <p>
                COURSE SELECTIONS
            	<br />
				The courses <?php echo $sname2; ?> selected: <?php echo $course2; ?>
            </p>

            <p>
				Student Name: <?php echo $sname3; ?>
				<br />
                Date of Birth (<span>yyyy/mm/dd</span>): <?php echo $sbirth3; ?>
                <br />
                Medicare Number: <?php echo $smnum3; ?>
               	<br />
                Address: <?php echo $saddr3; ?>
               	<br />
                Postal Code: <?php echo $spcode3; ?>
               	<br />
                Telephone: (Home) <?php echo $shphone3; ?>
                (Office) <?php echo $sophone3; ?>
                (For Emergencies) <?php echo $sephone3; ?>
              	<br />
                Guardians Names (if the student is not an adult): <?php echo $sgname3; ?>
            </p>
            <p>
                COURSE SELECTIONS
            	<br />
				The courses <?php echo $sname3; ?> selected: <?php echo $course3; ?>
            </p>

            <p>
				Student Name: <?php echo $sname4; ?>
				<br />
                Date of Birth (<span class="SpellE">yyyy/mm/dd</span>): <?php echo $sbirth4; ?>
                <br />
                Medicare Number: <?php echo $smnum4; ?>
               	<br />
                Address: <?php echo $saddr4; ?>
               	<br />
                Postal Code: <?php echo $spcode4; ?>
               	<br />
                Telephone: (Home) <?php echo $shphone4; ?>
                (Office) <?php echo $sophone4; ?>
                (For Emergencies) <?php echo $sephone4; ?>
           		<br />
                Guardians Names (if the student is not an adult): <?php echo $sgname4; ?>
            </p>
            <p>
                COURSE SELECTIONS:
            	<br />
				The courses <?php echo $sname4; ?> selected: <?php echo $course4; ?>        
            </p>
            
            <p>
            	The Total Price is: <?php echo $price; ?>
            </p>

	        <p>
	            <br />
	            <input type="submit" value="Confirm" />
	        </p>
    </form>
</div>