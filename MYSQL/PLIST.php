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
        var ht = $(window).height() - 220;
		$("#list_records").jqGrid({
			url: "CODES/STOCK/getGridData.php",
			datatype: "json",
			mtype: "GET",
			colNames: ["ID", "RID1", "PART NO", "PART NAME", "MRP", "TYPE", "CATEGORY", "UNIT", "TAX RATE"],
			colModel: [
                { name: "RID",align:"right", width:'5%', editable: true, search:false},
				{ name: "RID1", editable: true, width:'0%', search:false},
				{ name: "PART_NO", width:'10%', editable: true,
                        searchoptions: {
                            dataInit: function (element) {
                                $(element).autocomplete({
                                    id: 'AutoComplete',
                                    source: 'CODES/STOCK/AT_COM_PNO.php',
                                    autoFocus: true
                                });
                            },
							sopt:['eq','bw','bn','cn','nc','ew','en']
                        }},
				{ name: "PARTI", width:'45%', editable: true,
                        searchoptions: {
                            dataInit: function (element) {
                                $(element).autocomplete({
                                    id: 'AutoComplete',
                                    source: 'CODES/STOCK/AT_COM_PNA.php',
                                    autoFocus: true
                                });
                            },
							sopt:['eq','bw','bn','cn','nc','ew','en']                         
                        }},
				{ name: "MRP", width:'5%', editable: true, search:false},
				{ name: "GROP", width:'5%', editable: true, search:false},
				{ name: "CATE", width:'10%', editable: true, search:false},
				{ name: "UNIT", width:'10%', editable: true, search:false},
				{ name: "TRATE", width:'10%', editable: true, search:false}
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
			caption: "PRICE LIST"
		}).navGrid('#perpage', { edit: true, add: true, del: true, refresh: true, search: true, view: true, cloneToTop: true },
			{
				zIndex: 100,
				url: 'CODES/STOCK/UPD_PL.php',
				closeOnEscape: true,
				closeAfterEdit: true,
				recreateForm: true,
				afterComplete: function (response) {
				if (response.responseText) 
					{
						alert(response.responseText);
					}
				}
			},
				{
					zIndex: 100,
					url: 'CODES/STOCK/CRT_PL.php',
					closeOnEscape: true,
					closeAfterAdd: true,
					afterComplete: function (response) {
					if (response.responseText)
						{
							alert(response.responseText);
						}
					}
				},
				{
					zIndex: 100,
					url: 'CODES/STOCK/DEL_PL.php',
					closeOnEscape: true,
					closeAfterDelete: true,
					recreateForm: true,
					msg: "Are You Want to Delete This Record",
					afterComplete: function (response) 
					{
					if (response.responseText) 
						{
						alert(response.responseText);
						}
					}
				}
		).jqGrid('navButtonAdd', '#perpage', {
            caption: "", buttonicon: "ui-icon-calculator", title: "choose columns",
            onClickButton: function () {
                $('#list_records').jqGrid('columnChooser', {
                    width: 550,
                    dialog_opts: {
                        modal: true,
                        minWidth: 470,
                        height: 470,
                        show: 'blind',
                        hide: 'explode',
                        dividerLocation: 0.5
                    }
                });
            }
        }).navButtonAdd('#list_records_toppager', {
            caption: "",
            buttonicon: "ui-icon-disk",
            title: "Export to Excel",
            onClickButton: function () {
                window.location = "CODES/STOCK/PL_EXL.php"
            },
            position: "last"
        });
		jQuery("#list_records").jqGrid('filterToolbar',{searchOperators : true, searchOperators: true});
	});
	</script>
<div style="margin-left:1%;margin-right:1%">
<table id="list_records" ></table> 
<div id="perpage"></div>
<hr/>
</div>
</html>