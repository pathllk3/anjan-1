<?php
require_once '../../INCLUDES/CHK_SESS.php';
include ("../../INCLUDES/Connect.php");
$aData=$_GET['aData'];
$result = "DELETE FROM TABLE1 where  RID1='" .$aData. "'";
  if($db1->query($result) === TRUE)
  {
	header ("Location: ../../ST_LIST.php");
} else {
    echo mysqli_error($db1);
}
?>