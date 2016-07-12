<?php
  
   header('Content-type=application/json;charset=utf-8');
   
   include("connection.php");
   session_start();

   
   
   $query = ("SELECT DISTINCT(questions) FROM `question_names` ");
   
	 
	
    $response=mysqli_query($con,$query);
	

// set array
$array = array();

// look through query
while($row = mysqli_fetch_assoc($response))
{

  // add each row returned into an array
  $array[] = $row;

  // OR just echo the data:
  //echo $row['topic_name']; // etc
}
 
 $data['details']=$array;
 echo json_encode($data);
		
// print_r($array);
// echo json_encode($array);

mysqli_close($con);
   
?>





