<?php
require_once '../../INCLUDES/CHK_SESS.php';
include ("../../EXL/Classes/PHPExcel.php");
$frm = $_GET['frm'];
$too = $_GET['too'];
$EXL = new PHPExcel();
$EXL -> setActiveSheetIndex(0);
$EXL->getActiveSheet()->getColumnDimension('A')->setWidth("17");
$EXL -> getActiveSheet() -> SetCellValue("A1","BILL NO");
$EXL -> getActiveSheet() -> SetCellValue("B1","BILL DATE");
$EXL -> getActiveSheet() -> SetCellValue("C1","MONTH");
$EXL -> getActiveSheet() -> SetCellValue("D1","CUSTOMER");
$EXL -> getActiveSheet() -> SetCellValue("E1","SITE NAME");
$EXL -> getActiveSheet() -> SetCellValue("F1","SITE ID");
$EXL -> getActiveSheet() -> SetCellValue("G1","ENGINE NO");
$EXL -> getActiveSheet() -> SetCellValue("H1","TECHNICIAN");
$EXL -> getActiveSheet() -> SetCellValue("I1","PART NO");
$EXL -> getActiveSheet() -> SetCellValue("J1","PART NAME");
$EXL -> getActiveSheet() -> SetCellValue("K1","QTY");
$EXL -> getActiveSheet() -> SetCellValue("L1","UNIT");
$EXL -> getActiveSheet() -> SetCellValue("M1","MRP");
$EXL -> getActiveSheet() -> SetCellValue("N1","SELL PRICE");
$EXL -> getActiveSheet() -> SetCellValue("O1","TAX RATE");
$EXL -> getActiveSheet() -> SetCellValue("P1","MRP TOTAL");
$EXL -> getActiveSheet() -> SetCellValue("Q1","SELL PRICE TOTAL");
$EXL -> getActiveSheet() -> SetCellValue("R1","TAX VALUE");
$EXL -> getActiveSheet() -> SetCellValue("S1","JOB");

include ("../../INCLUDES/Connect.php"); 
$result = $db1->query("SELECT * FROM BILLS WHERE BDATE BETWEEN '$frm' AND '$too'  ORDER BY BDATE, BILLID"); 
$i=2;
$j=1;
$MON = 0;
while($row = $result->fetch_assoc()) {
	$DT = date_create($row['BDATE']);
	$DT1= $DT->format("m");
	$MON1 = $DT1;
	if($MON1 != $MON)
	{
		$i1 = $i;
		$i2 = $i + 1;
		$i++;
		$MON = $MON1;
	}
	$EXL -> getActiveSheet() -> SetCellValue("A$i" ,$row['BILL_NO']);
	$DT1= $DT->format("d-M-Y");
	$EXL -> getActiveSheet() -> SetCellValue("B$i" ,$DT1);
	$DT2= $DT->format("M-Y");
	$EXL -> getActiveSheet() -> SetCellValue("C$i" ,$DT2);
	$EXL -> getActiveSheet() -> SetCellValue("D$i" ,$row['CUST']);
	$EXL -> getActiveSheet() -> SetCellValue("E$i" ,$row['DNAME']);
	$EXL -> getActiveSheet() -> SetCellValue("F$i" ,$row['SID']);
	$EXL -> getActiveSheet() -> SetCellValue("G$i" ,$row['ENS']);
	$EXL -> getActiveSheet() -> SetCellValue("H$i" ,$row['TECH']);
	$EXL -> getActiveSheet() -> SetCellValue("I$i" ,$row['PART_NO']);
	$EXL -> getActiveSheet() -> SetCellValue("J$i" ,$row['PARTI']);
	$EXL -> getActiveSheet() -> SetCellValue("K$i" ,$row['QTY']);
	$EXL -> getActiveSheet() -> SetCellValue("L$i" ,$row['UNIT']);
	$EXL -> getActiveSheet() -> SetCellValue("M$i" ,$row['MRP']);
	$EXL -> getActiveSheet() -> SetCellValue("N$i" ,$row['SPRICE']);
	$EXL -> getActiveSheet() -> SetCellValue("O$i" ,$row['TAX']);
	$EXL -> getActiveSheet() -> SetCellValue("P$i" ,$row['TOTAL']);
	$EXL -> getActiveSheet() -> SetCellValue("Q$i" ,$row['STOT']);
	$EXL -> getActiveSheet() -> SetCellValue("R$i" ,$row['TVAL']);
	$EXL -> getActiveSheet() -> SetCellValue("S$i" ,$row['JOB']);
	$EXL -> getActiveSheet() -> SetCellValue("A$i1" ,'="TOTAL SELL DURING THE MONTH ' .$DT2. ' IS RS. " & SUM(P'.$i2. ':P'.$i.') & ".00"');
	$style = array('font' => array('size' => 12,'bold' => true,'color' => array('rgb' => '0000FF')));
	$EXL->getActiveSheet()->getStyle("A$i1")->applyFromArray($style);
	$EXL->getActiveSheet()->getStyle("A".$i1.":S".$i1)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
	$EXL->getActiveSheet()->getStyle("A".$i1.":S".$i1)->getFill()->getStartColor()->setARGB(PHPExcel_Style_Color::COLOR_YELLOW);
	$i++;
	$j++;
}

$EXL -> getActiveSheet() -> getColumnDimension("B")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("C")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("D")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("E")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("F")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("G")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("H")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("I")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("J")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("K")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("L")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("M")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("N")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("O")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("P")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("Q")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("R")->setAutoSize(true);
$EXL -> getActiveSheet() -> getColumnDimension("S")->setAutoSize(true);
$style = array('font' => array('bold' => true, 'size' => 12));
$EXL->getActiveSheet()->getStyle('A1:S1')->applyFromArray($style);
$EXL->getActiveSheet()->getStyle('A1:S1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$EXL->getActiveSheet()->getStyle('A1:S1')->getFill()->getStartColor()->setARGB('FF00FFFF');
$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);
$LR=$EXL->getActiveSheet()->getHighestDataRow();
$EXL->getActiveSheet()->getStyle('A1:S'. (string)($LR))->applyFromArray($styleArray);
$EXL->getActiveSheet()->freezePane('B2');
$EXL->getActiveSheet()->setTitle("SALES REPORT");
$OW = new PHPExcel_Writer_Excel2007($EXL);
session_start();
$_SESSION["FLNM"] = "../../DNLD/BILL/SALES REPORT.xlsx";
$OW -> save($_SESSION["FLNM"]);
header ("Location: PL_ARR.php");
?>