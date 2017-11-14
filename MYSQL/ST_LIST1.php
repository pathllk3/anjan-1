<?php
$st = session_status();
		 if($st!=2)
		 {
			session_start(); 
			$_SESSION["PNAME"] = "STOCK LIST";
		 }
require 'LAYOUT.php';
if (isset($_POST['sv2']))
{
	include ("connect1.php");
	$PRPART_NO = $_POST['PRPART_NO'];
	$PRCATE = $_POST['PRCATE'];
	$PRPARTI = $_POST['PRPARTI'];
	$PRMRP = $_POST['PRMRP'];
	$PRGROP = $_POST['PRGROP'];
	$PRunit = $_POST['PRunit'];
	$PRTRATE = $_POST['PRTRATE'];
	$PRDPCODE = $_POST['PRDPCODE'];
	$PRlmodi = $_POST['PRlmodi'];
	$PRrid1 = $_POST['PRrid1'];
	$PRAEDT = $_POST['PRAEDT'];
	$PRCMP = $_POST['PRCMP'];
	$query = mysql_query("insert into SHEET1(PART_NO, PARTI, MRP, GROP, CATE, DPCODE, lmodi, TRATE, RID1, UNIT, AEDT, CMP) values ('$PRPART_NO', '$PRPARTI', '$PRMRP', '$PRGROP', '$PRCATE', '$PRDPCODE', '$PRlmodi', '$PRTRATE', '$PRrid1', '$PRunit', '$PRAEDT', '$PRCMP')");
	if ($query) {
	echo '<script>alert("RECORD ADDED");</script>';
}
else {
	echo mysql_error();
}
}
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
<script>
$(function () {
    $(document).ready(function () {
		var $modal = $('#load_popup_modal_show_id');
        var source =
       {
           datatype: "json",
           datafields: [
                { name: 'RID1', type: 'int' },
                { name: 'TYPE', type: 'string' },
                { name: 'PART_NO', type: 'string' },
                { name: 'PARTI', type: 'string' },
                { name: 'MRP', type: 'string' },
                { name: 'QTY', type: 'string' },
                { name: 'TOTAL', type: 'string' },
                { name: 'RACKNO', type: 'string' },
                { name: 'UNIT', type: 'string' },
                { name: 'EOR', type: 'string' },
           ],
           url: 'CODES/STOCK/LIST_SC.php'
       };
        var editrow = -1;
        var dataAdapter = new $.jqx.dataAdapter(source);
        var height1 = $(window).height() - 170;
        $("#grid").jqxGrid({
            width: '99%',
            height: height1,
            source: dataAdapter,
            sortable: true,
            filterable: true,
            altrows: true,
            theme: 'ui-redmond',
            editable: true,
            showtoolbar: true,
            columns: [
                        { text: "RECORD ID", datafield: "RID1", hidden: true },
                        { text: "TYPE", datafield: "TYPE" },
                        { text: "PART NO", datafield: "PART_NO" },
                        { text: "PART NAME", datafield: "PARTI" },
                        { text: "MRP", datafield: "MRP" },
                        { text: "QTY", datafield: "QTY" },
                        { text: "TOTAL", datafield: "TOTAL" },
                        { text: "RACK NO", datafield: "RACKNO" },
                        { text: "UNIT", datafield: "UNIT" },
                        { text: "E. O. R", datafield: "EOR" },
                        {
                            text: 'Details', datafield: 'Details', columntype: 'button', width: 80, sortable: false,  filterable: false, cellsrenderer: function () {
                                return "Deatils";
                            },
                            buttonclick: function (row) {
                                editrow = row;
                                var offset = $("#grid").offset();
                                var dataRecord = $("#grid").jqxGrid('getrowdata', editrow);
                                var ens = dataRecord.RID1;
                                var options = { "backdrop": "static", keyboard: true };
                                $modal.load('CODES/STOCK/ST_DET.php',{'id1': ens},
								function(){
									$modal.modal('show');
								});
                            }
                        }
            ],
            rendertoolbar: function (toolbar) {
                var me = this;
                var container = $("<div style='margin: 5px;'></div>");
                var input = $("<input id='searchField' type='text' style='float: left;' />");
                var btn1 = $("<input type='button' value='Add New Item' style='margin-left:5px'/>");
                var btn2 = $("<a href='CODES/STOCK/ST_EXL.php'>Export Data</a>");
                container.append(input);
                container.append(btn1);
                container.append(btn2);
                var tbl = $("<table></table>");
                var tr = $("<tr></tr>");
                var td2 = $("<td></td>");
                td2.append($('#dp1'));
                tr.append(td2);
                var td1 = $("<td></td>");
                td1.append(container);
                tr.append(td1);
                tbl.append(tr);
                toolbar.append(tbl);
                btn1.jqxButton({ template: "success" });
                btn2.jqxButton({ template: "danger" });
				btn1.on('click', function (e) {
                    $("#ADD_ITM_DIV").jqxWindow('show');
                });
                $("#searchField").jqxInput({ placeHolder: "SEARCH ITEM", height: 23, width: 200, minLength: 1, theme: 'energyblue' });
                var oldVal = "";
                input.on('keydown', function (event) {
                    if (input.val().length >= 2) {
                        if (me.timer) {
                            clearTimeout(me.timer);
                        }
                        if (oldVal != input.val()) {
                            me.timer = setTimeout(function () {
                                addFiter(input.val());
                            }, 1000);
                            oldVal = input.val();
                        }
                    }
                    else {
                        $("#grid").jqxGrid('clearfilters');
                    }
                });
            }
        });
        function addFiter(value) {
            $("#grid").jqxGrid('clearfilters');
            var filtertype = 'stringfilter';
            var filtergroup = new $.jqx.filter();
            var filter = filtergroup.createfilter('stringfilter', value, 'CONTAINS');
            filtergroup.addfilter(2, filter);
            var searchColumnIndex = $("#dp1").jqxDropDownList('selectedIndex');
            switch (searchColumnIndex) {
                case 0:
                    $("#grid").jqxGrid('addfilter', 'PART_NO', filtergroup);
                    break;
                case 1:
                    $("#grid").jqxGrid('addfilter', 'PARTI', filtergroup);
                    break;
            }
            // apply the filters.
            $("#grid").jqxGrid('applyfilters');
        }

        $("#dp1").jqxDropDownList({
            autoDropDownHeight: true, selectedIndex: 0, width: 200,
            source: [
                'PART NO', 'PART NAME'
            ]
        });
		$("#ADD_ITM_DIV").jqxWindow({
            maxHeight: '70%', minWidth: '95%', theme: 'ui-start', isModal: true, autoOpen: false, cancelButton: $("#cls3"), modalOpacity: 0.01
        });
		$("#ADD_ITM_DIV_PR").jqxWindow({
            maxHeight: '70%', minWidth: '80%', theme: 'orange', isModal: true, autoOpen: false, cancelButton: $("#cls4"), modalOpacity: 0.01
        });
		$("#ADD_ITM_DIV").on('open', function () {
            $("#adRID").jqxInput('selectAll');
            $("#adPtno").focus();
        });
		$("#ADD_ITM_DIV_PR").on('open', function () {
            $("#PRPART_NO").jqxInput('selectAll');
            $("#PRPART_NO").focus();
        });
    });
	$("#adnstc2").click(function () {
        $("#ADD_ITM_DIV_PR").jqxWindow('show');
    });
	$("#sv1").click(function () {
                       var RID = new Date($.now());
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
					   var CMP = $('#adCMP').val();
					   var dataString = 'RID1='+ RID + '&TYPE1='+ TYPE + '&PART_NO1='+ PART_NO + '&PARTI1='+ PARTI + '&MRP1='+ MRP + '&QTY1='+ QTY + '&TOTAL1='+ TOTAL + '&RACKNO1='+ RACKNO + '&TAX1='+ TAX + '&TVAL1='+ TVAL + '&STOTAL1='+ STOTAL + '&PPRICE1='+ PPRICE + '&UNIT1='+ UNIT + '&SPRICE1='+ SPRICE + '&SSTA1='+ SSTA + '&EOR1='+ EOR + '&DPCODE1='+ DPCODE + '&lmodi1='+ lmodi + '&AEDT1='+ AEDT + '&GROP1='+ grop + '&USER11='+ USER1 + '&CMP1='+ CMP;
                    $.ajax({
                        url: "CODES/STOCK/ADD_SC.php",
                        type: "POST",
                        data: dataString,
                        cache: false,
                        success: function (data) {
                            alert(data);
							$("#ADD_ITM_DIV").jqxWindow('hide');
							$('#grid').jqxGrid('updatebounddata');
                        },
                        error: function (response) {
                            alert(response.status + " " + response.responseText);
                        }
                    });
                });
				$( "#adParti" ).autocomplete({
					source: 'CODES/STOCK/AT_COM_PNA.php'
				});
				$( "#adPtno" ).autocomplete({
					source: 'CODES/STOCK/AT_COM_PNO.php'
				});
				$("#adParti").keypress(function (e) {
					if (e.keyCode == 13) {
						var ID = $("#adParti").val();
						$.ajax({
							type: "GET",
                            url: "CODES/STOCK/chkpnadup.php",
                            data: 'aData='+ID,
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
							success: function (data) {
								if (data == "0") {
									$.ajax({
                                        type: "GET",
                                        url: "CODES/STOCK/GT_PARTI.php",
                                        data:'aData='+ID,
                                        contentType: "application/json; charset=utf-8",
                                        dataType: "json",
                                        success: function (data) {
											$('#adPtno').val(data[1]);
											$('#adUNIT').val(data[10]);
											$('#adMRP').val(data[3]);
											$('#adGROP').val(data[4]);
											$('#adTYPE').val(data[5]);
											$('#adTAX').val(data[8]);
											$('#adCMP').val(data[12]);
											var spr = parseFloat($('#adTAX').val()) + 100
											$('#adSPRICE').val(parseFloat($('#adMRP').val()) / spr * 100)
                                            $('#adTVAL').val(parseFloat($('#adSPRICE').val()) * parseFloat($('#adTAX').val()) / 100)
                                            $("#adSPRICE").number(true, 2);
                                            $('#adTVAL').number(true, 2);
											$('#adMRP').focus();
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
						var ID = $("#adPtno").val();
						$.ajax({
							type: "GET",
                            url: "CODES/STOCK/chkpnodup.php",
                            data: 'aData='+ID,
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
							success: function (data) {
								if (data == "0") {
									$.ajax({
                                        type: "GET",
                                        url: "CODES/STOCK/GT_PTNO.php",
                                        data:'aData='+ID,
                                        contentType: "application/json; charset=utf-8",
                                        dataType: "json",
                                        success: function (data) {
											$('#adParti').val(data[2]);
											$('#adUNIT').val(data[10]);
											$('#adMRP').val(data[3]);
											$('#adGROP').val(data[4]);
											$('#adTYPE').val(data[5]);
											$('#adTAX').val(data[8]);
											$('#adCMP').val(data[12]);
											var spr = parseFloat($('#adTAX').val()) + 100
											$('#adSPRICE').val(parseFloat($('#adMRP').val()) / spr * 100)
                                            $('#adTVAL').val(parseFloat($('#adSPRICE').val()) * parseFloat($('#adTAX').val()) / 100)
                                            $("#adSPRICE").number(true, 2);
                                            $('#adTVAL').number(true, 2);
											$('#adMRP').focus();
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
                        $('#adUSER').val('<?php echo $_SESSION["FNAME"]; ?>')
						$.ajax({
							type: "GET",
                                        url: "CODES/STOCK/GT_TIME.php",
                                        contentType: "application/json; charset=utf-8",
										success: function (data) {
											$('#BIDtst2').val(data)
										}
						});
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
				$('#PRPART_NO').keypress(function (e) {
                    if (e.keyCode == 13) {
						$('#PRlmodi').val(new Date($.now()));
                        $('#PRAEDT').val("NEW");
						$('#PRDPCODE').val("A1587");
						$.ajax({
							type: "GET",
                                        url: "CODES/STOCK/GT_TIME.php",
                                        contentType: "application/json; charset=utf-8",
										success: function (data) {
											$('#PRrid1').val(data)
										}
						});
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
                        $('#PRCMP').focus()
                        e.preventDefault();
                    }
                });
                
});
    </script>
	<body>
	<div style="width: 98%; margin-right: 1%; margin-left: 1%" class="table table-responsive">
	<div id="grid"></div>
	<div id="dp1"></div>

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
                    <input id="adnstc2" type="button" value="Add New Item" class="btn btn-warning btn-xs" />
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
	<form id="add_it" action="ST_LIST.php" method="post" name="ADD_STOCK-ITEM" style="display: block;">
        <table class="table table-bordered table-hover table-responsive adn1" style="font-size : smaller">
            <tr>
                <td><label for="PRPART_NO">PART NO</label></td>
                <td>
                    <input class="input-xs form-control" id="PRPART_NO" type="text" value="" name="PRPART_NO"/>
                </td>
                <td><label for="PRCATE">ITEM TYPE</label></td>
                <td>
                    <input class="input-xs form-control" id="PRCATE" type="text" value="" name="PRCATE"/>
                </td>
            </tr>
            <tr>
                <td><label for="PRPARTI">PART NAME</label></td>
                <td>
                    <input class="input-xs form-control" id="PRPARTI" type="text" value="" name="PRPARTI"/>
                </td>
                <td><label for="PRGROP">ITEM GROUP</label></td>
                <td>
                    <input class="input-xs form-control" id="PRGROP" type="text" value="" name="PRGROP"/>
                </td>
            </tr>
            <tr>
                <td><label for="PRMRP">MRP</label></td>
                <td>
                    <input class="input-xs form-control" id="PRMRP" type="text" value="" name="PRMRP"/>
                </td>
                <td><label for="PRunit">UNIT</label></td>
                <td>
                    <input class="input-xs form-control" id="PRunit" type="text" value="" name="PRunit"/>
                </td>
            </tr>
            <tr>
                <td><label for="PRTRATE">TAX RATE</label></td>
                <td>
                    <input class="input-xs form-control" id="PRTRATE" type="text" value="" name="PRTRATE"/>
                </td>
                <td><label for="PRCMP">MFG</label></td>
                <td>
                    <input class="input-xs form-control" id="PRCMP" type="text" value="" name="PRCMP"/>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <input id="cls4" type="button" class="btn btn-warning btn-xs" value="Cancel" />
                    <input id="sv2" type="submit" class="btn btn-primary btn-xs ui-icon-plus" value="Save" name="sv2" />
                    <input id="PRlmodi" name="PRlmodi" type="hidden" value="" />
                    <input id="PRrid1" name="PRrid1" type="hidden" value=""/>
                    <input id="PRAEDT" name="PRAEDT" type="hidden" value=""/>
					<input id="PRDPCODE" type="hidden" value="" name="PRDPCODE"/>
                </td>
            </tr>
        </table>
		</form>
    </div>
</div>
	</div>
	<div id="load_popup_modal_show_id" class="modal fade" tabindex="-1"></div>
	</body>
</html>