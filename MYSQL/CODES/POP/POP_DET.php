<?php
include ("MSSQL.php");
$sql = "SELECT * FROM MAINPOPUs";
$records = sqlsrv_query($conn, $sql);
?>
<style type="text/css">
    .input-xs {
        height: 22px;
        padding: 2px 5px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
    }

    .focus {
        border: 2px solid red;
        background-color: #FEFED5;
    }

    .custom-date-style {
        background-color: red !important;
    }
</style>
  <div id="load_popup_modal_contant" class="" role="dialog">
  <div class="modal-dialog" style="width:100%;background-color:lightcyan">
	<form role="form" id="form_load_content_id">
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
<?php
$id1 = $_POST["id1"];
$RESULT = sqlsrv_query($conn, "SELECT * FROM MAINPOPUs WHERE RID='".$id1."'");
$pops1 = sqlsrv_fetch_array( $RESULT, SQLSRV_FETCH_ASSOC);
?>
<table class="table table-bordered table-hover table-responsive" style="font-size : smaller">
            <tr>
                <td><label for="RID1">RECORD NO</label></td>
                <td class="form-inline">
				<?php 
				echo "<input class='form-control input-xs' id='txtRID1' name='RID1' type='text' value='".$pops1['RID1']."'/>";
				echo "<input class='form-control input-xs' id='txtRID' name='RID1' type='text' value='".$pops1['RID']."'/>";
				?>
                    <span class="field-validation-valid" data-valmsg-for="RID1" data-valmsg-replace="true"></span>
                </td>
                <td><label for="RAT_PH">RATING</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtRATPH' name='RAT_PH' type='text' value='".$pops1['RAT_PH']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="RAT_PH" data-valmsg-replace="true"></span>
                </td>
                <td><label for="cntype">CONTROLLER TYPE</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtCNTYPE' name='cntype' type='text' value='".$pops1['cntype']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="cntype" data-valmsg-replace="true"></span>
                </td>
            </tr>
            <tr>
                <td><label for="CNAME">CUSTOMER NAME</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtCNAME' name='CNAME' type='text' value='".$pops1['CNAME']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="CNAME" data-valmsg-replace="true"></span>
                </td>
                <td><label for="PHASE">PHASE</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtPHASE' name='PHASE' type='text' style='text-transform:uppercase' value='".$pops1['PHASE']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="PHASE" data-valmsg-replace="true"></span>
                </td>
                <td><label for="cnmake">CONTROLLER MAKE</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtCNMAKE' name='cnmake' type='text' style='text-transform:uppercase' value='".$pops1['cnmake']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="cnmake" data-valmsg-replace="true"></span>
                </td>
            </tr>
            <tr>
                <td><label for="SNAME">SITE NAME</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtSNAME' name='SNAME' type='text' style='text-transform:uppercase' value='".$pops1['SNAME']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="SNAME" data-valmsg-replace="true"></span>
                </td>
                <td><label for="MODEL">ENGINE MODEL NO</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtMODEL' name='MODEL' type='text' style='text-transform:uppercase' value='".$pops1['MODEL']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="MODEL" data-valmsg-replace="true"></span>
                </td>
                <td><label for="sauto">SITE AUTOMATION</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtSAUTO' name='sauto' type='text' style='text-transform:uppercase' value='".$pops1['sauto']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="sauto" data-valmsg-replace="true"></span>
                </td>
            </tr>
            <tr>
                <td><label for="SID">SITE ID</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtSID' name='SID' type='text' style='text-transform:uppercase' value='".$pops1['SID']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="SID" data-valmsg-replace="true"></span>
                </td>
                <td><label for="ENS">ENGINE SR. NO</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtENS' name='ENS' type='text' style='text-transform:uppercase' value='".$pops1['ENS']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="ENS" data-valmsg-replace="true"></span>
                </td>
                <td><label for="CHMR">CURRENT HMR</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtCHMR' name='CHMR' type='text' style='text-transform:uppercase' value='".$pops1['CHMR']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="CHMR" data-valmsg-replace="true"></span>
                </td>
            </tr>
            <tr>
                <td><label for="ADDR">SITE ADDRESS</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtADDR' name='ADDR' type='text' style='text-transform:uppercase' value='".$pops1['ADDR']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="ADDR" data-valmsg-replace="true"></span>
                </td>
                <td><label for="DGNO">DG SET NO</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtDGNO' name='DGNO' type='text' style='text-transform:uppercase' value='".$pops1['DGNO']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="DGNO" data-valmsg-replace="true"></span>
                </td>
                <td><label for="CHMD">CURRENT HMR ON DATE</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtCHMD' name='CHMD' type='text' style='text-transform:uppercase' value='".$pops1['CHMD']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="CHMD" data-valmsg-replace="true"></span>
                </td>
            </tr>
            <tr>
                <td><label for="DIST">DISTRICT NAME</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtDIST' name='DIST' type='text' style='text-transform:uppercase' value='".$pops1['DIST']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="DIST" data-valmsg-replace="true"></span>
                </td>
                <td><label for="AMAKE">ALTERNATOR MAKE</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtAMKE' name='AMAKE' type='text' style='text-transform:uppercase' value='".$pops1['AMAKE']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="AMAKE" data-valmsg-replace="true"></span>
                </td>
                <td><label for="lhmr">LAST SERVICE HMR</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtLHMR' name='lhmr' type='text' style='text-transform:uppercase' value='".$pops1['lhmr']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="lhmr" data-valmsg-replace="true"></span>
                </td>
            </tr>
            <tr>
                <td><label for="STATE">STATE NAME</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtSTATE' name='STATE' type='text' style='text-transform:uppercase' value='".$pops1['STATE']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="STATE" data-valmsg-replace="true"></span>
                </td>
                <td><label for="ALSN">ALT. SR. NO</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtALSN' name='ALSN' type='text' style='text-transform:uppercase' value='".$pops1['ALSN']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="ALSN" data-valmsg-replace="true"></span>
                </td>
                <td><label for="lsd">LAST SERVICE DATE</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtLSD' name='lsd' type='text' style='text-transform:uppercase' value='".$pops1['lsd']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="lsd" data-valmsg-replace="true"></span>
                </td>
            </tr>
            <tr>
                <td><label for="CPN">SITE CONTACT PERSON</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtCPN' name='CPN' type='text' style='text-transform:uppercase' value='".$pops1['CPN']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="CPN" data-valmsg-replace="true"></span>
                </td>
                <td><label for="FRAME">ALTERNATOR FRAME</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtFRAME' name='FRAME' type='text' style='text-transform:uppercase' value='".$pops1['FRAME']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="FRAME" data-valmsg-replace="true"></span>
                </td>
                <td><label for="nsd">NEXT SERVICE DATE</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtNSD' name='nsd' type='text' style='text-transform:uppercase' value='".$pops1['nsd']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="nsd" data-valmsg-replace="true"></span>
                </td>
            </tr>
            <tr>
                <td><label for="PHNO">CONTACT NO</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtPHNO' name='PHNO' type='text' style='text-transform:uppercase' value='".$pops1['PHNO']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="PHNO" data-valmsg-replace="true"></span>
                </td>
                <td><label for="BSN">BATTERY SR. NO</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtBSN' name='BSN' type='text' style='text-transform:uppercase' value='".$pops1['BSN']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="BSN" data-valmsg-replace="true"></span>
                </td>
                <td><label for="SPIN">TECHNICIAN NAME</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtSPIN' name='SPIN' type='text' style='text-transform:uppercase' value='".$pops1['SPIN']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="SPIN" data-valmsg-replace="true"></span>
                </td>
            </tr>
            <tr>
                <td><label for="OEA">OEA NAME</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtOEA' name='OEA' type='text' style='text-transform:uppercase' value='".$pops1['OEA']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="OEA" data-valmsg-replace="true"></span>
                </td>
                <td><label for="llop">LLOP MAKE</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtLLOP' name='llop' type='text' style='text-transform:uppercase' value='".$pops1['llop']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="llop" data-valmsg-replace="true"></span>
                </td>
                <td><label for="hmage">HMR AGEGING</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtHMAGE' name='hmage' type='text' style='text-transform:uppercase' value='".$pops1['hmage']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="hmage" data-valmsg-replace="true"></span>
                </td>
            </tr>
            <tr>
                <td><label for="DOC">DT. OF COMMISSIONING</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtDOC' name='DOC' type='text' style='text-transform:uppercase' value='".$pops1['DOC']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="DOC" data-valmsg-replace="true"></span>
                </td>
                <td><label for="solenoid">SOLENOID MAKE</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtSOLENOID' name='solenoid' type='text' style='text-transform:uppercase' value='".$pops1['solenoid']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="solenoid" data-valmsg-replace="true"></span>
                </td>
                <td><label for="ahm">AVG. HMR</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtAHM' name='ahm' type='text' style='text-transform:uppercase' value='".$pops1['ahm']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="ahm" data-valmsg-replace="true"></span>
                </td>
            </tr>
            <tr>
                <td><label for="AMC">DG SET AMC STATUS</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtAMC' name='AMC' type='text' style='text-transform:uppercase' value='".$pops1['AMC']."'/>"; ?>
                    <span class="field-validation-valid" data-valmsg-for="AMC" data-valmsg-replace="true"></span>
                </td>
                <td><label for="chalt">CHARGING ALT. MAKE</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtCHALT' name='chalt' type='text' style='text-transform:uppercase' value='".$pops1['chalt']."'/>"; ?>
                </td>
                <td><label for="DSTA">DG SET STATUS</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtDSTA' name='DSTA' type='text' style='text-transform:uppercase' value='".$pops1['DSTA']."'/>"; ?>
                </td>
            </tr>
            <tr>
                <td><label for="WARR">WARRANTY STATUS</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtWARR' name='WARR' type='text' style='text-transform:uppercase' value='".$pops1['WARR']."'/>"; ?>
                </td>
                <td><label for="starter">STARTER MAKE</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtSTARTER' name='starter' type='text' style='text-transform:uppercase' value='".$pops1['starter']."'/>"; ?>
                </td>
                <td><label for="ACTION">LAST ACTION</label></td>
                <td>
				<?php echo "<input class='form-control input-xs' id='txtACTION' name='ACTION' type='text' style='text-transform:uppercase' value='".$pops1['ACTION']."'/>"; ?>
                </td>
            </tr>
            <tr>
                <td colspan="6">
				<?php echo "<input id='txtSSTA' name='SSTA' type='hidden' value='".$pops1['SSTA']."'/>"; ?>
                    <input id="txtSSTA" name="SSTA" type="hidden" value="" />
                    <input id="txtDPCODE" name="DPCODE" type="hidden" value="" />
                    <input id="txtLMODI" name="lmodi" type="hidden" value="" />
                    <input id="txtAEDT" name="AEDT" type="hidden" value="" />
                </td>
            </tr>
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