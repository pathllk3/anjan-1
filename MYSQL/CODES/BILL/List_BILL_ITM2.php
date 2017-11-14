<?php
require_once '../../INCLUDES/CHK_SESS.php';
include ("../../INCLUDES/Connect.php"); 
$cust = $_GET['cust'];
$page = $_GET['page']; 
$limit = $_GET['rows']; 
$sidx = $_GET['sidx']; 
$sord = $_GET['sord']; 
$PTNO = $_GET['PTNO'];

if(!$sidx) $sidx =1; 

$result = $db1->query("SELECT COUNT(*) AS count FROM BILLS WHERE CUST='" .$cust. "' and PART_NO='" .$PTNO. "'"); 
$row =$result->fetch_assoc();
$count = $row['count']; 
if( $count > 0 && $limit > 0) { 
    $total_pages = ceil($count/$limit); 
} else { 
    $total_pages = 0; 
} 
if ($page > $total_pages) $page=$total_pages;
$start = $limit*$page - $limit;
if($start <0) $start = 0; 

$result = $db1->query("SELECT * FROM BILLS WHERE CUST='" .$cust. "' and PART_NO='" .$PTNO. "' ORDER BY $sidx $sord LIMIT $start , $limit"); 


$i=0;
while($row = $result->fetch_assoc()) {
	$responce->rows[$i]['id']=$row['BILLID'];
	$responce->rows[$i]['cell']=array($row['BILLID'],$row['BILL_NO'],$row['BDATE'],$row['DNAME'],$row['QTY'],$row['MRP'],$row['SPRICE'],$row['UNIT'],$row['TAX'],$row['STOT']);
	$i++;
}
echo json_encode($responce);
?>