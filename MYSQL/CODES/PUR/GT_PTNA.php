<?php
include ("../../INCLUDES/Connect.php");
$aData=$_GET['aData'];
$result = $db1->query("SELECT * FROM TABLE1 where PARTI='".$aData."'");
  $array = mysqli_fetch_row($result);                            
  echo json_encode($array);
?>