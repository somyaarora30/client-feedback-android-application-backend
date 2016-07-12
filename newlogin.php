<?php
   include("connection.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      // email_id and password sent from form 
      
      $emailid = mysqli_real_escape_string($con,$_POST['email_id']);
       $passwords = mysqli_real_escape_string($con,$_POST['password']); 
	  //$emailid = $_POST['emailid'];
 
//      $passwords = $_POST['passwords'];
      
     $query = "SELECT email_id,password FROM login_db WHERE email_id = '$emailid' and password = '$passwords'";
	 //$query = "select * from login_db where email_id = {$_POST['email_id']}AND password ={$_POST['password']}";
      $response=mysqli_query($con,$query);
	 // print(json_encode($response));
	  
	  // if($response)
		// echo"<h1>Response</h1>";
	// else
		// echo"<h1>No</h1>";
	$rows = mysqli_num_rows($response);
	echo $rows;
	
	if($rows == 0) { 
	 echo "<h1>No Such User Found</h1>"; 
	 }
	 else  {
	 echo "<h1>User Found"; }
	 
	 
      // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      // $active = $row['active'];
      // $count = mysqli_num_rows($result);
      
      // // If result matched $email_id and $password, table row must be 1 row
		
      // if($count == 1) {
         // session_register("email_id");
         // $_SESSION['login_user'] = $email_id;
         
         // header("location: test1.php");
      // }else {
         // $error = "Your Login Name or Password is invalid";
      // }
   }
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