<!DOCTYPE html>
<head>
    <title>Tution Classes | Admin</title>
    <?php $this->load->view("head"); ?>
</head>
<body>
    <div id="wrapper">
        <!--header start-->
        <?php $this->load->view("top"); ?>
        <!--header end-->

        <header id="head" class="secondary">
            <div class="container">
                <h1>Results</h1>
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
                            <h1 class="heading">Add Tests Result</h1> 

                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i>Home</a></li>

                                <li><a href="<?php echo base_url("index.php/Result_Controller/ViewResult"); ?>"></i>Results</a></li>
                                <li class="active">Add Test Result</li>
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
                                if (isset($_SESSION['InsertTestResult'])) {
                                if ($_SESSION['InsertTestResult'] == '1') { ?>
                                <div class="alert alert-success"><?php echo "Record Added Succesfully" ?></div>
                                <?php unset($_SESSION['InsertTestResult']);
                            } else if($_SESSION['InsertTestResult'] == '1062') { ?>

                            <div class="alert alert-danger"><?php echo "Something Went Wrong !! Please Try Again.."; ?></div>
                            <?php
                            unset($_SESSION['InsertTestResult']); }
                        }
                        ?>


            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Standard</th>
                            <th>Subject</th>
                            <th>Chapter Name</th>
                            <th>Test Type</th>
                            <th>Date</th>
                            <th>Download Template</th>
                            <th>Upload Result</th>
                        </tr>
                    </thead>
                    <?php if(isset($AllTests)){?>
                    <tbody>
                        <?php $no=1; 
                        foreach ($AllTests as $value) {?>
                        <tr>
                            <td><?php echo $no; $no++;?></td>

                            <td><?php echo $value->standard_id;?></td>
                            <td><?php echo $value->subject;?></td>
                            <td><?php echo $value->chapter;?></td>
                         
                            <td><?php echo $value->test_type;?></td>
                            <td><?php echo $value->date;?></td>
                            <td>
                                <a href="<?php echo base_url("index.php/Result_Controller/DownloadTemplate/$value->id"); ?>">Download</a>
                            </td>
                                <td><a href="">Upload</a></td>
                                


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
