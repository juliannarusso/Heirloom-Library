<!- Filename: connect_db 
    This file connects to our database using default MIKE@LOCALHOST
	MySQL server MUST be running!  
    Important: This file has our password so it must NOT be visible to users!
    Note: if mysli function not found - reload MAMP 
	Set the variable $display_messages to FALSE once you know your connection is good

#    CREATE USER IF NOT EXISTS  'mike'@'localhost' IDENTIFIED BY 'easysteps';
#    GRANT SELECT, INSERT, UPDATE,DELETE ON site_db.* TO 'mike'@'localhost';



	
	V1.0  10/11/2021 AT Original program                                  ->


 

<?php
  
  $display_messages = TRUE;              
 
  if ($display_messages) {
      Echo "<br> Attemping to connect to our Mysql database...  ";
  } 
  
  $dbc=mysqli_connect('127.0.0.1','mike','easysteps','site_db')
  OR die
      (   mysqli_connect_error());;
	  
  if ($display_messages) { 	  
       Echo "<br> It was successful! <br>"; 
  }  	   
         
## EOF 
