<?php
$_SESSION["PNAME"] = "POPULATION";
require 'LAYOUT.php';
?>
<html>
<script>
$(function () {
    $(document).ready(function () {
		var $modal = $('#load_popup_modal_show_id');
        var source =
       {
           datatype: "json",
           datafields: [
		   { name: '_id', type:'string'},
                { name: 'MSGNO', type: 'int' },
                { name: 'DATE', type: 'string' },
                { name: 'FROM', type: 'string' },
                { name: 'SUB', type: 'string' }
           ],
           url: 'IMAP/GT_IMAP.php'
       };
        var editrow = -1;
        var dataAdapter = new $.jqx.dataAdapter(source);
        var height1 = $(window).height() - 100;
        $("#grid").jqxGrid({
            width: '99%',
            height: height1,
            source: dataAdapter,
            sortable: true,
            filterable: true,
            altrows: true,
            theme: 'ui-start',
            editable: true,
            showtoolbar: true,
            columns: [
			{ text: "ID", datafield: "_id" },
                        { text: "MSG NO", datafield: "MSGNO"},
                        { text: "DATE", datafield: "DATE" },
                        { text: "FROM", datafield: "FROM" },
                        { text: "SUBJECT", datafield: "SUB" },
                        {
                            text: 'Details', datafield: 'Details', columntype: 'button', width: 80, sortable: false,  filterable: false, cellsrenderer: function () {
                                return "Deatils";
                            },
                            buttonclick: function (row) {
                                editrow = row;
                                var offset = $("#grid").offset();
                                var dataRecord = $("#grid").jqxGrid('getrowdata', editrow);
                                var ens = dataRecord.MSGNO;
                                var options = { "backdrop": "static", keyboard: true };
                                $modal.load('IMAP/MAIL_DET.php',{'id1': ens},
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
                var btn2 = $("<a href='/Stock/ExportData'>Export Data</a>");
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
	});
});
</script>
<body>
<div style="width: 98%; margin-right: 1%; margin-left: 1%" class="table table-responsive">
<div id="grid"></div>
	<div id="dp1"></div>
</div>
<div id="load_popup_modal_show_id" class="modal fade" tabindex="-1"></div>
</body>
</html>