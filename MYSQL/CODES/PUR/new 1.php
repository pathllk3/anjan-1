<?php
include ("../../INCLUDES/Connect.php");
$aData=$_GET['id'];
$result = $db1->query("SELECT * FROM BILLs where  BILLID='" .$aData. "'");
  $array = mysqli_fetch_row($result);                            
  echo json_encode($array);
?>