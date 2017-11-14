<?php
require_once '../../INCLUDES/CHK_SESS.php';
include ("../../INCLUDES/Connect.php"); 
$id = $_GET['id'];
$page = $_GET['page']; 
$limit = $_GET['rows']; 
$sidx = $_GET['sidx']; 
$sord = $_GET['sord']; 

if(!$sidx) $sidx =1; 

$NTOT = mysqli_query($db1,"SELECT * FROM BILL1 WHERE BID='" .$id. "'");
$row = mysqli_fetch_row($NTOT);
$NT = $row[2];

$result = $db1->query("SELECT COUNT(*) AS count FROM BILLS WHERE BILL_NO='" .$NT. "'"); 
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

$result = $db1->query("SELECT * FROM BILLS WHERE BILL_NO='" .$NT. "' ORDER BY $sidx $sord LIMIT $start , $limit"); 


$i=0;
while($row = $result->fetch_assoc()) {
	$responce->rows[$i]['id']=$row['BILLID'];
	$responce->rows[$i]['cell']=array($row['BILLID'],$row['PART_NO'],$row['PARTI'],$row['QTY'],$row['MRP'],$row['SPRICE'],$row['UNIT'],$row['TAX'],$row['STOT']);
	$i++;
}
echo json_encode($responce);
?>