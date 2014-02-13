<?php
// set up DB
include '../connect/connection.php';

// set your db encoding -- for ascent chars (if required)
mysql_query("SET NAMES 'utf8'");

// include and create object
include("./phpgrid/inc/jqgrid_dist.php");
$g = new jqgrid();

// set few params
$grid["caption"] = "Sample Grid";
$grid["multiselect"] = true;
$g->set_options($grid);

// set database table for CRUD operations
$g->table = "menu";

// subqueries are also supported now (v1.2)
// $g->select_command = "select * from (select * from invheader) as o";
// render grid
$out = $g->render("list1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet"></link>
        <link href="bootstrap/css/style.css" rel="stylesheet"></link>
        <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet"></link>
        <link rel="stylesheet" type="text/css" media="screen" href="phpgrid/js/themes/redmond/jquery-ui.custom.css"></link>	
        <link rel="stylesheet" type="text/css" media="screen" href="phpgrid/js/jqgrid/css/ui.jqgrid.css"></link>	

        <script src="phpgrid/js/jquery.min.js" type="text/javascript"></script>
        <script src="phpgrid/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
        <script src="phpgrid/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
        <script src="phpgrid/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>

    </head>
    <body>
        <div id="wrap">

            <!-- Fixed navbar -->
            <?php include './header.php'; ?>

            <!-- Begin page content -->
            <div class="container">
                <!--<div style="margin:10px">-->
                <div class="span12">
                    <?php echo $out ?>
                </div>
            </div>
        </div>

        <?php include './footer.php'; ?>


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!--<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>-->
        <script src="bootstrap/js/bootstrap.min.js"></script>

    </body>
</html>
