<?php
$_SESSION["PNAME"] = "POPULATION";
require 'LAYOUT.php';
include ("connect1.php");
?>
<html>
<script>
	$(document).ready(function () {
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
			pager: "#perpage",
			rowNum: 10,
			rowList: [10,20],
			sortname: "sname",
			sortorder: "asc",
			height: 'auto',
			viewrecords: true,
			gridview: true,
			caption: ""
		}); 	
	});
	</script>
<hr/>
<h2>List of Sites</h2>
<table id="list_records"><tr><td></td></tr></table> 
<div id="perpage"></div>
<hr/>
</html>