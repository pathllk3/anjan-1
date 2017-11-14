<?php
require_once '../../INCLUDES/CHK_SESS.php';
include ("../../INCLUDES/Connect.php"); 
$page = $_GET['page']; 
$limit = $_GET['rows']; 
$sidx = $_GET['sidx']; 
$sord = $_GET['sord']; 

if(!$sidx) $sidx =1; 

$result = $db1->query("SELECT COUNT(*) AS count FROM SHEET1"); 
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

$result = $db1->query("SELECT * FROM SHEET1 ORDER BY $sidx $sord LIMIT $start , $limit"); 


$i=0;
while($row = $result->fetch_assoc()) {
	$responce->rows[$i]['id']=$row['RID'];
	$responce->rows[$i]['cell']=array($row['RID'],$row['RID1'],$row['PART_NO'],$row['PARTI'],$row['MRP'],$row['GROP'],$row['CATE'],$row['UNIT'],$row['TRATE']);
	$i++;
}
echo json_encode($responce);
?>