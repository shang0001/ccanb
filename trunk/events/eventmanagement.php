<?php
if($_POST['formSubmit'] == "Submit")
{
	$errorMessage = "";
	
	if(empty($_POST['eventTitle']))
	{
		$errorMessage .= "<li>You forgot to enter the event title!</li>";
	}
	if(empty($_POST['startTime']))
	{
		$errorMessage .= "<li>You forgot to enter the event start time!</li>";
	}
	
	if(empty($_POST['endTime']))
	{
		$errorMessage .= "<li>You forgot to enter the event start time!</li>";
	}
	
	if(empty($_POST['eventUrl']))
	{
		$errorMessage .= "<li>You forgot to enter the event start time!</li>";
	}
	
	$varEventTitle = $_POST['eventTitle'];
	$varStartTime = $_POST['startTime'];
	$varEndTime = $_POST['endTime'];
	$varEventUrl = $_POST['eventUrl'];

	if(empty($errorMessage)) 
	{
		$fs = fopen("events.csv","a");
		fwrite($fs,$varEventTitle.",".$startTime.",".$endTime.",".$eventUrl."\n");
		fclose($fs);
		
		header("Location: schedule.html");
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Cache-Control: no-cache");
		header("Pragma: no-cache");
		exit;
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Schedule Management System</title>
</head>

<body>
	<?php
		if(!empty($errorMessage)) 
		{
			echo("<p>There was an error with your form:</p>\n");
			echo("<ul>" . $errorMessage . "</ul>\n");
		} 
	?>
	<form action="eventmanagement.php" method="post">
		<p>
			Event Title<br>
			<input type="text" name="eventTitle" maxlength="50" value="<?=$varEventTitle;?>" />
		</p>
		<p>
			Start Time<br>
			<input type="text" name="startTime" maxlength="50" value="<?=$varStartTime;?>" />
		</p>	
		<p>
			End Time<br>
			<input type="text" name="endTime" maxlength="50" value="<?=$varEndtime;?>" />
		</p>
		<p>
			All Day Events<br>
			<input type="checkbox" name="allDayEvent" maxlength="50" value="All Day Events" />
		</p>	
		<p>
			Event URL<br>
			<input type="text" name="eventUrl" maxlength="50" value="<?=$varEventUrl;?>" />
		</p>
		<input type="submit" name="formSubmit" value="Submit" />
	</form>
</body>
</html>