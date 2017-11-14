<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html manifest="default.manifest">

<head>
	<title>IMAP - DEMO</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	 <meta name="apple-mobile-web-app-capable" content="yes" />
	 <meta name="apple-mobile-web-app-status-bar-style" content="black" />
	 <meta name="viewport" id="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=0.6, user-scalable=0">

    <link rel="stylesheet" href="db_demo.css" type="text/css">

</head>
<body>
<?php
$email_number =$_GET['ID'];
$mbox = imap_open("{imap.gmail.com:993/imap/ssl}INBOX", "brelcworks@gmail.com", "ratanbose")
     or die("can't connect: " . imap_last_error());

$message = imap_fetchbody($mbox,$email_number, 1);
if ($message)
{
	echo "<p>".$message."</p>";
}
else
{
	echo imap_last_error();
}
?>
</body>
</html>
