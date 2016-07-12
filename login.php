 <?PHP
if(isset($_POST['email_id']) && isset($_POST['password'])){
	include_once("connection.php");
	$email_id = $_POST['email_id'];
	$password = $_POST['password'];
	//$query = "select email_id,password from login_db where email_id = '".$emailid."' AND password = '".$pwd. "'";
	
	//$query = "select email_id,password from login_db where email_id = {$_POST['emailid']}AND password ={$_POST['pwd']}";

	
	$query = "select email_id,password from login_db where email_id = '$email_id' AND password = '$password' ";
	
	$response = mysqli_query($con,$query);
	
	$rows = mysqli_num_rows($query);
	if($rows == 0) { 
	 echo "<h1>No Such User Found</h1>"; 
	 }
	 else  {
	 echo "<h1>User Found"; }
}
?>


<html>
	<head>
	<title>login form testing</title>
	</head>
	<body><br><br>
	   <form action="<?PHP $_PHP_SELF ?>" method="get">
	   <input type="text" name="email_id" placeholder="EMAIL ID"/>
	   <input type="text" name="password" placeholder="PASSWORD"/>
		<input type="submit" value="Submit">
	  </form>
	</body>
	</html>
