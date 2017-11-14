<?php
include ("../../INCLUDES/Connect.php");
$BNO = $_POST['BNO'];
$BDATE = $_POST['BDATE'];
$CUST = $_POST['CUST'];
$SNAME = $_POST['SNAME'];
$GTOT = $_POST['GTOT'];
$NTOT = $_POST['NTOT'];
$VNO = $_POST['VNO'];
$ROUND = $_POST['ROUND'];
$ADDRESS = $_POST['ADDRESS'];
$MODE = $_POST['MODE'];
$TVAL = $_POST['TVAL'];
$PAYMENT = $_POST['PAYMENT'];
$SECTOR = $_POST['SECTOR'];
$USER1 = $_POST['USER1']; 
$CBILL = $_POST['CBILL'];
$BAPAY = $_POST['BAPAY'];
$SSTA = $_POST['SSTA'];
$DPCODE = $_POST['DPCODE'];
$LMODI = $_POST['LMODI'];
$BID1 = $_POST['BID1'];
$TOTAL = $_POST['TOTAL'];
$AEDT = $_POST['AEDT'];
$BAMT = $_POST['BAMT'];
$BST = $_POST['BST'];
$SID = $_POST['SID'];
$ENS = $_POST['ENS'];
$JOB = $_POST['JOB'];
$TECH = $_POST['TECH'];
$PNO = $_POST['PNO'];
$PDATE = $_POST['PDATE'];
$QNO = $_POST['QNO'];
$QDATE = $_POST['QDATE'];
$id =$_POST['BID'];
$query = mysqli_query($db1,"UPDATE BILL1 SET
BNO = '$BNO',
BDATE = '$BDATE',
CUST = '$CUST',
SNAME = '$SNAME',
GTOT = '$GTOT',
NTOT = '$NTOT',
VNO = '$VNO',
ROUND = '$ROUND',
ADDRESS = '$ADDRESS',
MODE = '$MODE',
TVAL = '$TVAL',
PAYMENT = '$PAYMENT',
SECTOR = '$SECTOR',
USER1 = '$USER1',
CBILL = '$CBILL',
BAPAY = '$BAPAY',
BST = '$BST',
SSTA = '$SSTA',
DPCODE = '$DPCODE',
LMODI = '$LMODI',
BID1 = '$BID1',
TOTAL = '$TOTAL',
AEDT = '$AEDT',
BAMT = '$BAMT',
SID = '$SID',
ENS = '$ENS',
JOB = '$JOB',
TECH = '$TECH',
PNO = '$PNO',
PDATE = '$PDATE',
QNO = '$QNO',
QDATE = '$QDATE' WHERE BID='" .$id. "'");

if ($query) {
	echo "Successfully Saved!";
} else {
    echo mysqli_error($db1);
}
?>