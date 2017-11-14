<?php
include ("../../INCLUDES/Connect.php");
$BILL_NO = $_POST['BILL_NO'];
$PART_NO = $_POST['PART_NO'];
$PARTI = $_POST['PARTI'];
$MRP = $_POST['MRP'];
$QTY = $_POST['QTY'];
$SPRICE = $_POST['SPRICE'];
$TOTAL = $_POST['TOTAL'];
$TAX = $_POST['TAX'];
$TVAL = $_POST['TVAL'];
$UNIT = $_POST['UNIT'];
$BDATE = $_POST['BDATE'];
$SSTA = $_POST['SSTA'];
$CMP = $_POST['CMP'];
$MODE = $_POST['MODE'];
$BID = $_POST['BID'];
$LMODI = $_POST['LMODI'];
$DPCODE = $_POST['DPCODE'];
$DNAME = $_POST['DNAME'];
$CUST = $_POST['CUST'];
$STOT = $_POST['STOT'];
$USER1 = $_POST['USER1'];
$AEDT = $_POST['AEDT'];
$SID = $_POST['SID'];
$ENS = $_POST['ENS'];
$JOB = $_POST['JOB'];
$TECH = $_POST['TECH'];
$id = $_POST['BILLID'];
$query = mysqli_query($db1,"UPDATE BILLs SET
BILL_NO = '$BILL_NO',
PART_NO = '$PART_NO',
PARTI = '$PARTI',
MRP = '$MRP',
QTY = '$QTY',
SPRICE = '$SPRICE',
TOTAL = '$TOTAL',
TAX = '$TAX',
TVAL = '$TVAL',
UNIT = '$UNIT',
BDATE = '$BDATE',
SSTA = '$SSTA',
CMP = '$CMP',
MODE = '$MODE',
BID = '$BID',
LMODI = '$LMODI',
DPCODE = '$DPCODE',
DNAME = '$DNAME',
CUST = '$CUST',
STOT = '$STOT',
USER1 = '$USER1',
AEDT = '$AEDT',
SID = '$SID',
ENS = '$ENS',
JOB = '$JOB',
TECH = '$TECH' WHERE BILLID='" .$id. "'");
if ($query) {
	echo "Successfully Saved!";
} else {
    echo mysqli_error($db1);
}
?>