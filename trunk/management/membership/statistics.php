<?php
//session_start();
//$counter = isset($_SESSION['counter']) ? $_SESSION['counter'] : 0;
//$counter++;
//print "You have visited this page $counter times during this session";
//$_SESSION['counter'] = $counter;

$curYear = date('Y');
$lang = $_GET["lang"];
$filename = 'statistics_' . $lang . '.html';

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

$membercounts = mysqli_query($con,"SELECT count(*) as regcount FROM membership where memberyear = $curYear");
while ($membercount = mysqli_fetch_array($membercounts))
{
	$newRow = $xml->table->addChild('tr');
	$newRow->addChild('td', "Total CCANB Membership Registration for $curYear: " . $membercount['regcount']);
}

$incomecounts = mysqli_query($con,"SELECT SUM(memberprice) as incomecount FROM membership where memberyear = $curYear");
while ($incomecount = mysqli_fetch_array($incomecounts))
{
	$newRow = $xml->table->addChild('tr');
	$newRow->addChild('td', "Total Membership Incomes for $curYear: $" . $incomecount['incomecount']);
}

mysqli_close($con);

echo $xml->asXML();

?>