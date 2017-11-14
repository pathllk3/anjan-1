<?php
require_once '../../INCLUDES/CHK_SESS.php';
include ("../../INCLUDES/Connect.php");
	$PRPART_NO = $_POST['PART_NO'];
	$PRCATE = $_POST['CATE'];
	$PRPARTI = $_POST['PARTI'];
	$PRMRP = $_POST['MRP'];
	$PRGROP = $_POST['GROP'];
	$PRunit = $_POST['UNIT'];
	$PRTRATE = $_POST['TRATE'];
	$query = mysqli_query($db1,"insert into SHEET1(PART_NO, PARTI, MRP, GROP, CATE, TRATE, UNIT) values ('$PRPART_NO', '$PRPARTI', '$PRMRP', '$PRGROP', '$PRCATE', '$PRTRATE', '$PRunit')");
	if ($query) {
	echo "RECORD ADDED";
}
else
{
	echo mysqli_error($db1);
}
?>