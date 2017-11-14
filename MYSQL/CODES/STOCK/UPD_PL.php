<?php
require_once '../../INCLUDES/CHK_SESS.php';
include ("../../INCLUDES/Connect.php");
	$RID = $_POST['RID'];
	$PRPART_NO = $_POST['PART_NO'];
	$PRCATE = $_POST['CATE'];
	$PRPARTI = $_POST['PARTI'];
	$PRMRP = $_POST['MRP'];
	$PRGROP = $_POST['GROP'];
	$PRunit = $_POST['UNIT'];
	$PRTRATE = $_POST['TRATE'];
	$query = mysqli_query($db1,"UPDATE SHEET1 SET
	PART_NO = '$PRPART_NO',
	PARTI = '$PRPARTI',
	MRP = '$PRMRP',
	GROP = '$PRGROP',
	CATE = '$PRCATE',
	TRATE = '$PRTRATE' WHERE RID='$RID'");
	if ($query) {
	echo "RECORD UPDATED";
}
else
{
	echo mysqli_error($db1);
}
?>