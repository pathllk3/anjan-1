<?php
include ("../../INCLUDES/Connect.php");
$aData=$_GET['aData'];
$aData1=$_GET['aData1'];
$result = $db1->query("SELECT * FROM BILL1 where  CUST='" .$aData. "' AND SNAME='" .$aData1. "'");
  $array = mysqli_fetch_row($result);                            
  echo json_encode($array);
?>