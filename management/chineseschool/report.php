<?php
//session_start();
//$counter = isset($_SESSION['counter']) ? $_SESSION['counter'] : 0;
//$counter++;
//print "You have visited this page $counter times during this session";
//$_SESSION['counter'] = $counter;

$lang = $_GET["lang"];
$filename = 'report_' . $lang . '.html';

if (file_exists($filename)) {
    $table = simplexml_load_file($filename);
 
    //print_r($table);
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
		
$existresult = mysqli_query($con,"SELECT * FROM membership");
while ($member = mysqli_fetch_array($existresult))
{
	$newRow = $table->addChild('tr');
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

echo $table->asXML();

?>