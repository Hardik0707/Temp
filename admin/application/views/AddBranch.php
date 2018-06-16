<!DOCTYPE html>
<html>
<head>
    <title>Add Branch</title>
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
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <?php $this->load->view("top"); ?>
        <!-- end navbar top -->

        <header id="head" class="secondary">
            <h2><?php echo(isset($res)) ? "Edit Branch Details" : "Add Branch Details"; ?></h2>
        </header>
        <!-- navbar side -->
        <?php  $this->load->view("panel1"); ?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div class="container col-sm-9">
        <div id="page-wrapper">
            <div class="row">
                <!-- page header -->
                <div class="col-lg-12" style="margin-top: -20px;">

                    <div class="page-header">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="<?php echo base_url("index.php/Branch_Controller/ViewBranch"); ?>">All Branches</a></li>
                            <li class="active"><?php echo(isset($res)) ? "Edit Branch Details" : "Add Branch Details"; ?></li>
                        </ol>
                    </div>
                </div>
                <!--end page header -->
            </div>    

                <?php if(isset($res)){
                    $insert="Updatebranch";
                    foreach ($res as $value) {
                        $row=$value;
                    }
                } else {
                    $insert="InsertBranch";
                }?>
                <div class="row">
                    <div class="col-lg-11">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-body">

                                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url("index.php/Branch_Controller/$insert"); ?>">
                                    <?php if(isset($row)){?>
                                    <input type="hidden" class="form-input form-control" placeholder="Branch Area" name="branch_id" value="<?php if(isset($row)){ echo $row->branch_id;}?>">
                                    <?php } ?>
                                    <div class="form-group col-md-6">
                                        <label>Branch Area</label>
                                        <input class="form-input form-control" placeholder="Branch Area" name="AlbumName" value="<?php if(isset($row)){ echo $row->branch_area;}?>" pattern="[a-zA-Z0-9]{3,}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Address</label>
                                        <textarea class="form-input form-control" cols="29" rows="3" placeholder="Address" name="Add" required><?php if(isset($row)){ echo $row->address;}?></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Branch Phone 1</label>
                                        <input class="form-input form-control" placeholder="Phone" name="BranchPhone1" value="<?php if(isset($row)){ echo $row->phone_no1;}?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Branch Phone 2</label>
                                        <input class="form-input form-control" placeholder="Phone 2" name="BranchPhone2" value="<?php if(isset($row)){ echo $row->phone_no2;}?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" class="form-input form-control" placeholder="Branch Email" name="Email" value="<?php if(isset($row)){ echo $row->email;}?>" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                           
                                    <input type="submit" class="btn btn-default" value="Submit" name="SubmitImage">
                                    </div>
                                </form>
                            </div>
                            <!-- end page-wrapper -->

                        </div>

                    </div>
                    <!-- end wrapper -->
                </div>
            </div>
        </div></div>
        <!-- Core Scripts - Include with every page -->
        <?php  $this->load->view("footer"); ?>
    </body>
    </html>





