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
user_id | INT(20) | (255)
user_FName | VARCHAR(255) |Null
user_LName | VARCHAR(255)| Null
user_email | VARCHAR(255)| Null
user_pw | VARCHAR(30)| Null
user_type | ENUM(255)| Null
user_city | VARCHAR(255)| Null
user_state | VARCHAR(255)| Null
user_country | VARCHAR(255)| Null
user_pic | VARCHAR(255) | Null
degree_id | INT(20) | Null
course_id | INT(20) | Null

#####Course Table
Field | Data Type | Index
----- | --------- | -----------
course_id | INT | UNIQUE
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
Field | Data Type | Index
----- | --------- | -----------
grades_ID | INT | UNIQUE
homeworks | FLOAT |Null
quizzes | FLOAT | Null
exams | FLOAT | Null
project | FLOAT | Null
final_grade | VARCHAR | Null

#####Degree Table
Field | Data Type | Index
----- | --------- | -----------
degree_ID | INT | UNIQUE
type | VARCHAR |Null
program | VARCHAR | Null
description | TEXT | Null



