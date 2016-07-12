<?php
  
   header('Content-type=application/json;charset=utf-8');
   
   include("connection.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

     $email_id = mysqli_real_escape_string($con,$_POST['email_id']);
	// $_SESSION["email_id"]=mysqli_real_escape_string($con,$_POST['email_id']);
     $password = mysqli_real_escape_string($con,$_POST['password']); 
	 //$_SESSION["password"]=mysqli_real_escape_string($con,$_POST['password']);
	   
	 $query = "SELECT * FROM login_db WHERE email_id = '$email_id' and password = '$password'";
	
    $response=mysqli_query($con,$query);
	$rows = mysqli_num_rows($response);
	
	
	if($rows == 0) { 
	  $data['Login'] = "unsucessful";
	 }
	 else  {
		 $row = mysqli_fetch_row($response);
		 $array = array(
			array(
			    "loginid"=>$row[0],
				"email" => $row[1],
				"password" => $row[2],
				"role"=> $row[3],
				"name"=> $row[4]
				
			)
		);
		 $data['Login'] = "successful";
		 $data['details'] = $array;
		 $data['success'] = 1;
		 $data['message']="login successful";
		 }
		echo json_encode($data);
		
}
mysqli_close($con);
   
?>



