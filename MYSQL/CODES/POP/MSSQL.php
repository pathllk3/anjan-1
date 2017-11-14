<?php
$db = parse_ini_file("set.ini");
$user = $db['suid'];
$pass = $db['spass'];
$name = $db['sdb'];
$host = $db['shost'];
$serverName = $host;
$connectionInfo = array( "Database"=>$name, "UID"=>$user, "PWD"=>$pass, "ReturnDatesAsStrings"=>true);
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
	
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>