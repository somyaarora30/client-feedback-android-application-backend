<?PHP
include_once("connection.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")	
{
$event_date= mysqli_real_escape_string($con,$_POST['event_date']);
$question_name= mysqli_real_escape_string($con,$_POST['question_name']);
$answer= mysqli_real_escape_string($con,$_POST['answer']);
$orgname= mysqli_real_escape_string($con,$_POST['orgname']);


$query = "INSERT INTO average_answer (event_date,question_name,answer,orgname) 
VALUES ('$event_date','$question_name','$answer','$orgname')";



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



