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
set_time_limit(4000); 
$mbox = imap_open("{imap.gmail.com:993/imap/ssl}INBOX", "brelcworks@gmail.com", "ratanbose")
     or die("can't connect: " . imap_last_error());
$m = new MongoClient();
   $db = $m->selectDB('appharbor_9spxvctt');
   $SHEET1= $db->IMAP_INBOX;
   
$MC = imap_check($mbox);

// Fetch an overview for all messages in INBOX
$result = imap_fetch_overview($mbox,"1:{$MC->Nmsgs}",0);
?>
<table id='tbl1' border="1">
<th nowrap bgcolor="#00ffe1">MSG NO</th>
        <th nowrap bgcolor="#00ffe1">DATE</th>
        <th nowrap bgcolor="#00ffe1">FROM</th>
        <th nowrap bgcolor="#00ffe1">SUBJECT</th>
</tr>
<?php
foreach ($result as $overview) {
	$email_number = $overview->msgno;
	$message = imap_fetchbody($mbox,$email_number, 1);
	$DOC =array(
"MSGNO" => $overview->msgno,
"DATE" => $overview->date,
"FROM" => $overview->from,
"TO" => $overview->to,
"CC" => $overview->cc,
"BCC" => $overview->bcc,
"SUB" => $overview->subject,
"BODY" => $message
);
$SHEET1->insert($DOC);
	echo "<tr>";
		echo "<td nowrap>".$overview->msgno."</td>";
		echo "<td nowrap>".$overview->date."</td>";
		echo "<td nowrap>".$overview->from."</td>";
		echo "<td nowrap><a href='GT_BODY.php?ID=".$overview->msgno."'>".$overview->subject."</a></td>";
		echo "</tr>";
}
imap_close($mbox);
?>
 </table>
</body>
</html>
