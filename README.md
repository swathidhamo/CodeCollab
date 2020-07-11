# Welcome to CodeCollab
CodeCollab is a minimal version of PasteBin, the code-sharing website. It uses the native PHP and MySQL to create this application.

#### Server routes: 
- For ascessing the database http://localhost/phpmyadmin
- For ascessing the homepage where the credentials have to be entered to login in or create a new user http://localhost/code/index.php
#### About the files: 
- http://localhost/code/index.php is the login page
- http://localhost/code/register.php is the registration page
- path/insert.php is the page for creating/uploading a code snippet
- path/snippet.php?id="(insert id number here)" is the page for viewing a snippet
- logout.php is the logout page
#### Setup intructions
##### Step 1: Installation  of the WAMP server
- Download the WAMP server package from this page http://www.wampserver.com/en/#download-wrapper
- Choose the director you wish to store it under(wamp64 in the C drive), the default browser (Mozilla Firefox)and the text editor ( Sublime) by choosing their corresponing .exe files by also reffering to the wordpress link below.
https://make.wordpress.org/core/handbook/tutorials/installing-a-local-server/wampserver/
- Also change the username and password in the php.ini file by changing the username to 'root' and password = ''
- Check to see if the server is configured by typing http://localhost . If you get a WAMP server homepage then it is configured
- Now type http://localhost/phpmyadmin to enter the username as 'root' and password ''  to get the MYSQL database page
- Now click on the WAMP desktop icon and you should be able to see the WAMP link go green and then you're all set to go.

##### Step2: Creating .php files in the wamp64 directory in the directory
- Go to www directory in the wamp64 folder and create a directory called code. This will be the directory we will store all our .php file from now on
- Create the first file index.php  and to view the file extablish a link to the server using mysqli_connect() and then type http://localhost/forum/index.php to view your file.

##### Step 3: Creating the MYSQL database
- Enter the username and password and create a new database called "delta"
- Over the course of this task we will be using 3 tables in the database
###### Table 1 : Create a table called user_info that will store the details of the users and their passwords and their names


CREATE TABLE `user_info` ( 
           `id` INT NOT NULL AUTO_INCREMENT , 
           `username` TEXT NOT NULL ,
           `password` TEXT NOT NULL ,
           `name` TEXT NOT NULL ,
           PRIMARY KEY (`id`));
           
 
INSERT INTO user_info (username, password , name) VALUES ('admin', MD5('midas'), 'adminstrator');

###### Table 2: To create a table called 'code' that will store all the the snippets, their titles, the username it was created by, their language and their expiry time if needed.

CREATE TABLE  'code` ( 
          `id` INT NOT NULL AUTO_INCREMENT , 
          `title` TEXT NOT NULL ,
          `username` TEXT NOT NULL ,
          `code` TEXT NOT NULL , 
          `language` TEXT NOT NULL , 
          `file` LONGBLOB NOT NULL ,
          `status` INT NOT NULL , 
          `times` INT NULL , 
          `visible` INT NOT NULL , 
          PRIMARY KEY (`id`));

