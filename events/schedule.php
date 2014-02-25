<?php
  $row = 1;
  $captionArray = null;
  $events = array();
  if (($handle = fopen("events.csv", "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
          $num = count($data);
          if ($row == 1) {
            $captionArray = $data;
            //echo json_encode($captionArray);
          }
          else{
            $event = array();
            for ($c=0; $c < $num; $c++) {
              if ($captionArray[$c] == "allDay"){
                $event[$captionArray[$c]] = $data[$c] === 'true'? true: false;
              }
              else{
                $event[$captionArray[$c]] = $data[$c];
              }
            }
            //echo json_encode($event);
            $events[] = $event;
          }
          $row++;
      }
      fclose($handle);
  }
  echo json_encode($events);

	//$year = date('Y');
	//$month = date('M');
		
	//$event1 = array('id' => 1, 'title' => "Spring Festival", 'start' => "2013-01-04", 'url' => "http://www.google.com");
	//$event2 = array('id' => 2, 'title' => "Christmas Party", 'start' => "2013-01-24", 'url' => "http://www.baidu.com");
	//$eventss = array($event1, $event2);
	//echo json_encode($eventss);
?>