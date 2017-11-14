<?php
$_SESSION["PNAME"] = "POPULATION";
require 'LAYOUT.php';
?>
<html>
<script>
	$(document).ready(function () {
		var $modal = $('#load_popup_modal_show_id');
        var source =
   {
       datatype: "json",
       datafields: [
            { name: 'RID', type: 'string' },
                { name: 'SID', type: 'string' },
                { name: 'CNAME', type: 'string' },
                { name: 'SNAME', type: 'string' },
                { name: 'ENS', type: 'string' },
                { name: 'RAT_PH', type: 'string' },
                { name: 'PHASE', type: 'string' },
                { name: 'CPN', type: 'string' },
                { name: 'PHNO', type: 'string' },
                { name: 'DOC', type: 'date' },
                { name: 'lhmr', type: 'string' },
       ],
       url: 'data.php'
   };
        var editrow = -1;
        var dataAdapter = new $.jqx.dataAdapter(source);
        // initialize jqxGrid
        $("#grid").jqxGrid(
            {
                width: '98%',
                height: '100%',
                source: dataAdapter,
                sortable: true,
                filterable: true,
                altrows: true,
                theme: 'ui-redmond',
                editable: true,
				showtoolbar: true,
                columns: [
                    { text: "RECORD NO", datafield: "RID", hidden: true },
                        { text: "SITE ID", datafield: "SID", minwidth: 80 },
                        { text: "SITE NAME", datafield: "SNAME", minwidth: 110 },
                        { text: "CUSTOMER", datafield: "CNAME" },
                        { text: "ENGINE NO", datafield: "ENS" },
                        { text: "RATING", datafield: "RAT_PH" },
                        { text: "PHASE", datafield: "PHASE" },
                        { text: "CONTACT PERSON", datafield: "CPN", minwidth: 60 },
                        { text: "PHONE NO", datafield: "PHNO" },
                        { text: "DT. OF COMMISSIONING", datafield: "DOC", cellsformat: 'dd-MM-yyyy', width: '10%' },
                        { text: "HMR", datafield: "lhmr" },
                        {
                            text: 'Details', datafield: 'Details', columntype: 'button', width: 80, sortable: false, filterable: false, cellsrenderer: function () {
                                return "Details";
                            },
                            buttonclick: function (row) {
								editrow = row;
                                var offset = $("#grid").offset();
                                var dataRecord = $("#grid").jqxGrid('getrowdata', editrow);
                                var ens = dataRecord.RID;
                                $modal.load('CODES/POP/POP_DET.php',{'id1': ens},
								function(){
									$modal.modal('show');
								});
                            }
                        },
                        {
                            text: 'Add Issue', datafield: 'Add', columntype: 'button', width: 80, sortable: false, filterable: false, cellsrenderer: function () {
                                return "Add Issue";
                            },
                            buttonclick: function (row) {
                                editrow = row;
                                var offset = $("#grid").offset();
                                var dataRecord = $("#grid").jqxGrid('getrowdata', editrow);
                                var ens = dataRecord.RID;
                                window.location = "/Pop/Add_Pmr?id=" + ens;
                            }
                        },
                        {
                            text: 'History', datafield: 'History', columntype: 'button', width: 80, sortable: false, filterable: false, cellsrenderer: function () {
                                return "History";
                            },
                            buttonclick: function (row) {
                                editrow = row;
                                var offset = $("#grid").offset();
                                var dataRecord = $("#grid").jqxGrid('getrowdata', editrow);
                                var ens = dataRecord.ENS;
                                var options = { "backdrop": "static", keyboard: true };
                                $.ajax({
                                    type: "GET",
                                    url: '/Pop/View_PMR',
                                    contentType: "application/json; charset=utf-8",
                                    data: { "id": ens },
                                    datatype: "json",
                                    success: function (data) {
                                        debugger;
                                        $('#myModalContent').html(data);
                                        $('#myModal').modal(options);
                                        $('#myModal').modal('show');
                                    },
                                    error: function () {
                                        alert("Dynamic content load failed.");
                                    }
                                });
                            }
                        }
                ],
                    rendertoolbar: function (toolbar) {
                        var me = this;
                        var container = $("<div style='margin: 5px;'></div>");
                        var input = $("<input id='searchField' type='text'/>");
                        var btn1 = $("<a href='/Pop/Create'>Add New Site</a>");
                        var btn2 = $("<a href='/Pop/ExportData'>Export Data</a>");
                        var btn3 = $("<a href='/Pop/List_rm1'>Manage Issues</a>");
                        container.append(input);
                        container.append(btn1);
                        container.append(btn2);
                        container.append(btn3);
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
                        btn2.jqxButton({ template: "warning" });
                        btn3.jqxButton({ template: "primary" });
                        $("#searchField").jqxInput({ placeHolder: "SEARCH SITE", height: 23, width: 200, minLength: 1, theme: 'energyblue' });
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
});
</script>
<div style="width: 98%; margin-right: 1%; margin-left: 1%" class="table table-responsive">
<h6>LIST OF SITES</h6>
<div id="grid"></div>
</div>
<div id="dp1"></div>
<div id="load_popup_modal_show_id" class="modal fade" tabindex="-1"></div>
<hr/>
</html>