<?php
$_SESSION["PNAME"] = "POPULATION";
require 'LAYOUT.php';
include ("connect1.php");
$sql = "SELECT * FROM MAINPOPUs";
$records = mysql_query($sql);
?>
<html>
<hr/>
<h2>List of Sites</h2>
<table class="table table-bordered table-hover table-responsive" style="font-size : smaller">
<tr>
<th nowrap bgcolor="#00ffe1">Site Id</th>
        <th nowrap bgcolor="#00ffe1">Customer</th>
        <th nowrap bgcolor="#00ffe1">Site Name</th>
        <th nowrap bgcolor="#00ffe1">Engine No</th>
        <th nowrap bgcolor="#00ffe1">Rating</th>
        <th nowrap bgcolor="#00ffe1">Phase</th>
        <th nowrap bgcolor="#00ffe1">Contact Person</th>
        <th nowrap bgcolor="#00ffe1">Ph No</th>
        <th nowrap bgcolor="#00ffe1">DT of Commissioning</th>
        <th nowrap bgcolor="#00ffe1">Current Hmr</th>
        <th nowrap bgcolor="#00ffe1">RECORD OPERATION</th>
</tr>
<?php
while ($pops = mysql_fetch_assoc($records)){
	echo "<tr>";
	echo "<td>".$pops['SID']."</td>";
	echo "<td>".$pops['CNAME']."</td>";
	echo "<td>".$pops['SNAME']."</td>";
	echo "<td>".$pops['ENS']."</td>";
	echo "<td>".$pops['RAT_PH']."</td>";
	echo "<td>".$pops['PHASE']."</td>";
	echo "<td>".$pops['CPN']."</td>";
	echo "<td>".$pops['PHNO']."</td>";
	echo "<td>".$pops['DOC']."</td>";
	echo "<td>".$pops['CHMR']."</td>";
	echo "<td></td>";
	echo "</tr>";
}
?>
</table>
<hr/>
</html>