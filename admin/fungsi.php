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
                <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
                <!-- OF COURSE YOU NEED TO ADAPT NEXT LINE TO YOUR tiny_mce.js PATH -->
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
                        return valid;
                    }
                </script>
            </head>
            <body>
                <!-- OF COURSE YOU NEED TO ADAPT ACTION TO WHAT PAGE YOU WANT TO LOAD WHEN HITTING "SAVE" -->
                <?php
                $editAbout = mysql_query("SELECT * FROM tentang WHERE id_tentang = '1'");
                $dataAbout = mysql_fetch_array($editAbout);
                ?>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="form" class="form-horizontal" enctype="multipart/form-data" onsubmit="return validasi(this);">
                    <legend>Edit Activity</legend>
                    <fieldset>
                        <table class="table table-bordered">
                            <tr>
                                <td>Title</td>
                            <input type="hidden" name="id_tentang" value="<?php echo $dataAbout['id_tentang']; ?>">
                            <td>
                                <input type="text" placeholder="title" class="form-control" id="inputPassword3" name="tentang" value="<?php echo $dataAbout['judul_tentang'] ?>" required></td>
                            </tr>
                            <tr>
                                <td>Content</td>
                                <td><textarea class="form-control" id="content" name="isi" rows="16"><?php echo $dataAbout['isi_tentang'] ?></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2"><button type="submit" name="updateAbout" data-loading-text="Loading..." class="btn btn-success">Save</button>
                                    <input type="button" value="Cancel" onclick="document.location = './about_us.php';" class="btn"></td>
                            </tr>
                        </table>


                    </fieldset>
                </form>
            </body>
        </html>
        <?php
        if (isset($_POST['updateAbout'])) {
            $id_tentang = $_POST['id_tentang'];
            $title = trim($_POST['tentang']);
            $content = $_POST['isi'];

            $sql = "UPDATE tentang SET judul_tentang='$title', 
                isi_tentang='$content' WHERE id_tentang = '$id_tentang'";
echo $sql;
//            if ($sql) {mysql_query()
//                echo "<script>alert('Data content has been updated');</script>";
//                echo "<script>javascript:window.location='./about_us.php'</script>";
//            } else {
//                echo "<script>alert('Data content cannot updated');</script>";
//            }
        }
    }
}?>