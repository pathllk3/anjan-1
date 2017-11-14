<?php
require '../../INCLUDES/Connect.php';
$aData = $_GET['aData'];
$NTOT = mysqli_query($db1,"SELECT ROUND(SUM(NTOT), 2) FROM BILL1 WHERE CUST='" .$aData. "'");
$row = mysqli_fetch_row($NTOT);
$NT = $row[0];
$PAY = mysqli_query($db1,"SELECT ROUND(SUM(PAYMENT), 2) FROM BILL1 WHERE CUST='" .$aData. "'");
$row1 = mysqli_fetch_row($PAY);
$PT = $row1[0];
echo $NT - $PT;
?>