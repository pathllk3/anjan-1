<?php
include("Connect.php");
$SQL = "INSERT INTO USER (UID, PASS, LNAME, FNAME) VALUES ('pathllk','paul125','PAUL','ANJAN')";
$RESULT = mysql_query($SQL);
if ($RESULT) {
	echo "Record Inserted Successfully";
}
else {
	echo mysql_error();
}
?>