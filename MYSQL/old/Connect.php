<?php
$db = parse_ini_file("set.ini");
$user = $db['user'];
$pass = $db['pass'];
$name = $db['name'];
$host = $db['host'];
$type = $db['type'];

$db1 = mysqli_connect($host, $user, $pass, $name);
if($db1) {
	mysql_select_db($name);
}
else {
	echo mysql_error();
}
?>