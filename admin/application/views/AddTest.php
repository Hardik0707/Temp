<?php //print_r($StudentDetails); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Test</title>
        <?php $this->load->view("head"); ?>
        <style type="text/css">
            select.form-control {
                -webkit-appearance: none;
            }
            select.standard, select.branch {
                -webkit-appearance: menulist;
            }
    
        </style>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript">
        function getSubjects(standard) {
            $.post("<?php echo base_url(); ?>index.php/Test_Controller/FetchSubjects/", {id: standard.value}, function(data) {
                console.log(data);
                $('#subject').html(data);
            });
        }
        </script>
    </head>
    <body>
        <!--  wrapper -->
        <div id="wrapper">
            <!-- navbar top -->
            <?php $this->load->view("top"); ?>.
            <!-- end navbar top -->

            <header id="head" class="secondary" style="height:50px;">
            <div class="container">
                <h1>Test</h1>
            </div>
        </header>
            <!-- navbar side -->
            <?php $this->load->view("panel1"); ?>
            <!-- end navbar side -->
            <!--  page-wrapper -->
            <div class="container col-sm-9">
            <div id="page-wrapper">
                <div class="row">
                    <!-- page header -->
                    <div class="col-lg-12">
                        <div class="page-header">
                        <!-- <h1 class="heading">Add New Test</h1> -->
                         <ol class="breadcrumb">
                            <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="<?php echo base_url("index.php/Test_Controller/ViewTest"); ?>">All Tests</a></li>
                            <li class="active">Add Test</li>
                        </ol>
                      </div>
                    </div>
                    <!--end page header -->
                </div>
                
             <!-- Add Image Form -->
                <div class="row">
                    <div class="col-lg-11">
                        <div class="panel panel-default">
                            
                            
                            <!-- Welcome -->
                            <div class="panel-body">

                                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url("index.php/Test_Controller/InsertTest") ?>">

                                 <div class="col-md-6 form-group">
                                            <label>Standard</label>
                                            <select class="form-input form-control standard" name="standard" onchange="getSubjects(this);" required>

                                                <option value="">Select Standard</option>
                                               <?php foreach($AllStandards as $standard) { ?>
                                               <option value="<?php echo $standard->standard_id ?>" >
                                                    <?php echo $standard->standard; ?>
                                                </option>
                                               <?php } ?>
                                            </select>
                                        </div>

                                        

                                        <div class="col-md-6 form-group">
                                            <label>Subjects </label>
                                            <select class="form-input form-control standard" name="subject" id="subject" required>
                                                
                                                <option value="">Select Standard First</option>
                                                <?php 
                                                    foreach($AllSubjects as $subject) {
                                                ?>
                                                <option value="<?php echo $subject->sub_name; ?>">
                                                    <?php echo $subject->sub_name; ?> </option>
                                                <?php } ?> 
                                                
                    
                                            </select>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label>Chapter Name</label>
                                            <input class="form-input form-control" name="chapter" required>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label>Date of Test</label>
                                            <input class="form-input form-control" type="date" name="date" required>
                                        </div>                                            

                                        <div class="col-md-6 form-group">
                                            <label>Total Marks</label>
                                            <input class="form-input form-control" name="total_marks" required>
                                        </div> 

                                        <div class="col-md-6 form-group">
                                            <label>Test Duration</label>
                                            <input class="form-input form-control" name="duration" required>
                                        </div> 

                                        <div class="col-md-6 form-group">
                                            <label>Test Type</label>
                                            &emsp;
                                            Module <input class="form-input" type="radio" name="test_type" value="Module" checked> &emsp;
                                            Term  <input class="form-input" type="radio" name="test_type" value="Term" >
                                        </div> 

                                        <div class="col-md-6 form-group">
                                            <label>Add Test Paper<br> <span style="color:blue;font-size:12px;font-weight: normal;">(Note: Photo format : jpg | png | jpeg | gif & Maximum Size : 500kb are allowed.)</span></label>
                                            <input type="file" class="form-input" name="ImageUpload" accept="image/*" >
                                </div>   

                                        <div class="col-md-6 form-group">
                                            
                                            <input type="submit" class="btn btn-default" value="Submit" name="AddTest">
                                        </div>
                                </form> 
                            </div>
                         </div> 
                     </div>
                </div>               

            </div>
        </div>



<?php $this->load->view("footer"); ?>


</body>
</html>





