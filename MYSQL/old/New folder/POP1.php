<?php
$_SESSION["PNAME"] = "POPULATION";
require 'LAYOUT.php';
include ("MSSQL.php");
$sql = "SELECT * FROM MAINPOPUs";
$records = sqlsrv_query( $conn, $sql );
?>
<html>
<hr/>
<div style="font-size : smaller; width:98%; margin-left:1%">
<h4>LIST OF SITES</h4>
<table class="table table-bordered table-hover table-responsive">
<tr>
<th nowrap bgcolor="#00ffe1">Site Id</th>
        <th nowrap bgcolor="#00ffe1">Customer</th>
        <th nowrap bgcolor="#00ffe1">Site Name</th>
        <th nowrap bgcolor="#00ffe1">Engine No</th>
        <th nowrap bgcolor="#00ffe1">Rating</th>
        <th nowrap bgcolor="#00ffe1">Phase</th>
        <th nowrap bgcolor="#00ffe1">Contact Person</th>
        <th nowrap bgcolor="#00ffe1">Ph No</th>
        <th nowrap bgcolor="#00ffe1">DT. OF COMM.</th>
        <th nowrap bgcolor="#00ffe1">Current Hmr</th>
        <th nowrap bgcolor="#00ffe1">RECORD OPERATION</th>
</tr>
<?php
while ($pops = sqlsrv_fetch_array( $records, SQLSRV_FETCH_ASSOC)){
	echo "<tr>";
	echo "<td nowrap>".$pops['SID']."</td>";
	echo "<td nowrap>".$pops['CNAME']."</td>";
	echo "<td nowrap>".$pops['SNAME']."</td>";
	echo "<td nowrap>".$pops['ENS']."</td>";
	echo "<td nowrap>".$pops['RAT_PH']."</td>";
	echo "<td nowrap>".$pops['PHASE']."</td>";
	echo "<td nowrap>".$pops['CPN']."</td>";
	echo "<td nowrap>".$pops['PHNO']."</td>";
	echo "<td nowrap>".$pops['DOC']."</td>";
	echo "<td nowrap>".$pops['CHMR']."</td>";
	echo "<td></td>";
	echo "</tr>";
}
?>
</table>
</div>
<hr/>
</html>