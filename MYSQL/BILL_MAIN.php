<?php
$st = session_status();
		 if($st!=2)
		 {
			session_start(); 
			$_SESSION["PNAME"] = "SALES";
		 }
require 'LAYOUT.php';
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
	.ui-state-highlight {background: lime !important; }
</style>
<div id="grid1" style="margin-left:.5%"></div>
<br/>
<table class="table table-hover table-bordered table-responsive ui-front" style="font-size:x-small;">
            <tr>
                <td><label for="BNO">BILL NO</label></td>
                <td><input class="form-control input-xs" id="txtBNO" name="BNO" style="text-transform:uppercase" type="text" value="" /></td>
				<td><label for="VNO">VAT NO</label></td>
                <td><input class="form-control input-xs" id="txtVNO" name="VNO" style="text-transform:uppercase" type="text" value="" /></td>
				<td><label for="SID">SITE ID</label></td>
                <td><input class="form-control ui-front input-xs" id="txtSID" name="SID" style="text-transform:uppercase" type="text" value="" /></td>
                <td><label for="GTOT">GRAND TOTAL</label></td>
                <td><input class="form-control input-xs" id="txtGTOT" name="GTOT" style="text-transform:uppercase" type="text" value="" /></td>
				<td><label for="TVAL">TAX VALUE</label></td>
                <td><input class="form-control input-xs" id="txtTVAL" name="TVAL" style="text-transform:uppercase" type="text" value="" /></td>
            </tr>
            <tr>
				<td><label for="BDATE">BILL DATE</label></td>
                <td><input class="form-control ui-front input-xs" id="txtBDATE" name="BDATE" type="text" value="" /></td>
				<td><label for="SNAME">SITE NAME</label></td>
                <td><input class="form-control input-xs" id="txtSNAME" name="SNAME" style="text-transform:uppercase" type="text" value="" /></td>
				<td><label for="TECH">TECHNICIAN</label></td>
                <td><input class="form-control input-xs" id="txtTECH" name="TECH" style="text-transform:uppercase" type="text" value="" /></td>
				<td><label for="ROUND">ROUND OFF</label></td>
                <td><input class="form-control input-xs" id="txtROUND" name="ROUND" style="text-transform:uppercase" type="text" value="" /></td>
				<td><label for="BAMT">BILL AMOUNT</label></td>
                <td><input class="form-control input-xs" id="txtBAMT" name="BAMT" style="text-transform:uppercase" type="text" value="" /></td>
            </tr>
            <tr>
				<td><label for="CUST">CUSTOMER</label></td>
                <td><input class="form-control input-xs" id="txtCUST" name="CUST" style="text-transform:uppercase" type="text" value="" /></td>
                <td><label for="ENS">ENGINE NO</label></td>
                <td><input class="form-control input-xs" id="txtENS" name="ENS" style="text-transform:uppercase" type="text" value="" /></td>
				<td><label for="JOB">JOB</label></td>
                <td><input class="form-control ui-front input-xs" id="txtJOB" name="JOB" type="text" value="" /></td>
                <td><label for="MODE">BILL MODE</td>
                <td><input class="form-control input-xs" id="txtMODE" name="MODE" style="text-transform:uppercase" type="text" value="" /></td>
                <td><label for="TOTAL">TOTAL BALANCE</label></td>
                <td><input class="form-control input-xs" id="txtTOTAL" name="TOTAL" style="text-transform:uppercase" type="text" value="" /></td>
            </tr>
			<tr>
			<td><label for="ADDRESS">ADDRESS</label></td>
			<td colspan="9"><input class="form-control input-xs" id="txtADDRESS" name="ADDRESS" style="text-transform:uppercase" type="text" value="" /></td>
			</tr>
            <tr>
                <td colspan="10">
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
					<input id="txtPOSE" name="BID" type="hidden" value="" />
                </td>
            </tr>
        </table>
<input type="button" value="Save Bill" id="btnNBILL" style='margin-left:5px' />
<input id="NBILL" value="New Bill" type="button" style='margin-left: 5px;' />
<input id="REFBILL" value="Refresh" type="button" style='margin-left: 5px;' />
<input id="UPDBILL" value="Update Bill" type="button" style='margin-left: 5px;' />
<input id="PRINTBILL" value="Print" type="button" style='margin-left: 5px;' />
<input id='VBILL' type='button' value='View Bills' style='margin-left:5px'/>
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
				<td><label for="txtPTNAME">PART NAME:</label></td>
                <td align="left"><input id="txtPTNAME" type="text" class="form-control input-xs" /></td>
                <td><label for="txtQTY">QUANTITY:</label></td>
                <td align="left"><input id="txtQTY" type="number" class="form-control input-xs" /></td>
            </tr>
            <tr>
				<td><label for="txtPTNO">PART NO:</label></td>
                <td align="left"><input id="txtPTNO" type="text" class="form-control input-xs" /></td>
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
					<input type="hidden" id="txtMODE1" />
					<input type="hidden" id="txtCMP" />
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
                <td align="left"><input id="txtQTY1" type="number" class="form-control input-xs" /></td>
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
					<input type="hidden" id="txtCMP1" />
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
        <input id="Cancel2" type="button" value="Cancel" style="display:none" />
		<input id='sf' type='text' style='float:left;margin-left:5px' />
		<div id="dp1"></div>
		<label id="gtrec1" style="margin-left:5px;color:red"></label>
		<div id="dlg1" title="">
</div>
<div id="LBILL1">
<div>LIST OF BILLS</div>
  <div style="overflow: hidden;">
  <table id="grid3"></table>
  <div id="pager3"></div>
  </div>
  </div>
    </div>
</div>

<div id="CHALLAN">
    <div>PRINT</div>
    <div style="overflow: hidden;">
        <div class="navbar-form">
            <table class="table table-bordered table-hover table-responsive" style="overflow:auto">
                <tr>
                    <td align="center">
                        <form method="post" action="CODES/BILL/CHALLAN.php">
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
                        <form method="post" action="CODES/BILL/PBILL.php">
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
							<input type="hidden" id="txtPNO1" placeholder="BILL NO" class="form-control" name="PNO" />
							<input type="hidden" id="txtPDATE1" placeholder="BILL NO" class="form-control" name="PDATE" />
							<input type="hidden" id="txtQNO1" placeholder="BILL NO" class="form-control" name="QNO" />
							<input type="hidden" id="txtQDATE1" placeholder="BILL NO" class="form-control" name="QDATE" />
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
                    <label for="CMP">MFG</label>
                </td>
                <td>
                    <input class="form-control input-xs" id="adCMP" name="CMP" placeholder="MANUFACTURED BY" type="text" value="" />
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
                    <label for="DPCODE">DEALER CODE</label>
                </td>
                <td>
                    <input class="form-control input-xs" id="adDPCODE" name="DPCODE" placeholder="DEALER CODE" type="text" value="" />
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <input id="cls3" type="button" class="btn btn-danger btn-xs" value="Cancel" />
                    <input id="sv1" type="button" class="btn btn-primary btn-xs ui-icon-plus" value="Save" />
                    <input id="adnstc2" type="button" class="btn btn-success btn-xs" value="Add New Item"/>
                    <input id="adLMODI" name="lmodi" type="hidden" value="" />
                    <input id="adSSTA" name="SSTA" type="hidden" value="" />
                    <input id="adAEDT" name="AEDT" type="hidden" value="" />
                    <input id="BIDtst2" name="RID1" type="hidden" value="" />
					<input id="adUSER" name="USER1" type="hidden" value="" />
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
                <td><label for="PRCMP">MFG</label></td>
                <td>
                    <input class="text-box single-line form-control" id="PRCMP" type="text" value="" name="PRCMP"/>
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
					<input id="PRDPCODE" type="hidden" value="" name="PRDPCODE"/>
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
<input id='searchField' type='text' style='margin-left:5px'/>
<div id="C-FORM">
<div>BILL BASIC</div>
  <div style="overflow: hidden;">
	<table class="table table-bordered table-hover table-responsive adn1" style="font-size : smaller">
		<tr>
			<td class="label-success">PO NO:</td>
			<td><input id="PNO" name="PNO" type="text" value="" class="form-control input-xs" /></td>
		</tr>
		<tr>
			<td class="label-danger">PO DATE:</td>
			<td><input id="PDATE" name="PDATE" type="Date" value="" class="form-control input-xs" /></td>
		</tr>
		<tr>
			<td class="label-primary">QUOTATION NO:</td>
			<td><input id="QNO" name="QNO" type="text" value="" class="form-control input-xs" /></td>
		</tr>
		<tr>
			<td class="label-warning">QUOTATION DATE:</td>
			<td><input id="QDATE" name="QDATE" type="Date" value="" class="form-control input-xs" /></td>
		</tr>
		<tr><td colspan=2><input id="SC-FORM" type="button" class="btn btn-info btn-xs form-control" value="Save" /></td></tr>
	</table>
</div>
</div>
<div id="LBILL">
<div>LIST OF BILLS</div>
  <div style="overflow: hidden;">
  <table id="grid2" style="width:95%"></table>
  <div id="pager"></div>
  <div id="pager1"></div>
<div id="pg">
    &nbsp;
    <input type="date" id="frm1" name="frm" class="input-xs"/>
    <input type="date" id="too1" name="too" class="input-xs"/>
    <input type="button" id="src" value="Search" class="btn btn-xs btn-danger" />
	<input type="button" id="exp_bill" value="Export" class="btn btn-xs btn-success" />
</div>
<input type="text" id="sr" class="form-control input-xs" />
  </div>
</div>
<script src="js/INC/BILL1.js">

</script>
</html>