<?php
include ("../../EXL/Classes/PHPExcel.php");
$EXL = new PHPExcel();
$EXL -> setActiveSheetIndex(0);
$EXL -> getActiveSheet() -> SetCellValue("A1","SL NO");
$EXL -> getActiveSheet() -> SetCellValue("B1","PART NO");
$EXL -> getActiveSheet() -> SetCellValue("C1","PART NAME");
$EXL -> getActiveSheet() -> SetCellValue("D1","MRP");
$EXL -> getActiveSheet() -> SetCellValue("E1","QTY");
$EXL -> getActiveSheet() -> SetCellValue("F1","U.O.M");
$EXL -> getActiveSheet() -> SetCellValue("G1","TOTAL");
$EXL -> getActiveSheet() -> SetCellValue("H1","RACK NO");
$EXL -> getActiveSheet() -> SetCellValue("I1","SELL PRICE");
$EXL -> getActiveSheet() -> SetCellValue("J1","E.O.R");

include ("connect1.php"); 
$SQL = "SELECT * FROM TABLE1"; 
$result = mysql_query($SQL) or die("Couldn't execute query.".mysql_error()); 
$i=2;
$j=1;
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
	$EXL -> getActiveSheet() -> SetCellValue("A$i" ,$j);
	$EXL -> getActiveSheet() -> SetCellValue("B$i" ,$row['PART_NO']);
	$EXL -> getActiveSheet() -> SetCellValue("C$i" ,$row['PARTI']);
	$EXL -> getActiveSheet() -> SetCellValue("D$i" ,$row['MRP']);
	$EXL -> getActiveSheet() -> SetCellValue("E$i" ,$row['QTY']);
	$EXL -> getActiveSheet() -> SetCellValue("F$i" ,$row['UNIT']);
	$EXL -> getActiveSheet() -> SetCellValue("G$i" ,$row['TOTAL']);
	$EXL -> getActiveSheet() -> SetCellValue("H$i" ,$row['RACKNO']);
	$EXL -> getActiveSheet() -> SetCellValue("I$i" ,$row['SPRICE']);
	$EXL -> getActiveSheet() -> SetCellValue("J$i" ,$row['EOR']);
	$i++;
	$j++;
}
$EXL -> getActiveSheet() -> getColumnDimension("A")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("B")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("C")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("D")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("E")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("F")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("G")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("H")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("I")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("J")->setAutoSize(true);
$OW = new PHPExcel_Writer_Excel2007($EXL);
$OW -> save("TEST.xlsx");
header ("Location: ST_LIST.php");
?>