<?php
require_once '../../INCLUDES/CHK_SESS.php';
include ("../../EXL/Classes/PHPExcel.php");
$BNO = $_POST['BNO'];
$BDATE = $_POST['BDATE'];
$CUST = $_POST['CUST'];
$SNAME = $_POST['SNAME'];
$ADDR = $_POST['ADDR'];
$VNO = $_POST['VNO'];
include ("../../INCLUDES/Connect.php"); 
$result = $db1->query("SELECT * FROM BILLs WHERE BILL_NO='" .$BNO. "'"); 
$cn = mysqli_num_rows($result);
if ($cn < 12)
{
$i=13;
$j=1;
$EXL = new PHPExcel();
$EXL -> setActiveSheetIndex(0);
$EXL->getActiveSheet()->getColumnDimension('A')->setWidth("6");
$EXL->getActiveSheet()->getColumnDimension('B')->setWidth("6.95");
$EXL->getActiveSheet()->getColumnDimension('C')->setWidth("6.95");
$EXL->getActiveSheet()->getColumnDimension('D')->setWidth("8.43");
$EXL->getActiveSheet()->getColumnDimension('E')->setWidth("8.43");
$EXL->getActiveSheet()->getColumnDimension('F')->setWidth("20");
$EXL->getActiveSheet()->getColumnDimension('G')->setWidth("3");
$EXL->getActiveSheet()->getColumnDimension('H')->setWidth("7.29");
$EXL->getActiveSheet()->getColumnDimension('I')->setWidth("9.5");
$EXL->getActiveSheet()->getColumnDimension('J')->setWidth("9");
$EXL->getActiveSheet()->getColumnDimension('K')->setWidth("12");
$EXL->getActiveSheet()->mergeCells('A2:K2');
$EXL -> getActiveSheet() -> SetCellValue("A2",$_SESSION['ONAME']);
$style = array('font' => array('size' => 24,'bold' => true, 'name' => 'Book Antiqua', 'color' => array('rgb' => 'ff0000')));
$EXL->getActiveSheet()->getStyle('A2')->applyFromArray($style);
$EXL->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$styleArray = array(
  'borders' => array(
    'outline' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);
$EXL->getActiveSheet()->getStyle('A1:K5')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getRowDimension('6')->setRowHeight(3);
$EXL -> getActiveSheet() -> SetCellValue("A7","CHALLAN NO:-");
$EXL -> getActiveSheet() -> SetCellValue("J7","DATE:-");
$DT = date_create($BDATE);
$DT1= $DT->format("d-M-Y");
$EXL -> getActiveSheet() -> SetCellValue("K7",$DT1);
//K7 FORMAT DATE
$EXL -> getActiveSheet() -> SetCellValue("A8","CUSTOMER:-");
$EXL -> getActiveSheet() -> SetCellValue("A10","VAT NO:-");
$EXL->getActiveSheet()->getStyle('A7:K10')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getRowDimension('11')->setRowHeight(3);
$EXL -> getActiveSheet() -> SetCellValue("A12","SL NO");
$EXL -> getActiveSheet() -> SetCellValue("B12","PART NO");
$EXL -> getActiveSheet() -> SetCellValue("D12","PARTICULARS");
$EXL -> getActiveSheet() -> SetCellValue("I12","MRP");
$EXL -> getActiveSheet() -> SetCellValue("J12","QTY");
$EXL -> getActiveSheet() -> SetCellValue("K12","PER");
$EXL->getActiveSheet()->getStyle('A12:K12')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('A12:K24')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('B12:C24')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('D12:H24')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('J12:J24')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('K12:K24')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('I12:J24')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$EXL->getActiveSheet()->getStyle('K12:K24')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL->getActiveSheet()->getStyle('A13:K24')->applyFromArray(array('font' => array('size' => 9.5)));
$EXL->getActiveSheet()->getStyle('A27:K27')->applyFromArray(array('font' => array('bold' => true)));
$EXL->getActiveSheet()->getStyle('I24:K24')->applyFromArray(array('font' => array('bold' => true)));
$EXL->getActiveSheet()->getStyle('I13:I24')->getNumberFormat()->setFormatCode('#,##0.00');
$EXL->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
$EXL->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$EXL->getActiveSheet()->getPageMargins()->setTop(0.35);
$EXL->getActiveSheet()->getPageMargins()->setRight(0.17);
$EXL->getActiveSheet()->getPageMargins()->setLeft(0.34);
$EXL->getActiveSheet()->getPageMargins()->setBottom(0.02);
$n= 42;
while($row = $result->fetch_assoc()) {
	$EXL -> getActiveSheet() -> SetCellValue("A$i" ,$j);
	$EXL -> getActiveSheet() -> SetCellValue("B$i" ,$row['PART_NO']);
	$EXL -> getActiveSheet() -> SetCellValue("D$i" ,$row['PARTI']);
	$EXL -> getActiveSheet() -> SetCellValue("I$i" ,$row['MRP']);
	$EXL -> getActiveSheet() -> SetCellValue("J$i" ,$row['QTY']);
	$EXL -> getActiveSheet() -> SetCellValue("K$i" ,$row['UNIT']);
	$i++;
	$j++;
}
$VN = preg_replace('/\D+/', '', $BNO);
$EXL -> getActiveSheet() -> SetCellValue("C7",$VN);
$EXL -> getActiveSheet() -> SetCellValue("C8",$CUST." [SITE NAME:- ".$SNAME."]");
$EXL -> getActiveSheet() -> SetCellValue("A9","ADDRESS:-");
$EXL -> getActiveSheet() -> SetCellValue("C9",$ADDR);
$EXL->getActiveSheet()->mergeCells('C10:D10');
$EXL->getActiveSheet()->getStyle('C10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$EXL -> getActiveSheet() -> SetCellValue("C10", $VNO);
$EXL -> getActiveSheet() -> SetCellValue("I27","For, ".$_SESSION['ONAME']);
$EXL->getActiveSheet()->mergeCells('I27:K27');
$EXL->getActiveSheet()->getStyle('I27')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$EXL->getActiveSheet()->getStyle('A25:K27')->applyFromArray($styleArray);
$EXL->getActiveSheet()->mergeCells('A1:K1');
$EXL->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL -> getActiveSheet() -> SetCellValue("A1","CHALLAN");
$EXL->getActiveSheet()->getStyle('A1')->applyFromArray(array('font' => array('underline' => true, 'bold' => true)));
$EXL->getActiveSheet()->mergeCells('A3:K3');
$EXL->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL -> getActiveSheet() -> SetCellValue("A3",$_SESSION['ADDR']);
$EXL->getActiveSheet()->mergeCells('A4:K4');
$EXL->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL -> getActiveSheet() -> SetCellValue("A4",$_SESSION['PH']);
$EXL->getActiveSheet()->mergeCells('A5:K5');
$EXL->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL -> getActiveSheet() -> SetCellValue("A5","VAT NO: ".$_SESSION['VNO'].", CST NO: ".$_SESSION['CST'].", PAN NO: ".$_SESSION['PAN'].", S.TAX NO: ".$_SESSION['STAX']);
$EXL->getActiveSheet()->getStyle('B13:B24')->getNumberFormat()->setFormatCode('#');
$EXL -> getActiveSheet() -> SetCellValue("A27","SIGNATURE OF CUSTOMER");
$EXL->getActiveSheet()->getStyle('A24')->applyFromArray(array('font' => array('bold' => true, 'name' => 'Book Antiqua')));
$EXL->getActiveSheet()->getStyle('A13:A24')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL->getActiveSheet()->getStyle('A41:A52')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL->getActiveSheet()->getStyle('A24')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$EXL->getActiveSheet()->getRowDimension('35')->setRowHeight(3);
$EXL->getActiveSheet()->getRowDimension('40')->setRowHeight(3);                 
$objDrawingPType = new PHPExcel_Worksheet_Drawing();
$objDrawingPType->setWorksheet($EXL->setActiveSheetIndex(0));
$objDrawingPType->setName("ELOGO");
$objDrawingPType->setPath("../../INCLUDES/LOGO.jpg");
$objDrawingPType->setCoordinates('K2');
$objDrawingPType->setHeight(50);
$objDrawingPType->setWidth(50);
$objDrawingPType->setOffsetX(20);
$objDrawingPType->setOffsetY(1);
$objDrawingPType1 = new PHPExcel_Worksheet_Drawing();
$objDrawingPType1->setWorksheet($EXL->setActiveSheetIndex(0));
$objDrawingPType1->setName("BRLOGO");
$objDrawingPType1->setPath("../../INCLUDES/BR.png");
$objDrawingPType1->setCoordinates('A2');
$objDrawingPType1->setHeight(15);
$objDrawingPType1->setWidth(40);
$objDrawingPType1->setOffsetX(8);
$objDrawingPType1->setOffsetY(1);
$cellValues = $EXL->getActiveSheet()->rangeToArray('A1:K27'); 
$EXL->getActiveSheet()->fromArray($cellValues, null, 'A30');
$EXL->getActiveSheet()->mergeCells('A31:K31');
$EXL->getActiveSheet()->getStyle('A31')->applyFromArray($style);
$EXL->getActiveSheet()->getStyle('A31')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL->getActiveSheet()->getStyle('A31')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$EXL->getActiveSheet()->getStyle('A30:K34')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('A36:K39')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('A41:K41')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('A41:K53')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('A41:K53')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('B41:C53')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('D41:H53')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('J41:J53')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('K41:K53')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('I41:J53')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$EXL->getActiveSheet()->getStyle('K41:K53')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL->getActiveSheet()->getStyle('A42:K53')->applyFromArray(array('font' => array('size' => 9.5)));
$EXL->getActiveSheet()->getStyle('A56:K56')->applyFromArray(array('font' => array('bold' => true)));
$EXL->getActiveSheet()->getStyle('I42:I53')->getNumberFormat()->setFormatCode('#,##0.00');
$EXL->getActiveSheet()->mergeCells('A30:K30');
$EXL->getActiveSheet()->getStyle('A30')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL->getActiveSheet()->getStyle('A30')->applyFromArray(array('font' => array('underline' => true, 'bold' => true)));
$EXL->getActiveSheet()->getStyle('A54:K56')->applyFromArray($styleArray);    
$EXL->getActiveSheet()->mergeCells('A32:K32');
$EXL->getActiveSheet()->getStyle('A32')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL->getActiveSheet()->mergeCells('A33:K33');
$EXL->getActiveSheet()->getStyle('A33')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL->getActiveSheet()->mergeCells('A34:K34');
$EXL->getActiveSheet()->getStyle('A34')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL->getActiveSheet()->getStyle('B42:B53')->getNumberFormat()->setFormatCode('@');
$EXL->getActiveSheet()->mergeCells('C39:D39');
$EXL->getActiveSheet()->getStyle('C39')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$EXL->getActiveSheet()->mergeCells('I56:K56');
$EXL->getActiveSheet()->getStyle('I56')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);  
$styleArray = array(
  'borders' => array(
    'bottom' => array(
      'style' => PHPExcel_Style_Border::BORDER_SLANTDASHDOT
    )
  )
);
$EXL->getActiveSheet()->getStyle('B41:B53')->getNumberFormat()->setFormatCode('#0');         
$EXL->getActiveSheet()->getStyle('A28:K28')->applyFromArray($styleArray);
$objDrawingPType2 = new PHPExcel_Worksheet_Drawing();
$objDrawingPType2->setWorksheet($EXL->setActiveSheetIndex(0));
$objDrawingPType2->setName("ELOGO1");
$objDrawingPType2->setPath("../../INCLUDES/LOGO.jpg");
$objDrawingPType2->setCoordinates('K31');
$objDrawingPType2->setHeight(50);
$objDrawingPType2->setWidth(50);
$objDrawingPType2->setOffsetX(20);
$objDrawingPType2->setOffsetY(1);
$objDrawingPType11 = new PHPExcel_Worksheet_Drawing();
$objDrawingPType11->setWorksheet($EXL->setActiveSheetIndex(0));
$objDrawingPType11->setName("BRLOGO1");
$objDrawingPType11->setPath("../../INCLUDES/BR.png");
$objDrawingPType11->setCoordinates('A31');
$objDrawingPType11->setHeight(15);
$objDrawingPType11->setWidth(40);
$objDrawingPType11->setOffsetX(8);
$objDrawingPType11->setOffsetY(1); 
for ($i = 13; $i < 25; $i++)
{
	$EXL->getActiveSheet()->mergeCells('B'.$i.':C'.$i);
	$EXL->getActiveSheet()->getStyle('B'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
}
for ($n = 42; $n < 54; $n++)
{
	$EXL->getActiveSheet()->mergeCells('B'.$n.':C'.$n);
	$EXL->getActiveSheet()->getStyle('B'.$n)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
}

$EXL->getActiveSheet()->setTitle("CHALLAN");
$OW = new PHPExcel_Writer_Excel2007($EXL);
session_start();
$_SESSION["FLNM"] = "../../DNLD/BILL/CHALLAN".$VN.".xlsx";
$OW -> save($_SESSION["FLNM"]);
header ("Location: ../../CODES/STOCK/PL_ARR.php");
}

else
{
$i=13;
$j=1;
$EXL = new PHPExcel();
$EXL -> setActiveSheetIndex(0);
$EXL->getActiveSheet()->getColumnDimension('A')->setWidth("6");
$EXL->getActiveSheet()->getColumnDimension('B')->setWidth("6.95");
$EXL->getActiveSheet()->getColumnDimension('C')->setWidth("6.95");
$EXL->getActiveSheet()->getColumnDimension('D')->setWidth("8.43");
$EXL->getActiveSheet()->getColumnDimension('E')->setWidth("8.43");
$EXL->getActiveSheet()->getColumnDimension('F')->setWidth("20");
$EXL->getActiveSheet()->getColumnDimension('G')->setWidth("3");
$EXL->getActiveSheet()->getColumnDimension('H')->setWidth("7.29");
$EXL->getActiveSheet()->getColumnDimension('I')->setWidth("9.5");
$EXL->getActiveSheet()->getColumnDimension('J')->setWidth("9");
$EXL->getActiveSheet()->getColumnDimension('K')->setWidth("12");
$EXL->getActiveSheet()->mergeCells('A2:K2');
$EXL -> getActiveSheet() -> SetCellValue("A2",$_SESSION['ONAME']);
$style = array('font' => array('size' => 24,'bold' => true, 'name' => 'Book Antiqua', 'color' => array('rgb' => 'ff0000')));
$EXL->getActiveSheet()->getStyle('A2')->applyFromArray($style);
$EXL->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$styleArray = array(
  'borders' => array(
    'outline' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);
$EXL->getActiveSheet()->getStyle('A1:K5')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getRowDimension('6')->setRowHeight(3);
$EXL -> getActiveSheet() -> SetCellValue("A7","CHALLAN NO:-");
$EXL -> getActiveSheet() -> SetCellValue("J7","DATE:-");
$DT = date_create($BDATE);
$DT1= $DT->format("d-M-Y");
$EXL -> getActiveSheet() -> SetCellValue("K7",$DT1);
//K7 FORMAT DATE
$EXL -> getActiveSheet() -> SetCellValue("A8","CUSTOMER:-");
$EXL -> getActiveSheet() -> SetCellValue("A10","VAT NO:-");
$EXL->getActiveSheet()->getStyle('A7:K10')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getRowDimension('11')->setRowHeight(3);
$EXL -> getActiveSheet() -> SetCellValue("A12","SL NO");
$EXL -> getActiveSheet() -> SetCellValue("B12","PART NO");
$EXL -> getActiveSheet() -> SetCellValue("D12","PARTICULARS");
$EXL -> getActiveSheet() -> SetCellValue("I12","MRP");
$EXL -> getActiveSheet() -> SetCellValue("J12","QTY");
$EXL -> getActiveSheet() -> SetCellValue("K12","PER");
$EXL->getActiveSheet()->getStyle('A12:K12')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('A12:K53')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('B12:C53')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('D12:H53')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('J12:J53')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('K12:K53')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('I12:J53')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$EXL->getActiveSheet()->getStyle('K12:K53')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL->getActiveSheet()->getStyle('A13:K53')->applyFromArray(array('font' => array('size' => 9.5)));
$EXL->getActiveSheet()->getStyle('A56:K56')->applyFromArray(array('font' => array('bold' => true)));
$EXL->getActiveSheet()->getStyle('I53:K53')->applyFromArray(array('font' => array('bold' => true)));
$EXL->getActiveSheet()->getStyle('I13:I53')->getNumberFormat()->setFormatCode('#,##0.00');
$EXL->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
$EXL->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$EXL->getActiveSheet()->getPageMargins()->setTop(0.25);
$EXL->getActiveSheet()->getPageMargins()->setRight(0.17);
$EXL->getActiveSheet()->getPageMargins()->setLeft(0.34);
$EXL->getActiveSheet()->getPageMargins()->setBottom(0.02);
$n= 42;
while($row = $result->fetch_assoc()) {
	$EXL -> getActiveSheet() -> SetCellValue("A$i" ,$j);
	$EXL -> getActiveSheet() -> SetCellValue("B$i" ,$row['PART_NO']);
	$EXL -> getActiveSheet() -> SetCellValue("D$i" ,$row['PARTI']);
	$EXL -> getActiveSheet() -> SetCellValue("I$i" ,$row['MRP']);
	$EXL -> getActiveSheet() -> SetCellValue("J$i" ,$row['QTY']);
	$EXL -> getActiveSheet() -> SetCellValue("K$i" ,$row['UNIT']);
	$i++;
	$j++;
}
$VN = preg_replace('/\D+/', '', $BNO);
$EXL -> getActiveSheet() -> SetCellValue("C7",$VN);
$EXL -> getActiveSheet() -> SetCellValue("C8",$CUST." [SITE NAME:- ".$SNAME."]");
$EXL -> getActiveSheet() -> SetCellValue("A9","ADDRESS:-");
$EXL -> getActiveSheet() -> SetCellValue("C9",$ADDR);
$EXL->getActiveSheet()->mergeCells('C10:D10');
$EXL->getActiveSheet()->getStyle('C10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$EXL -> getActiveSheet() -> SetCellValue("C10", $VNO);
$EXL -> getActiveSheet() -> SetCellValue("I56","For, ".$_SESSION['ONAME']);
$EXL->getActiveSheet()->mergeCells('I56:K56');
$EXL->getActiveSheet()->getStyle('I56')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$EXL->getActiveSheet()->getStyle('A54:K56')->applyFromArray($styleArray);
$EXL->getActiveSheet()->mergeCells('A1:K1');
$EXL->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL -> getActiveSheet() -> SetCellValue("A1","CHALLAN");
$EXL->getActiveSheet()->getStyle('A1')->applyFromArray(array('font' => array('underline' => true, 'bold' => true)));
$EXL->getActiveSheet()->mergeCells('A3:K3');
$EXL->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL -> getActiveSheet() -> SetCellValue("A3","For, ".$_SESSION['ADDR']);
$EXL->getActiveSheet()->mergeCells('A4:K4');
$EXL->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL -> getActiveSheet() -> SetCellValue("A4","For, ".$_SESSION['PH']);
$EXL->getActiveSheet()->mergeCells('A5:K5');
$EXL->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL -> getActiveSheet() -> SetCellValue("A5","VAT NO: ".$_SESSION['VNO'].", CST NO: ".$_SESSION['CST'].", PAN NO: ".$_SESSION['PAN'].", S.TAX NO: ".$_SESSION['STAX']);
$EXL->getActiveSheet()->getStyle('B13:B53')->getNumberFormat()->setFormatCode('#');
$EXL -> getActiveSheet() -> SetCellValue("A56","SIGNATURE OF CUSTOMER");
$EXL->getActiveSheet()->getStyle('A13:A53')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);               
$objDrawingPType = new PHPExcel_Worksheet_Drawing();
$objDrawingPType->setWorksheet($EXL->setActiveSheetIndex(0));
$objDrawingPType->setName("ELOGO");
$objDrawingPType->setPath("../../INCLUDES/LOGO.jpg");
$objDrawingPType->setCoordinates('K2');
$objDrawingPType->setHeight(50);
$objDrawingPType->setWidth(50);
$objDrawingPType->setOffsetX(20);
$objDrawingPType->setOffsetY(1);
$objDrawingPType1 = new PHPExcel_Worksheet_Drawing();
$objDrawingPType1->setWorksheet($EXL->setActiveSheetIndex(0));
$objDrawingPType1->setName("BRLOGO");
$objDrawingPType1->setPath("../../INCLUDES/BR.png");
$objDrawingPType1->setCoordinates('A2');
$objDrawingPType1->setHeight(15);
$objDrawingPType1->setWidth(40);
$objDrawingPType1->setOffsetX(8);
$objDrawingPType1->setOffsetY(1);

for ($i = 13; $i < 54; $i++)
{
	$EXL->getActiveSheet()->mergeCells('B'.$i.':C'.$i);
	$EXL->getActiveSheet()->getStyle('B'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
}

$EXL->getActiveSheet()->setTitle("CHALLAN");
$OW = new PHPExcel_Writer_Excel2007($EXL);
session_start();
$_SESSION["FLNM"] = "../../DNLD/BILL/CHALLAN".$VN.".xlsx";
$OW -> save($_SESSION["FLNM"]);
header ("Location: ../../CODES/STOCK/PL_ARR.php");
}
?>