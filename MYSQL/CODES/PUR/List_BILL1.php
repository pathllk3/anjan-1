<?php
require_once '../../INCLUDES/CHK_SESS.php';
include ("../../INCLUDES/Connect.php"); 
$page = $_GET['page']; 
$limit = $_GET['rows']; 
$sidx = $_GET['sidx']; 
$sord = $_GET['sord']; 

if(!$sidx) $sidx =1; 

$result = $db1->query("SELECT COUNT(*) AS count FROM BILL1 WHERE POSE='PURCHASE'"); 
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

$result = $db1->query("SELECT * FROM BILL1 WHERE POSE='PURCHASE' ORDER BY $sidx $sord LIMIT $start , $limit"); 


$i=0;
while($row = $result->fetch_assoc()) {
	$responce->rows[$i]['id']=$row['BID'];
	$responce->rows[$i]['cell']=array($row['BID'],$row['BNO'],$row['BDATE'],$row['CUST'],$row['SNAME'],$row['GTOT'],$row['TVAL'],$row['ROUND'],$row['BAMT']);
	$i++;
}
echo json_encode($responce);
?>