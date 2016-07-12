<?php
require_once('phpmailer/class.phpmailer.php');
include("connection.php");

	//$fp = fopen("login44.php", "w");
//echo fwrite($fp,"Soem text");
// $event_date1=$_GET["event_date1"];
// $event_date2=$_GET["event_date2"];
// $emailto=$_GET["emailto"];

 $event_date1= mysqli_real_escape_string($con,$_POST['event_date1']);
 $event_date2= mysqli_real_escape_string($con,$_POST['event_date2']);
 $emailto= mysqli_real_escape_string($con,$_POST['emailto']);
 $orgname= mysqli_real_escape_string($con,$_POST['orgname']);

$filename = 'report_datewise'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name

// mysqli_connect("localhost","root","") or die ("unable to connect"."<br><br>".mysqli_error($con));
// mysqli_select_db($con,"client_feedback_app_db") or die ("database not found"."<br><br>".mysqli_error($con));

$sql = mysqli_query($con,"SELECT topic_name2, avg(score2) from average_topic_score2 where event_date2 between '$event_date1' AND '$event_date2' AND orgname='$orgname' 
              group by topic_name2");

$num_rows = mysqli_num_rows($sql);
if($num_rows >= 1)
{
	$row = mysqli_fetch_assoc($sql);
	$fp = fopen($filename, "w");
	$seperator = "";
	$comma = "";
 
	foreach ($row as $name => $value)
		{
			$seperator .= $comma . '' .str_replace('', '""', $name);
			$comma = ",";
		}
 
	$seperator .= "\n";
	fputs($fp, $seperator);
 
	mysqli_data_seek($sql, 0);
	while($row = mysqli_fetch_assoc($sql))
		{
			$seperator = "";
			$comma = "";
 
			foreach ($row as $name => $value) 
				{
					$seperator .= $comma . '' .str_replace('', '""', $value);
					$comma = ",";
				}
 
			$seperator .= "\n";
			fputs($fp, $seperator);
		}
	fclose($fp);
	// echo "Your file is ready. You can download it from <a href='$filename'>here!</a>";

	$data['success'] = 1;
	 
    echo json_encode($data);
}
else
{
	// echo "There is no record in your Database";
	$data['success'] = 0;
    echo json_encode($data);
}
		  
	$mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = "clientcenterindia@gmail.com";
    $mail->Password = "passw0rd#";
	$mail->SMTPSecure = "ssl";  
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "465";

    $mail->setFrom('clientcenterindia@gmail.com', 'Client Centre');
    $mail->AddAddress($emailto, $emailto);
 
    $mail->Subject  =  'Date-Wise Data Report';
    $mail->IsHTML(true);
    $mail->Body    = "Please find your attachment.";
    $mail->AddAttachment($filename,$event_date2.'report_datewise.xls');
	//rename to $arch.'Asset Utilization.xls'
		
	if($mail->Send())
	{
		echo "Mail was Successfully Send";
	}
	else
	{
		echo "Mail Error - >".$mail->ErrorInfo;
	}

mysqli_close($con);
?>