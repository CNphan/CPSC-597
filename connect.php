<?php
mysql_connect ("localhost","root","");
	mysql_select_db("lms");
	
	 // fetch tables and assign variables to values 
   $courseTable = mysql_query("SELECT * FROM course ORDER BY course_id ASC");

   
   // assign variables 
	$course_id ='course_id';
	$course_Name = 'course_Name';
	$course_Type = 'course_Type';
	$course_Days = 'course_Days';
	$course_Unit = 'course_Unit';
	$course_startDate = 'course_startDate';
	$course_points = 'course_Points';
	$course_term = 'term';
	$course_grade = 'grades_id';
	
	$courseTableRows = mysql_fetch_assoc($courseTable); // returns the array
?>