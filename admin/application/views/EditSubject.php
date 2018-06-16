<!DOCTYPE html>
<html>
    <head>
        <title>Add Subjects</title>
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


            <header id="head" class="secondary" >
            
                <h2>Edit Subject</h2>
            
            </header>
            <!-- navbar side -->
            <?php $this->load->view("panel1"); ?>
            <!-- end navbar side -->
            <!--  page-wrapper -->
            <div id="page-wrapper">
                <div class="row">
                    <!-- page header -->
                    <div class="col-lg-9" style="margin-top: -20px;">
                       <div class="page-header">
                        
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="<?php echo base_url("index.php/Subject_Controller/ViewSubject"); ?>">Subjects</a></li>
                            <li class="active">Edit Subject</li>
                        </ol>
                      </div>
                    </div>
                    <!--end page header -->
                
                <div class="row">

                    <div class="col-lg-9">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url("index.php/Subject_Controller/UpdateSubject"); ?>">
                                                <?php if (isset($res)) { ?>
                                                <div class="form-group">
                                                    <?php
                                                    foreach ($res as $value) {
                                                        $sub_id=$value->sub_id;
                                                        $std_id=$value->standard_id;
                                                    }
                                                    ?>

                                                    <input  type="hidden" name="subid" value="<?php if(isset($res)){ echo $sub_id;}?>"  >
                                                    <input  type="hidden" name="stdid" value="<?php if(isset($res)){ echo $std_id;}?>"  >
                                                </div>
                                                <?php } ?>

                                                <div class="form-group">
                                                    <label>Subject Name</label>
                                                    <input class="form-input form-control" placeholder="Subject Name" name="SubjectName" value="<?php if(isset($res)){ $res= trim($res['0']->sub_name); echo $res;  } ?>" required ><!-- pattern="[A-Za-z]{3,}"  -->
                                                </div>

                                                <input type="submit" class="btn btn-default" value="Update" name="UpdateSubject">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end page-wrapper -->

                            </div>

                            <!-- end page-wrapper -->
                        </div>
                        <!-- end wrapper -->
                    </div>
                </div>
                    <!-- Core Scripts - Include with every page -->
                </div></div>
    <?php $this->load->view("footer"); ?>
                </body>
                </html>





