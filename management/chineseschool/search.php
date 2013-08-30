<?php
//session_start();
//$counter = isset($_SESSION['counter']) ? $_SESSION['counter'] : 0;
//$counter++;
//print "You have visited this page $counter times during this session";
//$_SESSION['counter'] = $counter;

// $lang = $_GET["lang"];
$filename = 'search.html';
$curYear = date('Y');

$years = $_REQUEST['years'];
$courses = $_REQUEST['courses'];
$members = $_REQUEST['members'];

if (file_exists($filename)) {
    $xml = simplexml_load_file($filename);
 
    //print_r($xml);
} else {
    echo 'Failed to open $filename';
}

// Create connection
$con=mysqli_connect("ccanbca.ipagemysql.com","ccanb","ccanbadmin","ccanb");
		
// Check connection
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// echo "SELECT * FROM courseregistration where courseyear like '%$years' and course like '%$courses' and membership like '%$members'";

$courseregistrations = mysqli_query($con,"SELECT * FROM courseregistration where courseyear like '%$years' 
		and course like '%$courses' and membership like '%$members'");
while ($coursereg = mysqli_fetch_array($courseregistrations))
{
	$newRow = $xml->table->addChild('tr');
	$newRow->addChild('td', $coursereg['sname']);
	$newRow->addChild('td', $coursereg['email']);
	$newRow->addChild('td', $coursereg['birthday']);
	$newRow->addChild('td', $coursereg['medicare']);
	$newRow->addChild('td', $coursereg['address']);
	$newRow->addChild('td', $coursereg['postalcode']);
	$newRow->addChild('td', $coursereg['hphone']);
	$newRow->addChild('td', $coursereg['ophone']);
	$newRow->addChild('td', $coursereg['cphone']);
	$newRow->addChild('td', $coursereg['pname']);
	$newRow->addChild('td', $coursereg['courseyear']);
  $courses = split(',', $coursereg['course']);
  $td = $newRow->addChild('td');
  foreach ($courses as $course)
  {
    $td->addChild('div', $course);
  }
	$newRow->addChild('td', '$' . $coursereg['courseprice']);
	$newRow->addChild('td', $coursereg['registrationtime']);
	$newRow->addChild('td', ($coursereg['membership'] == 1 ? 'Yes' : 'No'));
}

mysqli_close($con);

echo $xml->asXML();

?>