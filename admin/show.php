<!DOCTYPE>
<html>
    <head>
        <title>Administrator - Bimasco Cargo System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <script type="text/javascript" src="bootstrap/js/jquery-1.7.2.min.js"></script>
    </head>
    <body>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <a href="#" onClick="<?php echo $_SERVER['PHP_SELF'] . "?act=addUser"; ?>" class="btn btn-default pull-left"><span class="glyphicon glyphicon-plus"></span> Add New User</a>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="row">
                        <div class="col-lg-3 pull-right">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Choose <span class="caret"></span>
                                    </a>
                                    <select name="searchUser" class="dropdown-menu">
                                        <option name="administrator">Administrator</option>
                                        <option name="user">User</option>
                                    </select>
                                </div>
                                <input type="text" class="form-control">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="../js/jquery-1.10.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>