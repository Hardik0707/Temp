<?php
    if(!empty($AllTests)) {
        foreach($AllTests as $test) {
            $row = $test;
        }
    }
    if(!empty($StudentDetails)) {
        foreach($StudentDetails as $student) {
            $student_name = $student->stud_name;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tution Classes | Admin</title>
    <?php $this->load->view("head"); ?>
    </head>

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
    <body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <?php $this->load->view("top"); ?>
        <!-- end navbar top -->

            <header id="head" class="secondary">
                    <h2>Student's Result</h2>
            </header>


        <!-- navbar side -->
        <?php $this->load->view("panel1"); ?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div class="container col-sm-9">
        <div id="page-wrapper">
        <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12" style="margin-top: -20px;">
                <div class="page-header">
                    
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?php echo base_url("index.php/Result_Controller/ViewResult"); ?>">All Results</a></li>
                        <li class="active">Student's Result</li>
                    </ol>
                </div>
                </div>
                <!--End Page Header -->
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 10px;">
                    <?php
                        if(empty($AllTests)) {
                            echo "No Results Found !!";
                            die();
                        }
                    ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="background-color: #3d84e6;color:#fff;">Roll No: <?php echo $row->roll_no; ?></th>
                                <th style="background-color: #3d84e6;color:#fff;">Name : <?php echo $row->stud_name; ?></th>
                                <th style="background-color: #3d84e6;color:#fff;">Standard : <?php echo $row->standard; ?></th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered dataTable" id="sampleTable">
                        <tbody>
                            <tr>
                                <th>Subject Name</th>
                                <th>Chapter Name</th>
                                <th>Marks</th>
                                <th>Test Type</th>
                            </tr>

                            <?php 
                            // print_r($AllTests);
                             $i = 0;$total_marks=0;$out_of=0;
                                
                               
                            foreach ($AllTests as $test) { ?>
                            <tr>
                                <td><?=$test->subject;?></td>
                                <td><?=$test->chapter; ?></td>
                                <td><?=$test->marks; ?></td>
                                <td><?=$test->test_type; ?></td>


                                <?php
                                $marks = $test->marks;

                                if(strcmp($marks,'N/A')!=0 || strcmp($marks,'n/a')!=0){
                                        //total logic starts
                                        $mark = explode('/',$marks);
                                        $total_marks += (int)$mark[0];
                                        $out_of += (int)$mark[1];
                                        //total logic ends
                                        // $i++;
                                    } else {
                                        echo "N/A";
                                    }
                                    echo "</td>";
                            
                                ?>
                                <!-- <td></td> -->
                            </tr>
                            <?php } ?>
                            
                        </tbody>
                    </table>

                    <table class="table table-bordered">
                        
                        <tr>
                                <th>Total Marks</th>
                                <th><?php echo $total_marks."/".$out_of; ?></th>
                                <th>Percentage</th>
                                <th><?=round(($total_marks/$out_of*100),2)."%";?></th>    
                        </tr>

                    </table>
                </div>
            </div>

        <!-- end page-wrapper -->
    </div>
    <!-- end wrapper -->
</div>
</div>
    <!-- Core Scripts - Include with every page -->
    <?php $this->load->view("footer"); ?>
    </body>

    </html>





