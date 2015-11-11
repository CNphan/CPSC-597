<!DOCTYPE html> 
<html>

<head>

</head>
<body>
    
	
	<?php 
 //This gets today's date 
 $date =time () ; 
 //This puts the day, month, and year in seperate variables 
 $day = date('d', $date) ; 
 $month = date('m', $date) ; 
 $year = date('Y', $date) ;
 //Here we generate the first day of the month 
 $first_day = mktime(0,0,0,$month, 1, $year) ; 
 //This gets us the month name 
 $title = date('F', $first_day) ;
 //Here we find out what day of the week the first day of the month falls on 
 $day_of_week = date('D', $first_day) ; 
 //Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero
 switch($day_of_week){ 
 case "Sun": $blank = 0; break; 
 case "Mon": $blank = 1; break; 
 case "Tue": $blank = 2; break; 
 case "Wed": $blank = 3; break; 
 case "Thu": $blank = 4; break; 
 case "Fri": $blank = 5; break; 
 case "Sat": $blank = 6; break; 
 }
 //We then determine how many days are in the current month
 $days_in_month = cal_days_in_month(0, $month, $year) ; 
 //Here we start building the table heads 
 echo "<table border=1 width=294>";
 echo "<tr><th colspan=7> $title $year </th></tr>";
 echo "<tr><td width=42>S</td><td width=42>M</td><td 
width=42>T</td><td width=42>W</td><td width=42>T</td><td 
width=42>F</td><td width=42>S</td></tr>";
 //This counts the days in the week, up to 7
 $day_count = 1;
 echo "<tr>";
 //first we take care of those blank days
 while ( $blank > 0 ) 
 { 
 echo "<td></td>"; 
 $blank = $blank-1; 
 $day_count++;
 } 
 //sets the first day of the month to 1 
 $day_num = 1;
 //count up the days, untill we've done all of them in the month
 while ( $day_num <= $days_in_month ) 
 { 
 echo "<td> $day_num </td>"; 
 $day_num++; 
 $day_count++;
 //Make sure we start a new row every week
 if ($day_count > 7)
 {
 echo "</tr><tr>";
 $day_count = 1;
 }
 } 
 //Finaly we finish out the table with some blank details if needed
 while ( $day_count >1 && $day_count <=7 ) 
 { 
 echo "<td> </td>"; 
 $day_count++; 
 } 
 
 echo "</tr></table>"; 
?>


<!--
<p>
<h1>Calendar Test </h1>
<iframe src="https://calendar.google.com/calendar/embed?src=7b0m37uovf0cqj5u6eoqbackpc%40group.calendar.google.com&ctz=America/Los_Angeles" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
</p>-->
	

	<!--Add Google Calendar API-->
	<link href='../fullcalendar.css' rel='stylesheet' />
	<link href='../fullCalendar.print.css' rel='stylesheet' media='print' />
	<script type = 'text/javascript' src ='fullcalendar/gcal.js'></script>
	<script type = 'text/javascript' src = 'fullcalendar/fullCalendar.js'></script>
	<script src='../lib/moment.min.js'></script>
	<script src='../lib/jquery.min.js'></script>
	
	
	<script type = 'text/javascript'>
	$document.ready(function()
	{
		$('#calendar').fullCalendar(
		{
			googleCalendarApiKey: 'AIzaSyCh2TNu5pCV0xJhPpnH9pysouRuTN2Dqy0',
			events:{
				googleCalendarId:'7b0m37uovf0cqj5u6eoqbackpc@group.calendar.google.com'
				// set event type 
				className: 'gcal-event'
				} 
				
			});
		
	});
	
	
	</script>
	
</body>

</html>
