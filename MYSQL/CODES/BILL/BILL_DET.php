<?php
include ("../../INCLUDES/Connect.php");
$aData=$_GET['id'];
$result = $db1->query("SELECT * FROM BILL1 where  BID='" .$aData. "'");
  $array = mysqli_fetch_row($result);                            
  echo json_encode($array);
?>