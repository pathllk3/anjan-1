<?php
include ("../../INCLUDES/Connect.php");
$BNO = $_POST['BNO'];
$BDATE = $_POST['BDATE'];
$CUST = $_POST['CUST'];
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
$CN = $_POST['CN'];
$RDATE = $_POST['RDATE'];
$TRANS = $_POST['TRANS'];
$WKEY = $_POST['WKEY'];
$WBNO = $_POST['WBNO'];
$POSE = $_POST['POSE'];

$query = mysqli_query($db1,"INSERT INTO BILL1(BNO, BDATE, CUST, GTOT, NTOT, VNO, ROUND, ADDRESS, MODE, TVAL, PAYMENT, SECTOR, USER1, CBILL, BAPAY, BST, SSTA, DPCODE, LMODI, BID1, TOTAL, AEDT, BAMT, CN, RDATE, TRANS, WKEY, WBNO, POSE)
VALUES
('$BNO', '$BDATE', '$CUST', '$GTOT', '$NTOT', '$VNO', '$ROUND', '$ADDRESS', '$MODE', '$TVAL', '$PAYMENT', '$SECTOR', '$USER1', '$CBILL', '$BAPAY', '$BST', '$SSTA', '$DPCODE', '$LMODI', '$BID1', '$TOTAL', '$AEDT', '$BAMT', '$CN', '$RDATE', '$TRANS', '$WKEY', '$WBNO', '$POSE' )");

if ($query) {
	echo "Successfully Saved!";
} else {
    echo mysqli_error($db1);
}
?>