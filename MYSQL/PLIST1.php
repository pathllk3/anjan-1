<?php
$st = session_status();
		 if($st!=2)
		 {
			session_start(); 
			$_SESSION["PNAME"] = "PRICE LIST";
		 }
require_once 'LAYOUT.php';
?>
<html>
<style type="text/css">
	.ui-state-highlight {background: lime !important; }
</style>
<script type="text/javascript">
	$(document).ready(function () {
		var wd = $(window).width() - 50;
        var ht = $(window).height() - 190;
		$("#list_records").jqGrid({
			url: "CODES/STOCK/getGridData.php",
			datatype: "json",
			mtype: "GET",
			colNames: ["ID", "RID1", "PART NO", "PART NAME", "MRP", "TYPE", "CATEGORY", "UNIT", "TAX RATE"],
			colModel: [
                { name: "RID",align:"right", width:'5%', editable: false},
				{ name: "RID1", editable: true, width:'0%'},
				{ name: "PART_NO",align:"right", width:'10%', editable: true,
                        searchoptions: {
                            dataInit: function (element) {
                                $(element).autocomplete({
                                    id: 'AutoComplete',
                                    source: 'CODES/STOCK/AT_COM_PNO.php',
                                    autoFocus: true
                                });
                            }                         
                        }},
				{ name: "PARTI", width:'45%', editable: true,
                        searchoptions: {
                            dataInit: function (element) {
                                $(element).autocomplete({
                                    id: 'AutoComplete',
                                    source: 'CODES/STOCK/AT_COM_PNA.php',
                                    autoFocus: true
                                });
                            }                         
                        }},
				{ name: "MRP", width:'5%', editable: true},
				{ name: "GROP", width:'5%', editable: true},
				{ name: "CATE", width:'10%', editable: true},
				{ name: "UNIT", width:'10%', editable: true},
				{ name: "TRATE", width:'10%', editable: true}
			],
			height: ht,
			width: wd,
			toppager: true,
			pager: jQuery('#perpage'),
			rowNum: 100000000,
            rowList: [10, 20, 30, 100000000],
            loadComplete: function () {
               $("option[value=100000000]").text('All');
            },
			sortname: "PARTI",
			sortorder: "asc",
			emptyrecords: 'BLANK',
            loadonce: true,
            shrinkToFit: true,
			viewrecords: true,
			editurl: "CODES/STOCK/getGridData.php",
			caption: "PRICE LIST"
		});
		jQuery("#list_records").jqGrid('navGrid',"#perpage",{edit:false,add:false,del:false});
jQuery("#list_records").jqGrid('inlineNav',"#perpage");
jQuery("#list_records").jqGrid('filterToolbar',{searchOperators : true});
	});
	</script>
<div style="margin-left:1%;margin-right:1%">
<table id="list_records" ></table> 
<div id="perpage"></div>
<hr/>
</div>
</html>