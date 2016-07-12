<?PHP
include_once("connection.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")	
{
$answer1= mysqli_real_escape_string($con,$_POST['answer1']);
$answer2= mysqli_real_escape_string($con,$_POST['answer2']);
//$tid= mysqli_real_escape_string($con,$_POST['transactionID']);




// $query = "UPDATE transaction3_db 
// SET answer1 = '$answer1', answer2 = '$answer2'
// WHERE transaction_id3 = '$tid'";

// $query = "UPDATE transaction3_db 
// SET answer1 = '$answer1'
// WHERE transaction_id3 = '$tid'";

// $query = "UPDATE transaction3_db 
// SET answer1 = '$answer1'
// WHERE transaction_id3 = (Select MAX(transaction_id3) FROM transaction3_db)";

$query ="UPDATE transaction3_db 
SET answer1 = '$answer1',answer2 = '$answer2'
ORDER BY transaction_id3 DESC
LIMIT 1";


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

