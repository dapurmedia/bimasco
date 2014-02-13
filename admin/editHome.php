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

                        if (form.tentang.value.trim() === "") {
                            alert("Please enter a Title.");
                            form.tentang.focus();
                            return (false);
                        }
                        if (form.content.value.trim() === "") {
                            alert("Please enter a Content.");
                            form.content.focus();
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
                        $editHome = mysql_query("SELECT * FROM beranda WHERE id_beranda = '$_GET[id]'");
                        $dataHome = mysql_fetch_array($editHome);
                        ?>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form" class="form-horizontal" enctype="multipart/form-data" onsubmit="return validasi(this);">
                            <legend>Edit Content</legend>
                            <fieldset>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-3">
                                        <input type="hidden" name="id_beranda" value="<?php echo $dataHome['id_beranda']; ?>">
                                        <input type="text" placeholder="title" class="form-control" id="inputPassword3" name="tentang" value="<?php echo $dataHome['judul'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Content</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="content" name="isi" rows="16" required><?php echo $dataHome['isi'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="updateHome" data-loading-text="Loading..." class="btn btn-success">Save</button>
                                        <input type="button" value="Cancel" onclick="document.location = './home.php';" class="btn btn-default">
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
        if (isset($_POST['updateHome'])) {
            $id_beranda = $_POST['id_beranda'];
            $title = trim($_POST['tentang']);
            $content = trim(mysql_real_escape_string($_POST['isi']));

            $sql = mysql_query("UPDATE beranda SET judul='$title', isi='$content' WHERE id_beranda = '$id_beranda'");
            if ($sql) {
                echo "<script>alert('Data content has been updated');</script>";
                echo "<script>javascript:window.location='./home.php'</script>";
            } else {
                echo "<script>alert('Data content cannot updated');</script>";
            }
        }
    }
}
?>