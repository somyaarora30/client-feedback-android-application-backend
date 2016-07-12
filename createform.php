<?PHP
include_once("connection.php");
//include_once("login2.php");
//if(isset($_POST['event_date']) && isset($_POST['event_location']) && isset ($_POST['organisation_name']))
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")	
{

// $event_date=$_POST['event_date'];
// $event_location=$_POST['event_location'];
// $organisation_name=$_POST['organisation_name'];
$event_date= mysqli_real_escape_string($con,$_POST['event_date']);
$event_location= mysqli_real_escape_string($con,$_POST['event_location']); 
$organisation_name= mysqli_real_escape_string($con,$_POST['organisation_name']);
$topic1= mysqli_real_escape_string($con,$_POST['topic1']);
$topic2= mysqli_real_escape_string($con,$_POST['topic2']);
$topic3= mysqli_real_escape_string($con,$_POST['topic3']);
$topic4= mysqli_real_escape_string($con,$_POST['topic4']);
$topic5= mysqli_real_escape_string($con,$_POST['topic5']);
$topic6= mysqli_real_escape_string($con,$_POST['topic6']);
$topic7= mysqli_real_escape_string($con,$_POST['topic7']);
$topic8= mysqli_real_escape_string($con,$_POST['topic8']);

$question1= mysqli_real_escape_string($con,$_POST['question1']);
$question2= mysqli_real_escape_string($con,$_POST['question2']);
$question3= mysqli_real_escape_string($con,$_POST['question3']);
$question4= mysqli_real_escape_string($con,$_POST['question4']);
$question5= mysqli_real_escape_string($con,$_POST['question5']);

$message1= mysqli_real_escape_string($con,$_POST['message1']);
$message2= mysqli_real_escape_string($con,$_POST['message2']);
$message3= mysqli_real_escape_string($con,$_POST['message3']);
$message4= mysqli_real_escape_string($con,$_POST['message4']);
$message5= mysqli_real_escape_string($con,$_POST['message5']);

$cca11= mysqli_real_escape_string($con,$_POST['cca11']);
$cca12= mysqli_real_escape_string($con,$_POST['cca12']);
$cca13= mysqli_real_escape_string($con,$_POST['cca13']);
$cca21= mysqli_real_escape_string($con,$_POST['cca21']);
$cca22= mysqli_real_escape_string($con,$_POST['cca22']);
$cca23= mysqli_real_escape_string($con,$_POST['cca23']);
$cca31= mysqli_real_escape_string($con,$_POST['cca31']);
$cca32= mysqli_real_escape_string($con,$_POST['cca32']);
$cca33= mysqli_real_escape_string($con,$_POST['cca33']);
$cca41= mysqli_real_escape_string($con,$_POST['cca41']);
$cca42= mysqli_real_escape_string($con,$_POST['cca42']);
$cca43= mysqli_real_escape_string($con,$_POST['cca43']);
$cca51= mysqli_real_escape_string($con,$_POST['cca51']);
$cca52= mysqli_real_escape_string($con,$_POST['cca52']);
$cca53= mysqli_real_escape_string($con,$_POST['cca53']);
$cca61= mysqli_real_escape_string($con,$_POST['cca61']);
$cca62= mysqli_real_escape_string($con,$_POST['cca62']);
$cca63= mysqli_real_escape_string($con,$_POST['cca63']);
$cca71= mysqli_real_escape_string($con,$_POST['cca71']);
$cca72= mysqli_real_escape_string($con,$_POST['cca72']);
$cca73= mysqli_real_escape_string($con,$_POST['cca73']);
$cca81= mysqli_real_escape_string($con,$_POST['cca81']);
$cca82= mysqli_real_escape_string($con,$_POST['cca82']);
$cca83= mysqli_real_escape_string($con,$_POST['cca83']);

$login_id= mysqli_real_escape_string($con,$_POST['login_id']);
$lid = (int)$login_id;


     
// $date = date('Y-m-d', strtotime($_POST['event_date']));
// echo $date;
$query = "INSERT INTO feedbackform_db (event_date,event_location,organisation_name,topic1,topic2,topic3,topic4,topic5,topic6,topic7,topic8,
question1,question2,question3,question4,question5,message1,message2,message3,message4,message5,cca11,cca12,cca13,cca21,cca22,cca23,cca31,cca32,cca33,cca41,cca42,cca43,cca51,cca52,cca53,cca61,cca62,cca63,cca71,cca72,cca73,cca81,cca82,cca83,login_id) 
VALUES ('$event_date','$event_location','$organisation_name','$topic1','$topic2','$topic3','$topic4','$topic5','$topic6','$topic7','$topic8','$question1','$question2','$question3','$question4','$question5','$message1','$message2','$message3','$message4','$message5','$cca11','$cca12','$cca13','$cca21','$cca22','$cca23','$cca31','$cca32','$cca33','$cca41','$cca42','$cca43','$cca51','$cca52','$cca53','$cca61','$cca62','$cca63','$cca71','$cca72','$cca73','$cca81','$cca82',
'$cca83','$login_id')";

// $query = "INSERT INTO feedbackform_db (event_date,event_location,organisation_name,topic1,topic2,topic3,
// question1,question2,question3,message1,message2,message3,cca11,cca12,cca13,cca21,cca22,cca23,cca31,cca32,cca33,login_id) 
// VALUES ('$event_date','$event_location','$organisation_name','$topic1','$topic2','$topic3','$question1','$question2','$question3','$message1','$message2','$message3','$cca11','$cca12','$cca13','$cca21',
// '$cca22','$cca23','$cca31','$cca32','$cca33','$login_id')";

// $query2="INSERT INTO topic_names(topic_name) VALUES('$topic1')";
// $query3="INSERT INTO topic_names(topic_name) VALUES('$topic2')";
// $query4="INSERT INTO topic_names(topic_name) VALUES('$topic3')";



//echo $response;

 if(mysqli_query($con,$query) )
    {
	 $data['success'] = 1;
     echo json_encode($data);
     }
    else{
		$data['success'] = 0;
    echo json_encode($data);
    }
  

}
mysqli_close($con);
?>

