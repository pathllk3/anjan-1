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
$POSE = $_POST['POSE'];

$query = mysqli_query($db1,"INSERT INTO BILLs(BILL_NO, PART_NO, PARTI, MRP, QTY, SPRICE, TOTAL, TAX, TVAL, UNIT, BDATE, SSTA, CMP, MODE, BID, LMODI, DPCODE, DNAME, CUST, STOT, USER1, AEDT, SID, ENS, JOB, TECH, POSE) VALUES ('$BILL_NO', '$PART_NO', '$PARTI', '$MRP', '$QTY', '$SPRICE', '$TOTAL', '$TAX', '$TVAL', '$UNIT', '$BDATE', '$SSTA', '$CMP', '$MODE', '$BID', '$LMODI', '$DPCODE', '$DNAME', '$CUST', '$STOT', '$USER1', '$AEDT', '$SID', '$ENS', '$JOB', '$TECH', '$POSE')");
if ($query) {
	echo "Successfully Saved!";
} else {
    echo mysqli_error($db1);
}
?>