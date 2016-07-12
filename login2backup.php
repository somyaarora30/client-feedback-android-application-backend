<?php
   include("connection.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      // email_id and password sent from form 
      
      $email_id = mysqli_real_escape_string($con,$_POST['email_id']);
       $password = mysqli_real_escape_string($con,$_POST['password']); 
	  //$emailid = $_POST['emailid'];
 
//      $passwords = $_POST['passwords'];
      
    $query = "SELECT email_id,password FROM login_db WHERE email_id = '$email_id' and password = '$password'";
	 
	// $query = "SELECT Count(*) FROM login_db WHERE email_id = '$emailid' and password = '$passwords'";
	 
	 //$query = "select * from login_db where email_id = {$_POST['email_id']}AND password ={$_POST['password']}";
      $response=mysqli_query($con,$query);
	$rows = mysqli_num_rows($response);
	//echo $rows;
	
	if($rows == 0) { 
		$data['logged_in'] = 0;
	 //echo "<h1>No Such User Found</h1>";
    	  }
	 else  {
		 $row = mysqli_fetch_row($response);
		 $data['logged_in'] = 1;
		 $data['details'] = $row;
		// echo "<h1>User Found</h1>";
	 }
		 echo json_encode($data);
	 
	
     	 
		 
	
   }
?>


//......................danielnugent.blogspot.in............


