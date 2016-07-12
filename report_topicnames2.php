
<?php
  
   header('Content-type=application/json;charset=utf-8');
   
   include("connection.php");
   session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST") 
{

   $event_date1= mysqli_real_escape_string($con,$_POST['event_date1']);
   $event_date2= mysqli_real_escape_string($con,$_POST['event_date2']);
   $orgname= mysqli_real_escape_string($con,$_POST['orgname']);
   
   


   $query = ("SELECT topic_name2, avg(score2) from average_topic_score2 where event_date2 between '$event_date1' AND '$event_date2' AND orgname='$orgname' 
              group by topic_name2" );

   
	 
	
    $response=mysqli_query($con,$query);

  

   // set array
   $array = array();

   // look through query
   while($row = mysqli_fetch_assoc($response))
  {

    // add each row returned into an array
     $array[] = $row;

    // OR just echo the data:
   // echo $row['topic']; // etc
  }
 
  $data['details']=$array;
  echo json_encode($data);
		
  //print_r($array);
  // echo json_encode($array);
}

mysqli_close($con);
   
?>



