var changessave = true;
            var EMODE = true;
            var EMODE1 = true;
            var NMODE = true;
            var isdel = true;
            var isupd = true;
			var sr_dn = 0;
			var sr_up = 0;
			var li = 1;
			var rw1 = 0;
			var source1;
            $(function () {
                var source;
                $(document).ready(function () {
					$("#dlg1").dialog({
						modal: true,
						autoOpen: false,
						open: function (event, ui){
							$('.ui-dialog').css('z-index', 99999999999999999);
							$('.ui-widget-overlay').css('z-index', 999999999999999999999);
						},
						width: '94%',
						position: {
							my: "left center",
							at: "center top"
						},
						show: "slide"
					});
                    $("#btnDEL1").hide();
                    $("#UPDBILL").hide();
                    $('#PRINTBILL').hide();
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
                    $("#txtBDATE").jqxTooltip({ content: 'ENTER BILL DATE HERE LIKE "01-Jan-2016"', position: 'top', autoHide: true, trigger: "none" });
                    $('INPUT[type="text"]').focus(function () {
                        $(this).addClass("focus");
                    });

                    $('INPUT[type="text"]').blur(function () {
                        $(this).removeClass("focus");
                    });

                    source ={
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
						url: 'CODES/BILL/List_BILL.php'
					};
                    var editrow = -1;
                    var dataAdapter = new $.jqx.dataAdapter(source);
                    var minw = parseFloat($(window).width()) / 9;
                    // initialize jqxGrid
                    $("#grid").jqxGrid({
                        width: '100%',
                        height: '100%',
                        source: dataAdapter,
                        sortable: true,
                        filterable: true,
                        altrows: true,
                        theme: 'orange',
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
                                           url: "CODES/BILL/BILL_DET.php",
                                           data: { id: ens },
                                           contentType: "application/json; charset=utf-8",
                                           dataType: "json",
                                           success: function (data) {
                                                   $("#txtBNO").val(data[2])
                                                   var dateFormat = dataRecord.BDATE
                                                   var dateFormat = $.datepicker.formatDate('yy-m-d', new Date(dateFormat));
                                                   $("#txtBDATE").val(dateFormat)
                                                   $("#txtCUST").val(data[3])
                                                   $('#txtSNAME').val(data[4])
                                                   $('#txtGTOT').val(data[5])
                                                   $('#txtNTOT').val(data[11])
                                                   $('#txtVNO').val(data[15])
                                                   $('#txtROUND').val(data[10])
                                                   $('#txtADDRESS').val(data[9])
                                                   $('#txtMODE').val(data[14])
                                                   $('#txtTVAL').val(data[12])
                                                   $('#txtBID').val(data[0])
                                                   $('#txtPAYMENT').val(data[7])
                                                   $('#txtSECTOR').val(data[8])
                                                   $('#txtUSER1').val(data[13])
                                                   $('#txtCBILL').val(data[16])
                                                   $('#txtBAPAY').val(data[17])
                                                   $('#txtBST').val(data[18])
                                                   $('#txtSSTA').val(data[19])
                                                   $('#txtDPCODE').val(data[20])
                                                   $('#txtLMODI').val(data[21])
                                                   $('#txtBID1').val(data[22])
                                                   $('#txtAEDT').val(data[23])
                                                   $('#txtBAMT').val(data[24])
												   $('#txtSID').val(data[25])
												   $('#txtENS').val(data[26])
												   $('#txtJOB').val(data[27])
												   $('#txtTECH').val(data[28])
												   $("#PNO").val(data[29])
												   $("#PDATE").val(data[30])
												   $("#QNO").val(data[31])
												   $("#QDATE").val(data[32])
                                                   $("#VIEWBILL").jqxWindow('hide');
                                                   $('#PRINTBILL').show();
                                                   $.ajax({
														type: "GET",
														url: "CODES/BILL/GT_BAL.php",
														data: { aData: $("#txtCUST").val() },
														contentType: "application/json; charset=utf-8",
														cache: false,
														success: function (data) {
															$('#txtTOTAL').val(data);
														},
														error: function (response) {
															$('#txtTOTAL').val("0.00");
															alert(response.status + " " + response.statusText);
														}
                                                   });
                                                   EMODE1 = false;
                                                   source1.data = {'bno': $('#txtBNO').val()};
                                                   $('#grid1').jqxGrid('updatebounddata');
                                           },
                                           error: function (response) {
                                               alert(response.status + " " + response.responseText);
                                           }
                                       });
                                   }
                               }
                        ],
            rendertoolbar: function (toolbar) {
                var container1 = $("<div ></div>");
                var input1 = $("#sf");
				container1.append(input1);
                var tbl = $("<table></table>");
                var tr = $("<tr></tr>");
                var td2 = $("<td></td>");
                td2.append($('#dp1'));
                tr.append(td2);
                var td1 = $("<td></td>");
                td1.append(container1);
                tr.append(td1);
                tbl.append(tr);
                toolbar.append(tbl);
				$("#sf").jqxInput({ placeHolder: "SEARCH BILL", height: 23, width: 200, minLength: 1, theme: 'ui-start' });
                var oldVal = "";
                input1.on('keydown', function (event) {
						if (event.keyCode == 40)
						{
							sr_dn = $("#grid").jqxGrid('getselectedrowindex');
							sr_dn = sr_dn + 1;
							$("#grid").jqxGrid('selectRow',sr_dn);
							$("#grid").jqxGrid('ensurerowvisible',sr_dn);
						}
						else if(event.keyCode == 38)
						{
							sr_up = $("#grid").jqxGrid('getselectedrowindex');
							sr_up = sr_up - 1;
							$("#grid").jqxGrid('selectRow',sr_up);
							$("#grid").jqxGrid('ensurerowvisible',sr_up);
						}
						else if(event.keyCode == 13)
						{
							editrow = $("#grid").jqxGrid('getselectedrowindex');
                                       var offset = $("#grid").offset();
                                       var dataRecord = $("#grid").jqxGrid('getrowdata', editrow);
                                       var ens = dataRecord.BNO;
                                       var options = { "backdrop": "static", keyboard: true };
                                       $.ajax({
                                           type: "GET",
                                           url: "CODES/BILL/BILL_DET.php",
                                           data: { id: ens },
                                           contentType: "application/json; charset=utf-8",
                                           dataType: "json",
                                           success: function (data) {
                                                   $("#txtBNO").val(data[2])
                                                   var dateFormat = dataRecord.BDATE
                                                   var dateFormat = $.datepicker.formatDate('yy-m-d', new Date(dateFormat));
                                                   $("#txtBDATE").val(dateFormat)
                                                   $("#txtCUST").val(data[3])
                                                   $('#txtSNAME').val(data[4])
                                                   $('#txtGTOT').val(data[5])
                                                   $('#txtNTOT').val(data[11])
                                                   $('#txtVNO').val(data[15])
                                                   $('#txtROUND').val(data[10])
                                                   $('#txtADDRESS').val(data[9])
                                                   $('#txtMODE').val(data[14])
                                                   $('#txtTVAL').val(data[12])
                                                   $('#txtBID').val(data[0])
                                                   $('#txtPAYMENT').val(data[7])
                                                   $('#txtSECTOR').val(data[8])
                                                   $('#txtUSER1').val(data[13])
                                                   $('#txtCBILL').val(data[16])
                                                   $('#txtBAPAY').val(data[17])
                                                   $('#txtBST').val(data[18])
                                                   $('#txtSSTA').val(data[19])
                                                   $('#txtDPCODE').val(data[20])
                                                   $('#txtLMODI').val(data[21])
                                                   $('#txtBID1').val(data[22])
                                                   $('#txtAEDT').val(data[23])
                                                   $('#txtBAMT').val(data[24])
												   $('#txtSID').val(data[25])
												   $('#txtENS').val(data[26])
												   $('#txtJOB').val(data[27])
												   $('#txtTECH').val(data[28])
												   $("#PNO").val(data[29])
												   $("#PDATE").val(data[30])
												   $("#QNO").val(data[31])
												   $("#QDATE").val(data[32])
                                                   $("#VIEWBILL").jqxWindow('hide');
                                                   $('#PRINTBILL').show();
                                                   $.ajax({
														type: "GET",
														url: "CODES/BILL/GT_BAL.php",
														data: { aData: $("#txtCUST").val() },
														contentType: "application/json; charset=utf-8",
														cache: false,
														success: function (data) {
															$('#txtTOTAL').val(data);
														},
														error: function (response) {
															$('#txtTOTAL').val("0.00");
															alert(response.status + " " + response.statusText);
														}
                                                   });
                                                   EMODE1 = false;
                                                   source1.data = {'bno': $('#txtBNO').val()};
                                                   $('#grid1').jqxGrid('updatebounddata');
												   var df = $("grid1").jqxGrid('getrows').length();
													alert(df.rowscount);
                                           },
                                           error: function (response) {
                                               alert(response.status + " " + response.responseText);
                                           }
                                       });
						}
						else
						{
							if (input1.val().length >= 2) {
							if (me.timer) {
                            clearTimeout(me.timer);
							}
							if (oldVal != input1.val()) {
								me.timer = setTimeout(function () {
                                addFiter(input1.val());
                            }, 1000);
                            oldVal = input1.val();
							}
							}
							else {
								$("#grid").jqxGrid('clearfilters');
							}
						}
                });
			}
                    });
					$("#grid").jqxGrid('selectRow',sr_dn);
					$("#grid").bind('rowselect', function(e){
						var selectedRowIndex = e.args.rowindex;
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
							$("#grid").jqxGrid('addfilter', 'CUST', filtergroup);
								break;
						case 1:
							$("#grid").jqxGrid('addfilter', 'BNO', filtergroup);
							break;
						}
            // apply the filters.
						$("#grid").jqxGrid('applyfilters');
					}
					$("#dp1").jqxDropDownList({
						autoDropDownHeight: true, selectedIndex: 0, width: 200,
							source: [
								'CUSTOMER', 'BILL NO'
						]
					});

                    source1 = {
                       datatype: "json",
                       data: {'bno': $("txtBNO").val()},
                       datafields: [
                       { name: 'BILLID', type: 'string' },
                       { name: 'BID', type: 'string' },
                       { name: 'PART_NO', type: 'string' },
                       { name: 'PARTI', type: 'string' },
                       { name: 'QTY', type: 'string' },
                       { name: 'MRP', type: 'string' },
                       { name: 'SPRICE', type: 'string' },
                       { name: 'TAX', type: 'string' },
                       { name: 'STOT', type: 'string' },
                       ],
                       url: 'CODES/BILL/List_BILL_ITM.php'
                   };
                    var editrow1 = -1;
                    var dataAdapter1 = new $.jqx.dataAdapter(source1);
                    // initialize jqxGrid
                    $("#grid1").jqxGrid({
                        width: '98.5%',
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
                                    return 'Details';
                                },
                                buttonclick: function (row) {
                                    editrow = row;
                                    var offset = $("#grid1").offset();
                                    var dataRecord = $("#grid1").jqxGrid('getrowdata', editrow);
                                    var ens = dataRecord.BID;
                                    var options = { "backdrop": "static", keyboard: true };
                                    $.ajax({
                                        type: "GET",
                                        url: "CODES/BILL/BILL_DET_ITM.php",
                                        data: { id: ens },
                                        contentType: "application/json; charset=utf-8",
                                        dataType: "json",
                                        success: function (data) {
                                                $("#txtPTNO1").val(data[6])
                                                $("#txtPTNAME1").val(data[7])
                                                $("#txtMRP1").val(data[9])
                                                $('#txtQTY1').val(data[8])
                                                $('#txtBNO11').val($('#txtBNO').val())
                                                $('#txtSPRICE1').val(data[10])
                                                $('#txtTVAL11').val(data[13])
                                                $('#txtTRATE1').val(data[12])
                                                $('#txtTOT1').val(data[11])
                                                $('#txtTOT2').val(data[11])
                                                $('#txtUNIT1').val(data[16])
                                                $('#txtSTOT1').val(data[14])
                                                $('#OSTC').val(data[8])
                                                $('#BILLID-TXT').val(data[0])
                                                $('#BID-TXT').val(data[1])
												$('#txtMODE1').val(data[18])
												$('#txtCMP1').val(data[15])
                                                $.ajax({
                                                    type: "GET",
                                                    url: "CODES/BILL/STC_DET.php",
                                                    data: { aData: $("#txtPTNO1").val() },
                                                    contentType: "application/json; charset=utf-8",
                                                    dataType: "json",
                                                    success: function (data) {
                                                            $('#txtSTC1').val(data[5])
                                                            $('#STRID11').val(data[0])
                                                            $('#STRID1').val(data[18])
                                                            $('#STTYPE1').val(data[1])
                                                            $('#STPART_NO1').val(data[2])
                                                            $('#STPARTI1').val(data[3])
                                                            $('#STMRP1').val(data[4])
                                                            $('#STQTY1').val(data[5])
                                                            $('#qinc1').val(data[5])
                                                            $('#STTOTAL1').val(data[6])
                                                            $('#STRACKNO1').val(data[7])
                                                            $('#STTAX1').val(data[8])
                                                            $('#STTVAL1').val(data[9])
                                                            $('#STSTOTAL1').val(data[10])
                                                            $('#STPPRICE1').val(data[11])
                                                            $('#STUNIT1').val(data[19])
                                                            $('#STSPRICE1').val(data[12])
                                                            $('#STSSTA1').val(data[13])
                                                            $('#STEOR1').val(data[14])
                                                            $('#STDPCODE1').val(data[16])
                                                            $('#STLMODI1').val(data[17])
                                                            $('#STGROP1').val(data[15])
                                                            $('#STAEDT1').val(data[20])
                                                            $('#STUSER11').val(data[21])
                                                    },
                                                    error: function OnErrorCall(response) {
                                                        alert(response.status + " " + response.responseText);
                                                    }
                                                });
                                                $('#txtMRP1').focus();
                                                $("#popupWindow1").jqxWindow();
                                                $("#popupWindow1").jqxWindow('open');
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
                            var btn3 = $("#VBILL");
                            container.append($('#REFBILL'));
                            container.append(btn2);
                            container.append($('#btnNBILL'));
                            container.append(btn3);
                            container.append($('#NBILL'));
                            var input = $('#searchField');
                            container.append(input);
                            container.append($('#UPDBILL'));
                            container.append($('#PRINTBILL'));
							container.append($("#gtrec1"));
                            toolbar.append(container);
                            $('#REFBILL').jqxButton({ template: "success" });
                            btn2.jqxButton({ template: "warning" });
                            btn3.jqxButton({ template: "danger" });
                            $('#NBILL').jqxButton({ template: "success" });
                            $("#searchField").jqxInput({ height: 23, width: 200, minLength: 1, theme: 'orange' });
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
										var df = parseFloat($("#grid1").jqxGrid('getrows').length) + 1;
										if(df==41)
										{
											alert("Maximum Item Count Reached! Please Save This Bill & Create Another for Rest Items");
											return false;
										}
                                        var offset = $("#grid1").offset();
                                        $("#popupWindow").jqxWindow();
                                        $("#popupWindow").jqxWindow('open');
                                        $.ajax({
                                            type: "GET",
                                            url: "CODES/STOCK/GT_TIME.php",
                                            contentType: "application/json; charset=utf-8",
                                        dataType: "json",
                                        success: function (data) {
                                            $('#BIDtst1').val(data);
                                        }
                                    });
                                        $('#txtPTNAME').focus();
                                    }
                                    event.preventDefault();
                                }
                                else if (event.keyCode == 78 && event.altKey) {
                                    $('#NBILL').click();
                                    event.preventDefault();
                                }
                                else if (event.keyCode == 86 && event.altKey) {
                                    if (EMODE == true) {
                                        $("#LBILL").jqxWindow();
                                        $("#LBILL").jqxWindow('open');
                                    }
                                    event.preventDefault();
                                }
                            });
                            btn2.on('click', function () {
                                if (!$('#txtBNO').val()) {
                                        alert("Please Add Bill No First!");
                                    }
                                    else {
										var df = parseFloat($("#grid1").jqxGrid('getrows').length) + 1;
										if(df==41)
										{
											alert("Maximum Item Count Reached! Please Save This Bill & Create Another for Rest Items");
											return false;
										}
                                        var offset = $("#grid1").offset();
                                        $("#popupWindow").jqxWindow();
                                        $("#popupWindow").jqxWindow('open');
                                        $.ajax({
                                            type: "GET",
                                            url: "CODES/STOCK/GT_TIME.php",
                                            contentType: "application/json; charset=utf-8",
                                        dataType: "json",
                                        success: function (data) {
                                            $('#BIDtst1').val(data);
                                        }
                                    });
                                        $('#txtPTNAME').focus();
                                    }
                            });
                            btn3.on('click', function (e) {
                                $("#LBILL").jqxWindow();
                                $("#LBILL").jqxWindow('open');
                            });
                        }
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
                        minHeight: '80%', minWidth: '95%', theme: 'ui-le-frog', isModal: true, autoOpen: false, cancelButton: $("#Cancel2"), modalOpacity: 0.01
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
					
					$("#C-FORM").jqxWindow({
                        maxHeight: '43%', minWidth: '50%', theme: 'orange', isModal: true, autoOpen: false, cancelButton: $("#cls4"), modalOpacity: 0.01
                    });
					$("#LBILL").jqxWindow({
                        minHeight: '90%', minWidth: '95%', theme: 'ui-start', isModal: true, autoOpen: false, cancelButton: $("#cls4"), modalOpacity: 0.01
                    });
					$("#LBILL1").jqxWindow({
                        minHeight: '90%', minWidth: '95%', theme: 'ui-start', isModal: true, autoOpen: false, cancelButton: $("#cls4"), modalOpacity: 0.01
                    });
					
					$("#VIEWBILL").on('open', function () {
                        $("#sf").jqxInput('selectAll');
                        $("#sf").focus();
                    });
					$("#LBILL1").on('open', function () {
						$('#grid3').jqGrid('GridUnload');
						var ht = $(this).height();
						var wd = $(this).width();
						var grid = jQuery('#grid3');
					 var cst = $("#txtCUST").val();
					 var ptno = $("#txtPTNO").val();
					 var pna = $("#txtPTNAME").val();
        $('#grid3').jqGrid({
           url: 'CODES/BILL/List_BILL_ITM2.php?cust=' + cst + '&PTNO=' + ptno,
            datatype: 'json',
            type: 'GET',
            colNames: ['BILLID', 'BILL NO', 'DATE', 'SITE NAME', 'QTY', 'MRP', 'RATE', 'PER', 'TAX', 'TOTAL'],
            colModel: [
                { key: true, hidden: true,  name: 'BILLID', index: 'BILLID', editable: true, editrules: {edithidden: true} },
				{ key: false, name: 'BILL_NO', index: 'BILL_NO', editable: true},
                { key: false, name: 'BDATE', index: 'BDATE', editable: true, formatter: 'date', formatoptions: { newformat: 'd-M-Y'} },
				{ key: false, name: 'DNAME', index: 'DNAME', editable: true },
                { key: false, name: 'QTY', index: 'QTY', editable: true },
                { key: false, name: 'MRP', index: 'MRP', editable: true },
                { key: false, name: 'SPRICE', index: 'SPRICE', editable: true },
                { key: false, name: 'UNIT', index: 'UNIT', editable: true},
                { key: false, name: 'TAX', index: 'TAX', editable: true },
                { key: false, name: 'STOT', index: 'STOT', editable: true }
            ],
            toppager: true,
            pager: jQuery('#pager3'),
            height: ht - 135,
			width: wd - 13,
			rowNum: 100000000,
            rowList: [10, 20, 30, 100000000],
			caption: "SALES RECORD OF " + pna + " FOR " + cst,
            loadComplete: function () {
               $("option[value=100000000]").text('All');
			   var grid = jQuery("#grid3");
		var ids = grid.jqGrid("getDataIDs");
		grid.jqGrid("setSelection",ids[0]);
		}
        }).navGrid('#pager3', { edit: false, add: false, del: false, refresh: true, search: true, view: true, cloneToTop: true });
					});
					
					$("#LBILL").on('open', function () {
						        $('#grid2').jqGrid('GridUnload');
						var ht = $(this).height();
						var wd = $(this).width();
        var grid = jQuery('#grid2');
        $('#grid2').jqGrid({
            url: 'CODES/BILL/List_Bill1.php',
            datatype: 'json',
            mtype: 'GET',
            colNames: ['BID', 'BILL NO', 'BILL DATE', 'CUSTOMER', 'SITE NAME', 'GRAND TOTAL', 'TAX VALUE', 'ROUND OFF', 'NET TOTAL', 'VIEW'],
            colModel: [
                { key: true, hidden: true,  name: 'BID', index: 'BID', editable: true, editrules: {edithidden: true} },
                { key: false, name: 'BNO', index: 'BNO', editable: true },
                { key: false, name: 'BDATE', index: 'BDATE', editable: true, formatter: 'date', formatoptions: { newformat: 'd-M-Y'} },
                { key: false, name: 'CUST', index: 'CUST', editable: true },
                { key: false, name: 'SNAME', index: 'SNAME', editable: true },
                { key: false, name: 'GTOT', index: 'GTOT', editable: true },
                { key: false, name: 'TVAL', index: 'TVAL', editable: true },
                { key: false, name: 'ROUND', index: 'ROUND', editable: true },
                { key: false, name: 'BAMT', index: 'BAMT', editable: true },
				{name:'act', index:'act',sortable:false}
            ],
            toppager: true,
            pager: jQuery('#pager'),
            height: ht - 135,
			width: wd - 13,
			rowNum: 100000000,
            rowList: [10, 20, 30, 100000000],
            loadComplete: function () {
               $("option[value=100000000]").text('All');
			   var grid = jQuery("#grid2");
		var ids = grid.jqGrid("getDataIDs");
		grid.jqGrid("setSelection",ids[0]);
            },
			gridComplete: function(){        
   var ids = jQuery("#grid2").getDataIDs(); 
        for(var i=0;i<ids.length;i++){ 
            var cl = ids[i]; 
			be = "<button onclick=gtgrid1("+cl+")><span class='ui-button-icon ui-icon ui-icon-pencil'></span></button>"; 
			de = "<button onclick=gtgrid1("+cl+")><span class='ui-button-icon ui-icon ui-icon-trash'></span></button>"; 
            jQuery("#grid2").setRowData(ids[i],{act:be+de}) 
        } 
},
			sortname: "BDATE",
			sortorder: "DESC",
			emptyrecords: 'BLANK',
            loadonce: true,
            shrinkToFit: true,
			viewrecords: true,
			caption: "LIST OF BILLS",
			scrollrows: true,
			rownumbers: true,
			subGrid: true,
			subGridRowExpanded: function(subgrid_id, row_id){
				var subgrid_table_id;
				subgrid_table_id = subgrid_id+"_t";
				$("#"+subgrid_id).html("<table id='" + subgrid_table_id + "'></table>");
				$("#"+subgrid_table_id).jqGrid({
					url: 'CODES/BILL/List_BILL_ITM1.php?id=' + row_id,
            datatype: 'json',
            type: 'GET',
            colNames: ['BILLID', 'PART NO', 'PART NAME', 'QTY', 'MRP', 'RATE', 'PER', 'TAX', 'TOTAL'],
            colModel: [
                { key: true, hidden: true,  name: 'BILLID', index: 'BILLID', editable: true, editrules: {edithidden: true} },
                { key: false, name: 'PART_NO', index: 'PART_NO', editable: true, width: '15%' },
                { key: false, name: 'PARTI', index: 'PARTI', editable: true, width: '50%' },
                { key: false, name: 'QTY', index: 'QTY', editable: true, width: '5%' },
                { key: false, name: 'MRP', index: 'MRP', editable: true, width: '5%' },
                { key: false, name: 'SPRICE', index: 'SPRICE', editable: true, width: '5%' },
                { key: false, name: 'UNIT', index: 'UNIT', editable: true, width: '5%' },
                { key: false, name: 'TAX', index: 'TAX', editable: true, width: '5%' },
                { key: false, name: 'STOT', index: 'STOT', editable: true, width: '5%' }
            ],
			height: '70%',
			width:'900',
			rowNum: 10,
			rowList: [10, 20, 30, 100000000],
			pager: jQuery('#pager1'),
			toppager: true,
			sortname: "BILLID",
			sortorder: "DESC",
			emptyrecords: 'BLANK',
            loadonce: true,
			inlineEditing:{keys: true},
			viewrecords: true,
			caption: "LIST OF BILL ITEMS",
			scrollrows: true,
			rownumbers: true
				}).navGrid('#pager1', { edit: false, add: false, del: false, refresh: true, search: true, view: true, cloneToTop: true })
			}
        }).navGrid('#pager', { edit: false, add: false, del: false, refresh: true, search: true, view: true, cloneToTop: true });
        $("#pager table.navtable tbody tr").append($("#pg"));
		$("#grid2_toppager table.navtable tbody tr").append($("#sr"));
		$("#sr").focus();
					});
					
                    $("#popupWindow").on('open', function () {
                        $("#txtPTNAME").jqxInput('selectAll');
                        $("#txtBNO1").val($("#txtBNO").val());
                    });
                    $("#ADD_ITM_DIV").on('open', function () {
                        $("#adRID").jqxInput('selectAll');
                        $.ajax({
                            type: "GET",
                            url: "CODES/STOCK/GT_TIME.php",
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
                            url: "CODES/STOCK/GT_TIME.php",
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
					
					$("#C-FORM").on('open', function () {
                        $("#PNO").jqxInput('selectAll');
                        $("#PNO").focus();
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
					$("#C-FORM").on('close', function (e) {
						$('#REFBILL').prop('disabled', true);
						$("#txtBNO").focus();
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
                    $("#adnstc2").jqxButton({ template: "success" });
                    $("#Cancel1").jqxButton({ template: "warning" });
                    $("#btnDEL").jqxButton({ template: "danger" });
                    $("#btnDEL1").jqxButton({ template: "info" });
                    $("#Save1").jqxButton({ template: "success" });
                    $("#btnNBILL").jqxButton({ template: "primary" });
                    $("#Cancel2").jqxButton({ template: "warning" });
					$('#searchField').focus();
                });
				$("#Save").click(function () {
                        var dataObject = {
                            BILL_NO: $("#txtBNO1").val(),
                            PART_NO: $("#txtPTNO").val(),
                            PARTI: $("#txtPTNAME").val(),
                            MRP: $("#txtMRP").val(),
                            QTY: $("#txtQTY").val(),
                            SPRICE: $("#txtSPRICE").val(),
                            TOTAL: $("#txtTOT").val(),
                            TAX: $("#txtTRATE").val(),
                            UNIT: $("#txtUNIT").val(),
                            BDATE: $("#txtBDATE").val(),
                            SSTA: "NEW",
                            CMP: $("#txtCMP").val().toUpperCase(),
                            MODE: $("#txtMODE").val().toUpperCase(),
                            BID: $('#BID-TXT').val(),
                            LMODI: new Date($.now()),
                            DPCODE: "A1587",
                            DNAME: $('#txtSNAME').val().toUpperCase(),
                            CUST: $('#txtCUST').val().toUpperCase(),
                            STOT: $('#txtSTOT').val(),
                            TVAL: $('#txtTVAL1').val(),
                            USER1: '<?php echo $_SESSION["FNAME"]; ?>',
                            AEDT: "NEW",
                            BILLID: $('#BIDtst1').val(),
							SID: $('#txtSID').val().toUpperCase(),
							ENS: $('#txtENS').val(),
							JOB: $('#txtJOB').val().toUpperCase(),
							TECH: $('#txtTECH').val().toUpperCase(),
							POSE: "SALE"
                        };
						var chkval = $("#txtQTY").val();
						if (chkval == "")
						{
							alert("EMPTY RECORD CANNOT BE SAVED! PLEASE FILL QTY")
						}
						else
						{
							$.ajax({
                            url: "CODES/BILL/ADD_ITM.php",
                            type: "POST",
                            data: dataObject,
							cache: false,
                            success: function (data) {
                                if (data.toString() != "Successfully Saved!") {
                                    alert(data);
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
                                        GROP: $('#STGROP').val(),
                                        AEDT: $('#STAEDT').val(),
                                        USER1: '<?php echo $_SESSION["FNAME"]; ?>'
                                    }
                                    $.ajax({
                                    url: "CODES/STOCK/STC_UPD.php",
                                    type: "POST",
                                    data: dataObject1,
                                    cache: false,
                                    success: function (data) {
                                        if (data.toString() != "Successfully Saved!") {
                                            alert(data);
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
									$('#txtCBILL').val("0.00");
                                }
                                else {
                                    $('#txtCBILL').val($('#txtBAMT').val());
                                    $('#txtMODE').val(mde);
									$('#txtBAPAY').val("0.00");
                                    $('#txtBST').val("FP");
									$('#txtNTOT').val("0.00");
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
                            error: function (response) {
                                alert(response.status + " " + response.responseText);
                            }
                        });
						}
						var df = parseFloat($("#grid1").jqxGrid('getrows').length) + 1;
						$("#gtrec1").html("Total Items Count : " + df);
                    });
					$("#Save1").click(function () {
                        if ($("#Save1").val() == "Save")
						{
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
                            CMP: $('#txtCMP1').val(),
                            MODE: $("#txtMODE1").val(),
                            BID: $('#BID-TXT').val(),
                            LMODI: new Date($.now()),
                            DPCODE: "A1587",
                            DNAME: $('#txtSNAME').val(),
                            CUST: $('#txtCUST').val(),
                            STOT: $('#txtSTOT1').val(),
                            TVAL: $('#txtTVAL11').val(),
                            USER1: '<?php echo $_SESSION["FNAME"]; ?>',
                            AEDT: "NEW",
							SID: $('#txtSID').val(),
							ENS: $('#txtENS').val(),
							JOB: $('#txtJOB').val(),
							TECH: $('#txtTECH').val()
                        };
                        $.ajax({
                            url: "CODES/BILL/UPD_ITM.php",
                            type: "POST",
                            data: dataObject2,
                            success: function (data) {
                                if (data.toString() != "Successfully Saved!") {
                                    alert(data.toString());
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
                            GROP: $('#STGROP1').val(),
                            AEDT: $('#STAEDT1').val(),
                            USER1: '<?php echo $_SESSION["FNAME"]; ?>'
                        }
                        $.ajax({
                            url: "CODES/STOCK/STC_UPD.php",
                            type: "POST",
                            data: dataObject3,
                            success: function (data) {
                                if (data.toString() != "Successfully Saved!") {
                                    alert(data.toString());
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
						$("#Save1").val("Close");
						}
						else
						{
							canupd();
						}
                    });
                    $("#btnDEL").click(function () {
                        $.ajax({
                            url: "CODES/BILL/BILL_ITM_DEL.php",
                            type: "POST",
                            data: { "id": $('#BILLID-TXT').val() },
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
                            GROP: $('#STGROP1').val(),
                            AEDT: $('#STAEDT1').val(),
                            USER1: $('#STUSER11').val()
                        }
                        $.ajax({
                            url: "CODES/STOCK/STC_UPD.php",
                            type: "POST",
                            data: dataObject3,
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
                $("#BILLPRINT1").click(function () {
                        $("#BILLPRINT").jqxWindow();
                        $("#BILLPRINT").jqxWindow('open');
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
                            $(".adn input[type='text']").val("");
                            $("#ADD_ITM_DIV").jqxWindow('hide');
                            alert(data);
                        },
                        error: function (response) {
                            alert(response.status + " " + response.responseText);
                        }
                    });
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
                $('#PRCMP').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#sv2').click();
                        e.preventDefault();
                    }
                });

                $("#sv2").click(function () {
					var PRPART_NO = $('#PRPART_NO').val();
                       var PRPARTI = $('#PRPARTI').val();
                       var PRMRP = $('#PRMRP').val();
                       var PRCATE = $('#PRCATE').val();
                       var PRTRATE = $('#PRTRATE').val();
                       var PRrid1 = $('#PRrid1').val();
                       var PRunit = $('#PRunit').val();
                       var PRDPCODE = $('#PRDPCODE').val();
                       var PRlmodi = $('#PRlmodi').val();
                       var PRGROP = $('#PRGROP').val();
                       var PRAEDT = $('#PRAEDT').val();
					   var PRCMP = $('#PRCMP').val();
					var dataObject3 = 'PRPART_NO='+ PRPART_NO + '&PRPARTI='+ PRPARTI + '&PRCATE='+ PRCATE + '&PRTRATE='+ PRTRATE + '&PRrid1='+ PRrid1 + '&PRDPCODE='+ PRDPCODE + '&PRlmodi='+ PRlmodi + '&PRGROP='+ PRGROP + '&PRAEDT='+ PRAEDT + '&PRMRP='+ PRMRP + '&PRunit='+ PRunit + '&PRCMP='+ PRCMP;
                    $.ajax({
                        url: "CODES/STOCK/ADD_IT.php",
                        type: "POST",
                        data: dataObject3,
                        cache: false,
                        success: function (data) {
                            if (data.toString() != "RECORD ADDED") {
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
                        $('#txtUSER1').val('<?php echo json_encode($_SESSION["FNAME"]); ?>');
                        $('#txtBDATE').focus();

                    }
                });
                $("#adPtno").autocomplete({
                    source: 'CODES/STOCK/AT_COM_PNO.php'
                });

                $("#adParti").autocomplete({
                    source: 'CODES/STOCK/AT_COM_PNA.php'
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
                                        data: 'aData='+ID,
                                        contentType: "application/json; charset=utf-8",
                                        dataType: "json",
                                        success: function (data) {
                                            $.each(data, function (i, val) {
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
                                        data: 'aData='+ID,
                                        contentType: "application/json; charset=utf-8",
                                        dataType: "json",
                                        success: function (data) {
                                            $.each(data, function (i, val) {
                                                $('#adParti').val(data[2]);
												$('#adUNIT').val(data[10]);
												$('#adMRP').val(data[3]);
												$('#adGROP').val(data[4]);
												$('#adTYPE').val(data[5]);
												$('#adTAX').val(data[8]);
												$('#adCMP').val(data[12]);
                                                var tax = parseFloat($('#adTAX').val()) + 100
                                                var spr = parseFloat($('#adMRP').val()) / tax * 100
                                                $('#adSPRICE').val(spr.toFixed(2))
                                                var tval = parseFloat($('#adSPRICE').val()) * parseFloat($('#adTAX').val()) / 100
                                                $('#adTVAL').val(tval.toFixed(2))
												$('#adMRP').focus()
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
                        $('#adUSER').val('<?php echo $_SESSION["FNAME"]; ?>')
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
                    source: 'CODES/BILL/AT_COM_PNO.php'
                });
                $("#txtPTNAME").autocomplete({
                    source: 'CODES/BILL/AT_COM_PNA.php'
                });
                $("#txtCUST").autocomplete({
                    source: 'CODES/BILL/AT_COM_CUST.php'
                });
				$("#txtTECH").autocomplete({
                    source: 'CODES/BILL/AT_COM_TECH.php'
                });
                $("#txtSNAME").autocomplete({
                    source: function (request, response) {
        $.ajax({
            url: 'CODES/BILL/AT_COM_SN.php',
            type: "GET",
            dataType: "json",
            data: { term: request.term, CS: $("#txtCUST").val() },
            success: function (data) {
                response(data);
            }
        });
    }
                });
                $("#txtPTNO").keypress(function (e) {
                    if (e.keyCode == 13) {
						$('#txtQTY').focus()
                        $.ajax({
                            type: "GET",
                            url: "CODES/BILL/GT_PTNO.php",
                            data: { aData: $("#txtPTNO").val() },
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function (data) {
                                    $('#txtPTNAME').val(data[3])
                                    $('#txtUNIT').val(data[19])
                                    $('#txtMRP').val(data[4])
                                    $('#txtSPRICE').val(data[12])
                                    $('#txtTRATE').val(data[8])
                                    $('#txtSTC').val(data[5])
									$('#txtCMP').val(data[22])
                                    $('#STRID1').val(data[0])
                                    $('#STRID').val(data[18])
                                    $('#STTYPE').val(data[1])
                                    $('#STPART_NO').val(data[2])
                                    $('#STPARTI').val(data[3])
                                    $('#STMRP').val(data[4])
                                    $('#STQTY').val(data[5])
                                    $('#qinc').val(data[5])
                                    $('#STTOTAL').val(data[6])
                                    $('#STRACKNO').val(data[7])
                                    $('#STTAX').val(data[8])
                                    $('#STTVAL').val(data[9])
                                    $('#STSTOTAL').val(data[10])
                                    $('#STPPRICE').val(data[11])
                                    $('#STUNIT').val(data[19])
                                    $('#STSPRICE').val(data[12])
                                    $('#STSSTA').val(data[13])
                                    $('#STEOR').val(data[14])
                                    $('#STDPCODE').val(data[16])
                                    $('#STLMODI').val(data[17])
                                    $('#STGROP').val(data[15])
                                    $('#STAEDT').val(data[20])
                                    $('#STUSER1').val(data[21])
                            },
                            error: function OnErrorCall(response) {
                                alert(response.status + " " + response.responseText);
                            }
                        });
						$.ajax({
                                            type: "GET",
                                            url: "CODES/BILL/GTID.php",
                                            contentType: "application/json; charset=utf-8",
                                        success: function (data) {
                                            $('#BID-TXT').val(parseFloat(data)+1)
                                        }
                                    });
                        e.preventDefault();
                    }
                });
                $("#txtPTNAME").keypress(function (e) {
                    if (e.keyCode == 13) {
                        $.ajax({
                            type: "GET",
                            url: "CODES/BILL/GT_PTNA.php",
                            data: { aData: $("#txtPTNAME").val() },
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function (data) {
                                    $('#txtPTNO').val(data[2])
                                    $('#txtUNIT').val(data[19])
                                    $('#txtMRP').val(data[4])
                                    $('#txtSPRICE').val(data[12])
                                    $('#txtTRATE').val(data[8])
                                    $('#txtSTC').val(data[5])
									$('#txtCMP').val(data[22])
                                    $('#STRID1').val(data[0])
                                    $('#STRID').val(data[18])
                                    $('#STTYPE').val(data[1])
                                    $('#STPART_NO').val(data[2])
                                    $('#STPARTI').val(data[3])
                                    $('#STMRP').val(data[4])
                                    $('#STQTY').val(data[5])
                                    $('#qinc').val(data[5])
                                    $('#STTOTAL').val(data[6])
                                    $('#STRACKNO').val(data[7])
                                    $('#STTAX').val(data[8])
                                    $('#STTVAL').val(data[9])
                                    $('#STSTOTAL').val(data[10])
                                    $('#STPPRICE').val(data[11])
                                    $('#STUNIT').val(data[19])
                                    $('#STSPRICE').val(data[12])
                                    $('#STSSTA').val(data[13])
                                    $('#STEOR').val(data[14])
                                    $('#STDPCODE').val(data[16])
                                    $('#STLMODI').val(data[17])
                                    $('#STGROP').val(data[15])
                                    $('#STAEDT').val(data[20])
                                    $('#STUSER1').val(data[21])
									$('#txtQTY').focus()
                            },
                            error: function OnErrorCall(response) {
                                alert(response.status + " " + response.responseText);
                            }
                        });
						$.ajax({
                                            type: "GET",
                                            url: "CODES/BILL/GTID.php",
                                            contetType: "application/json; charset=utf-8",
                                        success: function (data) {
                                            $('#BID-TXT').val(parseFloat(data)+1)
                                        }
                                    });
                        e.preventDefault();
                    }
                });
				$("#txtQTY").focus(function(e){
					if ($("#txtPTNAME").val()=="")
						{
							alert("PART NAME CANNOT BE BLANK!");
							$("#txtPTNAME").focus();
						}
						else if ($("#txtPTNO").val()=="")
						{
							alert("PART NO CANNOT BE BLANK!");
							$("#txtPTNO").focus();
						}
				});
                $('#txtQTY').keydown(function (e) {
					if (e.keyCode == 86 && e.altKey)
					{
						$("#LBILL1").jqxWindow();
                        $("#LBILL1").jqxWindow('open');
						e.preventDefault();
					}
                    else if (e.keyCode == 13) {
                        $("#Save").click();
                        e.preventDefault();
                    }
                });

                $('#txtQTY1').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $("#Save1").click();
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
						$('#txtTOTAL').val("0.00");
                        $.ajax({
                            type: "GET",
                            url: "CODES/BILL/GT_CUST.php",
                            data: { aData: $("#txtCUST").val() },
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function (data) {
                                    $('#txtADDRESS').val(data[9]);
                                    $('#txtVNO').val(data[15]);
                                    $('#txtADDRESS').focus();
                                    $('#txtMODE').val("CREDIT");
                            },
                            error: function(response) {
                                alert(response.status + " " + response.statusText);
                            }
                        });

                        $.ajax({
                            type: "GET",
                            url: "CODES/BILL/GT_BAL.php",
                            data: { aData: $("#txtCUST").val() },
                            contentType: "application/json; charset=utf-8",
                            cache: false,
                            success: function (data) {
                             $('#txtTOTAL').val(data);
                            },
                            error: function (response) {
								$('#txtTOTAL').val("0.00");
                                alert(response.status + " " + response.statusText);
                            }
                        });
                        e.preventDefault();
                    }
                });
                $('#txtSNAME').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#txtENS').focus();
						$.ajax({
                            type: "GET",
                            url: "CODES/BILL/GT_SNAME.php",
                            data: { aData: $("#txtCUST").val(), aData1: $("#txtSNAME").val() },
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function (data) {
                                    $('#txtSID').val(data[25]);
                                    $('#txtENS').val(data[26]);
                            },
                            error: function(response) {
                                alert(response.status + " " + response.statusText);
                            }
						});
                        e.preventDefault();
                    }
                });
				$('#txtENS').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#txtSID').focus();
                        e.preventDefault();
                    }
                });
                $('#txtADDRESS').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#txtVNO').focus();
                        e.preventDefault();
                    }
                });
				$('#txtSID').keypress(function (e) {
					if (e.keyCode == 13) {
						$('#txtTECH').focus();
						e.preventDefault();
					}
				});
				$('#txtJOB').keypress(function (e) {
					if (e.keyCode == 13) {
						$('#txtMODE').focus();
						e.preventDefault();
					}
				});
				$('#txtTECH').keypress(function (e) {
					if (e.keyCode == 13) {
						$('#txtJOB').focus();
						e.preventDefault();
					}
				});
                $('#txtVNO').keypress(function (e) {
                    if (e.keyCode == 13) {
                        $('#txtSNAME').focus();
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
					$("#Save1").val("Save");
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
                    if (NMODE != false)
                    {
                    	EMODE = false;
                    	$('#UPDBILL').show();
                    $('#NBILL').prop('disabled', true);
                    $('#btnNBILL').prop('disabled', true);
                    }
                    isupd = true;
					$("#Save1").val("Save");
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
                                    CUST: $("#txtCUST").val().toUpperCase(),
                                    SNAME: $('#txtSNAME').val().toUpperCase(),
                                    GTOT: $('#txtGTOT').val(),
                                    NTOT: $('#txtNTOT').val(),
                                    VNO: $('#txtVNO').val(),
                                    ROUND: $('#txtROUND').val(),
                                    ADDRESS: $('#txtADDRESS').val().toUpperCase(),
                                    MODE: $('#txtMODE').val().toUpperCase(),
                                    TVAL: $('#txtTVAL').val(),
                                    PAYMENT: $('#txtPAYMENT').val(),
                                    SECTOR: $('#txtSECTOR').val(),
                                    USER1: $('#txtUSER1').val(),
                                    CBILL: $('#txtCBILL').val(),
                                    BAPAY: $('#txtBAPAY').val(),
                                    SSTA: $('#txtSSTA').val(),
                                    DPCODE: $('#txtDPCODE').val(),
                                    LMODI: $('#txtLMODI').val(),
                                    BID1: $('#txtBID1').val(),
                                    TOTAL: $('#txtTOTAL').val(),
                                    AEDT: $('#txtAEDT').val(),
                                    BAMT: $('#txtBAMT').val(),
                                    BID: $('#BIDtst').val(),
									BST: $('#txtBST').val(),
									SID: $('#txtSID').val().toUpperCase(),
									ENS: $('#txtENS').val(),
									JOB: $('#txtJOB').val().toUpperCase(),
									TECH: $('#txtTECH').val().toUpperCase(),
									PNO: $("#PNO").val().toUpperCase(),
									PDATE: $("#PDATE").val(),
									QNO: $("#QNO").val().toUpperCase(),
									QDATE: $("#QDATE").val(),
									POSE: $("#txtPOSE").val()
                                }
                                $.ajax({
                                    url: "CODES/BILL/ADD_BILL.php",
                                    type: "POST",
                                    data: datarec,
                                    cache: false,
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
				$("#PNO").keypress(function(e){
					if (e.keyCode == 13)
					{
						$("#PDATE").focus();
						e.preventDefault();
					}
				});
				$("#PDATE").keypress(function(e){
					if (e.keyCode==13)
					{
						$("#QNO").focus();
						e.preventDefault();
					}
				});
				$("#QNO").keypress(function(e){
					if (e.keyCode==13)
					{
						$("#QDATE").focus();
						e.preventDefault();
					}
				});
				
				$("#QDATE").keypress(function(e){
					if (e.keyCode==13)
					{
						$("#SC-FORM").click();
						e.preventDefault();
					}
				});
			
                $('#REFBILL').click(function () {
                    source1.data = { "bno": $('#txtBNO').val() };
                    $('#grid1').jqxGrid('updatebounddata');
                });
                $('#NBILL').click(function (e) {
                    if ($("#NBILL").val() == "New Bill")
					{
						if (!changessave) {
                        $('#msg').html("New Bill On Going! Please Save the Existing Before Create New Bill");
                        $("#messageNotification").jqxNotification("open");
                    }
                    else {
                        cls();
                        $.ajax({
                            type: "GET",
                            url: "CODES/STOCK/GT_TIME.php",
                            contentType: "application/json; charset=utf-8",
                            success: function (data) {
                            $('#BIDtst').val(data);
                            }
                        });
                        $('#PRINTBILL').hide();
						$("#C-FORM").jqxWindow();
                        $("#C-FORM").jqxWindow('open');
                        $.ajax({
                            type: "GET",
                            url: "CODES/BILL/GTBNO.php",
                            contentType: "application/json; charset=utf-8",
                            success: function (data) {
								$("#txtPOSE").val("SALE");
								$("#txtPAYMENT").val("0.00");
                                var gtbno = parseFloat(data) + 1;
                                $('#txtBNO').val("MB " + gtbno + "/16-17");
                            },
                            error: function OnErrorCall(response) {
                                alert(response.status + " " + response.responseText);
                            }
                        });
						$("#NBILL").val("Cancel");
                        $('#txtBNO').focus();
                        event.preventDefault();
                    }
					}
					else
					{
						if (!changessave) {
                        $('#msg').html("DataBase Modified! Please Save the Bill 1st");
                        $("#messageNotification").jqxNotification("open");
						}
						else
						{
							cls();
						}
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
                    $('#txtNTOTH1').val($('#txtBAMT').val());
                    $('#txtTVALH1').val($('#txtTVAL').val());
                    $('#txtROUNDH1').val($('#txtROUND').val());
					$("#txtPNO1").val($("#PNO").val());
					$("#txtQNO1").val($("#QNO").val());
					$("#txtPDATE1").val($("#PDATE").val());
					$("#txtQDATE1").val($("#QDATE").val());
                    $("#CHALLAN").jqxWindow('show');
                });
                $('#PCHALLAN').click(function () {
                    $("#CHALLAN").jqxWindow('hide');
                    cls();
                });
				$('#PCHALLAN1').click(function () {
                    $("#CHALLAN").jqxWindow('hide');
                    cls();
                });
				$('#SC-FORM').click(function () {
                    $("#C-FORM").jqxWindow('hide');
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
                            BAMT: $('#txtBAMT').val(),
							SID: $('#txtSID').val(),
							ENS: $('#txtENS').val(),
							JOB: $('#txtJOB').val(),
							TECH: $('#txtTECH').val(),
							PNO: $("#PNO").val(),
							PDATE: $("#PDATE").val(),
							QNO: $("#QNO").val(),
							QDATE: $("#QDATE").val()
                        }
                        $.ajax({
                            url: "CODES/BILL/UPD_BILL.php",
                            type: "POST",
                            data: datarec,
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
                            			url: "CODES/BILL/UPD_TOT.php",
                            			type: "POST",
                            			data: { aData: $("#txtCUST").val(), TOT : $("#txtTOTAL").val() },
                            			success: function (data) {
                                			if (data.toString() != "Successfully Saved!") {
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
					$("#NBILL").val("New Bill");
					$('#REFBILL').prop('disabled', false);
					$('#VBILL').prop('disabled', false);
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
					$('#txtSID').val(null);
					$('#txtENS').val(null);
					$('#txtJOB').val(null);
					$('#txtTECH').val(null);
					$('#BID-TXT').val(null);
					$("#PNO").val(null);
					$("#PDATE").val(null);
					$("#QNO").val(null);
					$("#QDATE").val(null);
					$("#gtrec1").html("");
                    source1.data = { "bno": $('#txtBNO').val() };
                    $('#grid1').jqxGrid('updatebounddata');
                    $('#grid').jqxGrid('updatebounddata');
                }
				$('#txtBDATE').datepicker({ dateFormat: 'yy-m-d',
					beforeShow: function() {
						setTimeout(function(){
						$('.ui-datepicker').css('z-index', 99999999999999);
						}, 0);
					}
				});
				$("#sr").keydown(function(event){
					if (event.keyCode == 40){
						var grid = jQuery("#grid2");
						var ids = grid.jqGrid("getDataIDs");
						grid.jqGrid("setSelection",ids[0 + li]);
						li= li + 1;
					}
					else if (event.keyCode == 38){
						var grid = jQuery("#grid2");
						var ids = grid.jqGrid("getDataIDs");
						grid.jqGrid("setSelection",ids[li - 1]);
						li= li - 1;
					}
					else if (event.keyCode == 13)
					{
						gtgrid()
					}
				});
				
				jQuery(window).bind('beforeunload', function () {
					if (!changessave) {
						var x = 'Please Save the Bill Before Exit this Page!';
						return x;
					}
				});
            });
			function gtgrid(){
					var rk = jQuery("#grid2").jqGrid("getGridParam","selrow");
						var options = { "backdrop": "static", keyboard: true };
                                       $.ajax({
                                           type: "GET",
                                           url: "CODES/BILL/BILL_DET.php",
                                           data: { id: rw1 },
                                           contentType: "application/json; charset=utf-8",
                                           dataType: "json",
                                           success: function (data) {
                                                   $("#txtBNO").val(data[2])
                                                   var dateFormat = data[1]
                                                   var dateFormat = $.datepicker.formatDate('yy-m-d', new Date(dateFormat));
                                                   $("#txtBDATE").val(dateFormat)
                                                   $("#txtCUST").val(data[3])
                                                   $('#txtSNAME').val(data[4])
                                                   $('#txtGTOT').val(data[5])
                                                   $('#txtNTOT').val(data[11])
                                                   $('#txtVNO').val(data[15])
                                                   $('#txtROUND').val(data[10])
                                                   $('#txtADDRESS').val(data[9])
                                                   $('#txtMODE').val(data[14])
                                                   $('#txtTVAL').val(data[12])
                                                   $('#txtBID').val(data[0])
                                                   $('#txtPAYMENT').val(data[7])
                                                   $('#txtSECTOR').val(data[8])
                                                   $('#txtUSER1').val(data[13])
                                                   $('#txtCBILL').val(data[16])
                                                   $('#txtBAPAY').val(data[17])
                                                   $('#txtBST').val(data[18])
                                                   $('#txtSSTA').val(data[19])
                                                   $('#txtDPCODE').val(data[20])
                                                   $('#txtLMODI').val(data[21])
                                                   $('#txtBID1').val(data[22])
                                                   $('#txtAEDT').val(data[23])
                                                   $('#txtBAMT').val(data[24])
												   $('#txtSID').val(data[25])
												   $('#txtENS').val(data[26])
												   $('#txtJOB').val(data[27])
												   $('#txtTECH').val(data[28])
												   $("#PNO").val(data[29])
												   $("#PDATE").val(data[30])
												   $("#QNO").val(data[31])
												   $("#QDATE").val(data[32])
                                                   $("#VIEWBILL").jqxWindow('hide');
                                                   $('#PRINTBILL').show();
                                                   $.ajax({
														type: "GET",
														url: "CODES/BILL/GT_BAL.php",
														data: { aData: $("#txtCUST").val() },
														contentType: "application/json; charset=utf-8",
														cache: false,
														success: function (data) {
															$('#txtTOTAL').val(data);
														},
														error: function (response) {
															$('#txtTOTAL').val("0.00");
															alert(response.status + " " + response.statusText);
														}
                                                   });
                                                   EMODE1 = false;
                                                   source1.data = {'bno': $('#txtBNO').val()};
                                                   $('#grid1').jqxGrid('updatebounddata');
												   $("#LBILL").jqxWindow('hide');
												   $("#searchField").focus();
												   $("#C-FORM").jqxWindow();
													$("#C-FORM").jqxWindow('open');
                                           },
                                           error: function (response) {
                                               alert(response.status + " " + response.responseText);
                                           }
                                       });
				}
				
				function gtgrid1(id){
                                       $.ajax({
                                           type: "GET",
                                           url: "CODES/BILL/BILL_DET.php",
                                           data: { id: id },
                                           contentType: "application/json; charset=utf-8",
                                           dataType: "json",
                                           success: function (data) {
                                                   $("#txtBNO").val(data[2])
                                                   var dateFormat = data[1]
                                                   var dateFormat = $.datepicker.formatDate('yy-m-d', new Date(dateFormat));
                                                   $("#txtBDATE").val(dateFormat)
                                                   $("#txtCUST").val(data[3])
                                                   $('#txtSNAME').val(data[4])
                                                   $('#txtGTOT').val(data[5])
                                                   $('#txtNTOT').val(data[11])
                                                   $('#txtVNO').val(data[15])
                                                   $('#txtROUND').val(data[10])
                                                   $('#txtADDRESS').val(data[9])
                                                   $('#txtMODE').val(data[14])
                                                   $('#txtTVAL').val(data[12])
                                                   $('#txtBID').val(data[0])
                                                   $('#txtPAYMENT').val(data[7])
                                                   $('#txtSECTOR').val(data[8])
                                                   $('#txtUSER1').val(data[13])
                                                   $('#txtCBILL').val(data[16])
                                                   $('#txtBAPAY').val(data[17])
                                                   $('#txtBST').val(data[18])
                                                   $('#txtSSTA').val(data[19])
                                                   $('#txtDPCODE').val(data[20])
                                                   $('#txtLMODI').val(data[21])
                                                   $('#txtBID1').val(data[22])
                                                   $('#txtAEDT').val(data[23])
                                                   $('#txtBAMT').val(data[24])
												   $('#txtSID').val(data[25])
												   $('#txtENS').val(data[26])
												   $('#txtJOB').val(data[27])
												   $('#txtTECH').val(data[28])
												   $("#PNO").val(data[29])
												   $("#PDATE").val(data[30])
												   $("#QNO").val(data[31])
												   $("#QDATE").val(data[32])
                                                   $("#VIEWBILL").jqxWindow('hide');
                                                   $('#PRINTBILL').show();
                                                   $.ajax({
														type: "GET",
														url: "CODES/BILL/GT_BAL.php",
														data: { aData: $("#txtCUST").val() },
														contentType: "application/json; charset=utf-8",
														cache: false,
														success: function (data) {
															$('#txtTOTAL').val(data);
														},
														error: function (response) {
															$('#txtTOTAL').val("0.00");
															alert(response.status + " " + response.statusText);
														}
                                                   });
                                                   EMODE1 = false;
                                                   source1.data = {'bno': $('#txtBNO').val()};
                                                   $('#grid1').jqxGrid('updatebounddata');
												   $("#LBILL").jqxWindow('hide');
												   $("#searchField").focus();
												   $("#C-FORM").jqxWindow();
													$("#C-FORM").jqxWindow('open');
                                           },
                                           error: function (response) {
                                               alert(response.status + " " + response.responseText);
                                           }
                                       });
				}