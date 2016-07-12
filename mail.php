<?php
require_once('phpmailer/class.phpmailer.php');
$from=$_GET["from"];
$to=$_GET["to"];
$arch=$_GET["arch"];
$country=$_GET["country"];
$emailto=$_GET["emailto"];
$filename = 'exported_arch'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name

mysql_connect("localhost","root","") or die ("unable to connect"."<br><br>".mysql_error());
mysql_select_db("assetutilization") or die ("database not found"."<br><br>".mysql_error());

$sql=mysql_query("SELECT ClientName,EventDate,OppId,OppValue,EventType,ArchitectName,Soln1,Soln2,Soln3,Soln4,Soln5,Soln6,CustomSol1,CustomSol2,CustomSol3,StoryBoardLeverage FROM asset_utilization_t where CountryId='$country' and EventDate<'$to' and EventDate>'$from' and ArchitectName='$arch'")or die("Query Problem<br><br>".mysql_error());

$num_rows = mysql_num_rows($sql);
if($num_rows >= 1)
{
	$row = mysql_fetch_assoc($sql);
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
 
	mysql_data_seek($sql, 0);
	while($row = mysql_fetch_assoc($sql))
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
	echo "Your file is ready. You can download it from <a href='$filename'>here!</a>";
}
else
{
	echo "There is no record in your Database";
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
 
    $mail->Subject  =  'Architect-Wise Data Report';
    $mail->IsHTML(true);
    $mail->Body    = "Please find your attachment.";
    $mail->AddAttachment($filename, $arch.'Asset Utilization.xls');
	//rename to $arch.'Asset Utilization.xls'
		
	if($mail->Send())
	{
		echo "Mail was Successfully Send";
	}
	else
	{
		echo "Mail Error - >".$mail->ErrorInfo;
	}

mysql_close();
?>