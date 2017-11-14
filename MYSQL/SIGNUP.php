<?php
include("INCLUDES/Connect.php");
$uid = $_POST['uid'];
$pass = $_POST['pass'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$SQL = "INSERT INTO USER1 (UID, PASS, LNAME, FNAME) VALUES ('$uid','$pass','$lname','$fname')";
$RESULT = mysqli_query($db1,$SQL);
if ($RESULT) {
	echo "Record Inserted Successfully";
}
else {
	echo mysqli_error($RESULT);
}
?>