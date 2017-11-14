<?php
include ("Connect.php");
$ONAME = $_POST['ONAME'];
$ADDR = $_POST['ADDR'];
$PH = $_POST['PH'];
$MAIL = $_POST['MAIL'];
$VNO = $_POST['VNO'];
$CST = $_POST['CST'];
$PAN = $_POST['PAN'];
$STAX = $_POST['STAX'];

$query = mysqli_query($db1,"INSERT INTO SETT(ONAME, ADDR, PH, MAIL, VNO, CST, PAN, STAX) VALUES ('$ONAME', '$ADDR', '$PH', '$MAIL', '$VNO', '$CST', '$PAN', '$STAX')");
if ($query) {
	echo "Successfully Saved!";
} else {
    echo mysqli_error($db1);
}
?>