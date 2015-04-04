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
#####User Table
Field | Data Type | Default 
----- | --------- | -----------
user_id | INT | Null
user_FName | VARCHAR |Null
user_LName | VARCHAR | Null
user_email | VARCHAR | Null
user_type | ENUM | Null
user_city | VARCHAR | Null
user_state | VARCHAR | Null
user_country | VARCHAR | Null
user_pic | VARCHAR | Null
degree_id | INT | Null
course_id | INT | Null

#####Course Table
Field | Data Type | Default 
----- | --------- | -----------
course_id | INT | Null
course_Name | VARCHAR |Null
course_Type | VARCHAR | Null
course_Days | VARCHAR | Null
course_Time | TIME | Null
course_Unit | INT | Null
course_startDate | DATE | Null
course_endDate | DATE | Null
course_Points | INT | Null
term | VARCHAR | Null
grades_ID | INT | Null

#####Grades Table
Field | Data Type | Default 
----- | --------- | -----------
grades_ID | INT | Null
homeworks | FLOAT |Null
quizzes | FLOAT | Null
exams | FLOAT | Null
project | FLOAT | Null
final_grade | VARCHAR | Null

#####Degree Table
Field | Data Type | Default 
----- | --------- | -----------
degree_ID | INT | Null
type | VARCHAR |Null
program | VARCHAR | Null
description | TEXT | Null



