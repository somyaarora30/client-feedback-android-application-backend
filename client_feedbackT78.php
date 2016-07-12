<?php
  
   header('Content-type=application/json;charset=utf-8');
   
   include("connection.php");
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST")	
{


     $event_date = mysqli_real_escape_string($con,$_POST['event_date']);
	
     $event_location = mysqli_real_escape_string($con,$_POST['event_location']); 

     $organisation_name= mysqli_real_escape_string($con,$_POST['organisation_name']); 
   
   

   $query = "SELECT * FROM feedbackform_db WHERE event_date = '$event_date' and event_location = '$event_location' and organisation_name = '$organisation_name'";
	 
	
    $response=mysqli_query($con,$query);
	$rows = mysqli_num_rows($response);

	
	if($rows == 0) { 
	  $data['feedbackT78'] = "unsucessful";
	 }
	 else  {
			 $row = mysqli_fetch_row($response);
			 $array = array(
			 				array(
				   
									"topic7" => $row[9],
									"topic8" => $row[10]
								)
							);
			 $data['feedbackT78'] = "successful";
			 $data['details'] = $array;
			 $data['success'] = 1;
			 $data['message']="successful";
		 }
		 

	echo json_encode($data);
}	


mysqli_close($con);
   
?>















