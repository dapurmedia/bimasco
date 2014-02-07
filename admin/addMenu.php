<?php
session_start();
include '../connect/connection.php';
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<script>alert('You must Login!');window.location='./index.php';</script>";
} else {
    if (isset($_SESSION['password']) && isset($_SESSION['username'])) {
        ?>
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
                <script type="text/javascript">
                    $(document).ready(function() {
                        load(1);
                        $('#element').tooltip('show');
                    });

                    function validasi(form) {
                        valid = true;

                        if (form.menu.value.trim() === "") {
                            alert("Please enter a Menu.");
                            form.menu.focus();
                            return (false);
                        }
                        return valid;
                    }
                </script>
            </head>
            <body>
                <div id="wrap">
                    <!-- Header -->        
                    <?php include './header.php'; ?>        
                    <!-- End Header -->

                    <!-- Content -->  
                    <div class="container">
                        <form class="form-horizontal" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="return validasi(this);">
                            <legend>Add New Menu</legend>
                            <fieldset>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Menu</label>
                                    <div class="col-sm-3">
                                        <input type="type" name="menu" class="form-control" id="inputEmail3" placeholder="menu" required value="<?php echo $_POST['menu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button name="saveMenu" type="submit" class="btn btn-success">Save</button>
                                        <input type="button" onClick="document.location = 'menu.php';" class="btn btn-default" value="Cancel">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <!-- end content -->
                </div>
                <!-- Footer -->
                <?php include_once './footer.php'; ?>
                <script src="../js/jquery-1.10.2.min.js"></script>
                <script src="bootstrap/js/bootstrap.min.js"></script>
                <!-- end left -->

            </body>
        </html>
        <?php
        if (isset($_POST['saveMenu'])) {
            $menu = trim($_POST['menu']);

            // check duplicate username
            $sql = mysql_query("SELECT * FROM menu");
            $data = mysql_num_rows($sql);
            $stop = 0;
            $i = 0;

            while ($i < $data) {
                $rows = mysql_fetch_array($sql);
                $myMenu = $rows['menu'];
                $data;
                $myMenu . ":";
                $i++;
                if ($menu != "") {
                    if ($menu === $myMenu) {
                        $stop = 1;
                        break;
                    }
                }
            }

            if ($stop == 1) {
                echo "<script>alert('Data $menu already exist, use another name')</script>";
            } else {
                $sql = mysql_query("INSERT INTO menu SET menu = '$menu'");
            }
            if ($sql) {
                echo "<script>alert('New menu has been saved');</script>";
                echo "<script>javascript:window.location='./menu.php'</script>";
            } else if ($sql) {
                echo "<script>alert('New menu cannot be saved');</script>";
            }
        }
    }
}
?>