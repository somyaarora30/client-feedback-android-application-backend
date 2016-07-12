<?PHP
$db_name="client_feedback_app_db";
$mysql_username="root";
$mysql_password="";
$server_name="localhost";
$conn=mysqli_connect($server_name,$mysql_username,$mysql_password,$db_name);
if($conn)
	echo "connected";
else 
	echo "not";
?>