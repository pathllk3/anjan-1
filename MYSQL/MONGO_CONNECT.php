<?php
   $m = new MongoClient();
   $db = $m->selectDB('ANJAN');
   $USER= $db->SHEET1;
$CUR = $USER->find();
foreach ($CUR as $DO)
{
	echo '"_id": '.$DO["_id"]."<BR />";
	echo '"PART NAME": '.$DO["PARTI"]."<BR />";
	echo '"MRP": '.$DO["MRP"]."<BR />";
	echo '*****************************************';
}  
?>
