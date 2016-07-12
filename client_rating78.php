<?PHP
include_once("connection.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")	
{
$score7= mysqli_real_escape_string($con,$_POST['score7']);
$score8= mysqli_real_escape_string($con,$_POST['score8']);


     $event_date = mysqli_real_escape_string($con,$_POST['event_date']);
  
     $event_location = mysqli_real_escape_string($con,$_POST['event_location']); 

     $organisation_name= mysqli_real_escape_string($con,$_POST['organisation_name']); 



//$query = "update transaction3_db set score1=$score1,score2=$score2 order by transaction_id3 desc limit 1";

$query = "UPDATE transaction3_db set score7='$score7',score8='$score8' WHERE event_date3 = '$event_date' and event_location3 = '$event_location' and organisation_name3 = '$organisation_name' order by transaction_id3 desc limit 1";



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



