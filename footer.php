<?php
include ("./connect/connection.php");
$query = mysql_query("SELECT * FROM sosmed");
$queryKontak = mysql_query("SELECT * FROM kontak");
?>
<div id="footer">
    <div id="social-icons">
        <?php while ($dataAbout = mysql_fetch_array($query)) { ?>
            <a href="<?php echo $dataAbout['name_sosmed']; ?><?php echo $dataAbout['ID'] ?>" target="_blank"><img src="images/social-icons/<?php echo $dataAbout['logo']; ?>.png" alt="<?php echo $dataAbout['logo']; ?>" class="transparent"></a>
        <?php } ?>
        <a href="mailto: #"><img src="images/social-icons/email.png" alt="E-Mail" class="transparent"></a>
    </div>
    <div id="copyright">
        Copyright &copy; <?php echo date("Y"); ?> &ndash; Bimasco | Powered By <a href="http://www.dapurmedia.co.id" target="_blank">Dapurmedia</a>
    </div><!--close #copyright -->
</div><!-- close #footer -->


</div><!-- close #page-wrap -->
</div><!-- close #box-container -->

<script>
    $(document).ready(function() {
        $("ul.sf-menu").superfish({
            animation: {height: 'show'}, // slide-down effect without fade-in 
            delay: 1200               // 1.2 second delay on mouseout 
        });
    });
</script>
</body>
</html>