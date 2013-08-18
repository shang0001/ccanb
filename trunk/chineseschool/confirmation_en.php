<!DOCTYPE html>
<!--
ccanb website
-->

<html>
<head>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>CCANB Home Page</title>
    <link href="../ccanb.css" rel="stylesheet" type="text/css" media="screen" />
    <script type="text/javascript" src="../js/jquery-1.8.3.js"></script>
    <script type="text/javascript" src="../js/jquery.cookie.js"></script>
    <script type="text/javascript" src="../js/registration.js"></script>
</head>
<body>
    <div id="wrappers">
        <div id="header-wrapper">
            <div id="header">
                <div id="logo">
                    <h1>
                        <a href="index.html"><img class="image" src="../images/ccanb_logo.png" /></a></h1>
                    <p>纽布朗斯维克中华文化协会</p>
                </div>
                <!--
                <div id="search">
                    <form method="get" action="">
                        <fieldset>
                            <input type="text" name="search" id="search-text" />
                            <input type="submit" id="search-submit" value="" />
                            <input type="image" alt="Search" value="Search" src="images/search.png" id="search-button" />
                        </fieldset>
                    </form>
                </div>
                -->
                <div id="language">
                    <select id="language-text" name="language">
                        <option value="zh-CN">Chinese Simplified (简体中文)</option>
                        <option value="zh-TW">Chinese Traditional (繁體中文)</option>
                        <option value="en" selected="selected">English</option>
                        <option value="fr">French (Français)</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- end #header -->
        <div id="menu">
            <ul>
                <li>
                    <a href="../index.html?path=home/welcome.html"><span>Home &nbsp;
                    </span></a>
                </li>
                <li>
                    <a href="#"><span>Organizational Structure &nbsp;
				
                        <em class="opener-organization">
                            <img src="../images/menu-downarrow.png" alt="dropdown" />
                        </em>
                    </span></a>
                    <ul class="organization">
                        <li><a href="#"><span>CCANB &nbsp;
                                <em class="opener-ccanb">
                                    <img src="../images/menu-rightarrow.png" alt="dropdown" />
                                </em>
                            </span></a>
                            <ul>
                                <li><a href="../ccanb/membership.html"><span>Membership</span></a></li>
                                <li><a href="../ccanb/annualmeeting.html"><span>Annual General Meeting</span></a></li>
                                <li><a href="../ccanb/executiveboard.html"><span>Executive Board</span></a></li>
                                <li><a href="../ccanb/adhoccommittee.html"><span>Ad Hoc Committees</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span>Chinese School &nbsp;
                                <em class="opener-chineseschool">
                                    <img src="../images/menu-rightarrow.png" alt="dropdown" />
                                </em>
                            </span></a>
                            <ul>
                                <li><a href="esc.html"><span>ESC</span></a></li>
                                <li><a href="schedule.html"><span>Schedule</span></a></li>
                                <li><a href="fees.html"><span>Classes/Courses/Fees</span></a></li>
                                <li><a href="registration.html"><span>Registration</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span>Youth Group &nbsp;</span></a></li>
                        <li><a href="#"><span>Art Group &nbsp;
                                <em class="opener-artgroup">
                                    <img src="../images/menu-rightarrow.png" alt="dropdown" />
                                </em>
                            </span></a>
                            <ul>
                                <li><a href="../index.html?path=artgroup/choir.html"><span>Choir</span></a></li>
                                <li><a href="../index.html?path=artgroup/danceteam.html"><span>Dance Teams</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span>News &nbsp;
				
                        <em class="opener-news">
                            <img src="../images/menu-downarrow.png" alt="dropdown" />
                        </em>
                    </span></a>
                    <ul class="news">
                        <li><a href="../index.html?path=news/local.html"><span>Local News</span></a></li>
                        <li><a href="../index.html?path=news/national.html"><span>National News</span></a></li>
                        <li><a href="../index.html?path=news/world.html"><span>World News</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span>Events &nbsp;
				
                        <em class="opener-events">
                            <img src="../images/menu-downarrow.png" alt="dropdown" />
                        </em>
                    </span></a>
                    <ul class="events">
                        <li><a href="../index.html?path=events/announcement.html"><span>Announcements</span></a></li>
                        <li><a href="../index.html?path=events/schedule.html"><span>Schedules</span></a></li>
                        <li><a href="../index.html?path=events/springfestival.html"><span>Past Events</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span>Programs &nbsp;
				
                        <em class="opener-programs">
                            <img src="../images/menu-downarrow.png" alt="dropdown" />
                        </em>
                    </span></a>
                    <ul class="programs">
                        <li><a href="../index.html?path=programs/vip.html"><span>VIP (Volunteer Involvement Program</span></a></li>
                        <li><a href="../index.html?path=programs/help.html"><span>Help</span></a></li>
                        <li><a href="../index.html?path=programs/lecture.html"><span>Lectures on Special Topics</span></a></li>
                        <li><a href="../index.html?path=programs/qanewcomers.html"><span>100 Q&A for New Comers</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span>Resources &nbsp;
				
                        <em class="opener-resource">
                            <img src="../images/menu-downarrow.png" alt="dropdown" />
                        </em>
                    </span></a>
                    <ul class="resource">
                        <li><a href="../index.html?path=resources/settlement.html"><span>Settlement Information</span></a></li>
                        <li><a href="../index.html?path=resources/finance.html"><span>Finance</span></a></li>
                        <li><a href="../index.html?path=resources/insurance.html"><span>Insurance</span></a></li>
                        <li><a href="../index.html?path=resources/health.html"><span>Health</span></a></li>
                        <li><a href="../index.html?path=resources/education.html"><span>Education</span></a></li>
                        <li><a href="../index.html?path=resources/links.html"><span>Useful links</span></a></li>
                        <li><a href="resources/other.html"><span>Other Information</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="../index.html?path=forum/forum.html"><span>Forum &nbsp;
                    </span></a>
                </li>
                <li>
                    <a href="../index.html?path=aboutus/contact.html"><span>Contact Us &nbsp;
                    </span></a>
                </li>
            </ul>
        </div>
        <!-- end #menu -->
        <div id="page">
            <div id="page-bgtop">
                <div id="page-bgbtm">
                    <script src="http://www.google.com/jsapi"></script>
                    <script src="js/rss.js"></script>
                    <div id="content">
						<div class="post">
	<?php
	$course1 = $course2 = $course3 = $course4 = '';
	$price = 0;
	$courseprice = array(110, 60, 110, 60);
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
		
		if ($mage == 're')
		{
			$memberage = "Regular";
		}
		else if ($mage == 'se')
		{
			$memberage = "Senior";
		}
		else if ($mage == 'st')
		{
			$memberage = "Student";
		}
		else
		{
			$memberage = "N/A";
		}
		
		if ($mtype == 'ind') {
			$membertype = "Individual" . $membercontents;
		}
		else if ($mtype == 'fam')
		{
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
		$course1 = implode(", ", $courses1);
    }

    if(isset($_POST['courses2'])){
        $courses2 = $_POST['courses2'];
		$course2 = implode(", ", $courses2);
    }

    if(isset($_POST['courses3'])){
        $courses3 = $_POST['courses3'];
		$course3 = implode(", ", $courses3);
    }

    if(isset($_POST['courses4'])){
        $courses4 = $_POST['courses4'];
		$course4 = implode(", ", $courses4);
    }
	?>
		    <form id="registrationConfirmation" name="confirmationform" action="confirm_registration.php" method="post" enctype="application/x-www-form-urlencoded" onsubmit="return checkform()">
		        <h2 class="title">CCANB Membership & Chinese School Registration Confirmation</h2>
		        
		        <div class="entry">
		            <p>
		                E-mail Address: <?php echo $email_address; ?>
		            </p>
		        </div>
		
		        <h4>CCANB Membership Registration:</h4>
		
		        <div class="entry">
		        	<p>Membership Registration: <?php echo $registration; ?></p>
		            <p>
		                Name: <?php echo $mname; ?>
		                <br />
		                Address: <?php echo $maddr; ?>
		                <br />
		                Postal Code: $mpcode
		                <br />
		                Telephone #:
		                <br />
		                (Home): $mhphone
		                (Work/Office): $mwphone
		                (Cell): $mcphone
		                <!-- <br />
		                E-mail Address:<input type="text" size="40" maxlength="150" name="memail"> -->
		            </p>
		            <p>
		                TYPE OF MEMBERSHIP: 
		            </p>
		            <p id="familymember">
		                Names of other family members:
		            <br />
		                Name 1: 
		            <br />
		                Name 2: 
		            <br />
		                Name 3:
		            <br />
		                Name 4:
		            <br />
		                Name 5:
		            <br />
		                Name 6:
		            <<br />
		            </p>
		            <p>
		                AGE Category: 
		            </p>
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
						The courses selected: <?php echo $course1; ?>
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
						The courses selected: <?php echo $course2; ?>
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
						The courses selected: <?php echo $course3; ?>
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
						The courses selected: <?php echo $course4; ?>        
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
                    </div>
                    <!-- end #content -->
                </div>
            </div>
        </div>
        <!-- end #page -->
        <div id="footer-wrappers">
            <div id="footer">
                <p>Copyright (c) 2012 CCANB. Design by <a href="http://www.ccanb.ca/">CCANB</a>.</p>
            </div>
        </div>
        <!-- end #footer -->
    </div>
</body>
</html>