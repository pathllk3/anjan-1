<?php
require_once '../../INCLUDES/CHK_SESS.php';
include ("../../EXL/Classes/PHPExcel.php");
$BNO = $_POST['BNO'];
$BDATE = $_POST['BDATE'];
$CUST = $_POST['CUST'];
$SNAME = $_POST['SNAME'];
$ADDR = $_POST['ADDR'];
$VNO = $_POST['VNO'];
$TVAL = $_POST['TVAL'];
$ROUND = $_POST['ROUND'];
$NTOT = $_POST['NTOT'];
$GTOT = $_POST['GTOT'];
$PNO = $_POST['PNO'];
$PDATE = $_POST['PDATE'];
$QNO = $_POST['QNO'];
$QDATE = $_POST['QDATE'];
include ("../../INCLUDES/Connect.php"); 
$result = $db1->query("SELECT * FROM BILLs WHERE BILL_NO='" .$BNO. "'"); 


$i=12;
$j=1;
$EXL = new PHPExcel();
$EXL -> setActiveSheetIndex(0);
$EXL->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
$EXL->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$EXL->getActiveSheet()->getPageMargins()->setTop(0.35);
$EXL->getActiveSheet()->getPageMargins()->setRight(0.09);
$EXL->getActiveSheet()->getPageMargins()->setLeft(0.25);
$EXL->getActiveSheet()->getPageMargins()->setBottom(0.02);

$EXL->getActiveSheet()->getColumnDimension('A')->setWidth("6.71");
$EXL->getActiveSheet()->getColumnDimension('B')->setWidth("12");
$EXL->getActiveSheet()->getColumnDimension('C')->setWidth("8.43");
$EXL->getActiveSheet()->getColumnDimension('D')->setWidth("8.43");
$EXL->getActiveSheet()->getColumnDimension('E')->setWidth("4.29");
$EXL->getActiveSheet()->getColumnDimension('F')->setWidth("8.43");
$EXL->getActiveSheet()->getColumnDimension('G')->setWidth("8.43");
$EXL->getActiveSheet()->getColumnDimension('H')->setWidth("8.5");
$EXL->getActiveSheet()->getColumnDimension('I')->setWidth("7");
$EXL->getActiveSheet()->getColumnDimension('J')->setWidth("8.43");
$EXL->getActiveSheet()->getColumnDimension('K')->setWidth("5.5");
$EXL->getActiveSheet()->getColumnDimension('L')->setWidth("14.4");
$EXL->getActiveSheet()->mergeCells('A2:L2');
$EXL -> getActiveSheet() -> SetCellValue("A2","TAX INVOICE");
$EXL -> getActiveSheet() -> SetCellValue("A3",$_SESSION['ONAME']);
$EXL -> getActiveSheet() -> SetCellValue("A4",$_SESSION['ADDR']);
$EXL -> getActiveSheet() -> SetCellValue("A5",$_SESSION['PH']);
$EXL -> getActiveSheet() -> SetCellValue("A6","VAT: ".$_SESSION['VNO'].", CST: ".$_SESSION['CST'].", PAN: ".$_SESSION['PAN'].", S.TAX: ".$_SESSION['STAX']);
$style = array('font' => array('underline' => true,'bold' => true, 'name' => 'Book Antiqua','type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('argb' => 'ff0000')));
$EXL->getActiveSheet()->getStyle('A2')->applyFromArray($style);
$EXL->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$style = array('font' => array('bold' => true, 'name' => 'Book Antiqua', 'color' => array('rgb' => '0000FF')));
$EXL->getActiveSheet()->getStyle('A3')->applyFromArray($style);
$style = array('font' => array('size' => 10));
$EXL->getActiveSheet()->getStyle('A4:a6')->applyFromArray($style);
$styleArray = array('borders' => array('outline' => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE)));
$EXL->getActiveSheet()->getStyle('A3:H6')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('A7:H9')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('I3:L9')->applyFromArray($styleArray);
$EXL -> getActiveSheet() -> SetCellValue("A7","BUYER: ".$CUST." [SITE:- ".$SNAME."]");
$EXL -> getActiveSheet() -> SetCellValue("A8",$ADDR);
$EXL -> getActiveSheet() -> SetCellValue("A9","VAT NO: ".$VNO);
$EXL -> getActiveSheet() -> SetCellValue("I3","INVOICE NO");
$EXL -> getActiveSheet() -> SetCellValue("I4","INVOICE DATE");
$EXL -> getActiveSheet() -> SetCellValue("I5","PO NO");
$EXL -> getActiveSheet() -> SetCellValue("I6","PO DATE");
$EXL -> getActiveSheet() -> SetCellValue("I7","QUOTATION NO");
$EXL -> getActiveSheet() -> SetCellValue("I8","QUOTATION DATE");
$EXL -> getActiveSheet() -> SetCellValue("K3",$BNO);
$DT = date_create($BDATE);
$DT1= $DT->format("d-M-Y");
$EXL -> getActiveSheet() -> SetCellValue("K4",$DT1);
$EXL -> getActiveSheet() -> SetCellValue("K5",$PNO);
if($PDATE != null)
{
	$EXL -> getActiveSheet() -> SetCellValue("K6",date_create($PDATE)->format("d-M-Y"));
}
$EXL -> getActiveSheet() -> SetCellValue("K7",$QNO);
if($QDATE != null)
{
	$EXL -> getActiveSheet() -> SetCellValue("K8",date_create($QDATE)->format("d-M-Y"));
}

$EXL->getActiveSheet()->mergeCells('K3:L3');
$EXL->getActiveSheet()->mergeCells('K4:L4');
$EXL->getActiveSheet()->mergeCells('K5:L5');
$EXL->getActiveSheet()->mergeCells('K6:L6');
$EXL->getActiveSheet()->mergeCells('K7:L7');
$EXL->getActiveSheet()->mergeCells('K8:L8');
$EXL->getActiveSheet()->mergeCells('K9:L9');
$EXL->getActiveSheet()->getStyle('k3:k9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$EXL->getActiveSheet()->getRowDimension('10')->setRowHeight(3);
for ($A = 12; $A < 54; $A++)
{
	$EXL->getActiveSheet()->getRowDimension($A)->setRowHeight(13.5);
}
$EXL -> getActiveSheet() -> SetCellValue("A11","SL NO");
$EXL -> getActiveSheet() -> SetCellValue("B11","PART NO");
$EXL -> getActiveSheet() -> SetCellValue("C11","PART NAME");
$EXL -> getActiveSheet() -> SetCellValue("I11","QTY");
$EXL -> getActiveSheet() -> SetCellValue("J11","RATE");
$EXL -> getActiveSheet() -> SetCellValue("K11","PER");
$EXL -> getActiveSheet() -> SetCellValue("L11","AMOUNT");
while($row = $result->fetch_assoc()) {
	$EXL -> getActiveSheet() -> SetCellValue("A$i" ,$j);
	$EXL -> getActiveSheet() -> SetCellValue("B$i" ,$row['PART_NO']);
	$EXL -> getActiveSheet() -> SetCellValue("C$i" ,$row['PARTI']);
	$EXL -> getActiveSheet() -> SetCellValue("I$i" ,$row['QTY']);
	$EXL -> getActiveSheet() -> SetCellValue("J$i" ,$row['SPRICE']);
	$EXL -> getActiveSheet() -> SetCellValue("K$i" ,$row['UNIT']);
	$EXL -> getActiveSheet() -> SetCellValue("L$i" ,$row['STOT']);
	$i++;
	$j++;
}
$EXL->getActiveSheet()->getStyle('A11:A57')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$EXL->getActiveSheet()->getStyle('B11:B57')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$EXL->getActiveSheet()->getStyle('I11:I57')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$style = array('font' => array('bold' => true, 'name' => 'Book Antiqua', 'color' => array('rgb' => '0000FF')));
$EXL->getActiveSheet()->getStyle('A11:L11')->applyFromArray($style);
$styleArray = array('borders' => array('outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));
$EXL->getActiveSheet()->getStyle('A12:A54')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('B12:B54')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('C12:H54')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('I12:I54')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('J12:J54')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('K12:K54')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('L12:L57')->applyFromArray($styleArray);
$EXL->getActiveSheet()->mergeCells('C11:H11');
$styleArray = array('borders' => array('outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));
$EXL->getActiveSheet()->getStyle('A11')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('B11')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('C11:H11')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('I11')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('J11')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('K11')->applyFromArray($styleArray);
$EXL->getActiveSheet()->getStyle('L11')->applyFromArray($styleArray);
$EXL -> getActiveSheet() -> SetCellValue("a55","ADD VAT @14.5% ON TAXABLE AMOUNT RS. ".$GTOT);
$EXL -> getActiveSheet() -> SetCellValue("L55",$TVAL);
$EXL -> getActiveSheet() -> SetCellValue("a56","ROUND OFF (+/-)");
$EXL -> getActiveSheet() -> SetCellValue("L56",$ROUND);
$styleArray = array('borders' => array('bottom' => array('style' => PHPExcel_Style_Border::BORDER_DOUBLE)));
$EXL->getActiveSheet()->getStyle('L56')->applyFromArray($styleArray);
$EXL -> getActiveSheet() -> SetCellValue("a57","NET TOTAL (RS. " .convert_digit_to_words($NTOT)."Only)" );
setlocale(LC_MONETARY, 'en_IN');
$EXL -> getActiveSheet() -> SetCellValue("L57",money_format('%i', $NTOT) );
$style = array('font' => array('bold' => true));
$EXL->getActiveSheet()->getStyle('L57')->applyFromArray($style);
$EXL->getActiveSheet()->getStyle('L57')->getNumberFormat()->setFormatCode('#,##0.00');
$EXL->getActiveSheet()->getStyle('L57')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$EXL->getActiveSheet()->getStyle('a57')->applyFromArray($style);
$EXL -> getActiveSheet() -> SetCellValue("I60","For, ".$_SESSION['ONAME']);
$EXL->getActiveSheet()->mergeCells('I60:L60');
$EXL->getActiveSheet()->getStyle('I60')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$style = array('font' => array('bold' => true, 'name' => 'Book Antiqua', 'color' => array('rgb' => '0000FF')));
$EXL->getActiveSheet()->getStyle('I60')->applyFromArray($style);
$styleArray = array('borders' => array('outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));
$EXL->getActiveSheet()->getStyle('A58:L60')->applyFromArray($styleArray);
$style = array('font' => array('bold' => true, 'name' => 'Courier', 'color' => array('rgb' => '0000FF')));
$EXL->getActiveSheet()->getStyle('A7')->applyFromArray($style);
$EXL->getActiveSheet()->mergeCells('A3:H3');
$EXL->getActiveSheet()->mergeCells('A4:H4');
$EXL->getActiveSheet()->mergeCells('A5:H5');
$EXL->getActiveSheet()->mergeCells('A6:H6');
$EXL->getActiveSheet()->mergeCells('A7:H7');
$EXL->getActiveSheet()->mergeCells('A8:H8');
$EXL->getActiveSheet()->mergeCells('A9:H9');
for ($A = 3; $A < 10; $A++)
{
	$EXL->getActiveSheet()->mergeCells('I'.$A.':J'.$A);
}
for ($A = 12; $A < 55; $A++)
{
	$EXL->getActiveSheet()->mergeCells('C'.$A.':H'.$A);
}
$styleArray = array('borders' => array('outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));
$EXL->getActiveSheet()->getStyle('a55:k57')->applyFromArray($styleArray);

$objDrawingPType2 = new PHPExcel_Worksheet_Drawing();
$objDrawingPType2->setWorksheet($EXL->setActiveSheetIndex(0));
$objDrawingPType2->setName("ELOGO1");
$objDrawingPType2->setPath("../../INCLUDES/LOGO.jpg");
$objDrawingPType2->setCoordinates('A1');
$objDrawingPType2->setHeight(50);
$objDrawingPType2->setWidth(50);
$objDrawingPType2->setOffsetX(10);
$objDrawingPType2->setOffsetY(1);

$EXL->getActiveSheet()->setTitle("INVOICE");
$OW = new PHPExcel_Writer_Excel2007($EXL);
session_start();
$_SESSION["FLNM"] = "../../DNLD/BILL/BILL.xlsx";
$OW -> save($_SESSION["FLNM"]);
header ("Location: ../../CODES/STOCK/PL_ARR.php");

function convert_digit_to_words($no)  
	{   
	
	//creating array  of word for each digit
	 $words = array('0'=> 'Zero' ,'1'=> 'One' ,'2'=> 'Two' ,'3' => 'Three','4' => 'Four','5' => 'Five','6' => 'Six','7' => 'Seven','8' => 'Eight','9' => 'Nine','10' => 'Ten','11' => 'Eleven','12' => 'Twelve','13' => 'Thirteen','14' => 'Fourteen','15' => 'Fifteen','16' => 'Sixteen','17' => 'Seventeen','18' => 'Eighteen','19' => 'Nineteen','20' => 'Twenty','30' => 'Thirty','40' => 'Forty','50' => 'Fifty','60' => 'Sixty','70' => 'Seventy','80' => 'Eighty','90' => 'Ninty','100' => 'Hundred','1000' => 'Thousand','100000' => 'Lac','10000000' => 'Crore');
	 //$words = array('0'=> '0' ,'1'=> '1' ,'2'=> '2' ,'3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10','11' => '11','12' => '12','13' => '13','14' => '14','15' => '15','16' => '16','17' => '17','18' => '18','19' => '19','20' => '20','30' => '30','40' => '40','50' => '50','60' => '60','70' => '70','80' => '80','90' => '90','100' => '100','1000' => '1000','100000' => '100000','10000000' => '10000000');
	 
	 
	 //for decimal number taking decimal part
	 
	$cash=(int)$no;  //take number wihout decimal
	$decpart = $no - $cash; //get decimal part of number
	
	$decpart=sprintf("%01.2f",$decpart); //take only two digit after decimal
	
	$decpart1=substr($decpart,2,1); //take first digit after decimal
	$decpart2=substr($decpart,3,1);   //take second digit after decimal  
	
	$decimalstr='';
	
	//if given no. is decimal than  preparing string for decimal digit's word
	
	if($decpart>0)
	{
	 $decimalstr.="point ".$numbers[$decpart1]." ".$numbers[$decpart2];
	}
	 
	    if($no == 0)
	        return ' ';
	    else {
	    $novalue='';
	    $highno=$no;
	    $remainno=0;
	    $value=100;
	    $value1=1000;       
	            while($no>=100)    {
	                if(($value <= $no) &&($no  < $value1))    {
	                $novalue=$words["$value"];
	                $highno = (int)($no/$value);
	                $remainno = $no % $value;
	                break;
	                }
	                $value= $value1;
	                $value1 = $value * 100;
	            }       
	          if(array_key_exists("$highno",$words))  //check if $high value is in $words array
	              return $words["$highno"]." ".$novalue." ".convert_digit_to_words($remainno).$decimalstr;  //recursion
	          else {
	             $unit=$highno%10;
	             $ten =(int)($highno/10)*10;
	             return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".convert_digit_to_words($remainno
	             ).$decimalstr; //recursion
	           }
	    }
	}
	
	function money_format($format, $number) 
{ 
    $regex  = '/%((?:[\^!\-]|\+|\(|\=.)*)([0-9]+)?'. 
              '(?:#([0-9]+))?(?:\.([0-9]+))?([in%])/'; 
    if (setlocale(LC_MONETARY, 0) == 'C') { 
        setlocale(LC_MONETARY, ''); 
    } 
    $locale = localeconv(); 
    preg_match_all($regex, $format, $matches, PREG_SET_ORDER); 
    foreach ($matches as $fmatch) { 
        $value = floatval($number); 
        $flags = array( 
            'fillchar'  => preg_match('/\=(.)/', $fmatch[1], $match) ? 
                           $match[1] : ' ', 
            'nogroup'   => preg_match('/\^/', $fmatch[1]) > 0, 
            'usesignal' => preg_match('/\+|\(/', $fmatch[1], $match) ? 
                           $match[0] : '+', 
            'nosimbol'  => preg_match('/\!/', $fmatch[1]) > 0, 
            'isleft'    => preg_match('/\-/', $fmatch[1]) > 0 
        ); 
        $width      = trim($fmatch[2]) ? (int)$fmatch[2] : 0; 
        $left       = trim($fmatch[3]) ? (int)$fmatch[3] : 0; 
        $right      = trim($fmatch[4]) ? (int)$fmatch[4] : $locale['int_frac_digits']; 
        $conversion = $fmatch[5]; 

        $positive = true; 
        if ($value < 0) { 
            $positive = false; 
            $value  *= -1; 
        } 
        $letter = $positive ? 'p' : 'n'; 

        $prefix = $suffix = $cprefix = $csuffix = $signal = ''; 

        $signal = $positive ? $locale['positive_sign'] : $locale['negative_sign']; 
        switch (true) { 
            case $locale["{$letter}_sign_posn"] == 1 && $flags['usesignal'] == '+': 
                $prefix = $signal; 
                break; 
            case $locale["{$letter}_sign_posn"] == 2 && $flags['usesignal'] == '+': 
                $suffix = $signal; 
                break; 
            case $locale["{$letter}_sign_posn"] == 3 && $flags['usesignal'] == '+': 
                $cprefix = $signal; 
                break; 
            case $locale["{$letter}_sign_posn"] == 4 && $flags['usesignal'] == '+': 
                $csuffix = $signal; 
                break; 
            case $flags['usesignal'] == '(': 
            case $locale["{$letter}_sign_posn"] == 0: 
                $prefix = '('; 
                $suffix = ')'; 
                break; 
        } 
        if (!$flags['nosimbol']) { 
            $currency = $cprefix . 
                        ($conversion == 'i' ? $locale['int_curr_symbol'] : $locale['currency_symbol']) . 
                        $csuffix; 
        } else { 
            $currency = ''; 
        } 
        $space  = $locale["{$letter}_sep_by_space"] ? ' ' : ''; 

        $value = number_format($value, $right, $locale['mon_decimal_point'], 
                 $flags['nogroup'] ? '' : $locale['mon_thousands_sep']); 
        $value = @explode($locale['mon_decimal_point'], $value); 

        $n = strlen($prefix) + strlen($currency) + strlen($value[0]); 
        if ($left > 0 && $left > $n) { 
            $value[0] = str_repeat($flags['fillchar'], $left - $n) . $value[0]; 
        } 
        $value = implode($locale['mon_decimal_point'], $value); 
        if ($locale["{$letter}_cs_precedes"]) { 
            $value = $prefix . $currency . $space . $value . $suffix; 
        } else { 
            $value = $prefix . $value . $space . $currency . $suffix; 
        } 
        if ($width > 0) { 
            $value = str_pad($value, $width, $flags['fillchar'], $flags['isleft'] ? 
                     STR_PAD_RIGHT : STR_PAD_LEFT); 
        } 

        $format = str_replace($fmatch[0], $value, $format); 
    } 
    return $format; 
} 
?>