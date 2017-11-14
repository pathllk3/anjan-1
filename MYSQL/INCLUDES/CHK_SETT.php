<?php
require 'Connect.php';
$RESULT = mysqli_query($db1, "SELECT * FROM SETT");
$cn = mysqli_num_rows($RESULT);
if($cn == 0)
{
header ("Location: SETT.php");
}
else
{
	 while($row = $RESULT->fetch_assoc()) {
		 $st = session_status();
		 if($st!=2)
		 {
			session_start(); 
		 }
		 $_SESSION['ONAME'] = $row['ONAME'];
		 $_SESSION['ADDR'] = $row['ADDR'];
		 $_SESSION['PH'] = $row['PH'];
		 $_SESSION['MAIL'] = $row['MAIL'];
		 $_SESSION['VNO'] = $row['VNO'];
		 $_SESSION['CST'] = $row['CST'];
		 $_SESSION['PAN'] = $row['PAN'];
		 $_SESSION['STAX'] = $row['STAX'];
	 }
}

?>