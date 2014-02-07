<?php
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<script>alert('You must Login!');window.location='./index.php';</script>";
} else {
    if (isset($_SESSION['password']) && isset($_SESSION['username'])) {
        ?>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="home.php">Administrator</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="manage-user.php">Manage User</a></li>
                        <li><a href="menu.php">Manage Menu</a></li>
                        <li><a href="about_us.php">Manage About Us</a></li>
                        <li><a href="services.php">Manage Service</a></li>
                        <li><a href="contact.php">Manage Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Gallery <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="glyphicon glyphicon-picture"></span> Photo</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><span class="glyphicon glyphicon-film"></span> Video</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Logged As <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="setting.php#">Setting</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <?php
    }
}?>