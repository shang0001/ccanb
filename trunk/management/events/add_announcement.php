<?php 

$dates = date('Y-m-d');
$title = $_REQUEST['subject'];
$content = $_REQUEST['announcement'];
$csvfile = '../../events/announcement.csv';

$posts = array();

$post = array($title, $dates, $content);

array_push($posts, $post);

$fp = fopen($csvfile, 'w');
foreach ($posts as $fields) {
	fputcsv($fp, $fields);
}

fclose($fp);


header( "Location: ../index.html?path=events/complete_addannouncement.html" );

?> 