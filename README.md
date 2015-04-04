# CPSC-597
###Graduate Project-mini LMS 
### Software Engineering @ CSUF, 2015

####Sprint 1: Front-End Development 
<ul>
  <li>Learn and familiarize self with programming languages/technologies</li>
  <li>Create SRS</li>
  <li>Design UI</li>
  <li>Develop UI views</li>
  <li>test</li>
  <li>UI release</li>
</ul>

#### Purposed Features 
Admin | Teacher | Student | System
----- | ------- | ------- | ------
Assign Course Content to participants (Teacher/Students) |View Profile |View Profile |Course Content
Manage Participants |View Course Schedule |View Transcript |Upload/Download Capability
Finalize Reports |View Student Info |View Schedule |User Authentication/Authorization
 |Edit Course Content |View Course Content |Report Report
 |Post Grades |View Grades |Responsive
 |Email/Messaging |Email/Messaging |User-friendly/Dynamic

###Data
#####Consideration
######Collation : utf8_general_ci for VARCHAR DataType : not case sensitive 
######Function for user_pw is md5
#####User Table
Field | Data Type | Index 
----- | --------- | -----------
user_id | INT(20) | UNIQUE
user_FName | VARCHAR(50) |Null
user_LName | VARCHAR(50)| Null
user_email | VARCHAR(50)| Null
user_pw | VARCHAR(30)| Null
user_type | ENUM(30)| Null
user_city | VARCHAR(50)| Null
user_state | VARCHAR(50)| Null
user_country | VARCHAR(50)| Null
user_pic | VARCHAR(50) | Null
degree_id | INT(20) | Null
course_id | INT(20) | Null

#####Course Table
Field | Data Type | Index
----- | --------- | -----------
course_id | INT(20) | UNIQUE
course_Name | VARCHAR(50) |Null
course_Type | VARCHAR(50) | Null
course_Days | VARCHAR(50) | Null
course_Time | TIME(50) | Null
course_Unit | INT(30) | Null
course_startDate | DATE(50) | Null
course_endDate | DATE(50) | Null
course_Points | INT(20) | Null
term | VARCHAR(50) | Null
grades_ID | INT(20) | Null

#####Grades Table
Field | Data Type | Index
----- | --------- | -----------
grades_ID | INT(20) | UNIQUE
homeworks | FLOAT(30) |Null
quizzes | FLOAT(30) | Null
exams | FLOAT(30) | Null
project | FLOAT(30) | Null
final_grade | VARCHAR(50)| Null

#####Degree Table
Field | Data Type | Index
----- | --------- | -----------
degree_ID | INT(20) | UNIQUE
type | VARCHAR(100) |Null
program | VARCHAR(100) | Null
description | TEXT(300) | Null



