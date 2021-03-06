<?php
$_SESSION["PNAME"] = "POPULATION";
require '../../LAYOUT.php';
?>
<html>
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
<div id="grid1"></div>
<hr />
<table class="table table-hover table-bordered table-responsive ui-front" style="font-size:x-small;">
            <tr>
                <td><label for="BNO">RECORD NO</label></td>
                <td><input class="form-control input-xs" id="txtBNO" name="BNO" style="text-transform:uppercase" type="text" value="" /></td>
				<td><label for="BDATE">BILL DATE</label></td>
                <td><input class="form-control input-xs" id="txtBDATE" name="BDATE" style="text-transform:uppercase" type="text" value="" /></td>
                <td><label for="GTOT">RECORD NO</label></td>
                <td><input class="form-control input-xs" id="txtGTOT" name="GTOT" style="text-transform:uppercase" type="text" value="" /></td>
				<td><label for="TVAL">RECORD NO</label></td>
                <td><input class="form-control input-xs" id="txtTVAL" name="TVAL" style="text-transform:uppercase" type="text" value="" /></td>
            </tr>
            <tr>
				<td><label for="CUST">RECORD NO</label></td>
                <td><input class="form-control input-xs" id="txtCUST" name="CUST" style="text-transform:uppercase" type="text" value="" /></td>
				<td><label for="SNAME">RECORD NO</label></td>
                <td><input class="form-control input-xs" id="txtSNAME" name="SNAME" style="text-transform:uppercase" type="text" value="" /></td>
				<td><label for="ROUND">RECORD NO</label></td>
                <td><input class="form-control input-xs" id="txtROUND" name="ROUND" style="text-transform:uppercase" type="text" value="" /></td>
				<td><label for="BAMT">RECORD NO</label></td>
                <td><input class="form-control input-xs" id="txtBAMT" name="BAMT" style="text-transform:uppercase" type="text" value="" /></td>
            </tr>
            <tr>
			<td><label for="ADDRESS">RECORD NO</label></td>
                <td><input class="form-control input-xs" id="txtADDRESS" name="ADDRESS" style="text-transform:uppercase" type="text" value="" /></td>
                <td><label for="VNO">RECORD NO</label></td>
                <td><input class="form-control input-xs" id="txtVNO" name="VNO" style="text-transform:uppercase" type="text" value="" /></td>
                <td><label for="MODE">RECORD NO</label></td>
                <td><input class="form-control input-xs" id="txtMODE" name="MODE" style="text-transform:uppercase" type="text" value="" /></td>
                <td><label for="TOTAL">RECORD NO</label></td>
                <td><input class="form-control input-xs" id="txtTOTAL" name="TOTAL" style="text-transform:uppercase" type="text" value="" /></td>
            </tr>
            <tr>
                <td colspan="8">
					<input id="txtPAYMENT" name="PAYMENT" type="hidden" value="" />
                    <input id="txtSECTOR" name="SECTOR" type="hidden" value="" />
                    <input id="txtUSER1" name="USER1" type="hidden" value="" />
                    <input id="txtCBILL" name="CBILL" type="hidden" value="" />
                    <input id="txtBAPAY" name="BAPAY" type="hidden" value="" />
                    <input id="txtBST" name="BST" type="hidden" value="" />
                    <input id="txtSSTA" name="SSTA" type="hidden" value="" />
                    <input id="txtDPCODE" name="DPCODE" type="hidden" value="" />
                    <input id="txtLMODI" name="LMODI" type="hidden" value="" />
                    <input id="txtBID1" name="BID1" type="hidden" value="" />
                    <input id="txtAEDT" name="AEDT" type="hidden" value="" />
                    <input id="txtNTOT" name="NTOT" type="hidden" value="" />
                    <input id="txtBID" name="BID" type="hidden" value="" />
                </td>
            </tr>
        </table>
<input id="NBILL" value="New Bill" type="button" style='margin-left: 5px;' />
<input id="REFBILL" value="Refresh" type="button" style='margin-left: 5px;' />
<input id="UPDBILL" value="Update Bill" type="button" style='margin-left: 5px;' />
<input id="PRINTBILL" value="Print" type="button" style='margin-left: 5px;' />
<input id="BILLPRINT1" value="Print" type="button" style='margin-left: 5px;' />
<div id="BILLPRINT">
    <div>ADD NEW ITEM</div>
    <div style="overflow: hidden auto;">

    </div>
</div>
<div id="popupWindow">
    <div>ADD NEW ITEM</div>
    <div style="overflow: hidden;">
        <table class="table table-hover table-bordered ui-front">
            <tr>
                <td><label for="txtBNO1">BILL NO:</label></td>
                <td align="left" colspan="3"><input id="txtBNO1" type="text" class="form-control input-xs" /></td>
            </tr>
            <tr>
                <td><label for="txtPTNO">PART NO:</label></td>
                <td align="left"><input id="txtPTNO" type="text" class="form-control input-xs" /></td>
                <td><label for="txtQTY">QUANTITY:</label></td>
                <td align="left"><input id="txtQTY" type="text" class="form-control input-xs" /></td>
            </tr>
            <tr>
                <td><label for="txtPTNAME">PART NAME:</label></td>
                <td align="left"><input id="txtPTNAME" type="text" class="form-control input-xs" /></td>
                <td><label for="txtTVAL1">TAX VALUE:</label></td>
                <td align="left"><input id="txtTVAL1" type="text" class="form-control input-xs" /></td>
            </tr>
            <tr>
                <td><label for="txtMRP">MRP:</label></td>
                <td align="left"><input id="txtMRP" type="text" class="form-control input-xs" /></td>
                <td><label for="txtTOT">ITEM TOTAL:</label></td>
                <td align="left"><input id="txtTOT" type="text" class="form-control input-xs" /></td>
            </tr>
            <tr>
                <td><label for="txtSPRICE">SELL PRICE:</label></td>
                <td align="left"><input id="txtSPRICE" type="text" class="form-control input-xs" /></td>
                <td><label for="txtSTC">IN STOCK:</label></td>
                <td align="left"><input id="txtSTC" type="text" class="form-control input-xs" /></td>
            </tr>
            <tr>
                <td><label for="txtTRATE">TAX RATE:</label></td>
                <td align="left"><input id="txtTRATE" type="text" class="form-control input-xs" /></td>
                <td><label for="txtUNIT">UNIT:</label></td>
                <td align="left"><input id="txtUNIT" type="text" class="form-control input-xs" /></td>
            </tr>
            <tr>
                <td colspan="4">
                    <input type="hidden" id="qinc" />
                    <input type="hidden" id="STRID1" />
                    <input type="hidden" id="STRID" />
                    <input type="hidden" id="STTYPE" />
                    <input type="hidden" id="STPART_NO" />
                    <input type="hidden" id="STPARTI" />
                    <input type="hidden" id="STMRP" />
                    <input type="hidden" id="STQTY" />
                    <input type="hidden" id="STTOTAL" />
                    <input type="hidden" id="STRACKNO" />
                    <input type="hidden" id="STTAX" />
                    <input type="hidden" id="STTVAL" />
                    <input type="hidden" id="STSTOTAL" />
                    <input type="hidden" id="STPPRICE" />
                    <input type="hidden" id="STUNIT" />
                    <input type="hidden" id="STSPRICE" />
                    <input type="hidden" id="STSSTA" />
                    <input type="hidden" id="STEOR" />
                    <input type="hidden" id="STDPCODE" />
                    <input type="hidden" id="STLMODI" />
                    <input type="hidden" id="STGROP" />
                    <input type="hidden" id="STAEDT" />
                    <input type="hidden" id="STUSER1" />
                    <input type="hidden" id="txtSTOT" />
                </td>
            </tr>
            <tr>
                <td style="padding-top: 10px;" align="right" colspan="4"><input style="margin-right: 5px;" type="button" id="Save" value="Save" /><input id="Cancel" type="button" value="Cancel" style="margin-right: 5px;" /><input id="adnstc" type="button" value="Add New Stock" /></td>
            </tr>
        </table>
    </div>
</div>

<div id="popupWindow1">
    <div>UPDATE ITEM</div>
    <div style="overflow: hidden;">
        <table class="table table-hover table-bordered ui-front">
            <tr>
                <td><label for="txtBNO11">BILL NO:</label></td>
                <td align="left" colspan="3"><input id="txtBNO11" type="text" class="form-control input-xs" readonly /></td>
            </tr>
            <tr>
                <td><label for="txtPTNO1">PART NO:</label></td>
                <td align="left"><input id="txtPTNO1" type="text" class="form-control input-xs" readonly /></td>
                <td><label for="txtQTY1">QUANTITY:</label></td>
                <td align="left"><input id="txtQTY1" type="text" class="form-control input-xs" /></td>
            </tr>
            <tr>
                <td><label for="txtPTNAME1">PART NAME:</label></td>
                <td align="left"><input id="txtPTNAME1" type="text" class="form-control input-xs" readonly /></td>
                <td><label for="txtTVAL11">TAX VALUE:</label></td>
                <td align="left"><input id="txtTVAL11" type="text" class="form-control input-xs" readonly /></td>
            </tr>
            <tr>
                <td><label for="txtMRP1">MRP:</label></td>
                <td align="left"><input id="txtMRP1" type="text" class="form-control input-xs" /></td>
                <td><label for="txtTOT1">ITEM TOTAL:</label></td>
                <td align="left"><input id="txtTOT1" type="text" class="form-control input-xs" /></td>
            </tr>
            <tr>
                <td><label for="txtSPRICE1">SELL PRICE:</label></td>
                <td align="left"><input id="txtSPRICE1" type="text" class="form-control input-xs" /></td>
                <td><label for="txtSTC1">IN STOCK:</label></td>
                <td align="left"><input id="txtSTC1" type="text" class="form-control input-xs" readonly /></td>
            </tr>
            <tr>
                <td><label for="txtTRATE1">TAX RATE:</label></td>
                <td align="left"><input id="txtTRATE1" type="text" class="form-control input-xs" /></td>
                <td><label for="txtUNIT1">UNIT:</label></td>
                <td align="left"><input id="txtUNIT1" type="text" class="form-control input-xs" /></td>
            </tr>
            <tr>
                <td colspan="4">
                    <input type="hidden" id="BILLID-TXT" />
                    <input type="hidden" id="BID-TXT" />
                    <input type="hidden" id="qinc1" />
                    <input type="hidden" id="STRID11" />
                    <input type="hidden" id="STRID1" />
                    <input type="hidden" id="STTYPE1" />
                    <input type="hidden" id="STPART_NO1" />
                    <input type="hidden" id="STPARTI1" />
                    <input type="hidden" id="STMRP1" />
                    <input type="hidden" id="STQTY1" />
                    <input type="hidden" id="STTOTAL1" />
                    <input type="hidden" id="STRACKNO1" />
                    <input type="hidden" id="STTAX1" />
                    <input type="hidden" id="STTVAL1" />
                    <input type="hidden" id="STSTOTAL1" />
                    <input type="hidden" id="STPPRICE1" />
                    <input type="hidden" id="STUNIT1" />
                    <input type="hidden" id="STSPRICE1" />
                    <input type="hidden" id="STSSTA1" />
                    <input type="hidden" id="STEOR1" />
                    <input type="hidden" id="STDPCODE1" />
                    <input type="hidden" id="STLMODI1" />
                    <input type="hidden" id="STGROP1" />
                    <input type="hidden" id="STAEDT1" />
                    <input type="hidden" id="STUSER11" />
                    <input type="hidden" id="txtSTOT1" />
                    <input type="hidden" id="txtTOT2" />
                    <input type="hidden" id="OSTC" />
                </td>
            </tr>
            <tr>
                <td style="padding-top: 10px;" align="right" colspan="4"><input style="margin-right: 5px;" type="button" id="Save1" value="Save" /><input id="Cancel1" style="margin-right: 5px;" type="button" value="Cancel" /><input id="btnDEL" style="margin-right: 5px;" type="button" value="Delete" /><input id="btnDEL1" type="button" value="Delete" style="margin-right: 5px;" /><input id="adnstc1" type="button" value="Add New Stock" /></td>
            </tr>
        </table>
    </div>
</div>


<div id="VIEWBILL">
    <div>INVOICE LIST</div>
    <div style="overflow: hidden;font-size:x-small">
        <div id="grid"></div>
        <input id="Cancel2" type="button" value="Cancel" />
    </div>
</div>

<div id="CHALLAN">
    <div>PRINT</div>
    <div style="overflow: hidden;">
        <div class="navbar-form">
            <table class="table table-bordered table-hover table-responsive" style="overflow:auto">
                <tr>
                    <td align="center">
                        <form method="post" action="/BILL/PRINTCHALLAN">
                            <input type="hidden" id="txtBNOH" placeholder="BILL NO" class="form-control" name="BNO" />
                            <input type="hidden" id="txtBDATEH" placeholder="BILL NO" class="form-control" name="BDATE" />
                            <input type="hidden" id="txtCUSTH" placeholder="BILL NO" class="form-control" name="CUST" />
                            <input type="hidden" id="txtSNAMEH" placeholder="BILL NO" class="form-control" name="SNAME" />
                            <input type="hidden" id="txtADDRESSH" placeholder="BILL NO" class="form-control" name="ADDR" />
                            <input type="hidden" id="txtVNOH" placeholder="BILL NO" class="form-control" name="VNO" />
                            <input type="submit" value="PRINT CHALLAN" class="btn btn-danger btn-lg" id="PCHALLAN" />
                        </form>
                    </td>
                    <td align="center">
                        <form method="post" action="/BILL/PRINTBILL">
                            <input type="hidden" id="txtBNOH1" placeholder="BILL NO" class="form-control" name="BNO" />
                            <input type="hidden" id="txtBDATEH1" placeholder="BILL NO" class="form-control" name="BDATE" />
                            <input type="hidden" id="txtCUSTH1" placeholder="BILL NO" class="form-control" name="CUST" />
                            <input type="hidden" id="txtSNAMEH1" placeholder="BILL NO" class="form-control" name="SNAME" />
                            <input type="hidden" id="txtADDRESSH1" placeholder="BILL NO" class="form-control" name="ADDR" />
                            <input type="hidden" id="txtVNOH1" placeholder="BILL NO" class="form-control" name="VNO" />
                            <input type="hidden" id="txtGTOTH1" placeholder="BILL NO" class="form-control" name="GTOT" />
                            <input type="hidden" id="txtNTOTH1" placeholder="BILL NO" class="form-control" name="NTOT" />
                            <input type="hidden" id="txtROUNDH1" placeholder="BILL NO" class="form-control" name="ROUND" />
                            <input type="hidden" id="txtTVALH1" placeholder="BILL NO" class="form-control" name="TVAL" />
                            <input type="submit" value="PRINT BILL" class="btn btn-success btn-lg" id="PCHALLAN1" />
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>>
</div>

<div id="ADD_ITM_DIV">
    <div>ADD NEW STOCK</div>
    <div style="overflow: hidden;">
        <table class="table table-bordered table-hover table-responsive ui-front adn" style="font-size : smaller">
            <tr>
                <td>
                    <label for="RID">RECORD NO</label>
                </td>
                <td>
                    <input class="form-control input-xs" id="adRID" name="RID" placeholder="RECORD NO" type="text" value="" />
                </td>
                <td>
                    <label for="STOTAL">SELL PRICE TOTAL</label>
                </td>
                <td>
                    <input class="form-control input-xs" id="adSTOT" name="STOTAL" placeholder="SELL PRICE TOTAL" type="text" value="" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="PART_NO">PART NO</label>
                </td>
                <td>
                    <input class="form-control input-xs" data-val="true" data-val-required="Please Fill The Record!" id="adPtno" name="PART_NO" placeholder="PART NO" type="text" value="" />
                </td>
                <td>
                    <label for="TVAL">TAX VALUE</label>
                </td>
                <td>
                    <input class="form-control input-xs" id="adTVAL" name="TVAL" placeholder="TAX VALUE" type="text" value="" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="PARTI">PART NAME</label>
                </td>
                <td>
                    <input class="form-control input-xs" data-val="true" data-val-required="Please Fill The Record!" id="adParti" name="PARTI" placeholder="PART NAME" type="text" value="" />
                </td>
                <td>
                    <label for="TYPE">ITEM TYPE</label>
                </td>
                <td>
                    <input class="form-control input-xs" id="adTYPE" name="TYPE" placeholder="ITEM TYPE" type="text" value="" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="MRP">MRP</label>
                </td>
                <td>
                    <input class="form-control input-xs" data-val="true" data-val-required="Please Fill The Record!" id="adMRP" name="MRP" placeholder="MRP" type="text" value="" />
                </td>
                <td>
                    <label for="UNIT">UNIT</label>
                </td>
                <td>
                    <input class="form-control input-xs" id="adUNIT" name="UNIT" placeholder="UNIT" type="text" value="" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="TAX">TAX RATE</label>
                </td>
                <td>
                    <input class="form-control input-xs" id="adTAX" name="TAX" placeholder="TAX RATE" type="text" value="" />
                </td>
                <td>
                    <label for="RACKNO">RACK NO</label>
                </td>
                <td>
                    <input class="form-control input-xs" id="adRCNO" name="RACKNO" placeholder="RACK NO" type="text" value="" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="SPRICE">SELL PRICE</label>
                </td>
                <td>
                    <input class="form-control input-xs" id="adSPRICE" name="SPRICE" placeholder="SELL PRICE" type="text" value="" />
                </td>

                <td>
                    <label for="EOR">EOR</label>
                </td>
                <td>
                    <input class="form-control input-xs" id="adEOR" name="EOR" placeholder="ITEM E.O.R" type="text" value="" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="PPRICE">PURCAHSE PRICE</label>
                </td>
                <td>
                    <input class="form-control input-xs" id="adPPRICE" name="PPRICE" placeholder="PURCHASE PRICE" type="text" value="" />
                </td>
                <td>
                    <label for="grop">ITEM GROUP</label>
                </td>
                <td>
                    <input class="form-control input-xs" id="adGROP" name="grop" placeholder="ITEM GROUP" type="text" value="" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="QTY">QTY</label>
                </td>
                <td>
                    <input class="form-control input-xs" data-val="true" data-val-required="Please Fill The Record!" id="adQTY" name="QTY" placeholder="QUANTITY" type="text" value="" />
                </td>
                <td>
                    <label for="DPCODE">DEALER CODE</label>
                </td>
                <td>
                    <input class="form-control input-xs" id="adDPCODE" name="DPCODE" placeholder="DEALER CODE" type="text" value="" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="TOTAL">ITEM TOTAL</label>
                </td>
                <td>
                    <input class="form-control input-xs" id="adTOTAL" name="TOTAL" placeholder="ITEM TOTAL" type="text" value="" />
                </td>
                <td>
                    <label for="USER1">USER NAME</label>
                </td>
                <td>
                    <input class="form-control input-xs" id="adUSER" name="USER1" placeholder="USER NAME" type="text" value="" />
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <input id="cls3" type="button" class="btn btn-warning btn-xs" value="Cancel" />
                    <input id="sv1" type="button" class="btn btn-primary btn-xs ui-icon-plus" value="Save" />
                    <input id="adnstc2" type="button" value="Add New Item" class="btn btn-warning btn-xs" />
                    <input id="adLMODI" name="lmodi" type="hidden" value="" />
                    <input id="adSSTA" name="SSTA" type="hidden" value="" />
                    <input id="adAEDT" name="AEDT" type="hidden" value="" />
                    <input id="BIDtst2" name="RID1" type="hidden" value="" />
                </td>
            </tr>
        </table>
    </div>
</div>

<div id="ADD_ITM_DIV_PR">
    <div>ADD NEW STOCK ITEM</div>
    <div style="overflow: hidden;">
        <table class="table table-bordered table-hover table-responsive adn1" style="font-size : smaller">
            <tr>
                <td><label for="PRPART_NO">PART NO</label></td>
                <td>
                    <input class="text-box single-line form-control" id="PRPART_NO" name="PART_NO" type="text" value="" />
                </td>
                <td><label for="PRCATE">ITEM TYPE</label></td>
                <td>
                    <input class="text-box single-line form-control" id="PRCATE" name="CATE" type="text" value="" />
                </td>
            </tr>
            <tr>
                <td><label for="PRPARTI">PART NAME</label></td>
                <td>
                    <input class="text-box single-line form-control" id="PRPARTI" name="PARTI" type="text" value="" />
                </td>
                <td><label for="PRGROP">ITEM GROUP</label></td>
                <td>
                    <input class="text-box single-line form-control" id="PRGROP" name="GROP" type="text" value="" />
                </td>
            </tr>
            <tr>
                <td><label for="PRMRP">MRP</label></td>
                <td>
                    <input class="text-box single-line form-control" id="PRMRP" name="MRP" type="text" value="" />
                </td>
                <td><label for="PRunit">UNIT</label></td>
                <td>
                    <input class="text-box single-line form-control" id="PRunit" name="unit" type="text" value="" />
                </td>
            </tr>
            <tr>
                <td><label for="PRTRATE">TAX RATE</label></td>
                <td>
                    <input class="text-box single-line form-control" id="PRTRATE" name="TRATE" type="text" value="" />
                </td>
                <td><label for="PRDPCODE">DEALER CODE</label></td>
                <td>
                    <input class="text-box single-line form-control" id="PRDPCODE" name="DPCODE" type="text" value="" />
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <input id="cls4" type="button" class="btn btn-warning btn-xs" value="Cancel" />
                    <input id="sv2" type="button" class="btn btn-primary btn-xs ui-icon-plus" value="Save" />
                    <input id="PRlmodi" name="lmodi" type="hidden" value="" />
                    <input id="PRrid1" name="rid1" type="hidden" value="" />
                    <input id="PRAEDT" name="AEDT" type="hidden" value="" />
                    <input id="BIDtst3" name="RID" type="hidden" value="" />
                </td>
            </tr>
        </table>
    </div>
</div>
<div id="messageNotification">
    <div id="msg"></div>
</div>
<input id="BIDtst" type="hidden" />
<input id="BIDtst1" type="hidden" />
<script>
            var changessave = true;
            var EMODE = true;
            var EMODE1 = true;
            var NMODE = true;
            var isdel = true;
            var isupd = true;
            $(function () {
                var source;
                var source1;
                $(document).ready(function () {
                    $("#btnDEL1").hide();
                    $("#UPDBILL").hide();
                    $('#PRINTBILL').hide();
                    $('#searchField').focus();
                    $('#txtQTY').keyup(function (e) {
                        var tot = parseFloat($('#txtQTY').val()) * parseFloat($('#txtMRP').val())
                        $('#txtTOT').val(tot.toFixed(2))
                        var tot1 = parseFloat($('#txtQTY').val()) * parseFloat($('#txtSPRICE').val())
                        $('#txtSTOT').val(tot1.toFixed(2))
                        var tval = parseFloat($('#txtSTOT').val()) * parseFloat($('#txtTRATE').val()) / 100
                        $('#txtTVAL1').val(tval.toFixed(2))
                        $('#STQTY').val(parseFloat($('#qinc').val()) - parseFloat($('#txtQTY').val()))
                        $('#STTOTAL').val((parseFloat($('#STQTY').val()) * parseFloat($('#txtMRP').val())).toFixed(2));
                        $('#STSTOTAL').val((parseFloat($('#STQTY').val()) * parseFloat($('#txtSPRICE').val())).toFixed(2));
                        e.preventDefault();
                    });
                    $('#txtQTY1').keyup(function (e) {
                        var tot = parseFloat($('#txtQTY1').val()) * parseFloat($('#txtMRP1').val())
                        $('#txtTOT1').val(tot.toFixed(2))
                        var tot1 = parseFloat($('#txtQTY1').val()) * parseFloat($('#txtSPRICE1').val())
                        $('#txtSTOT1').val(tot1.toFixed(2))
                        var tval = parseFloat($('#txtSTOT1').val()) * parseFloat($('#txtTRATE1').val()) / 100
                        $('#txtTVAL11').val(tval.toFixed(2))
                        $('#STQTY1').val(parseFloat($('#OSTC').val()) - parseFloat($('#txtQTY1').val()) + parseFloat($('#qinc1').val()))
                        $('#STTOTAL1').val((parseFloat($('#STQTY1').val()) * parseFloat($('#txtMRP1').val())).toFixed(2));
                        $('#STSTOTAL1').val((parseFloat($('#STQTY1').val()) * parseFloat($('#txtSPRICE1').val())).toFixed(2));
                    });
                    $("#messageNotification").jqxNotification({
                        width: 250, position: "bottom-right", opacity: 0.9,
                        autoOpen: false, animationOpenDelay: 800, autoClose: true, autoCloseDelay: 3000, template: "warning"
                    });
                    $("#txtBNO").jqxTooltip({ content: 'ENTER BILL NO HERE', position: 'top', autoHide: true, trigger: "none" });
                    $("#txtBDATE").jqxTooltip({ content: 'ENTER BILL DATE HERE LIKE "01-Jan-2016"', position: 'bottom', autoHide: true, trigger: "none" });
                    $('INPUT[type="text"]').focus(function () {
                        $(this).addClass("focus");
                    });

                    $('INPUT[type="text"]').blur(function () {
                        $(this).removeClass("focus");
                    });

                    source =
        {
            datatype: "json",
            datafields: [
            { name: 'BID', type: 'string' },
            { name: 'BNO', type: 'string' },
            { name: 'BDATE', type: 'date' },
            { name: 'CUST', type: 'string' },
            { name: 'SNAME', type: 'string' },
            { name: 'GTOT', type: 'string' },
            { name: 'TVAL', type: 'string' },
            { name: 'ROUND', type: 'string' },
            { name: 'BAMT', type: 'string' },
            { name: 'MODE', type: 'string' },
            ],
            url: '/BILL/List_BILL'
        };
                    var editrow = -1;
                    var dataAdapter = new $.jqx.dataAdapter(source);
                    var minw = parseFloat($(window).width()) / 9;
                    // initialize jqxGrid
                    $("#grid").jqxGrid({
                        width: '98%',
                        height: '98%',
                        source: dataAdapter,
                        sortable: true,
                        filterable: true,
                        altrows: true,
                        theme: 'ui-redmond',
                        editable: true,
                        showtoolbar: true,
                        columns: [
                            { text: "RECORD NO", datafield: "BID", hidden: true },
                               { text: "BILL NO", datafield: "BNO" },
                               { text: "BILL DATE", datafield: "BDATE", cellsformat: 'dd-MM-yyyy' },
                               { text: "CUSTOMER", datafield: "CUST" },
                               { text: "SITE NAME", datafield: "SNAME" },
                               { text: "GROSS TOTAL", datafield: "GTOT" },
                               { text: "TAX VALUE", datafield: "TVAL" },
                               { text: "ROUND OFF", datafield: "ROUND" },
                               { text: "NET TOTAL", datafield: "BAMT" },
                               { text: "BILL MODE", datafield: "MODE" },
                               {
                                   text: 'Details', datafield: 'Details', columntype: 'button', width: 80, sortable: false, filterable: false, cellsrenderer: function () {
                                       return "Details";
                                   },
                                   buttonclick: function (row) {
                                       editrow = row;
                                       var offset = $("#grid").offset();
                                       var dataRecord = $("#grid").jqxGrid('getrowdata', editrow);
                                       var ens = dataRecord.BNO;
                                       var options = { "backdrop": "static", keyboard: true };
                                       $.ajax({
                                           type: "GET",
                                           url: "@Url.Action("dtls1","BILL")",
                                           data: { id: ens },
                                           contentType: "application/json; charset=utf-8",
                                           dataType: "json",
                                           success: function (data) {
                                               $.each(data, function (i, val) {
                                                   $("#txtBNO").val(val.BNO)
                                                   var dateFormat = dataRecord.BDATE
                                                   var dateFormat = $.datepicker.formatDate('dd-M-yy', new Date(dateFormat));
                                                   $("#txtBDATE").val(dateFormat)
                                                   $("#txtCUST").val(val.CUST)
                                                   $('#txtSNAME').val(val.SNAME)
                                                   $('#txtGTOT').val(val.GTOT)
                                                   $('#txtNTOT').val(val.NTOT)
                                                   $('#txtVNO').val(val.VNO)
                                                   $('#txtROUND').val(val.ROUND)
                                                   $('#txtADDRESS').val(val.ADDRESS)
                                                   $('#txtMODE').val(val.MODE)
                                                   $('#txtTVAL').val(val.TVAL)
                                                   $('#txtBID').val(val.BID)
                                                   $('#txtPAYMENT').val(val.PAYMENT)
                                                   $('#txtSECTOR').val(val.SECTOR)
                                                   $('#txtUSER1').val(val.USER1)
                                                   $('#txtCBILL').val(val.CBILL)
                                                   $('#txtBAPAY').val(val.BAPAY)
                                                   $('#txtBST').val(val.BST)
                                                   $('#txtSSTA').val(val.SSTA)
                                                   $('#txtDPCODE').val(val.DPCODE)
                                                   $('#txtLMODI').val(val.LMODI)
                                                   $('#txtBID1').val(val.BID1)
                                                   $('#txtAEDT').val(val.AEDT)
                                                   $('#txtBAMT').val(val.BAMT)
                                                   $("#VIEWBILL").jqxWindow('hide');
                                                   $('#PRINTBILL').show();
                                                   $.ajax({
                                                       type: "GET",
                                                       url: "@Url.Action("gtbtot", "BILL")",
                                                       data: { aData: $("#txtCUST").val() },
                                                       contentType: "application/json; charset=utf-8",
                                                       dataType: "json",
                                                       success: function (data) {
                                                               $('#txtTOTAL').val(data.TOTAL);
                                                       },
                                                       error: function OnErrorCall(response) {
                                                           alert(response.status + " " + response.statusText);
                                                       }
                                                   });
                                                   EMODE1 = false;
                                                   source1.data = { "bno": $('#txtBNO').val() };
                                                   $('#grid1').jqxGrid('updatebounddata');
                                               });
                                           },
                                           error: function () {
                                               alert(response.status + " " + response.responseText);
                                           }
                                       });
                                   }
                               }
                        ]
                    });


                    source1 =
                   {
                       datatype: "json",
                       data: { "bno": $("txtBNO").val() },
                       datafields: [
                       { name: 'BILLID', type: 'Int64' },
                       { name: 'BID', type: 'string' },
                       { name: 'PART_NO', type: 'string' },
                       { name: 'PARTI', type: 'string' },
                       { name: 'QTY', type: 'string' },
                       { name: 'MRP', type: 'string' },
                       { name: 'SPRICE', type: 'string' },
                       { name: 'TAX', type: 'string' },
                       { name: 'STOT', type: 'string' },
                       ],
                       url: '/BILL/List_BILL_ITM'
                   };
                    var editrow1 = -1;
                    var dataAdapter1 = new $.jqx.dataAdapter(source1);
                    // initialize jqxGrid
                    $("#grid1").jqxGrid({
                        width: '99%',
                        height: 380,
                        source: dataAdapter1,
                        sortable: true,
                        filterable: true,
                        altrows: true,
                        theme: 'ui-redmond',
                        editable: true,
                        showstatusbar: true,
                        showaggregates: true,
                        showtoolbar: true,
                        columns: [
                            {
                                text: 'Details', datafield: 'Details', columntype: 'button', width: 80, sortable: false, filterable: false, cellsrenderer: function () {
                                    return "Details";
                                },
                                buttonclick: function (row) {
                                    editrow = row;
                                    var offset = $("#grid1").offset();
                                    var dataRecord = $("#grid1").jqxGrid('getrowdata', editrow);
                                    var ens = dataRecord.BILLID;
                                    var options = { "backdrop": "static", keyboard: true };
                                    $.ajax({
                                        type: "GET",
                                        url: "@Url.Action("dtls","BILL")",
                                        data: { id: ens },
                                        contentType: "application/json; charset=utf-8",
                                        dataType: "json",
                                        success: function (data) {
                                            $.each(data, function (i, val) {
                                                $("#txtPTNO1").val(val.PART_NO)
                                                $("#txtPTNAME1").val(val.PARTI)
                                                $("#txtMRP1").val(val.MRP)
                                                $('#txtQTY1').val(val.QTY)
                                                $('#txtBNO11').val($('#txtBNO').val())
                                                $('#txtSPRICE1').val(val.SPRICE)
                                                $('#txtTVAL11').val(val.TVAL)
                                                $('#txtTRATE1').val(val.TAX)
                                                $('#txtTOT1').val(val.TOTAL)
                                                $('#txtTOT2').val(val.TOTAL)
                                                $('#txtUNIT1').val(val.UNIT)
                                                $('#txtSTOT1').val(val.STOT)
                                                $('#OSTC').val(val.QTY)
                                                $('#BILLID-TXT').val(val.BILLID)
                                                $('#BID-TXT').val(val.BID)
                                                $.ajax({
                                                    type: "GET",
                                                    url: "@Url.Action("gdata2","BILL")",
                                                    data: { aData: $("#txtPTNO1").val() },
                                                    contentType: "application/json; charset=utf-8",
                                                    dataType: "json",
                                                    success: function (data) {
                                                        $.each(data, function (i, val1) {
                                                            $('#txtSTC1').val(val1.QTY)
                                                            $('#STRID11').val(val1.RID1)
                                                            $('#STRID1').val(val1.RID)
                                                            $('#STTYPE1').val(val1.TYPE)
                                                            $('#STPART_NO1').val(val1.PART_NO)
                                                            $('#STPARTI1').val(val1.PARTI)
                                                            $('#STMRP1').val(val1.MRP)
                                                            $('#STQTY1').val(val1.QTY)
                                                            $('#qinc1').val(val1.QTY)
                                                            $('#STTOTAL1').val(val1.TOTAL)
                                                            $('#STRACKNO1').val(val1.RACKNO)
                                                            $('#STTAX1').val(val1.TAX)
                                                            $('#STTVAL1').val(val1.TVAL)
                                                            $('#STSTOTAL1').val(val1.STOTAL)
                                                            $('#STPPRICE1').val(val1.PPRICE)
                                                            $('#STUNIT1').val(val1.UNIT)
                                                            $('#STSPRICE1').val(val1.SPRICE)
                                                            $('#STSSTA1').val(val1.SSTA)
                                                            $('#STEOR1').val(val1.EOR)
                                                            $('#STDPCODE1').val(val1.DPCODE)
                                                            $('#STLMODI1').val(val1.lmodi)
                                                            $('#STGROP1').val(val1.grop)
                                                            $('#STAEDT1').val(val1.AEDT)
                                                            $('#STUSER11').val(val1.USER1)
                                                        });
                                                    },
                                                    error: function OnErrorCall(response) {
                                                        alert(response.status + " " + response.responseText);
                                                    }
                                                });
                                                $('#txtMRP1').focus();
                                                $("#popupWindow1").jqxWindow();
                                                $("#popupWindow1").jqxWindow('open');
                                            })
                                        },
                                        error: function () {
                                            alert(response.status + " " + response.responseText);
                                        }
                                    });
                                }
                            },
                            { text: "RECORD NO", datafield: "BILLID", hidden: true},
                            { text: "RECORD NO", datafield: "BID", hidden: true },
                               { text: "PART NO", datafield: "PART_NO", minwidth: 80 },
                               { text: "PART NAME", datafield: "PARTI", minwidth: 110 },
                               { text: "QTY", datafield: "QTY" },
                               { text: "MRP", datafield: "MRP" },
                               { text: "SELL PRICE", datafield: "SPRICE", minwidth: 60 },
                               { text: "TAX RATE", datafield: "TAX" },
                               {
                                   text: "AMOUNT", datafield: "STOT", minwidth: 60, aggregates: ['sum']
                               }
                        ],
                        rendertoolbar: function (toolbar) {
                            var me = this;
                            var container = $("<div style='margin: 5px;'></div>");
                            var btn1 = $("<input id='BTN2' type='button' value='Refresh' style='margin-left:5px'/>");
                            var btn2 = $("<input id='BTN3' type='button' value='Add New Item' style='margin-left:5px'/>");
                            var btn3 = $("<input id='BTN4' type='button' value='View Bills' style='margin-left:5px'/>");
                            container.append($('#REFBILL'));
                            container.append(btn2);
                            container.append($('#btnNBILL'));
                            container.append(btn3);
                            container.append($('#NBILL'));
                            var input = $("<input id='searchField' type='text' style='margin-left:5px'/>");
                            container.append(input);
                            container.append($('#UPDBILL'));
                            container.append($('#PRINTBILL'));
                            toolbar.append(container);
                            $('#REFBILL').jqxButton({ template: "success" });
                            btn2.jqxButton({ template: "warning" });
                            btn3.jqxButton({ template: "danger" });
                            $('#NBILL').jqxButton({ template: "success" });
                            $("#searchField").jqxInput({ height: 23, width: 200, minLength: 1, theme: 'energyblue' });
                            $('#UPDBILL').jqxButton({ template: "warning" });
                            $('#PRINTBILL').jqxButton({ template: "info" });
                            var oldVal = "";
                            input.on('keydown', function (event) {
                                if (event.keyCode == 83 && event.ctrlKey) {
                                    if (NMODE == false) {
                                        $('#btnNBILL').click();
                                    }
                                    else if (EMODE == false) {
                                        $('#UPDBILL').click();
                                    }
                                    else {
                                        alert("Nothing to Save!");
                                    }
                                    event.preventDefault();
                                }
                                else if (event.keyCode == 13) {
                                    if (!$('#txtBNO').val()) {
                                        alert("Please Add Bill No First!");
                                    }
                                    else {
                                        var offset = $("#grid1").offset();
                                        $("#popupWindow").jqxWindow();
                                        $("#popupWindow").jqxWindow('open');
                                        $.ajax({
                                            type: "GET",
                                            url: "@Url.Action("gmid","Stock")",
                                            contentType: "application/json; charset=utf-8",
                                        dataType: "json",
                                        success: function (data) {
                                            $('#BIDtst1').val(data);
                                        }
                                    });
                                        $('#txtPTNO').focus();
                                    }
                                    event.preventDefault();
                                }
                                else if (event.keyCode == 78 && event.altKey) {
                                    $('#NBILL').click();
                                    event.preventDefault();
                                }
                                else if (event.keyCode == 86 && event.altKey) {
                                    if (EMODE == true) {
                                        $("#VIEWBILL").jqxWindow();
                                        $("#VIEWBILL").jqxWindow('open');
                                    }
                                    event.preventDefault();
                                }
                            });
                            btn2.on('click', function () {
                                if (!$('#txtBNO').val()) {
                                    alert("Please Add Bill No First!");
                                }
                                else {
                                    var offset = $("#grid1").offset();
                                    $("#popupWindow").jqxWindow();
                                    $("#popupWindow").jqxWindow('open');
                                    $('#txtPTNO').focus();
                                }
                            });
                            btn3.on('click', function (e) {
                                $("#VIEWBILL").jqxWindow();
                                $("#VIEWBILL").jqxWindow('open');
                            });
                        }
                    });
                    $("#BILLPRINT1").click(function () {
                        $("#BILLPRINT").jqxWindow();
                        $("#BILLPRINT").jqxWindow('open');
                    });
                    $("#BILLPRINT").jqxWindow({
                        minHeight: '95%', minWidth: '95%', theme: 'ui-redmond', isModal: true, autoOpen: false, cancelButton: $("#Cancel"), modalOpacity: 0.01
                    });
                    $("#popupWindow").jqxWindow({
                        width: '100%', height: '50%', theme: 'ui-redmond', isModal: true, autoOpen: false, cancelButton: $("#Cancel"), modalOpacity: 0.01
                    });

                    $("#popupWindow1").jqxWindow({
                        width: '100%', height: '50%', theme: 'ui-redmond', isModal: true, autoOpen: false, cancelButton: $("#Cancel1"), modalOpacity: 0.01
                    });

                    $("#VIEWBILL").jqxWindow({
                        minHeight: '95%', minWidth: '95%', theme: 'ui-redmond', isModal: true, autoOpen: false, cancelButton: $("#Cancel2"), modalOpacity: 0.01
                    });
                    $("#ADD_ITM_DIV").jqxWindow({
                        maxHeight: '70%', minWidth: '95%', theme: 'ui-start', isModal: true, autoOpen: false, cancelButton: $("#cls3"), modalOpacity: 0.01
                    });
                    $("#ADD_ITM_DIV_PR").jqxWindow({
                        maxHeight: '70%', minWidth: '80%', theme: 'orange', isModal: true, autoOpen: false, cancelButton: $("#cls4"), modalOpacity: 0.01
                    });

                    $("#CHALLAN").jqxWindow({
                        maxHeight: '50%', minWidth: '50%', theme: 'orange', isModal: true, autoOpen: false, cancelButton: $("#cls4"), modalOpacity: 0.01
                    });

                    $("#popupWindow").on('open', function () {
                        $("#txtPTNO").jqxInput('selectAll');
                        $("#txtBNO1").val($("#txtBNO").val());
                    });
                    $("#ADD_ITM_DIV").on('open', function () {
                        $("#adRID").jqxInput('selectAll');
                        $.ajax({
                            type: "GET",
                            url: "@Url.Action("gmid","Stock")",
                            contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function (data) {
                            $('#BIDtst2').val(data);
                        }
                    });
                        $("#adPtno").focus();
                    });
                    $("#ADD_ITM_DIV_PR").on('open', function () {
                        $("#PRPART_NO").jqxInput('selectAll');
                        $.ajax({
                            type: "GET",
                            url: "@Url.Action("gmid","Stock")",
                            contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function (data) {
                            $('#BIDtst3').val(data);
                        }
                    });
                        $("#PRPART_NO").focus();
                    });

                    $("#CHALLAN").on('open', function () {
                        $("#txtBNOH").jqxInput('selectAll');
                        $("#txtBNOH").focus();
                    });

                    $("#popupWindow1").on('open', function () {
                        $("#txtPTNO1").jqxInput('selectAll');
                        $("#txtBNO11").val($("#txtBNO").val());
                    });

                    $("#popupWindow1").on('close', function (e) {
                        if (!isdel) {
                            $("#btnDEL1").click();
                            alert("DataBase Updated!");
                        }
                        else if (!isupd) {
                            canupd();
                            alert("DataBase Updated!");
                        }
                    });
                    $("#CHALLAN").on('close', function (e) {
                        cls();
                    });
                    $("#popupWindow1").on('cancel', function (e) {
                        if (!isdel) {
                            $("#btnDEL1").click();
                            alert("DataBase Updated!");
                        }
                        else if (!isupd) {
                            canupd();
                            alert("DataBase Updated!");
                        }
                    });

                    $("#Cancel").jqxButton({ template: "warning" });
                    $("#Save").jqxButton({ template: "success" });
                    $("#adnstc").jqxButton({ template: "primary" });
                    $("#adnstc1").jqxButton({ template: "primary" });
                    $("#adnstc2").jqxButton({ template: "danger" });
                    $("#Cancel1").jqxButton({ template: "warning" });
                    $("#btnDEL").jqxButton({ template: "danger" });
                    $("#btnDEL1").jqxButton({ template: "info" });
                    $("#Save1").jqxButton({ template: "success" });
                    $("#btnNBILL").jqxButton({ template: "primary" });
                    $("#Cancel2").jqxButton({ template: "warning" });
                    $("#Save").click(function () {
                        $('#txtQTY').keypress();
                    });
                    $("#btnDEL").click(function () {
                        $.ajax({
                            url: "@Url.Action("DELITEM_BILL", "BILL")",
                            type: "POST",
                            data: { "id": $('#BILLID-TXT').val() },
                            dataType: "json",
                            success: function (data) {
                                if (data.toString() != "Successfully Saved!") {
                                    alert(data.toString());
                                }
                                else {
                                    isdel = false;
                                    changessave = false;
                                    alert("Record Deleted! Please Close the Window to Update the DataBase");
                                    $('#REFBILL').click();
                                }
                            },
                            error: function (xhr, status, error) {
                                alert(xhr.responseText);
                            }
                        });
                        var curqty = parseFloat($('#STQTY1').val()) + parseFloat($('#txtQTY1').val())
                        var carmrp = parseFloat($('#STMRP1').val()) * curqty
                        var carstot = parseFloat($('#STSPRICE1').val()) * curqty
                        var dataObject3 = {
                            RID1: $('#STRID11').val(),
                            RID: $('#STRID1').val(),
                            TYPE: $('#STTYPE1').val(),
                            PART_NO: $('#STPART_NO1').val(),
                            PARTI: $('#STPARTI1').val(),
                            MRP: $('#STMRP1').val(),
                            QTY: curqty,
                            TOTAL: carmrp,
                            RACKNO: $('#STRACKNO1').val(),
                            TAX: $('#STTAX1').val(),
                            TVAL: $('#STTVAL1').val(),
                            STOTAL: carstot,
                            PPRICE: $('#STPPRICE1').val(),
                            UNIT: $('#STUNIT1').val(),
                            SPRICE: $('#STSPRICE1').val(),
                            SSTA: $('#STSSTA1').val(),
                            EOR: $('#STEOR1').val(),
                            DPCODE: $('#STDPCODE1').val(),
                            lmodi: $('#STLMODI1').val(),
                            grop: $('#STGROP1').val(),
                            AEDT: $('#STAEDT1').val(),
                            USER1: $('#STUSER11').val()
                        }
                        $.ajax({
                            url: "@Url.Action("STUPD", "BILL")",
                            type: "POST",
                            data: dataObject3,
                            dataType: "json",
                            success: function (data) {
                                if (data.toString() != "Successfully Saved!") {
                                    alert(data.toString());
                                }
                            },
                            error: function (response) {
                                alert(response.status + " " + response.responseText);
                            }
                        });
                    });
                });
                $("#sv1").click(function () {
                    var dataObject3 = {
                        RID1: $('#BIDtst2').val(),
                        RID: $('#adRID').val(),
                        TYPE: $('#adTYPE').val(),
                        PART_NO: $('#adPtno').val(),
                        PARTI: $('#adParti').val(),
                        MRP: $('#adMRP').val(),
                        QTY: $('#adQTY').val(),
                        TOTAL: $('#adTOTAL').val(),
                        RACKNO: $('#adRCNO').val(),
                        TAX: $('#adTAX').val(),
                        TVAL: $('#adTVAL').val(),
                        STOTAL: $('#adSTOT').val(),
                        PPRICE: $('#adPPRICE').val(),
                        UNIT: $('#adUNIT').val(),
                        SPRICE: $('#adSPRICE').val(),
                        SSTA: $('#adSSTA').val(),
                        EOR: $('#adEOR').val(),
                        DPCODE: $('#adDPCODE').val(),
                        lmodi: $('#adLMODI').val(),
                        grop: $('#adGROP').val(),
                        AEDT: $('#adAEDT').val(),
                        USER1: $('#adUSER').val()
                    }
                    $.ajax({
                        url: "@Url.Action("Save_ITM", "BILL")",
                        type: "POST",
                        data: dataObject3,
                        dataType: "json",
                        success: function (data) {
                            if (data.toString() != "Successfully Saved!") {
                                alert(data.toString());
                            }
                            else {
                                $(".adn input[type='text']").val("");
                                $("#ADD_ITM_DIV").jqxWindow('hide');
                                alert("Record Added");
                            }
                        },
                        error: function (response) {
                            alert(response.status + " " + response.responseText);
                        }
                    });
                });

                $('#PRPART_NO').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#PRPARTI').focus()
                        e.preventDefault();
                    }
                });
                $('#PRPARTI').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#PRMRP').focus()
                        e.preventDefault();
                    }
                });
                $('#PRMRP').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#PRTRATE').focus()
                        e.preventDefault();
                    }
                });
                $('#PRTRATE').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#PRCATE').focus()
                        e.preventDefault();
                    }
                });
                $('#PRCATE').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#PRGROP').focus()
                        e.preventDefault();
                    }
                });
                $('#PRGROP').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#PRunit').focus()
                        e.preventDefault();
                    }
                });
                $('#PRunit').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#PRDPCODE').focus()
                        e.preventDefault();
                    }
                });
                $('#PRDPCODE').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#sv2').click();
                        e.preventDefault();
                    }
                });

                $("#sv2").click(function () {
                    if ($('#PRrid1').val(null)) {
                        $('#PRrid1').val(new Date($.now()));
                        $('#PRlmodi').val(new Date($.now()));
                        $('#PRAEDT').val("NEW");
                    }
                    var dataObject3 = {
                        RID: $('#BIDtst3').val(),
                        PART_NO: $('#PRPART_NO').val(),
                        PARTI: $('#PRPARTI').val(),
                        MRP: $('#PRMRP').val(),
                        CATE: $('#PRCATE').val(),
                        TRATE: $('#PRTRATE').val(),
                        rid1: $('#PRrid1').val(),
                        unit: $('#PRunit').val(),
                        DPCODE: $('#PRDPCODE').val(),
                        lmodi: $('#PRlmodi').val(),
                        GROP: $('#PRGROP').val(),
                        AEDT: $('#PRAEDT').val()
                    }
                    $.ajax({
                        url: "@Url.Action("Save_ITM1", "BILL")",
                        type: "POST",
                        data: dataObject3,
                        dataType: "json",
                        success: function (data) {
                            if (data.toString() != "Successfully Saved!") {
                                alert(data.toString());
                            }
                            else {
                                $(".adn1 input[type='text']").val("");
                                $("#ADD_ITM_DIV_PR").jqxWindow('hide');
                                alert("Record Added");
                            }
                        },
                        error: function (response) {
                            alert(response.status + " " + response.responseText);
                        }
                    });
                });
                $("#btnDEL1").click(function () {
                    var totgt = $('#grid1').jqxGrid('getcolumnaggregateddata', 'STOT', ['sum', 'avg'], true);
                    var totgt1 = totgt.sum;
                    $('#txtGTOT').val(totgt1.toFixed(2));
                    var tval1 = parseFloat($('#txtGTOT').val()) * 14.5 / 100
                    $('#txtTVAL').val(tval1.toFixed(2));
                    $('#txtBAMT').val(Math.round((parseFloat($('#txtGTOT').val()) + parseFloat($('#txtTVAL').val()))).toFixed(2));
                    var rnd = parseFloat($('#txtBAMT').val()) - (parseFloat($('#txtGTOT').val()) + parseFloat($('#txtTVAL').val()));
                    $('#txtROUND').val(rnd.toFixed(2));
                    var mde = $('#txtMODE').val();
                    if (mde == "CREDIT") {
                        $('#txtNTOT').val($('#txtBAMT').val());
                        $('#txtTOTAL').val(parseFloat($('#txtTOTAL').val()) - parseFloat($('#txtTOT1').val()));
                        $('#txtBAPAY').val($('#txtBAMT').val());
                        $('#txtBST').val("UP");
                        $('#txtMODE').val(mde);
                    }
                    else {
                        $('#txtCBILL').val($('#txtBAMT').val());
                        $('#txtMODE').val(mde);
                    }
                    $('#txtTOT1').val(null)
                    $('#txtPTNO1').val(null)
                    $('#txtPTNAME1').val(null)
                    $('#txtUNIT1').val(null)
                    $('#txtMRP1').val(null)
                    $('#txtSPRICE1').val(null)
                    $('#txtTRATE1').val(null)
                    $('#txtSTC1').val(null)
                    $('#txtQTY1').val(null)
                    $('#txtTVAL11').val(null)
                    $('#STRID11').val(null)
                    $('#STRID1').val(null)
                    $('#STTYPE1').val(null)
                    $('#STPART_NO1').val(null)
                    $('#STPARTI1').val(null)
                    $('#STMRP1').val(null)
                    $('#STQTY1').val()
                    $('#qinc1').val(null)
                    $('#STTOTAL1').val(null)
                    $('#STRACKNO1').val(null)
                    $('#STTAX1').val(null)
                    $('#STTVAL1').val(null)
                    $('#STSTOTAL1').val(null)
                    $('#STPPRICE1').val(null)
                    $('#STUNIT1').val(null)
                    $('#STSPRICE1').val(null)
                    $('#STSSTA1').val(null)
                    $('#STEOR1').val(null)
                    $('#STDPCODE1').val(null)
                    $('#STLMODI1').val(null)
                    $('#STGROP1').val(null)
                    $('#STAEDT1').val(null)
                    $('#STUSER11').val(null)
                    if (NMODE != false)
                    {
                    	EMODE = false;
                    	$('#UPDBILL').show();
                    $('#NBILL').prop('disabled', true);
                    $('#btnNBILL').prop('disabled', true);
                    }
                    isdel = true;
                    $("#popupWindow1").jqxWindow('hide');
                    $('#searchField').focus();
                });
                $("#adnstc").click(function () {
                    $("#ADD_ITM_DIV").jqxWindow('show');
                });
                $("#adnstc1").click(function () {
                    $("#ADD_ITM_DIV").jqxWindow('show');
                });
                $("#adnstc2").click(function () {
                    $("#ADD_ITM_DIV_PR").jqxWindow('show');
                });
                $('#txtBNO').keypress(function (e) {
                    if (e.keyCode == 13) {
                        e.preventDefault();
                        $('#txtNTOT').val($('#txtBAMT').val());
                        $('#txtDPCODE').val("A1587");
                        $('#txtLMODI').val(new Date($.now()));
                        $('#txtBID1').val(new Date($.now()));
                        $('#txtAEDT').val("NEW");
                        $('#txtSSTA').val("NEW");
                        $('#txtUSER1').val('@HttpContext.Current.User.Identity.Name.ToString()');
                        $('#txtBDATE').focus();

                    }
                });
                $("#adPtno").autocomplete({
                    source: '@Url.Action("GetPtno","Stock")'
                });

                $("#adParti").autocomplete({
                    source: '@Url.Action("GetParti", "Stock")'
                });

                $("#adParti").keypress(function (e) {
                    if (e.keyCode == 13) {
                        $.ajax({
                            type: "GET",
                            url: "@Url.Action("dpl1","Stock")",
                            data: { aData: $("#adParti").val() },
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function (data) {
                                if (data == "0") {
                                    $('#adMRP').focus()
                                    $.ajax({
                                        type: "GET",
                                        url: "@Url.Action("gdata1","Stock")",
                                        data: { aData: $("#adParti").val() },
                                        contentType: "application/json; charset=utf-8",
                                        dataType: "json",
                                        success: function (data) {
                                            $.each(data, function (i, val) {
                                                $('#adPtno').val(val.PART_NO)
                                                $('#adUNIT').val(val.unit)
                                                $('#adMRP').val(val.MRP)
                                                $('#adGROP').val(val.GROP)
                                                $('#adTYPE').val(val.CATE)
                                                $('#adTAX').val(val.TRATE)
                                                var spr = parseFloat($('#adTAX').val()) + 100
                                                $('#adSPRICE').val(parseFloat($('#txtMRP').val()) / spr * 100)
                                                $('#adTVAL').val(parseFloat($('#txtSPRICE').val()) * parseFloat($('#txtTAX').val()) / 100)
                                                $("#adSPRICE").number(true, 2);
                                                $('#adTVAL').number(true, 2);
                                            });
                                        },
                                        error: function OnErrorCall(response) {
                                            alert(response.status + " " + response.statusText);
                                        }
                                    });
                                }
                                else {
                                    alert("Duplicate Entry! Please Review")
                                }
                            },
                            error: function OnErrorCall(response) {
                                alert(response.status + " " + response.statusText);
                            }
                        });
                        e.preventDefault();
                    }
                });

                $("#adPtno").keypress(function (e) {
                    if (e.keyCode == 13) {
                        $.ajax({
                            type: "GET",
                            url: "@Url.Action("dpl","Stock")",
                            data: { aData: $("#adPtno").val() },
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function (data) {
                                if (data == "0") {
                                    $('#adMRP').focus()
                                    $.ajax({
                                        type: "GET",
                                        url: "@Url.Action("gdata2","Stock")",
                                        data: { aData: $("#adPtno").val() },
                                        contentType: "application/json; charset=utf-8",
                                        dataType: "json",
                                        success: function (data) {
                                            $.each(data, function (i, val) {
                                                $('#adParti').val(val.PARTI)
                                                $('#adUNIT').val(val.unit)
                                                $('#adMRP').val(val.MRP)
                                                $('#adGROP').val(val.GROP)
                                                $('#adTYPE').val(val.CATE)
                                                $('#adTAX').val(val.TRATE)
                                                var tax = parseFloat($('#adTAX').val()) + 100
                                                var spr = parseFloat($('#adMRP').val()) / tax * 100
                                                $('#adSPRICE').val(spr.toFixed(2))
                                                var tval = parseFloat($('#adSPRICE').val()) * parseFloat($('#adTAX').val()) / 100
                                                $('#adTVAL').val(tval.toFixed(2))
                                            });
                                        },
                                        error: function OnErrorCall(response) {
                                            alert(response.status + " " + response.statusText);
                                        }
                                    });
                                }
                                else {
                                    alert("Duplicate Entry! Please Review")
                                }
                            },
                            error: function OnErrorCall(response) {
                                alert(response.status + " " + response.statusText);
                            }
                        });
                        e.preventDefault();
                    }
                });

                $('#adPPRICE').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#adLMODI').val(new Date($.now()))
                        $('#adSSTA').val("NEW")
                        $('#adAEDT').val("NEW")
                        $('#adRID').val(new Date($.now()))
                        $('#adUSER').val('@HttpContext.Current.User.Identity.Name.ToString()')
                        $('#adQTY').focus()
                        e.preventDefault();
                    }
                });

                $('#adQTY').keypress(function (e) {
                    if (e.keyCode == 13) {
                        var tot = parseFloat($('#adMRP').val()) * parseFloat($('#adQTY').val())
                        var tot1 = parseFloat($('#adSPRICE').val()) * parseFloat($('#adQTY').val())
                        $('#adTOTAL').val(tot.toFixed(2))
                        $('#adSTOT').val(tot1.toFixed(2))
                        $('#adTVAL').focus()
                        e.preventDefault();
                    }
                });

                $('#adRCNO').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#adDPCODE').val("A1587")
                        $('#adEOR').focus()
                        e.preventDefault();
                    }
                });

                $('#adMRP').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#adTAX').focus()
                        e.preventDefault();
                    }
                });

                $('#adTAX').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#adSPRICE').focus()
                        e.preventDefault();
                    }
                });

                $('#adSPRICE').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#adPPRICE').focus()
                        e.preventDefault();
                    }
                });

                $('#adTVAL').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#adTYPE').focus()
                        e.preventDefault();
                    }
                });
                $('#adEOR').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $("#sv1").click();
                        e.preventDefault();
                    }
                });
                $('#adTYPE').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#adUNIT').focus()
                        e.preventDefault();
                    }
                });

                $('#adUNIT').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#adRCNO').focus()
                        e.preventDefault();
                    }
                });


                $("#txtPTNO").autocomplete({
                    source: '@Url.Action("GetPtno")'
                });
                $("#txtPTNAME").autocomplete({
                    source: '@Url.Action("GetParti")'
                });
                $("#txtCUST").autocomplete({
                    source: '@Url.Action("cstat")'
                });
                $("#txtSNAME").autocomplete({
                    source: '@Url.Action("snmat")'
                });
                $("#txtPTNO").keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#txtQTY').focus()
                        $.ajax({
                            type: "GET",
                            url: "@Url.Action("gdata2","BILL")",
                            data: { aData: $("#txtPTNO").val() },
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function (data) {
                                $.each(data, function (i, val) {
                                    $('#txtPTNAME').val(val.PARTI)
                                    $('#txtUNIT').val(val.UNIT)
                                    $('#txtMRP').val(val.MRP)
                                    $('#txtSPRICE').val(val.SPRICE)
                                    $('#txtTRATE').val(val.TAX)
                                    $('#txtSTC').val(val.QTY)
                                    $('#STRID1').val(val.RID1)
                                    $('#STRID').val(val.RID)
                                    $('#STTYPE').val(val.TYPE)
                                    $('#STPART_NO').val(val.PART_NO)
                                    $('#STPARTI').val(val.PARTI)
                                    $('#STMRP').val(val.MRP)
                                    $('#STQTY').val(val.QTY)
                                    $('#qinc').val(val.QTY)
                                    $('#STTOTAL').val(val.TOTAL)
                                    $('#STRACKNO').val(val.RACKNO)
                                    $('#STTAX').val(val.TAX)
                                    $('#STTVAL').val(val.TVAL)
                                    $('#STSTOTAL').val(val.STOTAL)
                                    $('#STPPRICE').val(val.PPRICE)
                                    $('#STUNIT').val(val.UNIT)
                                    $('#STSPRICE').val(val.SPRICE)
                                    $('#STSSTA').val(val.SSTA)
                                    $('#STEOR').val(val.EOR)
                                    $('#STDPCODE').val(val.DPCODE)
                                    $('#STLMODI').val(val.lmodi)
                                    $('#STGROP').val(val.grop)
                                    $('#STAEDT').val(val.AEDT)
                                    $('#STUSER1').val(val.USER1)
                                });
                            },
                            error: function OnErrorCall(response) {
                                alert(response.status + " " + response.responseText);
                            }
                        });
                        e.preventDefault();
                    }
                });
                $("#txtPTNAME").keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#txtQTY').focus()
                        $.ajax({
                            type: "GET",
                            url: "@Url.Action("gdata1","BILL")",
                            data: { aData: $("#txtPTNAME").val() },
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function (data) {
                                $.each(data, function (i, val) {
                                    $('#txtPTNO').val(val.PART_NO)
                                    $('#txtUNIT').val(val.UNIT)
                                    $('#txtMRP').val(val.MRP)
                                    $('#txtSPRICE').val(val.SPRICE)
                                    $('#txtTRATE').val(val.TAX)
                                    $('#txtSTC').val(val.QTY)
                                    $('#txtSTC').val(val.QTY)
                                    $('#STRID1').val(val.RID1)
                                    $('#STRID').val(val.RID)
                                    $('#STTYPE').val(val.TYPE)
                                    $('#STPART_NO').val(val.PART_NO)
                                    $('#STPARTI').val(val.PARTI)
                                    $('#STMRP').val(val.MRP)
                                    $('#STQTY').val(val.QTY)
                                    $('#qinc').val(val.QTY)
                                    $('#STTOTAL').val(val.TOTAL)
                                    $('#STRACKNO').val(val.RACKNO)
                                    $('#STTAX').val(val.TAX)
                                    $('#STTVAL').val(val.TVAL)
                                    $('#STSTOTAL').val(val.STOTAL)
                                    $('#STPPRICE').val(val.PPRICE)
                                    $('#STUNIT').val(val.UNIT)
                                    $('#STSPRICE').val(val.SPRICE)
                                    $('#STSSTA').val(val.SSTA)
                                    $('#STEOR').val(val.EOR)
                                    $('#STDPCODE').val(val.DPCODE)
                                    $('#STLMODI').val(val.lmodi)
                                    $('#STGROP').val(val.grop)
                                    $('#STAEDT').val(val.AEDT)
                                    $('#STUSER1').val(val.USER1)
                                });
                            },
                            error: function OnErrorCall(response) {
                                alert(response.status + " " + response.statusText);
                            }
                        });
                        e.preventDefault();
                    }
                });
                $('#txtQTY').keypress(function (e) {
                    if (e.keyCode == 13) {
                        var dataObject = {
                            BILL_NO: $("#txtBNO1").val(),
                            PART_NO: $("#txtPTNO").val(),
                            PARTI: $("#txtPTNAME").val(),
                            MRP: $("#txtMRP").val(),
                            QTY: $("#txtQTY").val(),
                            SPRICE: $("#txtSPRICE").val(),
                            TOTAL: $("#txtTOT").val(),
                            TAX: $("#txtTRATE").val(),
                            TVAL: $("#txtTVAL").val(),
                            UNIT: $("#txtUNIT").val(),
                            BDATE: $("#txtBDATE").val(),
                            SSTA: "NEW",
                            CMP: "EICHER",
                            MODE: $("#txtMODE").val(),
                            BID: new Date($.now()),
                            LMODI: new Date($.now()),
                            DPCODE: "A1587",
                            DNAME: $('#txtSNAME').val(),
                            CUST: $('#txtCUST').val(),
                            STOT: $('#txtSTOT').val(),
                            TVAL: $('#txtTVAL1').val(),
                            USER1: '@HttpContext.Current.User.Identity.Name.ToString()',
                            AEDT: "NEW",
                            BILLID: $('#BIDtst1').val()
                        };
                        $.ajax({
                            url: "@Url.Action("Save","BILL")",
                            type: "POST",
                            data: dataObject,
                            dataType: "json",
                            success: function (data) {
                                if (data.toString() != "Successfully Saved!") {
                                    alert("FAILED");
                                }
                                else
                                {
                                    var dataObject1 = {
                                        RID1: $('#STRID1').val(),
                                        RID: $('#STRID').val(),
                                        TYPE: $('#STTYPE').val(),
                                        PART_NO: $('#STPART_NO').val(),
                                        PARTI: $('#STPARTI').val(),
                                        MRP: $('#STMRP').val(),
                                        QTY: $('#STQTY').val(),
                                        TOTAL: $('#STTOTAL').val(),
                                        RACKNO: $('#STRACKNO').val(),
                                        TAX: $('#STTAX').val(),
                                        TVAL: $('#STTVAL').val(),
                                        STOTAL: $('#STSTOTAL').val(),
                                        PPRICE: $('#STPPRICE').val(),
                                        UNIT: $('#STUNIT').val(),
                                        SPRICE: $('#STSPRICE').val(),
                                        SSTA: $('#STSSTA').val(),
                                        EOR: $('#STEOR').val(),
                                        DPCODE: $('#STDPCODE').val(),
                                        lmodi: $('#STLMODI').val(),
                                        grop: $('#STGROP').val(),
                                        AEDT: $('#STAEDT').val(),
                                        USER1: $('#STUSER1').val()
                                    }
                                    $.ajax({
                                        url: "@Url.Action("STUPD", "BILL")",
                                        type: "POST",
                                    data: dataObject1,
                                    dataType: "json",
                                    success: function (data) {
                                        if (data.toString() != "Successfully Saved!") {
                                            alert("FAILED");
                                        }
                                    },
                                    error: function (response) {
                                        alert(response.status + " " + response.responseText);
                                    }
                                });
                                $("#grid1").jqxGrid("addrow", null, dataObject, "first");
                                $('#txtSTOT').val(null)
                                $('#txtPTNO').val(null)
                                $('#txtPTNAME').val(null)
                                $('#txtUNIT').val(null)
                                $('#txtMRP').val(null)
                                $('#txtSPRICE').val(null)
                                $('#txtTRATE').val(null)
                                $('#txtSTC').val(null)
                                $('#txtQTY').val(null)
                                $('#txtTVAL1').val(null)
                                $('#STRID1').val(null)
                                $('#STRID').val(null)
                                $('#STTYPE').val(null)
                                $('#STPART_NO').val(null)
                                $('#STPARTI').val(null)
                                $('#STMRP').val(null)
                                $('#STQTY').val()
                                $('#qinc').val(null)
                                $('#STTOTAL').val(null)
                                $('#STRACKNO').val(null)
                                $('#STTAX').val(null)
                                $('#STTVAL').val(null)
                                $('#STSTOTAL').val(null)
                                $('#STPPRICE').val(null)
                                $('#STUNIT').val(null)
                                $('#STSPRICE').val(null)
                                $('#STSSTA').val(null)
                                $('#STEOR').val(null)
                                $('#STDPCODE').val(null)
                                $('#STLMODI').val(null)
                                $('#STGROP').val(null)
                                $('#STAEDT').val(null)
                                $('#STUSER1').val(null)
                                changessave = false;
                                var totgt = $('#grid1').jqxGrid('getcolumnaggregateddata', 'STOT', ['sum', 'avg'], true);
                                var totgt1 = totgt.sum;
                                $('#txtGTOT').val(totgt1.toFixed(2));
                                var tval1 = parseFloat($('#txtGTOT').val()) * 14.5 / 100
                                $('#txtTVAL').val(tval1.toFixed(2));
                                $('#txtBAMT').val(Math.round((parseFloat($('#txtGTOT').val()) + parseFloat($('#txtTVAL').val()))).toFixed(2));
                                var rnd = parseFloat($('#txtBAMT').val()) - (parseFloat($('#txtGTOT').val()) + parseFloat($('#txtTVAL').val()));
                                $('#txtROUND').val(rnd.toFixed(2));
                                var mde = $('#txtMODE').val();
                                if (mde == "CREDIT") {
                                    $('#txtNTOT').val($('#txtBAMT').val());
                                    $('#txtTOTAL').val(Math.round(parseFloat($('#txtTOT').val()) + parseFloat($('#txtTOTAL').val())).toFixed(2));
                                    $('#txtBAPAY').val($('#txtBAMT').val());
                                    $('#txtBST').val("UP");
                                    $('#txtMODE').val(mde);
                                }
                                else {
                                    $('#txtCBILL').val($('#txtBAMT').val());
                                    $('#txtMODE').val(mde);
                                }
                                if (!EMODE1) {
                                    EMODE = false;
                                    $('#UPDBILL').show();
                                    $('#NBILL').prop('disabled', true);
                                    $('#btnNBILL').prop('disabled', true);
                                }
                                else {
                                    $('#UPDBILL').hide();
                                    $('#PRINTBILL').hide();
                                    NMODE = false;
                                    EMODE1 = true;
                                }
                                $('#txtTOT').val(null)
                                $("#popupWindow").jqxWindow('hide');
                                $('#searchField').focus();
                                }
                            },
                            error: function () {
                                alert("ERROR");
                            }
                        });
                        e.preventDefault();
                    }
                });

                $('#txtQTY1').keypress(function (e) {
                    if (e.keyCode == 13) {
                        var dataObject2 = {
                            BILLID: $('#BILLID-TXT').val(),
                            BILL_NO: $("#txtBNO11").val(),
                            PART_NO: $("#txtPTNO1").val(),
                            PARTI: $("#txtPTNAME1").val(),
                            MRP: $("#txtMRP1").val(),
                            QTY: $("#txtQTY1").val(),
                            SPRICE: $("#txtSPRICE1").val(),
                            TOTAL: $("#txtTOT1").val(),
                            TAX: $("#txtTRATE1").val(),
                            TVAL: $("#txtTVAL1").val(),
                            UNIT: $("#txtUNIT1").val(),
                            BDATE: $("#txtBDATE").val(),
                            SSTA: "NEW",
                            CMP: "EICHER",
                            MODE: $("#txtMODE1").val(),
                            BID: $('#BID-TXT').val(),
                            LMODI: new Date($.now()),
                            DPCODE: "A1587",
                            DNAME: $('#txtSNAME').val(),
                            CUST: $('#txtCUST').val(),
                            STOT: $('#txtSTOT1').val(),
                            TVAL: $('#txtTVAL11').val(),
                            USER1: '@HttpContext.Current.User.Identity.Name.ToString()',
                            AEDT: "NEW"
                        };
                        $.ajax({
                            url: "@Url.Action("BILLUPD", "BILL")",
                            type: "POST",
                            data: dataObject2,
                            dataType: "json",
                            success: function (data) {
                                if (data.toString() != "Successfully Saved!") {
                                    alert("FAILED");
                                }
                                else {
                                    changessave = false;
                                    $('#REFBILL').click();
                                }
                            },
                            error: function () {
                                alert("ERROR");
                            }
                        });

                        var dataObject3 = {
                            RID1: $('#STRID11').val(),
                            RID: $('#STRID1').val(),
                            TYPE: $('#STTYPE1').val(),
                            PART_NO: $('#STPART_NO1').val(),
                            PARTI: $('#STPARTI1').val(),
                            MRP: $('#STMRP1').val(),
                            QTY: $('#STQTY1').val(),
                            TOTAL: $('#STTOTAL1').val(),
                            RACKNO: $('#STRACKNO1').val(),
                            TAX: $('#STTAX1').val(),
                            TVAL: $('#STTVAL1').val(),
                            STOTAL: $('#STSTOTAL1').val(),
                            PPRICE: $('#STPPRICE1').val(),
                            UNIT: $('#STUNIT1').val(),
                            SPRICE: $('#STSPRICE1').val(),
                            SSTA: $('#STSSTA1').val(),
                            EOR: $('#STEOR1').val(),
                            DPCODE: $('#STDPCODE1').val(),
                            lmodi: $('#STLMODI1').val(),
                            grop: $('#STGROP1').val(),
                            AEDT: $('#STAEDT1').val(),
                            USER1: $('#STUSER11').val()
                        }
                        $.ajax({
                            url: "@Url.Action("STUPD", "BILL")",
                            type: "POST",
                            data: dataObject3,
                            dataType: "json",
                            success: function (data) {
                                if (data.toString() != "Successfully Saved!") {
                                    alert("FAILED");
                                }
                                else {
                                    changessave = false;
                                }
                            },
                            error: function (response) {
                                alert(response.status + " " + response.responseText);
                            }
                        });
                        $('#txtUNIT1').focus();
                        isupd = false;
                        e.preventDefault();
                    }
                });
                $('#txtBNO').focus(function () {
                    $('#txtBNO').jqxTooltip("open");
                });
                $('#txtBDATE').focus(function () {
                    $('#txtBDATE').jqxTooltip("open");
                });
                $('#txtBDATE').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#txtCUST').focus();
                        e.preventDefault();
                    }
                });
                $('#txtCUST').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $.ajax({
                            type: "GET",
                            url: "@Url.Action("getct","BILL")",
                            data: { aData: $("#txtCUST").val() },
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function (data) {
                                $.each(data, function (i, val) {
                                    $('#txtADDRESS').val(val.ADDRESS);
                                    $('#txtVNO').val(val.VNO);
                                    $('#txtSNAME').focus();
                                    $('#txtMODE').val("CREDIT");
                                });
                            },
                            error: function OnErrorCall(response) {
                                alert(response.status + " " + response.statusText);
                            }
                        });

                        $.ajax({
                            type: "GET",
                            url: "@Url.Action("gtbtot", "BILL")",
                            data: { aData: $("#txtCUST").val() },
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function (data) {
                             $('#txtTOTAL').val(data.TOTAL);
                            },
                            error: function OnErrorCall(response) {
                                alert(response.status + " " + response.statusText);
                            }
                        });
                        e.preventDefault();
                    }
                });
                $('#txtSNAME').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#txtADDRESS').focus();
                        e.preventDefault();
                    }
                });
                $('#txtADDRESS').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#txtVNO').focus();
                        e.preventDefault();
                    }
                });
                $('#txtVNO').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#txtMODE').focus();
                        e.preventDefault();
                    }
                });
                $('#txtMODE').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#searchField').focus();
                        e.preventDefault();
                    }
                });
                $('#txtUNIT1').keypress(function (e) {
                    var totgt = $('#grid1').jqxGrid('getcolumnaggregateddata', 'STOT', ['sum', 'avg'], true);
                    var totgt1 = totgt.sum;
                    $('#txtGTOT').val(totgt1.toFixed(2));
                    var tval1 = parseFloat($('#txtGTOT').val()) * 14.5 / 100
                    $('#txtTVAL').val(tval1.toFixed(2));
                    $('#txtBAMT').val(Math.round((parseFloat($('#txtGTOT').val()) + parseFloat($('#txtTVAL').val()))).toFixed(2));
                    var rnd = parseFloat($('#txtBAMT').val()) - (parseFloat($('#txtGTOT').val()) + parseFloat($('#txtTVAL').val()));
                    $('#txtROUND').val(rnd.toFixed(2));
                    var mde = $('#txtMODE').val();
                    if (mde == "CREDIT") {
                        $('#txtNTOT').val($('#txtBAMT').val());
                        var baldif = parseFloat($('#txtTOT1').val()) - parseFloat($('#txtTOT2').val());
                        $('#txtTOTAL').val(parseFloat(baldif) + parseFloat($('#txtTOTAL').val()));
                        $('#txtBAPAY').val($('#txtBAMT').val());
                        $('#txtBST').val("UP");
                        $('#txtMODE').val(mde);
                    }
                    else {
                        $('#txtCBILL').val($('#txtBAMT').val());
                        $('#txtMODE').val(mde);
                    }
                    $('#txtTOT1').val(null)
                    $('#txtPTNO1').val(null)
                    $('#txtPTNAME1').val(null)
                    $('#txtUNIT1').val(null)
                    $('#txtMRP1').val(null)
                    $('#txtSPRICE1').val(null)
                    $('#txtTRATE1').val(null)
                    $('#txtSTC1').val(null)
                    $('#txtQTY1').val(null)
                    $('#txtTVAL11').val(null)
                    $('#STRID11').val(null)
                    $('#STRID1').val(null)
                    $('#STTYPE1').val(null)
                    $('#STPART_NO1').val(null)
                    $('#STPARTI1').val(null)
                    $('#STMRP1').val(null)
                    $('#STQTY1').val()
                    $('#qinc1').val(null)
                    $('#STTOTAL1').val(null)
                    $('#STRACKNO1').val(null)
                    $('#STTAX1').val(null)
                    $('#STTVAL1').val(null)
                    $('#STSTOTAL1').val(null)
                    $('#STPPRICE1').val(null)
                    $('#STUNIT1').val(null)
                    $('#STSPRICE1').val(null)
                    $('#STSSTA1').val(null)
                    $('#STEOR1').val(null)
                    $('#STDPCODE1').val(null)
                    $('#STLMODI1').val(null)
                    $('#STGROP1').val(null)
                    $('#STAEDT1').val(null)
                    $('#STUSER11').val(null)
                    if (NMODE != false)
                    {
                    	EMODE = false;
                    	$('#UPDBILL').show();
                    $('#NBILL').prop('disabled', true);
                    $('#btnNBILL').prop('disabled', true);
                    }
                    isupd = true;
                    $("#popupWindow1").jqxWindow('hide');
                    $('#searchField').focus();
                    e.preventDefault();
                });
                function canupd() {
                    var totgt = $('#grid1').jqxGrid('getcolumnaggregateddata', 'STOT', ['sum', 'avg'], true);
                    var totgt1 = totgt.sum;
                    $('#txtGTOT').val(totgt1.toFixed(2));
                    var tval1 = parseFloat($('#txtGTOT').val()) * 14.5 / 100
                    $('#txtTVAL').val(tval1.toFixed(2));
                    $('#txtBAMT').val(Math.round((parseFloat($('#txtGTOT').val()) + parseFloat($('#txtTVAL').val()))).toFixed(2));
                    var rnd = parseFloat($('#txtBAMT').val()) - (parseFloat($('#txtGTOT').val()) + parseFloat($('#txtTVAL').val()));
                    $('#txtROUND').val(rnd.toFixed(2));
                    var mde = $('#txtMODE').val();
                    if (mde == "CREDIT") {
                        $('#txtNTOT').val($('#txtBAMT').val());
                        var baldif = parseFloat($('#txtTOT1').val()) - parseFloat($('#txtTOT2').val());
                        $('#txtTOTAL').val(parseFloat(baldif) + parseFloat($('#txtTOTAL').val()));
                    }
                    else {
                        $('#txtCBILL').val($('#txtBAMT').val());
                    }
                    $('#txtTOT1').val(null)
                    $('#txtPTNO1').val(null)
                    $('#txtPTNAME1').val(null)
                    $('#txtUNIT1').val(null)
                    $('#txtMRP1').val(null)
                    $('#txtSPRICE1').val(null)
                    $('#txtTRATE1').val(null)
                    $('#txtSTC1').val(null)
                    $('#txtQTY1').val(null)
                    $('#txtTVAL11').val(null)
                    $('#STRID11').val(null)
                    $('#STRID1').val(null)
                    $('#STTYPE1').val(null)
                    $('#STPART_NO1').val(null)
                    $('#STPARTI1').val(null)
                    $('#STMRP1').val(null)
                    $('#STQTY1').val()
                    $('#qinc1').val(null)
                    $('#STTOTAL1').val(null)
                    $('#STRACKNO1').val(null)
                    $('#STTAX1').val(null)
                    $('#STTVAL1').val(null)
                    $('#STSTOTAL1').val(null)
                    $('#STPPRICE1').val(null)
                    $('#STUNIT1').val(null)
                    $('#STSPRICE1').val(null)
                    $('#STSSTA1').val(null)
                    $('#STEOR1').val(null)
                    $('#STDPCODE1').val(null)
                    $('#STLMODI1').val(null)
                    $('#STGROP1').val(null)
                    $('#STAEDT1').val(null)
                    $('#STUSER11').val(null)
                    $('#UPDBILL').show();
                    $('#NBILL').prop('disabled', true);
                    $('#btnNBILL').prop('disabled', true);
                    EMODE = false;
                    isupd = true;
                    $("#popupWindow1").jqxWindow('hide');
                    $('#searchField').focus();
                }
                $('#btnNBILL').click(function (e) {
                    if (EMODE == false) {
                        alert("Update in Proccess!");
                    }
                    else {
                        if (NMODE == true) {
                            $('#msg').html("Nothing to Save! Please Add Record First");
                            $("#messageNotification").jqxNotification("open");
                        }
                        else {
                            if (changessave == true) {
                                $('#msg').html("Nothing to Save! Please Add Record First");
                                $("#messageNotification").jqxNotification("open");
                            }
                            else {
                                var datarec = {
                                    BNO: $("#txtBNO").val(),
                                    BDATE: $("#txtBDATE").val(),
                                    CUST: $("#txtCUST").val(),
                                    SNAME: $('#txtSNAME').val(),
                                    GTOT: $('#txtGTOT').val(),
                                    NTOT: $('#txtNTOT').val(),
                                    VNO: $('#txtVNO').val(),
                                    ROUND: $('#txtROUND').val(),
                                    ADDRESS: $('#txtADDRESS').val(),
                                    MODE: $('#txtMODE').val(),
                                    TVAL: $('#txtTVAL').val(),
                                    PAYMENT: $('#txtPAYMENT').val(),
                                    SECTOR: $('#txtSECTOR').val(),
                                    USER1: $('#txtUSER1').val(),
                                    CBILL: $('#txtCBILL').val(),
                                    BAPAY: $('#txtBAPAY').val(),
                                    BST: $('#txtBST').val(),
                                    SSTA: $('#txtSSTA').val(),
                                    DPCODE: $('#txtDPCODE').val(),
                                    LMODI: $('#txtLMODI').val(),
                                    BID1: $('#txtBID1').val(),
                                    TOTAL: $('#txtTOTAL').val(),
                                    AEDT: $('#txtAEDT').val(),
                                    BAMT: $('#txtBAMT').val(),
                                    BID: $('#BIDtst').val()
                                }
                                $.ajax({
                                    url: "@Url.Action("Save1", "BILL")",
                                    type: "POST",
                                    data: datarec,
                                    dataType: "json",
                                    success: function (data) {
                                        if (data.toString() != "Successfully Saved!") {
                                            alert(data.toString());
                                        }
                                        else {
                                            changessave = true;
                                            NMODE = true;
                                            source1.data = { "bno": $('#txtBNO').val() };
                                            $('#grid1').jqxGrid('updatebounddata');
                                            $('#grid').jqxGrid('updatebounddata');
                                            $('#PRINTBILL').click();
                                        }
                                    },
                                    error: function (response) {
                                        alert(response.status + " " + response.responseText);
                                    }
                                });
                            }
                        }
                    }
                });
                $('#REFBILL').click(function () {
                    source1.data = { "bno": $('#txtBNO').val() };
                    $('#grid1').jqxGrid('updatebounddata');
                });
                $('#NBILL').click(function (e) {
                    if (!changessave) {
                        $('#msg').html("New Bill On Going! Please Save the Existing Before Create New Bill");
                        $("#messageNotification").jqxNotification("open");
                    }
                    else {
                        cls();
                        $.ajax({
                            type: "GET",
                            url: "@Url.Action("gmid","Stock")",
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function (data) {
                            $('#BIDtst').val(data);
                            }
                        });
                        $('#PRINTBILL').hide();
                        $.ajax({
                            type: "GET",
                            url: "@Url.Action("getlrec", "BILL")",
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function (data) {
                                var gtbno = parseFloat(data) + 1;
                                $('#txtBNO').val("MB " + gtbno + "/16-17");
                            },
                            error: function OnErrorCall(response) {
                                alert(response.status + " " + response.responseText);
                            }
                        });
                        $('#txtBNO').focus();
                        event.preventDefault();
                    }
                });
                $('#PRINTBILL').click(function () {
                    $('#txtBNOH').val($('#txtBNO').val());
                    $('#txtBNOH1').val($('#txtBNO').val());
                    $('#txtBDATEH').val($('#txtBDATE').val());
                    $('#txtBDATEH1').val($('#txtBDATE').val());
                    $('#txtCUSTH').val($('#txtCUST').val());
                    $('#txtCUSTH1').val($('#txtCUST').val());
                    $('#txtSNAMEH').val($('#txtSNAME').val());
                    $('#txtSNAMEH1').val($('#txtSNAME').val());
                    $('#txtVNOH').val($('#txtVNO').val());
                    $('#txtVNOH1').val($('#txtVNO').val());
                    $('#txtADDRESSH').val($('#txtADDRESS').val());
                    $('#txtADDRESSH1').val($('#txtADDRESS').val());
                    $('#txtGTOTH1').val($('#txtGTOT').val());
                    $('#txtNTOTH1').val($('#txtNTOT').val());
                    $('#txtTVALH1').val($('#txtTVAL').val());
                    $('#txtROUNDH1').val($('#txtROUND').val());
                    $("#CHALLAN").jqxWindow('show');
                });
                $('#PCHALLAN').click(function () {
                    $("#CHALLAN").jqxWindow('hide');
                    cls();
                });
                $('#UPDBILL').click(function () {
                    if (EMODE == true) {
                        alert("Nothing to Update! Please Review");
                    }
                    else {
                        var datarec = {
                            BNO: $("#txtBNO").val(),
                            BDATE: $("#txtBDATE").val(),
                            CUST: $("#txtCUST").val(),
                            SNAME: $('#txtSNAME').val(),
                            GTOT: $('#txtGTOT').val(),
                            NTOT: $('#txtNTOT').val(),
                            VNO: $('#txtVNO').val(),
                            ROUND: $('#txtROUND').val(),
                            ADDRESS: $('#txtADDRESS').val(),
                            MODE: $('#txtMODE').val(),
                            TVAL: $('#txtTVAL').val(),
                            BID: $('#txtBID').val(),
                            PAYMENT: $('#txtPAYMENT').val(),
                            SECTOR: $('#txtSECTOR').val(),
                            USER1: $('#txtUSER1').val(),
                            CBILL: $('#txtCBILL').val(),
                            BAPAY: $('#txtBAPAY').val(),
                            BST: $('#txtBST').val(),
                            SSTA: $('#txtSSTA').val(),
                            DPCODE: $('#txtDPCODE').val(),
                            LMODI: $('#txtLMODI').val(),
                            BID1: $('#txtBID1').val(),
                            TOTAL: $('#txtTOTAL').val(),
                            AEDT: $('#txtAEDT').val(),
                            BAMT: $('#txtBAMT').val()
                        }
                        $.ajax({
                            url: "@Url.Action("INVUPD", "BILL")",
                            type: "POST",
                            data: datarec,
                            dataType: "json",
                            success: function (data) {
                                if (data.toString() != "Successfully Saved!") {
                                    alert(data.toString());
                                }
                                else {
                                    changessave = true;
                                    EMODE = true;
                                    source1.data = { "bno": $('#txtBNO').val() };
                                    $('#grid1').jqxGrid('updatebounddata');
                                    $('#grid').jqxGrid('updatebounddata');
                                    $.ajax({
                            			url: "@Url.Action("UPDTOT", "BILL")",
                            			type: "POST",
                            			data: { aData: $("#txtBID").val(), TOT : $("#txtTOTAL").val() },
                            			dataType: "json",
                            			success: function (data) {
                                			if (data.toString() != "Successfully Saved!") {
                                    			alert(data.toString());
                                			}
                                			else
                                			{
                                			alert(data.toString());
                                			}
                            			},
                            			error: function (response) {
                                			alert(response.status + " " + response.responseText);
                            			}
                        			});
                                    $('#PRINTBILL').click();
                                }
                            },
                            error: function (response) {
                                alert(response.status + " " + response.responseText);
                            }
                        });
                    }
                });
                function cls() {
                    $('#txtBNO').val(null);
                    EMODE = true;
                    NMODE = true;
                    EMODE1 = true;
                    $('#NBILL').prop('disabled', false);
                    $('#btnNBILL').prop('disabled', false);
                    $('#UPDBILL').hide();
                    $('#PRINTBILL').hide();
                    $("#txtBDATE").val(null);
                    $("#txtCUST").val(null);
                    $('#txtSNAME').val(null);
                    $('#txtGTOT').val(null);
                    $('#txtNTOT').val(null);
                    $('#txtVNO').val(null);
                    $('#txtROUND').val(null);
                    $('#txtADDRESS').val(null);
                    $('#txtMODE').val(null);
                    $('#txtTVAL').val(null);
                    $('#txtBID').val(null);
                    $('#txtPAYMENT').val(null);
                    $('#txtSECTOR').val(null);
                    $('#txtUSER1').val(null);
                    $('#txtCBILL').val(null);
                    $('#txtBAPAY').val(null);
                    $('#txtBST').val(null);
                    $('#txtSSTA').val(null);
                    $('#txtDPCODE').val(null);
                    $('#txtLMODI').val(null);
                    $('#txtBID1').val(null);
                    $('#txtAEDT').val(null);
                    $('#txtBAMT').val(null);
                    $('#txtTOTAL').val(null);
                    source1.data = { "bno": $('#txtBNO').val() };
                    $('#grid1').jqxGrid('updatebounddata');
                    $('#grid').jqxGrid('updatebounddata');
                }
                $('#txtBDATE').datepicker({ dateFormat: 'dd-M-yy' });
            });

            jQuery(window).bind('beforeunload', function () {
                if (!changessave) {
                    return 'Please Save the Bill Before Exit this Page!';
                }
            });
    </script>		
</html>