<?php
$_SESSION["PNAME"] = "POPULATION";
include 'LAYOUT.php';
include ("connect1.php");
?>
<html>
<script type="text/javascript">
	$(document).ready(function () {
		var wd = $(window).width() - 50;
        var ht = $(window).height() - 190;
		$("#list_records").jqGrid({
			url: "getGridData.php",
			datatype: "json",
			mtype: "GET",
			colNames: ["Record No", "Customer", "Site Name", "Site Id", "Engine No"],
			colModel: [
                { name: "RID",align:"right"},
				{ name: "CNAME",align:"right"},
				{ name: "SNAME"},
				{ name: "SID"},
				{ name: "ENS"}
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
			sortname: "SNAME",
			sortorder: "asc",
			emptyrecords: 'BLANK',
            loadonce: true,
            shrinkToFit: true,
			height: 'auto',
			viewrecords: true,
			caption: "LIST OF SITES"
		}).navGrid('#perpage', { edit: true, add: true, del: true, refresh: true, search: true, view: true, cloneToTop: true }); 	
	});
	</script>
<div style="margin-left:2%;margin-right:1%;background-color :orange">
<table id="list_records" ></table> 
<div id="perpage"></div>
<hr/>
</div>
</html>