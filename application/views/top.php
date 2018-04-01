<!-- Fixed navbar -->
    <div class="navbar navbar-inverse" style="padding-top: 0px; min-height: 70px;">
        <div class="container">
            <center>
            <a href="" class="navbar-brand">
            <img src='<?php echo base_url("assets/images/logo.jpg"); ?>' alt="Logo">
            </a>
            </center>

            <div style="float:right;">
            
            <?php if(isset($_SESSION['isFacLoggedIn']) && $_SESSION['isFacLoggedIn'] == 1) { ?>
                <p>Welcome <?php echo $_SESSION['facultyname']; ?></p>
                <a href="<?php echo base_url("index.php/Faculty_Controller/LogOut"); ?>" class="btn btn-sm"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
            <?php } ?>

            <?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 1) { ?>
                <p>Welcome <?php echo $_SESSION['studentname']; ?></p>
                <a href="<?php echo base_url("index.php/Student_Controller/LogOut"); ?>" class="btn btn-sm"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
            <?php } ?>

                <a href="<?php echo base_url("index.php/welcome"); ?>" class="btn btn-sm"><i class="glyphicon glyphicon-home"></i></a>
            </div>
        </div>
    <!-- end navbar-header -->
</div>