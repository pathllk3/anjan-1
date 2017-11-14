<?php
include ("MSSQL.php");
$sql = "SELECT * FROM MAINPOPUs";
$records = sqlsrv_query($conn, $sql);
?>
  <div id="load_popup_modal_contant" class="" role="dialog">
  <div class="modal-dialog" style="width:80%;background-color:lightcyan">
	<form role="form" class="form-inline" role="form" id="form_load_content_id">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Show Popup Title Here</h4>
      </div>
	    <div id="validation-error"></div>
  <div class="cl"></div>
	    <div class="modal-body">
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
while ($pops = sqlsrv_fetch_array( $records, SQLSRV_FETCH_ASSOC)){
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
      </div>
      <div class="modal-footer">

	  <input name="submit_popup" id="submit_popup" type="button" value="SUBMIT" class="btn btn-primary" />
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  </form>
      </div>
    </div>
  </div>
  </div>