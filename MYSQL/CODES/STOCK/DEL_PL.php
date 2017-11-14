<?php
require_once '../../INCLUDES/CHK_SESS.php';
include ("../../INCLUDES/Connect.php");
	$RID = $_POST['id'];
	$query = mysqli_query($db1,"DELETE FROM SHEET1 WHERE RID='$RID'");
	if ($query) {
	echo "RECORD DELETED";
}
else
{
	echo mysqli_error($db1);
}
?>