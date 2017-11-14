<?php
require '../../INCLUDES/Connect.php';
$NTOT = mysqli_query($db1,"SELECT BILLID FROM BILLS ORDER BY BILLID DESC LIMIT 1");
$row = mysqli_fetch_row($NTOT);
$NT = $row[0];
echo $NT;
?>