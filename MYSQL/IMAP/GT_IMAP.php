<?php	
	$m = new MongoClient();
   $db = $m->selectDB('appharbor_9spxvctt');  
$SHEET1= $db->IMAP_INBOX;
$myArray = array();
$tempArray = array();
$CUR = $SHEET1->find();
$i=0;
foreach($CUR as $k => $row1){
	$tempArray = $row1;
    array_push($myArray, $tempArray);
	$i++;
}
echo json_encode($myArray);
?>