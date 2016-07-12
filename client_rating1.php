<?PHP
include_once("connection.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")	
{
$score1= mysqli_real_escape_string($con,$_POST['score1']);
$score2= mysqli_real_escape_string($con,$_POST['score2']);
//$tid= mysqli_real_escape_string($con,$_POST['transactionID']);




$query = "UPDATE transaction3_db 
SET score1 = '$score1', score2 = '$score2'";
//WHERE transaction_id3 = '$tid'";


  if(mysqli_query($con,$query))
  {
	 $data2['success2'] = 1;
     echo json_encode($data2);
  }
    else
    {
		$data2['success2'] = 0;
    echo json_encode($data2);
    }
}
mysqli_close($con);

?>

