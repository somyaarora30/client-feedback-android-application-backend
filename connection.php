<?PHP

$server_name = "localhost";
$user_name = "root";
$password = "";


$con = mysqli_connect($server_name, $user_name, $password);

$database_name='client_feedback_app_db';
mysqli_select_db($con,$database_name); 

mysqli_query($con,"SET NAMES 'utf8'");

?>