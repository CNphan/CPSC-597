# Mini-Learning Management System
More documentation to come...

## Installation/ Environment Set Up 

### Get Git 
1. Go to https://github.com/  
2. Download and install Github  
3. Clone Repository  
4. Open Git Shell  
5. Navigate to the destination you want to clone the repository to  
6. Type in ```git clone https://github.com/CNphan/CPSC-597.git  ```

### Database set up  
1. Open MySQL 
2. Create new database and name it "lms2" 
3. Import database file from <your git clone repository> \SQL\lms2  
4. Navigate to <your git cone repository> Project\database-config.php  
5. Open the database-config.php file  
6. Fill in the following information:  
```php
   $database = 'lms2'; //  fill in the database name here  
   $host = 'localhost'; // fill in the host name here  
   $user = 'root'; //fill in the username from MySQL here 
   $pass = ''; //fill in the password information from MySQL here  
```
### Start Environment  
1. Run [XAMPP](https://www.apachefriends.org/index.html)
2. Start [Apache](https://www.apache.org/) & [MySQL](https://www.mysql.com/)
3. Open a web browser  
4. Type in the host name & the name of the project  
   Example: http://localhost/project/  
5. You should see the welcome page below  
 ![alt text](https://github.com/CNphan/CPSC-597/blob/master/LMS-landing.JPG "LMS-landing")
6. Start exploring ! 
