<?php
	global $id;
	$filename = "../../events/events.csv";
//	$filenametmp = "events.csv";
	if (!file_exists($filename)) {
		die("File $filename not found");
	}
	$lines = file( $filename );
	$lines = array_map( 'trim', $lines );
	$lines = array_filter( $lines );
	
	$last  = str_getcsv( end( $lines ), 4096, ',', '"' );
	$line = explode(",", $last[0]);
	$id = $line[0];
	$id = $id + 1;
	
	$startime = $endtime = $allday = $eventname = $eventurl = '';
	$eventname = $_REQUEST['ename'];
	$startime = $_REQUEST['stime'];
	$endtime = $_REQUEST['etime'];
	
	$eventurl = $_REQUEST['eurl'];
	
	if ($_REQUEST['alldayevents'] == 'all_day')
	{
		$allday = true;
	}
	
	$content = array("$id,$eventname,$startime,$endtime,$allday,$eventurl");
	
	if (($handle = fopen($filename, "a")) != FALSE)
	{
		fwrite($handle, PHP_EOL);
		foreach ($content as $eline)
		{
			fputcsv($handle, split(',',$eline));
		}
		fclose($handle);
	}
	
	header( "Location: ../index.html?path=events/complete_addevents.html" );
?>