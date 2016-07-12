<?PHP
include_once("connection.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")	
{
	$client_name3= mysqli_real_escape_string($con,$_POST['client_name3']);
	$client_type3= mysqli_real_escape_string($con,$_POST['client_type3']);
	$event_date3= mysqli_real_escape_string($con,$_POST['event_date3']);
	$organisation_name3= mysqli_real_escape_string($con,$_POST['organisation_name3']);
	$event_location3= mysqli_real_escape_string($con,$_POST['event_location3']);
	$login_id= mysqli_real_escape_string($con,$_POST['login_id']);
	$lid = (int)$login_id;


	$query = "INSERT INTO transaction3_db (client_name3,client_type3,event_date3,organisation_name3,event_location3,login_id) 
	VALUES ('$client_name3','$client_type3','$event_date3','$organisation_name3','$event_location3','$login_id')";



		   if(mysqli_query($con,$query))
		  {
			 $data['success'] = 1;
			echo json_encode($data);
		  }
		   else
		    {
				$data['success'] = 0;
		        echo json_encode($data);
		    }


   
	

	//  $query2 = "SELECT * FROM feedbackform_db WHERE event_date = '$event_date' and event_location = '$event_location' and organisation_name = '$organisation_name'";
	
 //     $response=mysqli_query($con,$query);
	//  $rows = mysqli_num_rows($response);
	
	
	// 		if($rows == 0) 
	// 		{ 
	// 		  $data2['welcome'] = "unsucessful";
	// 		}
	// 		 else  {
	// 			 $row = mysqli_fetch_row($response);
	// 			 $array = array(
	// 				array(

	// 				    "formID"=>$row[0],
						
						
	// 				)
	// 			);
	// 			 $data2['welcome'] = "successful";
	// 			 $data2['details'] = $array;
	// 			 $data2['success'] = 1;
	// 			 $data2['message']="successful";
	// 			 }

	// echo json_encode($data2);
}

mysqli_close($con);

?>


