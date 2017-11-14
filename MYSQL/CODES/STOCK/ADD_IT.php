<?php
require_once '../../INCLUDES/CHK_SESS.php';
	include ("../../INCLUDES/Connect.php");
	$PRPART_NO = $_POST['PRPART_NO'];
	$PRCATE = $_POST['PRCATE'];
	$PRPARTI = $_POST['PRPARTI'];
	$PRMRP = $_POST['PRMRP'];
	$PRGROP = $_POST['PRGROP'];
	$PRunit = $_POST['PRunit'];
	$PRTRATE = $_POST['PRTRATE'];
	$PRDPCODE = $_POST['PRDPCODE'];
	$PRlmodi = $_POST['PRlmodi'];
	$PRrid1 = $_POST['PRrid1'];
	$PRAEDT = $_POST['PRAEDT'];
	$PRCMP = $_POST['PRCMP'];
	$query =$db1->query("insert into sheet1(PART_NO, PARTI, MRP, GROP, CATE, DPCODE, lmodi, TRATE, RID1, UNIT, AEDT, CMP) values ('$PRPART_NO', '$PRPARTI', '$PRMRP', '$PRGROP', '$PRCATE', '$PRDPCODE', '$PRlmodi', '$PRTRATE', '$PRrid1', '$PRunit', '$PRAEDT', '$PRCMP')");
	if ($query) {
	echo "RECORD ADDED";
}
else {
	echo mysqli_error($db1);
}
?>