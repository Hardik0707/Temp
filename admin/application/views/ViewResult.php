<!DOCTYPE html>
<head>
    <title>Tution Classes | Admin</title>
    <?php $this->load->view("head"); ?>
    <style type="text/css">
        .tests {
            margin-bottom: unset;
        }
        .table-bordered .tests  > tbody > tr > td  {
            line-height: 1;
        }
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
                <h2>Result</h2>
        </header>
    <!--sidebar start-->
     <?php $this->load->view("panel1"); ?>
    <!--sidebar end-->

    <div class="container col-sm-9">
    <!--main content start-->
    <div id="page-wrapper">
        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12">
            <div class="page-header">
                <a href="<?php echo base_url("index.php/Result_Controller/AddTestResult")?>" class="btn btn-info">Add/Edit Test Result</a>
                 
                 <ol class="breadcrumb">
                    <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li>Results</li>
                    <li class="active">All Results</li>
                </ol>
              </div>
            </div>
            <!--End Page Header -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    
                    <!-- Welcome -->
                    <div class="panel-body">
                    <?php
                        if (isset($_SESSION['ResultsAdded'])) {
                            if ($_SESSION['ResultsAdded'] == '1') {
                                ?>
                                <div class="alert alert-success"><?php echo "Record Added Succesfully" ?></div>
                                <?php
                                unset($_SESSION['ResultsAdded']);
                            } else {
                                ?>
                                <div class="alert alert-danger"><?php echo "Something Went Wrong !! Please Try Again.." ?></div>
                                <?php
                                unset($_SESSION['ResultsAdded']);
                            }
                        }
                        if (isset($_SESSION['ResultsUpdated'])) {
                            if ($_SESSION['ResultsUpdated'] == '1') {
                                ?>
                                <div class="alert alert-success"><?php echo "Record update Succesfully" ?></div>
                                <?php
                                unset($_SESSION['ResultsUpdated']);
                            } else {
                                ?>
                                <div class="alert alert-danger"><?php echo "Something Went Wrong !! Please Try Again.." ?></div>
                                <?php
                                unset($_SESSION['ResultsUpdated']);
                            }
                        }
                        ?>
                        <div class="table-responsive col-sm-12  ">

                            <table id="example" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Roll No</th>
                                        <th>Name</th>
                                        <th>Standard</th>
                                        <th>Tests Results</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $count=1;
                                        if(isset($AllStudents) && (!empty($AllStudents))) {
                                        foreach($AllStudents as $student) {
                                        
                                    ?>
                                    <tr>
                                        <td><?php echo $count; $count++; ?></td>
                                        <td><?php echo $student->roll_no; ?></td>
                                        <td><?php echo $student->stud_name; ?></td>
                                        <td><?php echo $student->standard; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('index.php/Result_Controller/TestResult/'.$student->roll_no); ?>" class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="View Result">
                                            View Results
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
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
  $(function(){
    $("#example").dataTable();
  } )
  </script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</body>
</html>
