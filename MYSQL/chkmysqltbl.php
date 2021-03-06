<?php
$db = parse_ini_file("INCLUDES/set.ini");
$user = $db['user'];
$pass = $db['pass'];
$host = $db['host'];

$db2 = mysqli_connect($host, $user, $pass);
if($db2) {
	$sq = "create database TMTL";
	if ($db2->query($sq))
	{
		
	}
}
else {
	echo mysqli_error($db1);
}

include ("INCLUDES/Connect.php"); 
// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS SHEET1 (
RID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
PART_NO VARCHAR(255) NOT NULL,
PARTI VARCHAR(255) NOT NULL,
MRP VARCHAR(255),
GROP VARCHAR(255),
CATE VARCHAR(255),
DPCODE VARCHAR(255),
lmodi VARCHAR(255),
TRATE VARCHAR(255),
RID1 VARCHAR(255),
UNIT VARCHAR(255),
AEDT VARCHAR(255),
CMP VARCHAR(255)
)";

$sql1 = "CREATE TABLE IF NOT EXISTS TABLE1 (
RID1 INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
TYPE VARCHAR(255), 
PART_NO VARCHAR(255) NOT NULL,
PARTI VARCHAR(255) NOT NULL,
MRP VARCHAR(255),
QTY VARCHAR(255),
TOTAL VARCHAR(255),
RACKNO VARCHAR(255),
TAX VARCHAR(255),
TVAL VARCHAR(255),
STOTAL VARCHAR(255),
PPRICE VARCHAR(255),
SPRICE VARCHAR(255),
SSTA VARCHAR(255),
EOR VARCHAR(255),
GROP VARCHAR(255),
DPCODE VARCHAR(255),
lmodi VARCHAR(255),
RID VARCHAR(255),
UNIT VARCHAR(255),
AEDT VARCHAR(255),
USER1 VARCHAR(255),
CMP VARCHAR(255)
)";
$sql2 = "CREATE TABLE IF NOT EXISTS USER1 ("
      . " ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY" 
      . ", UID VARCHAR(255) NOT NULL"
      . ", PASS VARCHAR(255)"
      . ", FNAME VARCHAR(255)"
      . ", LNAME VARCHAR(255)"
      . ")";
$sql3 = "CREATE TABLE IF NOT EXISTS MAINPOPUs(
	RID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	RID1 NVARCHAR(255) NULL DEFAULT NULL,
	SID NVARCHAR(255) NULL DEFAULT NULL,
	CNAME NVARCHAR(255) NULL DEFAULT NULL,
	SNAME NVARCHAR(255) NULL DEFAULT NULL,
	ENS NVARCHAR(255) NULL DEFAULT NULL,
	ALSN NVARCHAR(255) NULL DEFAULT NULL,
	RAT_PH NVARCHAR(255) NULL DEFAULT NULL,
	PHASE NVARCHAR(255) NULL DEFAULT NULL,
	MODEL NVARCHAR(255) NULL DEFAULT NULL,
	BSN NVARCHAR(255) NULL DEFAULT NULL,
	CPN NVARCHAR(255) NULL DEFAULT NULL,
	PHNO NVARCHAR(255) NULL DEFAULT NULL,
	ADDR NVARCHAR(255) NULL DEFAULT NULL,
	DOC DATETIME NULL DEFAULT NULL,
	SPIN NVARCHAR(255) NULL DEFAULT NULL,
	AMC NVARCHAR(255) NULL DEFAULT NULL,
	CHMR NVARCHAR(255) NULL DEFAULT NULL,
	CHMD DATETIME NULL DEFAULT NULL,
	lhmr NVARCHAR(255) NULL DEFAULT NULL,
	lsd DATETIME NULL DEFAULT NULL,
	nsd DATETIME NULL DEFAULT NULL,
	ahm NVARCHAR(255) NULL DEFAULT NULL,
	DGNO NVARCHAR(255) NULL DEFAULT NULL,
	ACTION NVARCHAR(255) NULL DEFAULT NULL,
	DIST NVARCHAR(255) NULL DEFAULT NULL,
	STATE NVARCHAR(255) NULL DEFAULT NULL,
	AMAKE NVARCHAR(255) NULL DEFAULT NULL,
	WARR NVARCHAR(255) NULL DEFAULT NULL,
	OEA NVARCHAR(255) NULL DEFAULT NULL,
	SSTA NVARCHAR(255) NULL DEFAULT NULL,
	hmage NVARCHAR(255) NULL DEFAULT NULL,
	DPCODE NVARCHAR(255) NULL DEFAULT NULL,
	lmodi NVARCHAR(255) NULL DEFAULT NULL,
	AEDT NVARCHAR(255) NULL DEFAULT NULL,
	llop NVARCHAR(255) NULL DEFAULT NULL,
	solenoid NVARCHAR(255) NULL DEFAULT NULL,
	chalt NVARCHAR(255) NULL DEFAULT NULL,
	starter NVARCHAR(255) NULL DEFAULT NULL,
	cntype NVARCHAR(255) NULL DEFAULT NULL,
	cnmake NVARCHAR(255) NULL DEFAULT NULL,
	sauto NVARCHAR(255) NULL DEFAULT NULL,
	FRAME NVARCHAR(255) NULL DEFAULT NULL,
	DSTA NVARCHAR(255) NULL DEFAULT NULL
)"
;
$sql4 ="CREATE TABLE IF NOT EXISTS PMRs (
	RECID1 INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	SID NVARCHAR(255) NULL DEFAULT NULL,
	SNAME NVARCHAR(255) NULL DEFAULT NULL,
	ENGINE_No NVARCHAR(255) NULL DEFAULT NULL,
	DOS DATETIME NULL DEFAULT NULL,
	STYPE NVARCHAR(255) NULL DEFAULT NULL,
	HMR NVARCHAR(255) NULL DEFAULT NULL,
	Report NVARCHAR(255) NULL DEFAULT NULL,
	Technician NVARCHAR(255) NULL DEFAULT NULL,
	METERIAL NVARCHAR(255) NULL DEFAULT NULL,
	CUST NVARCHAR(255) NULL DEFAULT NULL,
	recid NVARCHAR(255) NULL DEFAULT NULL,
	CDATI DATETIME NULL DEFAULT NULL,
	DIST NVARCHAR(255) NULL DEFAULT NULL,
	STATE NVARCHAR(255) NULL DEFAULT NULL,
	CCATE NVARCHAR(255) NULL DEFAULT NULL,
	MODEL NVARCHAR(255) NULL DEFAULT NULL,
	DOI DATETIME NULL DEFAULT NULL,
	DGNO NVARCHAR(255) NULL DEFAULT NULL,
	AMAKE NVARCHAR(255) NULL DEFAULT NULL,
	ALSN NVARCHAR(255) NULL DEFAULT NULL,
	BSN NVARCHAR(255) NULL DEFAULT NULL,
	CNAT NVARCHAR(255) NULL DEFAULT NULL,
	SERV NVARCHAR(255) NULL DEFAULT NULL,
	RFAIL NVARCHAR(255) NULL DEFAULT NULL,
	STA NVARCHAR(255) NULL DEFAULT NULL,
	WARR NVARCHAR(255) NULL DEFAULT NULL,
	ACTION NVARCHAR(255) NULL DEFAULT NULL,
	OEA NVARCHAR(255) NULL DEFAULT NULL,
	AMC NVARCHAR(255) NULL DEFAULT NULL,
	TTR NVARCHAR(255) NULL DEFAULT NULL,
	SLA NVARCHAR(255) NULL DEFAULT NULL,
	TSLOT NVARCHAR(255) NULL DEFAULT NULL,
	RESLA NVARCHAR(255) NULL DEFAULT NULL,
	KVA NVARCHAR(255) NULL DEFAULT NULL,
	SSTA NVARCHAR(255) NULL DEFAULT NULL,
	DPCODE NVARCHAR(255) NULL DEFAULT NULL,
	lmodi NVARCHAR(255) NULL DEFAULT NULL,
	AEDT NVARCHAR(255) NULL DEFAULT NULL,
	REM NVARCHAR(255) NULL DEFAULT NULL
)
";
$sql5 = "CREATE TABLE IF NOT EXISTS BILLs (
	BILLID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	BID NVARCHAR(255) NULL DEFAULT NULL,
	BILL_NO NVARCHAR(255) NULL DEFAULT NULL,
	BDATE DATETIME NULL DEFAULT NULL,
	DNAME NVARCHAR(255) NULL DEFAULT NULL,
	CUST NVARCHAR(255) NULL DEFAULT NULL,
	PART_NO NVARCHAR(255) NOT NULL,
	PARTI NVARCHAR(255) NULL DEFAULT NULL,
	QTY NVARCHAR(255) NOT NULL,
	MRP NVARCHAR(255) NULL DEFAULT NULL,
	SPRICE NVARCHAR(255) NULL DEFAULT NULL,
	TOTAL NVARCHAR(255) NULL DEFAULT NULL,
	TAX NVARCHAR(255) NULL DEFAULT NULL,
	TVAL NVARCHAR(255) NULL DEFAULT NULL,
	STOT NVARCHAR(255) NULL DEFAULT NULL,
	CMP NVARCHAR(255) NULL DEFAULT NULL,
	UNIT NVARCHAR(255) NULL DEFAULT NULL,
	USER1 NVARCHAR(255) NULL DEFAULT NULL,
	MODE NVARCHAR(255) NULL DEFAULT NULL,
	SSTA NVARCHAR(255) NULL DEFAULT NULL,
	DPCODE NVARCHAR(255) NULL DEFAULT NULL,
	LMODI NVARCHAR(255) NULL DEFAULT NULL,
	AEDT NVARCHAR(255) NULL DEFAULT NULL,
	BAMT DECIMAL(18,2) NULL DEFAULT NULL,
	SID NVARCHAR(255) NULL DEFAULT NULL,
	ENS NVARCHAR(255) NULL DEFAULT NULL,
	JOB NVARCHAR(255) NULL DEFAULT NULL,
	TECH NVARCHAR(255) NULL DEFAULT NULL,
	POSE NVARCHAR(255) NULL DEFAULT NULL
)";

$sql6 ="CREATE TABLE IF NOT EXISTS BILL1 (
	BID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	BDATE DATETIME NOT NULL,
	BNO NVARCHAR(255) NOT NULL,
	CUST NVARCHAR(255) NULL DEFAULT NULL,
	SNAME NVARCHAR(255) NULL DEFAULT NULL,
	GTOT DECIMAL(18,2) NULL DEFAULT NULL,
	TOTAL DECIMAL(18,2) NULL DEFAULT NULL,
	PAYMENT DECIMAL(18,2) NULL DEFAULT NULL,
	SECTOR NVARCHAR(255) NULL DEFAULT NULL,
	ADDRESS NVARCHAR(255) NULL DEFAULT NULL,
	ROUND DECIMAL(18,2) NULL DEFAULT NULL,
	NTOT DECIMAL(18,2) NULL DEFAULT NULL,
	TVAL DECIMAL(18,2) NULL DEFAULT NULL,
	USER1 NVARCHAR(255) NULL DEFAULT NULL,
	MODE NVARCHAR(255) NULL DEFAULT NULL,
	VNO NVARCHAR(255) NULL DEFAULT NULL,
	CBILL DECIMAL(18,2) NULL DEFAULT NULL,
	BAPAY DECIMAL(18,2) NULL DEFAULT NULL,
	BST NVARCHAR(255) NULL DEFAULT NULL,
	SSTA NVARCHAR(255) NULL DEFAULT NULL,
	DPCODE NVARCHAR(255) NULL DEFAULT NULL,
	LMODI NVARCHAR(255) NULL DEFAULT NULL,
	BID1 NVARCHAR(255) NULL DEFAULT NULL,
	AEDT NVARCHAR(255) NULL DEFAULT NULL,
	BAMT DECIMAL(18,2) NULL DEFAULT NULL,
	SID NVARCHAR(255) NULL DEFAULT NULL,
	ENS NVARCHAR(255) NULL DEFAULT NULL,
	JOB NVARCHAR(255) NULL DEFAULT NULL,
	TECH NVARCHAR(255) NULL DEFAULT NULL,
	PNO NVARCHAR(255) NULL DEFAULT NULL,
	PDATE NVARCHAR(255) NULL DEFAULT NULL,
	QNO NVARCHAR(255) NULL DEFAULT NULL,
	QDATE NVARCHAR(255) NULL DEFAULT NULL,
	CN NVARCHAR(255) NULL DEFAULT NULL,
	RDATE DATE NOT NULL,
	TRANS NVARCHAR(255) NULL DEFAULT NULL,
	WKEY NVARCHAR(255) NULL DEFAULT NULL,
	WBNO NVARCHAR(255) NULL DEFAULT NULL,
	POSE NVARCHAR(255) NULL DEFAULT NULL
	)";
	
$sql7 ="CREATE TABLE IF NOT EXISTS PUR1 (
	BID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	BDATE DATETIME NOT NULL,
	BNO NVARCHAR(255) NOT NULL,
	CUST NVARCHAR(255) NULL DEFAULT NULL,
	SNAME NVARCHAR(255) NULL DEFAULT NULL,
	GTOT DECIMAL(18,2) NULL DEFAULT NULL,
	TOTAL DECIMAL(18,2) NULL DEFAULT NULL,
	PAYMENT DECIMAL(18,2) NULL DEFAULT NULL,
	SECTOR NVARCHAR(255) NULL DEFAULT NULL,
	ADDRESS NVARCHAR(255) NULL DEFAULT NULL,
	ROUND DECIMAL(18,2) NULL DEFAULT NULL,
	NTOT DECIMAL(18,2) NULL DEFAULT NULL,
	TVAL DECIMAL(18,2) NULL DEFAULT NULL,
	USER1 NVARCHAR(255) NULL DEFAULT NULL,
	MODE NVARCHAR(255) NULL DEFAULT NULL,
	VNO NVARCHAR(255) NULL DEFAULT NULL,
	CBILL DECIMAL(18,2) NULL DEFAULT NULL,
	BAPAY DECIMAL(18,2) NULL DEFAULT NULL,
	BST NVARCHAR(255) NULL DEFAULT NULL,
	SSTA NVARCHAR(255) NULL DEFAULT NULL,
	DPCODE NVARCHAR(255) NULL DEFAULT NULL,
	LMODI NVARCHAR(255) NULL DEFAULT NULL,
	RDATE DATETIME NOT NULL,
	TRANS NVARCHAR(255) NULL DEFAULT NULL,
	CN NVARCHAR(255) NULL DEFAULT NULL,
	WKEY NVARCHAR(255) NULL DEFAULT NULL,
	WBNO NVARCHAR(255) NULL DEFAULT NULL,
	BID1 NVARCHAR(255) NULL DEFAULT NULL,
	AEDT NVARCHAR(255) NULL DEFAULT NULL,
	BAMT DECIMAL(18,2) NULL DEFAULT NULL)";	
	
$sql8 = "CREATE TABLE IF NOT EXISTS PUR (
	BILLID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	BID NVARCHAR(255) NULL DEFAULT NULL,
	BILL_NO NVARCHAR(255) NULL DEFAULT NULL,
	BDATE DATETIME NULL DEFAULT NULL,
	DNAME NVARCHAR(255) NULL DEFAULT NULL,
	CUST NVARCHAR(255) NULL DEFAULT NULL,
	PART_NO NVARCHAR(255) NOT NULL,
	PARTI NVARCHAR(255) NULL DEFAULT NULL,
	QTY NVARCHAR(255) NOT NULL,
	MRP NVARCHAR(255) NULL DEFAULT NULL,
	SPRICE NVARCHAR(255) NULL DEFAULT NULL,
	TOTAL NVARCHAR(255) NULL DEFAULT NULL,
	TAX NVARCHAR(255) NULL DEFAULT NULL,
	TVAL NVARCHAR(255) NULL DEFAULT NULL,
	STOT NVARCHAR(255) NULL DEFAULT NULL,
	CMP NVARCHAR(255) NULL DEFAULT NULL,
	UNIT NVARCHAR(255) NULL DEFAULT NULL,
	USER1 NVARCHAR(255) NULL DEFAULT NULL,
	MODE NVARCHAR(255) NULL DEFAULT NULL,
	SSTA NVARCHAR(255) NULL DEFAULT NULL,
	DPCODE NVARCHAR(255) NULL DEFAULT NULL,
	LMODI NVARCHAR(255) NULL DEFAULT NULL,
	AEDT NVARCHAR(255) NULL DEFAULT NULL,
	BAMT DECIMAL(18,2) NULL DEFAULT NULL
)";

$sql9 = "CREATE TABLE IF NOT EXISTS SETT ("
      . " ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY" 
      . ", ONAME VARCHAR(255) NOT NULL"
      . ", ADDR VARCHAR(255)"
      . ", PH VARCHAR(255)"
      . ", MAIL VARCHAR(255)"
	  . ", VNO VARCHAR(255)"
	  . ", CST VARCHAR(255)"
	  . ", PAN VARCHAR(255)"
	  . ", STAX VARCHAR(255)"
      . ")";
if (mysqli_query($db1, $sql)) {
} else {
    echo "Error creating table: " . mysqli_error($sql);
}

if (mysqli_query($db1, $sql1)) {
} else {
    echo "Error creating table: " . mysqli_error($sql1);
}
if (mysqli_query($db1, $sql2)) {
} else {
    echo "Error creating table: " . mysqli_error($sql2);
}
if (mysqli_query($db1, $sql3)) {
} else {
    echo "Error creating table: " . mysqli_error($sql3);
}
if (mysqli_query($db1, $sql4)) {
} else {
    echo "Error creating table: " . mysqli_error($sql4);
}
if (mysqli_query($db1, $sql5)) {
} else {
    echo "Error creating table: " . mysqli_error($sql5);
}
if (mysqli_query($db1, $sql6)) {
} else {
    echo "Error creating table: " . mysqli_error($sql6);
}
if (mysqli_query($db1, $sql7)) {
} else {
    echo "Error creating table: " . mysqli_error($sql7);
}
if (mysqli_query($db1, $sql8)) {
} else {
    echo "Error creating table: " . mysqli_error($sql8);
}
if (mysqli_query($db1, $sql9)) {
} else {
    echo "Error creating table: " . mysqli_error($sql9);
}
mysqli_close($db1);
?>