<!DOCTYPE html>
<head>
    <title>Tution Classes | Admin</title>
    <?php $this->load->view("head"); ?>

    <style type="text/css">
       
    </style>
    
</head>
<body>
    <div id="wrapper">
        <!--header start-->
        <?php $this->load->view("top"); ?>
        <!--header end-->

        <header id="head" class="secondary" style="height:50px;">
            <div class="container">
                <h1>Private Announcement</h1>
            </div>
        </header>

        <!--sidebar start-->
        <?php $this->load->view("panel1"); ?>
        <!--sidebar end-->



        <!--main content start-->
         <div class="container col-sm-9">
            <div id="page-wrapper">
                <div class="row">

                    <!-- Page Header -->
                    <div class="col-lg-12">
                        <div class="page-header">
                            <h1 class="heading">All Private Announcement<a href="<?php echo base_url('index.php/Announcement_Controller/AddPrivate');?>"
                            class="btn btn-info" style="border-radius: 30px;margin-left:10px;font-family:calibri;font-size: 16px; ">Add New</a></h1>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
                                <li class="active">Private Announcement</li>
                            </ol>
                        </div>
                    </div>
                    <!--End Page Header -->

                </div>

                <!-- Table Part -->

                <div class="row">
                    <div class="col-lg-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            
                            
                            <!-- Welcome -->
                            <div class="panel-body">

                                <?php
                                if (isset($_SESSION['InsertPrivateData'])) {
                                    if ($_SESSION['InsertPrivateData'] == '1') { ?>
                                    <div class="alert alert-success"><?php echo "Record Added Succesfully" ?></div>
                                    <?php unset($_SESSION['InsertPrivateData']);
                                } else if($_SESSION['InsertPrivateData'] == '1062') { ?>

                                 <div class="alert alert-danger"><?php echo "Something Went Wrong !! Please Try Again.."; ?></div>
                                <?php
                                unset($_SESSION['InsertPrivateData']); }
                                }


                                if (isset($_SESSION['DeletePrivate'])) {
                                if ($_SESSION['DeletePrivate'] == '1') {
                                    ?>
                                    <div class="alert alert-success"><?php echo "Record Delete Succesfully" ?></div>
                                    <?php
                                    unset($_SESSION['DeletePrivate']);
                                } else {
                                    ?>
                                    <div class="alert alert-danger"><?php echo "Something Went Wrong !! Please Try Again.." ?></div>
                                    <?php
                                    unset($_SESSION['DeletePrivate']);
                                    } //end of else
                                }  //endof if
                                ?>


                                <div class="table-responsive col-lg-12">
                                <table id="example" class="table table-striped table-bordered table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th class="col-md-2">Photo</th>
                                            <th>Title</th>
                                            <th class="col-xs-1">Description</th>
                                            <th>Standard</th>
                                            <th>Subject</th>
                                            <th>To</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>    
                                    <?php if(isset($AllPrivate)){?>
                                    <tbody>
                                        <?php $no=1; 
                                        foreach ($AllPrivate as $value) {?>
                                        <tr>
                                            <td><?php echo $no; $no++;?></td>
                                            <!-- <td><?php echo $value->photo;?></td> -->

                                            <td><img src='<?php echo base_url("panel/img/Announcement/Private/$value->photo");?>'" class="img-responsive" height="150px" width="150px" ></td>

                                            <td><?php echo $value->title;?></td>
                                            <td><?php echo $value->description;?></td>
                                            <td><?php echo $value->standard_id;?> </td>
                                            <td><?php echo $value->subject; ?></td>
                                            <td><?php echo $value->student_id; ?></td>
                                            <td><?php echo $value->date; ?></td>
                                        <td>
                                                <a onclick="return confirm('Are You Sure Remove This Record ');" href='<?php echo base_url("index.php/Announcement_Controller/DeletePrivate/$value->id");?>' data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="fa fa-trash-o delete"></i>
                                                </a>
                                            </td>


                                        </tr>
                                         <?php }?> <!-- end of foreach-->
                                    </tbody>
                                    <?php } ?> <!-- end of if-->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



            </div>
        </div>



<?php $this->load->view("footer"); ?>
<script>
    $(function () {
        $("#example").dataTable();
    })
</script>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>