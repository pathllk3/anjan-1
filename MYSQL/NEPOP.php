<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
	<link href="jqwidgets/styles/jqx.base.css" rel="stylesheet" />
    <link href="jqwidgets/styles/jqx.energyblue.css" rel="stylesheet" />
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui-1.10.0.js"></script>
    <script src="jqwidgets/jqxcore.js"></script>
    <script src="jqwidgets/jqxdata.js"></script>
    <script src="jqwidgets/jqxbuttons.js"></script>
    <script src="jqwidgets/jqxscrollbar.js"></script>
    <script src="jqwidgets/jqxmenu.js"></script>
    <script src="~jqwidgets/jqxlistbox.js"></script>
    <script src="jqwidgets/jqxdropdownlist.js"></script>
    <script src="jqwidgets/jqxgrid.js"></script>
    <script src="jqwidgets/jqxgrid.selection.js"></script>
    <script src="jqwidgets/jqxgrid.columnsresize.js"></script>
    <script src="jqwidgets/jqxgrid.filter.js"></script>
    <script src="jqwidgets/jqxgrid.sort.js"></script>
    <script src="jqwidgets/jqxgrid.pager.js"></script>
    <script src="jqwidgets/jqxgrid.grouping.js"></script>
    <script src="jqwidgets/jqxgrid.edit.js"></script>
    <script src="jqwidgets/jqxwindow.js"></script>
    <script src="jqwidgets/jqxdata.export.js"></script>
    <script src="jqwidgets/jqxgrid.export.js"></script>
	<script>
	$(function () {
		$(document).ready(function () {
        var source =
   {
       datatype: "json",
       datafields: [
            { name: 'RID', type: 'string' },
            { name: 'CNAME', type: 'string' },
            { name: 'SNAME', type: 'string' },
            { name: 'SID', type: 'string' },
            { name: 'ENS', type: 'string' },
            { name: 'ALSN', type: 'string' },
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
                theme: 'energyblue',
                editable: true,
                columns: [
                    { text: "RECORD NO", datafield: "RID", hidden: true },
                    { text: "SITE ID", datafield: "SID" },
                    { text: "SITE NAME", datafield: "SNAME" },
                    { text: "CUSTOMER", datafield: "CNAME" },
                    { text: "ENGINE NO", datafield: "ENS" },
                    { text: "ALT NO", datafield: "ALSN" }
                ]
            });
	});
	</script>
	</head>
	<body>
	<div id="grid"></div>
	</body>