<?PHP
  header('Content-type=application/json;charset=utf-8');
   
   include("connection.php");
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") 
{
$event_date= mysqli_real_escape_string($con,$_POST['event_date']);
$event_location= mysqli_real_escape_string($con,$_POST['event_location']);
$organisation_name= mysqli_real_escape_string($con,$_POST['organisation_name']);
   
   $query = ("DELETE FROM feedbackform_db WHERE event_date='$event_date' and event_location='$event_location' and organisation_name='$organisation_name'");


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
}
mysqli_close($con);

?>


