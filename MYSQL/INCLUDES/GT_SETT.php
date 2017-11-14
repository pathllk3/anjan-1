<?php
include ("Connect.php");
$result = $db1->query("SELECT * FROM SETT");
  $array = mysqli_fetch_row($result);                            
  echo json_encode($array);
?>