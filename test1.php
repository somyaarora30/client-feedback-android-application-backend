<?PHP
if(isset($_POST['event_date']) && isset($_POST['event_location']) && isset ($_POST['organisation_name']))
{
include_once("connection.php");
$event_date=$_POST['event_date'];
$event_location=$_POST['event_location'];
$organisation_name=$_POST['organisation_name'];

$date = date('Y-m-d', strtotime($_POST['evntdt']));
echo $date;
$query = "insert into feedbackform_db (`event_date`,`event_location`,`organisation_name`) values ('$date','{$_POST['event_location']}','{$_POST['organisation_name']}')";

 if(mysqli_query($con,$sql)){
     echo 'Data inserted';
     }
    else{
    echo 'Data not inserted';
    }
}

//mysqli_close($con);
?>



<html>
<head>
<title>form testing</title>
</head>
<body>
   <form action="<?PHP $_PHP_SELF ?>" method="post">
        event date<input type="text" name="evntdt" placeholder="Event date"/>
		org name<input type="text" name="orgnm" placeholder="org name"/>
		event location<input type="text" name="evntloc" placeholder="event location"/>
		
		<input type="submit" value="insert"/>
   
   </form>

</body>
</html>

