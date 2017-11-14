<?php
require_once '../../INCLUDES/CHK_SESS.php';
include ("../../INCLUDES/Connect.php");
$aData=$_GET['aData'];
$result = $db1->query("SELECT * FROM sheet1 where  PARTI LIKE '%".$aData."%'");
  $array = mysqli_fetch_row($result);                            
  echo json_encode($array);
?>