<?php
require_once '../../INCLUDES/CHK_SESS.php';
include ("../../INCLUDES/Connect.php");
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
<script>
$(document).ready(function () {
        $('INPUT[type="text"]').focus(function () {
            $(this).addClass("focus");
        });

        $('INPUT[type="text"]').blur(function () {
            $(this).removeClass("focus");
        });
});
</script>
  <div id="load_popup_modal_contant" class="" role="dialog">
  <div class="modal-dialog" style="width:100%;background-color:lightcyan">
	<form role="form" id="form_load_content_id">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
	    <div id="validation-error"></div>
  <div class="cl"></div>
	    <div class="modal-body">
		<?php
$id1 = $_POST["id1"];
$RESULT = mysqli_query($db1,"SELECT * FROM TABLE1 WHERE RID1='".$id1."'");
$pops1 = mysqli_fetch_assoc($RESULT);
?>
	<table class="table table-bordered table-hover table-responsive ui-front adn" style="font-size : smaller">
	<tr>
                    <td colspan="2">
                        <h5>DETAILS OF STOCK ITEM: <?php echo $pops1['PARTI'];?></h5>
                    </td>
                    <td>
                        <input type="button" value="Update" id="UPD" class="btn btn-primary form-control" />
                    </td>
					<td>
					<input type="button" value="Delete" id="DEL" class="btn btn-danger form-control" />
					</td>
                </tr>
            <tr>
                <td>
                    <label for="RID">RECORD NO</label>
                </td>
                <td>
				<?php echo "<input class='form-control input-xs' id='adRID' name='RID' type='text' value='".$pops1['RID']."'/>";?>
                </td>
                <td>
                    <label for="STOTAL">SELL PRICE TOTAL</label>
                </td>
                <td>
				<?php echo "<input class='form-control input-xs' id='adSTOT' name='STOTAL' type='text' value='".$pops1['STOTAL']."'/>";?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="PART_NO">PART NO</label>
                </td>
                <td>
				<?php echo "<input class='form-control input-xs' id='adPtno' name='PART_NO' type='text' value='".$pops1['PART_NO']."'/>";?>
                </td>
                <td>
                    <label for="TVAL">TAX VALUE</label>
                </td>
                <td>
				<?php echo "<input class='form-control input-xs' id='adTVAL' name='TVAL' type='text' value='".$pops1['TVAL']."'/>";?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="PARTI">PART NAME</label>
                </td>
                <td>
				<?php echo "<input class='form-control input-xs' id='adParti' name='PARTI' type='text' value='".$pops1['PARTI']."'/>";?>
                </td>
                <td>
                    <label for="TYPE">ITEM TYPE</label>
                </td>
                <td>
				<?php echo "<input class='form-control input-xs' id='adTYPE' name='TYPE' type='text' value='".$pops1['TYPE']."'/>";?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="MRP">MRP</label>
                </td>
                <td>
				<?php echo "<input class='form-control input-xs' id='adMRP' name='MRP' type='text' value='".$pops1['MRP']."'/>";?>
                </td>
                <td>
                    <label for="UNIT">UNIT</label>
                </td>
                <td>
				<?php echo "<input class='form-control input-xs' id='adUNIT' name='UNIT' type='text' value='".$pops1['UNIT']."'/>";?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="TAX">TAX RATE</label>
                </td>
                <td>
				<?php echo "<input class='form-control input-xs' id='adTAX' name='TAX' type='text' value='".$pops1['TAX']."'/>";?>
                </td>
                <td>
                    <label for="RACKNO">RACK NO</label>
                </td>
                <td>
				<?php echo "<input class='form-control input-xs' id='adRCNO' name='RACKNO' type='text' value='".$pops1['RACKNO']."'/>";?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="SPRICE">SELL PRICE</label>
                </td>
                <td>
				<?php echo "<input class='form-control input-xs' id='adSPRICE' name='SPRICE' type='text' value='".$pops1['SPRICE']."'/>";?>
                </td>

                <td>
                    <label for="EOR">EOR</label>
                </td>
                <td>
				<?php echo "<input class='form-control input-xs' id='adEOR' name='EOR' type='text' value='".$pops1['EOR']."'/>";?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="PPRICE">PURCAHSE PRICE</label>
                </td>
                <td>
				<?php echo "<input class='form-control input-xs' id='adPPRICE' name='PPRICE' type='text' value='".$pops1['PPRICE']."'/>";?>
                </td>
                <td>
                    <label for="grop">ITEM GROUP</label>
                </td>
                <td>
				<?php echo "<input class='form-control input-xs' id='adGROP' name='GROP' type='text' value='".$pops1['GROP']."'/>";?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="QTY">QTY</label>
                </td>
                <td>
				<?php echo "<input class='form-control input-xs' id='adQTY' name='QTY' type='text' value='".$pops1['QTY']."'/>";?>
                </td>
                <td>
                    <label for="DPCODE">DEALER CODE</label>
                </td>
                <td>
				<?php echo "<input class='form-control input-xs' id='adDPCODE' name='DPCODE' type='text' value='".$pops1['DPCODE']."'/>";?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="TOTAL">ITEM TOTAL</label>
                </td>
                <td>
				<?php echo "<input class='form-control input-xs' id='adTOTAL' name='TOTAL' type='text' value='".$pops1['TOTAL']."'/>";?>
                </td>
                <td>
                    <label for="USER1">USER NAME</label>
                </td>
                <td>
				<?php echo "<input class='form-control input-xs' id='adUSER' name='USER1' type='text' value='".$pops1['USER1']."'/>";?>
                </td>
            </tr>
            <tr>
                <td colspan="4">
					<?php echo "<input id='adLMODI' name='lmodi' type='hidden' value='".$pops1['lmodi']."'/>";?>
                    <?php echo "<input id='adSSTA' name='SSTA' type='hidden' value='".$pops1['SSTA']."'/>";?>
                    <?php echo "<input id='adAEDT' name='AEDT' type='hidden' value='".$pops1['AEDT']."'/>";?>
                    <?php echo "<input id='BIDtst2' name='RID1' type='hidden' value='".$pops1['RID1']."'/>";?>
                </td>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
	  </form>
      </div>
    </div>
  </div>
  </div>
  <script>
$(function () {
	$("#UPD").click(function () {
		var RID = $('#adRID').val();
                       var TYPE = $('#adTYPE').val();
                       var PART_NO = $('#adPtno').val();
                       var PARTI = $('#adParti').val();
                       var MRP = $('#adMRP').val();
                       var QTY = $('#adQTY').val();
                       var TOTAL = $('#adTOTAL').val();
                       var RACKNO = $('#adRCNO').val();
                       var TAX = $('#adTAX').val();
                       var TVAL = $('#adTVAL').val();
                       var STOTAL = $('#adSTOT').val();
                       var PPRICE = $('#adPPRICE').val();
                       var UNIT = $('#adUNIT').val();
                       var SPRICE = $('#adSPRICE').val();
                       var SSTA = $('#adSSTA').val();
                       var EOR = $('#adEOR').val();
                       var DPCODE = $('#adDPCODE').val();
                       var lmodi = $('#adLMODI').val();
                       var grop = $('#adGROP').val();
                       var AEDT = $('#adAEDT').val();
                       var USER1 = $('#adUSER').val();
					   var RID1 = $("#BIDtst2").val();
					   var dataString = 'RID1='+ RID1 + '&TYPE='+ TYPE + '&PART_NO='+ PART_NO + '&PARTI='+ PARTI + '&MRP='+ MRP + '&QTY='+ QTY + '&TOTAL='+ TOTAL + '&RACKNO='+ RACKNO + '&TAX='+ TAX + '&TVAL='+ TVAL + '&STOTAL='+ STOTAL + '&PPRICE='+ PPRICE + '&UNIT='+ UNIT + '&SPRICE='+ SPRICE + '&SSTA='+ SSTA + '&EOR='+ EOR + '&DPCODE='+ DPCODE + '&lmodi='+ lmodi + '&AEDT='+ AEDT + '&GROP='+ grop + '&USER1='+ USER1 + '&RID='+ RID;
					   $.ajax({
                        url: "CODES/STOCK/STC_UPD.php",
                        type: "POST",
                        data: dataString,
                        cache: false,
                        success: function (data) {
							window.location.href = "ST_LIST.php";
                        },
                        error: function (response) {
                            alert(response.status + " " + response.responseText);
                        }
                    });
	});
	$("#DEL").click(function () {
		window.location.href = "CODES/STOCK/DEL_STC.php?aData=" + $("#BIDtst2").val();
	});
});
</script>