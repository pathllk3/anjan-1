<?php
include("connect1.php");
$uid = $_POST['uid'];
$pass = $_POST['pass'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$SQL = "INSERT INTO USER (UID, PASS, LNAME, FNAME) VALUES ('$uid','$pass','$lname','$fname')";
$RESULT = mysql_query($SQL);
if ($RESULT) {
	echo "Record Inserted Successfully";
}
else {
	echo mysql_error();
}
?>