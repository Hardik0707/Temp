<!DOCTYPE html>
<head>
    <title>Tution Classes | Admin</title>
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
    <div id="wrapper">
        <!--header start-->
        <?php $this->load->view("top"); ?>
        <!--header end-->

        <header id="head" class="secondary">
            
                <h2>Public Announcement</h2>
            
        </header>

        <!--sidebar start-->
        <?php $this->load->view("panel1"); ?>
        <!--sidebar end-->



        <!--main content start-->
         <div class="container col-sm-9">
            <div id="page-wrapper">
                <div class="row col-sm-12">
                    <!-- Page Header -->
                    <div class="col-sm-10" style="margin-top: -20px;">
                        <div class="page-header">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                                <li class="active">Public Announcement</li>

                            </ol>
                        </div>
                    </div>
                    <!--End Page Header -->
                
                <div class="col-sm-2" style="margin-top: 10px;">
                            <a href="<?php echo base_url('index.php/Announcement_Controller/AddPublic');?>"
                            class="btn btn-default btn-sm">Add</a>
                            </div>
                </div>

                <!-- Table Part -->

                <div class="row">
                    <div class="col-lg-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            
                            
                            <!-- Welcome -->
                            <div class="panel-body">

                                <?php
                                if (isset($_SESSION['InsertPublicData'])) {
                                    if ($_SESSION['InsertPublicData'] == '1') { ?>
                                    <div class="alert alert-success"><?php echo "Record Added Succesfully" ?></div>
                                    <?php unset($_SESSION['InsertPublicData']);
                                } else if($_SESSION['InsertPublicData'] == '1062') { ?>

                                 <div class="alert alert-danger"><?php echo "Something Went Wrong !! Please Try Again.."; ?></div>
                                <?php
                                unset($_SESSION['InsertPublicData']); }
                                }


                                if (isset($_SESSION['DeletePublic'])) {
                                if ($_SESSION['DeletePublic'] == '1') {
                                    ?>
                                    <div class="alert alert-success"><?php echo "Record Delete Succesfully" ?></div>
                                    <?php
                                    unset($_SESSION['DeletePublic']);
                                } else {
                                    ?>
                                    <div class="alert alert-danger"><?php echo "Something Went Wrong !! Please Try Again.." ?></div>
                                    <?php
                                    unset($_SESSION['DeletePublic']);
                                    } //end of else
                                }  //endof if
                                ?>


                                <div class="table-responsive col-sm-12   ">
                                <table id="example" class="table table-striped table-bordered table-hover ">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th class="col-md-2">Photo</th>
                                            <th>Title</th>
                                            <th style="word-wrap: break-word;"">Description</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>    
                                    <?php if(isset($AllPublic)){?>
                                    <tbody>
                                        <?php $no=1; 
                                        foreach ($AllPublic as $value) {?>
                                        <tr>
                                            <td><?php echo $no; $no++;?></td>
                                        
                                            <?php if($value->photo!='NULL'){ ?>
                                            
                                            <td><img src='<?php echo base_url("panel/img/Announcement/Public/$value->photo");?>'" class="img-responsive" height="150px" width="150px" ></td>

                                            <?php }else echo "<td><h4 align=center>No Image</h4></td>"; ?>

                                            <td><?php echo $value->title;?></td>
                                            <td style="word-wrap: break-word;min-width: 140px;max-width: 140px;"><?php echo $value->description;?></td>
                                            <td><?php echo date("d/m/Y",strtotime(str_replace('-','/', $value->date))); ?></td>
                                        <td>
                                                <a onclick="return confirm('Are You Sure Remove This Record ');" href='<?php echo base_url("index.php/Announcement_Controller/DeletePublic/$value->photo");?>' data-toggle="tooltip" data-placement="top" title="Delete">
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