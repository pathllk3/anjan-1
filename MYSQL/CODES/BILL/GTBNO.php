<?php
require '../../INCLUDES/Connect.php';
$RESULT = mysqli_query($db1, "SELECT * FROM BILL1 WHERE BNO LIKE '%MB%' ORDER BY BID ASC");
$cn = mysqli_num_rows($RESULT);
echo $cn;
?>