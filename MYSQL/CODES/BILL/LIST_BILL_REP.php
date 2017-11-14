<?php
include ("../../INCLUDES/Connect.php"); 
$page = $_GET['page']; 
$limit = $_GET['rows']; 
$sidx = $_GET['sidx']; 
$sord = $_GET['sord']; 

if(!$sidx) $sidx =1; 

$result = $db1->query("SELECT COUNT(*) AS count FROM BILLs WHERE POSE='SALE'"); 
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

$result = $db1->query("SELECT * FROM BILLs WHERE POSE='SALE' ORDER BY $sidx $sord LIMIT $start , $limit"); 


$i=0;
while($row = $result->fetch_assoc()) {
	$responce->rows[$i]['id']=$row['BILLID'];
	$responce->rows[$i]['cell']=array($row['BILLID'],$row['BILL_NO'],$row['BDATE'],$row['CUST'],$row['DNAME'],$row['PART_NO'],$row['PARTI'],$row['MRP'],$row['SPRICE'],$row['QTY'],$row['UNIT'],$row['TOTAL'],$row['STOT'],$row['TVAL']);
	$i++;
}
echo json_encode($responce);
?>