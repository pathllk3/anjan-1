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
$POSE = $_POST['POSE'];

$query = mysqli_query($db1,"INSERT INTO BILL1(BNO, BDATE, CUST, SNAME, GTOT, NTOT, VNO, ROUND, ADDRESS, MODE, TVAL, PAYMENT, SECTOR, USER1, CBILL, BAPAY, BST, SSTA, DPCODE, LMODI, BID1, TOTAL, AEDT, BAMT, SID, ENS, JOB, TECH, PNO, PDATE, QNO, QDATE, POSE)
VALUES
('$BNO', '$BDATE', '$CUST', '$SNAME', '$GTOT', '$NTOT', '$VNO', '$ROUND', '$ADDRESS', '$MODE', '$TVAL', '$PAYMENT', '$SECTOR', '$USER1', '$CBILL', '$BAPAY', '$BST', '$SSTA', '$DPCODE', '$LMODI', '$BID1', '$TOTAL', '$AEDT', '$BAMT', '$SID', '$ENS', '$JOB', '$TECH', '$PNO', '$PDATE', '$QNO', '$QDATE', '$POSE')");

if ($query) {
	echo "Successfully Saved!";
} else {
    echo mysqli_error($db1);
}
?>