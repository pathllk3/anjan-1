<?php
include ("../../INCLUDES/Connect.php");
$aData = $_POST['aData'];
$TOT = $_POST['TOT'];
$query = mysqli_query($db1,"UPDATE BILL1 SET
TOTAL = '$TOT' WHERE CUST='" .$aData. "' ORDER BY BID DESC LIMIT 1");
if ($query) {
	echo "Successfully Saved!";
} else {
    echo mysqli_error($db1);
}
?>