<?php
mysql_connect("localhost","root","");
mysql_select_db("lms");
session_start(); // before start anything 

$result = mysql_query("SELECT course.course_id, course.course_name,course.course_type,course.course_days,course.course_time,course.course_unit,course.course_startDate,course.course_endDate,course.course_loc,course.course_inst,user.user_id
							FROM course
							JOIN user_course on course.course_id = user_course.course_id
							JOIN user on user.user_id = user_course.user_id
							");

$row = mysql_fetch_array($result);
$_SESSION['courseN'] = $row['course_name'];			

			
	/*$courseN ='course_name';
	$courseT ='course_type';
	$courseD ='course_days';
	$courseTime ='course_time';
	$courseU ='course_unit';
	$courseStD ='course_startDate';
	$courseEnD ='course_endDate';
	$courseloc ='course_loc';
	$courseI ='course_inst';*/



?>