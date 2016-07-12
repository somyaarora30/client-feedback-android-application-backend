<?php
   include("db_config.php");
   include("db_connect.php");
   
   

/*
 * Following code will get single product details
 * A product is identified by product id (pid)
 */
 
// array for JSON response

 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();
//echo db;
      $email_id = $_POST['email_id'];



//$query = "SELECT email_id,password FROM login_db WHERE email_id = '$emailid' and password = '$passwords'";
	 
	// $query = "SELECT Count(*) FROM login_db WHERE email_id = '$emailid' and password = '$passwords'";
	//echo $db;
	// $response=mysqli_query($con,$query);
	 
	// echo $db;
	// echo $response;
	        $con1 = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysqli_error());

	
	//$query=("SELECT * FROM login_db WHERE email_id='$emailid'");
	$query = "select * from login_db";
	$response=mysqli_query($con1,$query);
	$rows = mysqli_num_rows($response);
	
	if($rows>0)
		echo "found";
	else echo "not";
	
?>


<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>email_id  :</label><input type = "text" name = "email_id" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
 
