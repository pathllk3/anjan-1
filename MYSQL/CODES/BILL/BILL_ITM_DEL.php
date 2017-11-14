<?php
include ("../../INCLUDES/Connect.php");
$aData=$_POST['id'];
$result = "DELETE FROM BILLs where  BILLID='" .$aData. "'";
  if($db1->query($result) === TRUE)
  {
	echo "Successfully Saved!";
} else {
    echo mysqli_error($db1);
}
?>