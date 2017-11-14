<?php
include ("../../INCLUDES/Connect.php");
$aData=$_GET['aData'];
$result = $db1->query("SELECT * FROM TABLE1 where  PART_NO='" .$aData. "'");
  $array = mysqli_fetch_row($result);                            
  echo json_encode($array);
?>