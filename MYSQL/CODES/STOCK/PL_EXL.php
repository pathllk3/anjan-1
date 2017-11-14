<?php
require_once '../../INCLUDES/CHK_SESS.php';
include ("../../EXL/Classes/PHPExcel.php");
$EXL = new PHPExcel();
$EXL -> setActiveSheetIndex(0);
$EXL -> getActiveSheet() -> SetCellValue("A1","SL NO");
$EXL -> getActiveSheet() -> SetCellValue("B1","PART NO");
$EXL -> getActiveSheet() -> SetCellValue("C1","PART NAME");
$EXL -> getActiveSheet() -> SetCellValue("D1","MRP");
$EXL -> getActiveSheet() -> SetCellValue("E1","U.O.M");
$EXL -> getActiveSheet() -> SetCellValue("F1","TYPE");
$EXL -> getActiveSheet() -> SetCellValue("G1","GROUP");

include ("../../INCLUDES/Connect.php"); 
$result = $db1->query("SELECT * FROM SHEET1"); 
$i=2;
$j=1;
while($row = $result->fetch_assoc()) {
	$EXL -> getActiveSheet() -> SetCellValue("A$i" ,$j);
	$EXL -> getActiveSheet() -> SetCellValue("B$i" ,$row['PART_NO']);
	$EXL -> getActiveSheet() -> SetCellValue("C$i" ,$row['PARTI']);
	$EXL -> getActiveSheet() -> SetCellValue("D$i" ,$row['MRP']);
	$EXL -> getActiveSheet() -> SetCellValue("E$i" ,$row['UNIT']);
	$EXL -> getActiveSheet() -> SetCellValue("F$i" ,$row['CATE']);
	$EXL -> getActiveSheet() -> SetCellValue("G$i" ,$row['GROP']);
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
$LR=$EXL->getActiveSheet()->getHighestDataRow();
$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);
$LR=$EXL->getActiveSheet()->getHighestDataRow();
$EXL->getActiveSheet()->getStyle('A1:G'. (string)($LR))->applyFromArray($styleArray);
unset($styleArray);
$style = array('font' => array('size' => 10,'bold' => true,'color' => array('rgb' => 'ff0000')));
$EXL->getActiveSheet()->getStyle('A1:G1')->applyFromArray($style);
unset($style);
$EXL->getActiveSheet()
    ->getPageSetup()
    ->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
$EXL->getActiveSheet()
    ->getPageSetup()
    ->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$EXL->getActiveSheet()
    ->getPageMargins()->setTop(0.50);
$EXL->getActiveSheet()
    ->getPageMargins()->setRight(0.75);
$EXL->getActiveSheet()
    ->getPageMargins()->setLeft(0.75);
$EXL->getActiveSheet()
    ->getPageMargins()->setBottom(0.50);
$EXL->getActiveSheet()->setTitle("PRICE LIST");
$OW = new PHPExcel_Writer_Excel2007($EXL);
session_start();
$_SESSION["FLNM"] = "../../DNLD/PL/PRICE_LIST.xlsx";
$OW -> save($_SESSION["FLNM"]);
header ("Location: PL_ARR.php");
?>