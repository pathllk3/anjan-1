<?php
require_once '../../INCLUDES/CHK_SESS.php';
require '../../INCLUDES/Connect.php';
$aData=$_GET['aData'];
$RESULT = mysqli_query($db1, "SELECT * FROM TABLE1 WHERE PART_NO='".$aData."'");
$cn = mysqli_num_rows($RESULT);
echo $cn;
?>