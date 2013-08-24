<?php 

$dates = date('Y-m-d');
$title = $_REQUEST['subject'];
$content = $_REQUEST['announcement'];
$jsonfile = '../../events/announcement.json';

$response = array();
$posts = array();

$posts[] = array('subject'=> $title, 'date'=> $dates, 'content'=> $content);

$response['posts'] = $posts;

$inp = file_get_contents($jsonfile);
$tempArray = json_decode($inp);
array_push($tempArray, $response);
$jsonData = json_encode($tempArray);
file_put_contents($jsonfile, $jsonData);

header( "Location: ../index.html?path=events/complete_addannouncement.html" );

?> 