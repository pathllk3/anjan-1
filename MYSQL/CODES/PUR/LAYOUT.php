<?php
session_start();
if(!$_SESSION["auth"])
{
    header ('Location: Index.php');
}
else
{
	$now = time();
        if ($now > $_SESSION['expire']) {
            session_start();
			session_unset();
			session_destroy();
			header ("Location: Index.php");
        }
		else
		{
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
			require 'chkmysqltbl.php';
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?php echo $_SESSION['PNAME']; ?></title>
	<link rel="shortcut icon" href="favicon.ico" />
	<script src="js/jquery.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet" />
	<script src="js/bootstrap.js"></script>
	<script src="css/themes/redmond/jquery-ui.min.js"></script>
	<script src="js/ui.multiselect.js"></script>
	<script src="js/i18n/grid.locale-en.js"></script>  
    <script src="js/jquery.jqGrid.min.js"></script>
	<link href="css/themes/redmond/jquery-ui.min.css" rel="stylesheet" />
	<link href="css/ui.jqgrid.css" rel="stylesheet" />
	<link href="css/ui.multiselect.css" rel="stylesheet" />
	<link href="jqwidgets/styles/jqx.base.css" rel="stylesheet" />
    <link href="jqwidgets/styles/jqx.energyblue.css" rel="stylesheet" />
	<link href="jqwidgets/styles/jqx.ui-start.css" rel="stylesheet" />
	<link href="jqwidgets/styles/jqx.ui-redmond.css" rel="stylesheet" />
	<link href="jqwidgets/styles/jqx.orange.css" rel="stylesheet" />
	<script src="jqwidgets/jqxcore.js"></script>
    <script src="jqwidgets/jqxdata.js"></script>
    <script src="jqwidgets/jqxbuttons.js"></script>
    <script src="jqwidgets/jqxscrollbar.js"></script>
    <script src="jqwidgets/jqxmenu.js"></script>
    <script src="jqwidgets/jqxlistbox.js"></script>
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
	<script src="jqwidgets/jqxinput.js"></script>
	<script src="jqwidgets/jqxtoolbar.js"></script>
    <script src="jqwidgets/jqxcalendar.js"></script>
    <script src="jqwidgets/jqxgrid.aggregates.js"></script>
    <script src="jqwidgets/jqxnotification.js"></script>
    <script src="jqwidgets/jqxtooltip.js"></script>
	<script src="js/jquery.number.js"></script>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:indigo">
        <div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Home</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="POP.php">SERVICES</a>
                    </li>
                    <li>
                        <a href="ST_LIST.php">STOCK</a>
                    </li>
					<li>
                        <a href="PLIST.php">PRICE LIST</a>
                    </li>
					<li>
                        <a href="BILL_MAIN.php">SALES</a>
                    </li>
					<li>
                        <a href="CODES/PUR/BILL_MAIN.php">PURCHASE</a>
                    </li>
					<li>
                        <a href="BILL_LIST.php">SALES REPORT</a>
                    </li>
                </ul>
				<ul class="nav navbar-nav navbar-right">
                    <li><a class="navbar-brand" href="LOGOUT.php">LOGOUT &nbsp; <?php echo $_SESSION['FNAME']; ?></a></li>
                </ul>
            </div>
        </div>
    </nav>
</head>
<br/>
<br/>
<hr/>