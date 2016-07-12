<?PHP
include_once("connection.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")	
{
$event_date2= mysqli_real_escape_string($con,$_POST['event_date2']);
$topic_name2= mysqli_real_escape_string($con,$_POST['topic_name2']);
$score2= mysqli_real_escape_string($con,$_POST['score2']);
$orgname= mysqli_real_escape_string($con,$_POST['orgname']);


$query = "INSERT INTO average_topic_score2 (event_date2,topic_name2,score2,orgname) 
VALUES ('$event_date2','$topic_name2','$score2','$orgname')";





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

