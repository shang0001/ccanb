<?php 
	$year = date('Y');
	$month = date('M');
		
	$event1 = array('id' => 1, 'title' => "Spring Festival", 'start' => "$year-$month-10", 'url' => "http://www.google.com");
	$event2 = array('id' => 2, 'title' => "Christmas Party", 'start' => "$year-$month-24", 'url' => "http://www.baidu.com");
	$events = array($event1, $event2);
	echo json_encode($events);
?>