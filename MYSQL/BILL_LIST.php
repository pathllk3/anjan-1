<?php
$st = session_status();
		 if($st!=2)
		 {
			session_start(); 
			$_SESSION["PNAME"] = "SALES REPORT";
		 }
require_once 'LAYOUT.php';
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
		.ui-state-highlight {background: LawnGreen !important; }
</style>
<div style="margin-left:1%;margin-right:1%">
<table id="grid" style="width:95%"></table>
<div id="pager"></div>
<div id="pg">
    &nbsp;
    <input type="date" id="frm1" name="frm" class=""/>
    <input type="date" id="too1" name="too" class=""/>
    <input type="button" id="src" value="Search" class="btn btn-xs btn-danger" />
</div>
<input type="text" id="sr" class="form-control input-xs" />
</div>
<script>
    var wd = $(window).width() - 50;
    var ht = $(window).height() - 190;
	var i = 1;
    $(document).ready(function () {
        var grid = jQuery('#grid');
        $('#grid').jqGrid({
            url: 'CODES/BILL/LIST_BILL_REP.php',
            datatype: 'json',
            type: 'GET',
            colNames: ['BILLID', 'BILL NO', 'BILL DATE', 'CUSTOMER', 'SITE NAME', 'PART NO', 'PART NAME', 'MRP', 'SELL PRICE', 'QTY', 'UNIT', 'NET TOTAL', 'GRAND TOTAL', 'TAX VALUE'],
            colModel: [
                { key: true, hidden: true,  name: 'BILLID', index: 'BILLID', editable: true, editrules: {edithidden: true} },
                { key: false, name: 'BILL_NO', index: 'BILL_NO', editable: true },
                { key: false, name: 'BDATE', index: 'BDATE', editable: true, formatter: 'date', formatoptions: { newformat: 'd-M-Y'} },
                { key: false, name: 'CUST', index: 'CUST', editable: true },
                { key: false, name: 'DNAME', index: 'DNAME', editable: true },
                { key: false, name: 'PART_NO', index: 'PART_NO', editable: true },
                { key: false, name: 'PARTI', index: 'PARTI', editable: true },
                { key: false, name: 'MRP', index: 'MRP', editable: true },
                { key: false, name: 'SPRICE', index: 'SPRICE', editable: true },
                { key: false, name: 'QTY', index: 'QTY', editable: true },
                { key: false, name: 'UNIT', index: 'UNIT', editable: true },
                { key: false, name: 'TOTAL', index: 'TOTAL', editable: true },
                { key: false, name: 'STOT', index: 'STOT', editable: true },
                { key: false, name: 'TVAL', index: 'TVAL', editable: true }
            ],
            toppager: true,
            pager: jQuery('#pager'),
            height: ht,
			width: wd,
			rowNum: 100000000,
            rowList: [10, 20, 30, 100000000],
            loadComplete: function () {
               $("option[value=100000000]").text('All');
			   var grid = jQuery("#grid");
		var ids = grid.jqGrid("getDataIDs");
		grid.jqGrid("setSelection",ids[0]);
            },
			gridComplete: function(){        
   $('#pager_center').empty();
},
			sortname: "BDATE",
			sortorder: "DESC",
			emptyrecords: 'BLANK',
            loadonce: true,
            shrinkToFit: true,
			viewrecords: true,
			caption: "SALES REPORT",
			scrollrows: true
        }).navGrid('#pager', { edit: false, add: false, del: false, refresh: true, search: true, view: true, cloneToTop: true }).jqGrid('navButtonAdd', '#pager', {
            caption: "", buttonicon: "ui-icon-calculator", title: "choose columns",
            onClickButton: function () {
                $('#grid').jqGrid('columnChooser', {
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
        }).navButtonAdd('#grid_toppager', {
            caption: "",
            buttonicon: "ui-icon-disk",
            title: "Export to Excel",
            onClickButton: function () {
                window.location = "CODES/BILL/SREP.php"
            },
            position: "last"
        });
        $("#pager table.navtable tbody tr").append($("#pg"));
		$("#grid_toppager table.navtable tbody tr").append($("#sr"));
        $('INPUT[type="text"]').focus(function () {
            $(this).addClass("focus");
        });

        $('INPUT[type="text"]').blur(function () {
            $(this).removeClass("focus");
        });
		$("#sr").focus();
    });
	
	
	$("#gtrow").click(function(){
		var grid = jQuery("#grid");
		var rk = grid.jqGrid("getGridParam","selrow");
		alert(rk);
	});
	$("#sr").keydown(function(event){
		if (event.keyCode == 40){
			var grid = jQuery("#grid");
		var ids = grid.jqGrid("getDataIDs");
		grid.jqGrid("setSelection",ids[0 + i]);
		i= i + 1;
		}
		else if (event.keyCode == 38){
			var grid = jQuery("#grid");
		var ids = grid.jqGrid("getDataIDs");
		grid.jqGrid("setSelection",ids[i - 1]);
		i= i - 1;
		}
	});
	$("#src").click(function (){
		var frm = $("#frm1").val();
		var too = $("#too1").val();
		window.location.href = "CODES/BILL/SREP1.php?frm=" + frm + "&too=" + too;
	});
</script>
</html>