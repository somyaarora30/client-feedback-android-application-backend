<?php
  
   header('Content-type=application/json;charset=utf-8');
   
   include("connection.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

     $event_date = mysqli_real_escape_string($con,$_POST['event_date']);
	 $event_location = mysqli_real_escape_string($con,$_POST['event_location']); 
     $organisation_name = mysqli_real_escape_string($con,$_POST['organisation_name ']); 
	 
	 $query = "INSERT INTO `feedbackform_db`(`event_date`, `event_location`, `organisation_name`) VALUES ('$event_date','$event_location','$organisation_name')";
	 
     if(mysqli_query($con,$sql)){
     echo 'Data inserted';
     }
    else{
    echo 'Data not inserted';
    }
    mysqli_close($con);
	
?>





