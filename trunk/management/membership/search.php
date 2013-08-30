<?php
//session_start();
//$counter = isset($_SESSION['counter']) ? $_SESSION['counter'] : 0;
//$counter++;
//print "You have visited this page $counter times during this session";
//$_SESSION['counter'] = $counter;

// $lang = $_GET["lang"];
$filename = 'report_en.html';
$curYear = date('Y');

$years = $_REQUEST['years'];
$types = $_REQUEST['types'];
$categories = $_REQUEST['categories'];

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
// echo "SELECT * FROM membership where memberyear like '%$years' and membertype like '%$types' and memberage like '%$categories'";

$memberregistrations = mysqli_query($con,"SELECT * FROM membership where memberyear like '%$years' 
		and membertype like '%$types' and memberage like '%$categories'");

while ($member = mysqli_fetch_array($memberregistrations))
{
	$newRow = $xml->table->addChild('tr');
	$newRow->addChild('td', $member['mname']);
	$newRow->addChild('td', $member['address']);
	$newRow->addChild('td', $member['postalcode']);
	$newRow->addChild('td', $member['hphone']);
	$newRow->addChild('td', $member['ophone']);
	$newRow->addChild('td', $member['cphone']);
	$newRow->addChild('td', $member['email']);
	$newRow->addChild('td', $member['membertype']);
	$newRow->addChild('td', $member['memberage']);
}

mysqli_close($con);

echo $xml->asXML();

?>