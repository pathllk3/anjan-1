<?php
include ("../../INCLUDES/Connect.php");
$aData=$_GET['aData'];
$result = $db1->query("SELECT * FROM BILL1 where  CUST='" .$aData. "'");
  $array = mysqli_fetch_row($result);                            
  echo json_encode($array);
?>