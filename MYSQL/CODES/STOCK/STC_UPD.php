<?php
require_once '../../INCLUDES/CHK_SESS.php';
include ("../../INCLUDES/Connect.php");
$id = $_POST['RID1'];
$RID = $_POST['RID'];
$PART_NO = $_POST['PART_NO'];
$PARTI = $_POST['PARTI'];
$TYPE = $_POST['TYPE'];
$MRP = $_POST['MRP'];
$QTY = $_POST['QTY'];
$TOTAL = $_POST['TOTAL'];
$STOTAL = $_POST['STOTAL'];
$UNIT = $_POST['UNIT'];
$EOR = $_POST['EOR'];
$grop = $_POST['GROP'];
$SPRICE = $_POST['SPRICE'];
$PPRICE = $_POST['PPRICE'];
$USER1 = $_POST['USER1'];
$AEDT = $_POST['AEDT'];
$DPCODE = $_POST['DPCODE'];
$TAX = $_POST['TAX'];
$TVAL = $_POST['TVAL'];
$SSTA = $_POST['SSTA'];
$lmodi = $_POST['lmodi'];
$RACKNO = $_POST['RACKNO'];
$sql = $db1->query("UPDATE TABLE1 SET 
 PART_NO='$PART_NO',
 PARTI='$PARTI', 
 RID='$RID', 
 TYPE='$TYPE', 
 MRP='$MRP', 
 QTY='$QTY', 
 TOTAL='$TOTAL', 
 STOTAL='$STOTAL', 
 UNIT='$UNIT', 
 EOR='$EOR', 
 RACKNO='$RACKNO',  
 GROP='$grop',
 SPRICE='$SPRICE',
 PPRICE='$PPRICE',
 USER1='$USER1',
 AEDT='$AEDT',
 DPCODE='$DPCODE',
 TAX='$TAX',
 TVAL='$TVAL',
 SSTA='$SSTA',
 lmodi='$lmodi' WHERE RID1='$id'");
echo "Successfully Saved!";
?>