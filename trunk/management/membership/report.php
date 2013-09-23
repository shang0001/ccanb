<?php
//session_start();
//$counter = isset($_SESSION['counter']) ? $_SESSION['counter'] : 0;
//$counter++;
//print "You have visited this page $counter times during this session";
//$_SESSION['counter'] = $counter;

$lang = $_GET["lang"];
$filename = 'report_' . $lang . '.html';
$curYear = date('Y');

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
		
$memberships = mysqli_query($con,"SELECT * FROM membership where memberyear = $curYear order by registrationtime");
while ($member = mysqli_fetch_array($memberships))
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