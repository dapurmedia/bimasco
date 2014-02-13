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
                        var t = document.getElementById('email');
                        var x = t.value.indexOf('@');
                        var y = t.value.lastIndexOf('.');

                        if (form.afiliasi.value.trim() === "") {
                            alert("Please enter a Affiliation.");
                            form.afiliasi.focus();
                            return (false);
                        }
                        if (form.city.value.trim() === "") {
                            alert("Please enter a City.");
                            form.city.focus();
                            return (false);
                        }
                        if (form.address.value.trim() === "") {
                            alert("Please enter a Address.");
                            form.address.focus();
                            return (false);
                        }
                        if (form.tel.value.trim() === "") {
                            alert("Please enter a Phone.");
                            form.tel.focus();
                            return (false);
                        }
                        if (form.fax.value.trim() === "") {
                            alert("Please enter a Fax.");
                            form.fax.focus();
                            return (false);
                        }
                        if (x === -1 || y === -1 || (x + 2) >= y) {
                            alert('Email address is not valid');
                            form.email.focus();
                            return (false);
                        }
                        if (form.email.value === "") {
                            alert("Please enter Email.");
                            form.email.focus();
                            return (false);
                        }
                        if (form.pic.value.trim() === "") {
                            alert("Please enter a PIC.");
                            form.pic.focus();
                            return (false);
                        }
                        if (form.hp.value.trim() === "") {
                            alert("Please enter a Mobile Phone.");
                            form.hp.focus();
                            return (false);
                        }
                        if (form.office.value.trim() === "") {
                            alert("Please enter a Office.");
                            form.office.focus();
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
                        $editContact = mysql_query("SELECT * FROM kontak WHERE id_kontak = '$_GET[id]'");
                        $dataContact = mysql_fetch_array($editContact);
                        ?>
                        <form name="form" class="form-horizontal" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="return validasi(this);">
                            <legend>Edit Contact</legend>
                            <fieldset>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Affiliation</label>
                                    <div class="col-sm-3">
                                        <input type="hidden" name="id_kontak" value="<?php echo $dataContact['id_kontak']; ?>">
                                        <input type="type" name="afiliasi" class="form-control" id="inputEmail3" placeholder="affilition" required value="<?php echo $dataContact['nama_afiliasi'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Office</label>
                                    <div class="col-sm-3">
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><strong><?php echo $dataContact['jenis_kantor'] ?></strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Change Office</label>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="office" required>
                                            <option name="0">- Choose -</option>
                                            <option name="Head Office">Head Office</option>
                                            <option name="Branch Office">Branch Office</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">City</label>
                                    <div class="col-sm-4">
                                        <input type="type" name="city" class="form-control" id="inputEmail3" placeholder="city" required value="<?php echo $dataContact['kota'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-3">
                                        <textarea name="address" rows="3" class="form-control" id="inputEmail3" placeholder="address"><?php echo $dataContact['alamat'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-2">
                                        <input type="type" name="phone" class="form-control" id="inputEmail3" placeholder="phone" required value="<?php echo $dataContact['telepon'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Fax</label>
                                    <div class="col-sm-2">
                                        <input type="type" name="fax" class="form-control" id="inputEmail3" placeholder="fax" required value="<?php echo $dataContact['fax'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-4">
                                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="email" required value="<?php echo $dataContact['email'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">PIC</label>
                                    <div class="col-sm-3">
                                        <input type="type" name="pic" class="form-control" id="inputEmail3" placeholder="PIC" required value="<?php echo $dataContact['pic'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Mobile Phone</label>
                                    <div class="col-sm-3">
                                        <input type="type" name="hp" class="form-control" id="inputEmail3" placeholder="mobile phone" required value="<?php echo $dataContact['hp'] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button name="updateContact" type="submit" class="btn btn-success">Save</button>
                                        <input type="button" onClick="document.location = 'contact.php';" class="btn btn-default" value="Cancel">
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
        if (isset($_POST['updateContact'])) {
            $id_kontak = $_POST['id_kontak'];
            $afiliasi = trim($_POST['afiliasi']);
            $office = $_POST['office'];
            $city = trim($_POST['city']);
            $address = trim($_POST['address']);
            $phone = trim($_POST['phone']);
            $fax = trim($_POST['fax']);
            $email = trim($_POST['email']);
            $pic = trim($_POST['pic']);
            $hp = trim($_POST['hp']);

            if ($office == 0) {
<<<<<<< HEAD
                $sql = mysql_query("UPDATE kontak SET nama_afiliasi = '$afiliasi', kota = '$city', 
                    alamat = '$address', telepon = '$phone', fax = '$fax', email = '$email',
=======
                $sql = mysql_query("UPDATE kontak SET nama_afiliasi = '$afiliasi', alamat = '$address', 
                    telepon = '$phone', fax = '$fax', email = '$email',
>>>>>>> 16b127ddcd9ca20f84623b75b6f75a0e16df8f10
                    pic = '$pic', hp = '$hp' WHERE id_kontak = '$id_kontak'");
                if ($sql) {
                    echo "<script>alert('Data kontak has been updated');</script>";
                    echo "<script>javascript:window.location='./contact.php'</script>";
                } else if ($sql) {
                    echo "<script>alert('Data kontak cannot be updated');</script>";
                }
            } elseif ($office > 0) {
                $sql = mysql_query("UPDATE kontak SET nama_afiliasi = '$afiliasi', jenis_kantor = '$office',
                    kota = '$city', alamat = '$address', telepon = '$phone', fax = '$fax', email = '$email',
                    pic = '$pic', hp = '$hp' WHERE id_kontak = '$id_kontak'");
                if ($sql) {
                    echo "<script>alert('Data kontak has been updated');</script>";
                    echo "<script>javascript:window.location='./contact.php'</script>";
                } else if ($sql) {
                    echo "<script>alert('Data kontak cannot be updated');</script>";
                }
            }
        }
    }
}
?>