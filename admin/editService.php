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
                <script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
                <script type="text/javascript">
                    tinyMCE.init({
                        // General options
                        mode: "textareas",
                        theme: "advanced",
                        skin: "o2k7",
                        plugins: "openmanager,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
                        // Theme options
                        theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                        theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,undo,redo,|,link,unlink,anchor,image,|,forecolor,backcolor,openmanager",
                        theme_advanced_buttons3: "charmap,emotions,iespell,media,advhr,|,print",
                        //                theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks,|",
                        theme_advanced_toolbar_location: "top",
                        theme_advanced_toolbar_align: "left",
                        theme_advanced_statusbar_location: "bottom",
                        theme_advanced_resizing: true,
                        //Open Manager Options
                        file_browser_callback: "openmanager",
                        open_manager_upload_path: '../../../../uploads/',
                        // Example content CSS (should be your site CSS)
                        content_css: "css/content.css",
                        // Drop lists for link/image/media/template dialogs
                        template_external_list_url: "lists/template_list.js",
                        external_link_list_url: "lists/link_list.js",
                        external_image_list_url: "lists/image_list.js",
                        media_external_list_url: "lists/media_list.js",
                        // Style formats
                        style_formats: [
                            {title: 'Bold text', inline: 'b'},
                            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                            {title: 'Example 1', inline: 'span', classes: 'example1'},
                            {title: 'Example 2', inline: 'span', classes: 'example2'},
                            {title: 'Table styles'},
                            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                        ],
                        // Replace values for the template plugin
                        template_replace_values: {
                            username: "Some User",
                            staffid: "991234"
                        }
                    });

                    function validasi(form) {
                        valid = true;

                        if (form.title.value.trim() === "") {
                            alert("Please enter a Title.");
                            form.title.focus();
                            return (false);
                        }
                        if (form.menu.value.trim() === "") {
                            alert("Please enter a Menu.");
                            form.menu.focus();
                            return (false);
                        }
                        return valid;
                    }
                </script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        load(1);
                        $('#element').tooltip('show');
                    });
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
                        $editService = mysql_query("SELECT s.*, m.menu FROM service AS s INNER JOIN menu AS m ON s.id_menu = m.id_menu WHERE s.id_service = '$_GET[id]'");
                        $dataService = mysql_fetch_array($editService);
                        ?>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form" class="form-horizontal" enctype="multipart/form-data" onsubmit="return validasi(this);">
                            <legend>Edit New Content</legend>
                            <fieldset>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-3">
                                        <input type="hidden" name="id_service" value="<?php echo $dataService['id_service']; ?>">
                                        <input type="text" placeholder="title" class="form-control" id="inputPassword3" name="title" value="<?php echo $dataService['judul_service'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Menu</label>
                                    <div class="col-sm-3">
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><strong><?php echo $dataService['menu']; ?></strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Change Menu</label>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="menu" required>
                                            <option name="0">- Choose -</option>
                                            <?php
                                            $query_menu = mysql_query("SELECT * FROM menu");
                                            while ($data = mysql_fetch_array($query_menu)) {
                                                ?>
                                                <option value="<?php echo $data['id_menu']; ?>"><?php echo $data['menu']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Content</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="content" name="isi" rows="16" required><?php echo $dataService['isi_service'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="updateService" data-loading-text="Loading..." class="btn btn-success">Save</button>
                                        <input type="button" value="Cancel" onclick="document.location = './services.php';" class="btn btn-default">
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
        if (isset($_POST['updateService'])) {
            $id_service = $_POST['id_service'];
            $title = trim($_POST['title']);
            $menu = $_POST['menu'];
            $content = trim(mysql_real_escape_string($_POST['isi']));

            if ($menu == 0) {
                $sql = mysql_query("UPDATE service SET judul_service='$title', isi_service='$content' WHERE id_service = '$id_service'");
                if ($sql) {
                    echo "<script>alert('Data service has been updated');</script>";
                    echo "<script>javascript:window.location='./services.php'</script>";
                } else {
                    echo "<script>alert('Data service cannot updated');</script>";
                }
            } else if ($menu > 0) {
                $sql2 = mysql_query("UPDATE service SET judul_service='$title', isi_service='$content', id_menu = '$menu' WHERE id_service = '$id_service'");
                if ($sql2) {
                    echo "<script>alert('Data service has been updated');</script>";
                    echo "<script>javascript:window.location='./services.php'</script>";
                } else {
                    echo "<script>alert('Data service cannot updated');</script>";
                }
            }
        }
    }
}
?>