<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <?php $this->load->view("head"); ?>

    <style type="text/css">
    #head.secondary{
        min-height: 40px;
        height: 40px !important;
        margin-top:10px;
        padding-bottom: 25px;
    }
    h2{
        margin-top: -07px;
    }
</style>
</head>
<body>

    <!-- Fixed navbar -->
    <?php $this->load->view("top"); ?> 
    <header id="head" class="secondary" >
        
            <h2>Home</h2>
        
    </header>
    <?php $this->load->view("panel1");
     
    $user_name = $_SESSION['Admin']['user_name'];
    $id =$_SESSION['Admin']['id'];
    $email = $_SESSION['Admin']['email'];
    ?>

    <div class="container col-sm-9" style="margin-top: 10px;">
        <div id="page-wrapper">
            <?php 
            if (isset($_SESSION['DashboardUpdated'])) {
                ?>
                <div class="alert alert-danger"><?php echo $_SESSION['DashboardUpdated'] ?></div>
                <?php unset($_SESSION['DashboardUpdated']);
            } 
            ?>
            <!-- Add Image Form -->
            <div class="row">
                <div class="col-lg-10">
                    <div class="panel panel-default">
                        <!-- Welcome -->
                        <div class="panel-body">

                            <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url("index.php/Login_Controller/Update") ?>">  

                               <div class="col-md-6 form-group">
                                <label>Username</label>
                                <input type="text" class="form-input form-control branch" name="user_name" required value="<?php echo $user_name ?>" >


                            </div>
                            <div class="col-md-6 form-group">
                                <label>Email Id: </label>
                                <input type="email" class="form-input form-control branch" name="email" required value="<?php echo $email ?>" >
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Old Password</label>
                                <input type="password" class="form-input form-control branch" name="password" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <label>New Password</label>
                                <input type="password" class="form-input form-control branch" name="npassword" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="submit" class="btn btn-default" value="Update" name="update" >
                            </div>
                        </form> 
                    </div>
                </div> 
            </div>
        </div>               

    </div>
</div>


<!-- <h1>Welcome Hardik</h1> -->
<?php $this->load->view("footer"); ?>

</body>
</html>    

