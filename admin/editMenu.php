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
                        <?php
                        $editMenu = mysql_query("SELECT * FROM menu WHERE id_menu = '$_GET[id]'");
                        $dataMenu = mysql_fetch_array($editMenu);
                        ?>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form" id="form" class="form-horizontal" onSubmit="return validasi(this);">
                            <legend>Edit Menu</legend>
                            <fieldset>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Menu</label>
                                    <div class="col-sm-3">
                                        <input type="hidden" name="id_menu" value="<?php echo $dataMenu['id_menu']; ?>">
                                        <input type="text" placeholder="menu" class="form-control" id="inputPassword3" name="menu" value="<?php echo $dataMenu['menu'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="updateMenu" data-loading-text="Loading..." class="btn btn-success">Save</button>
                                        <input type="button" value="Cancel" onclick="document.location = './menu.php';" class="btn btn-default">
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
        if (isset($_POST['updateMenu'])) {
            $id_menu = $_POST['id_menu'];
            $menu = trim($_POST['menu']);

            $sql = mysql_query("UPDATE menu SET menu='$menu' WHERE id_menu = '$id_menu'");
            if ($sql) {
                echo "<script>alert('Data menu has been updated');</script>";
                echo "<script>javascript:window.location='./menu.php'</script>";
            } else {
                echo "<script>alert('Data menu cannot updated');</script>";
            }
        }
    }
}
?>