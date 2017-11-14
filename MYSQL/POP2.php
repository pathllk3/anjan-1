<?php
$_SESSION["PNAME"] = "POPULATION";
include ("connect1.php");
?>
<!DOCTYPE html>
<html  lang="en">
<head>
<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?php echo $_SESSION['PNAME']; ?></title>
	<link href="css\themes\dark-hive\theme.css" rel="stylesheet" />
	<link href="css/ui.jqgrid.css" rel="stylesheet" />
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui-1.12.1.js"></script>
	<script src="js/i18n/grid.locale-en.js"></script>  
    <script src="js/jquery.jqGrid.min.js"></script>
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
	</head>
<body>
<hr/>
<div class="jumbotron" style="margin-left:2%;margin-right:1%">
<table id="list_records"></table> 
<div id="perpage"></div>
<hr/>
</div>
</body>
</html>