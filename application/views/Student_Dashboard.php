<?php 
$max = $get_max[0]['COUNT(subject)'];
 ?>

<!DOCTYPE HTML>
<html>
    <head>
        <?php $this->load->view("head") ?>
        <title>TutionClasses</title>

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
    th,td{
        text-align: center;
    }
    .contact_info{
        float:right;text-align: center;padding-top:3rem;margin-right: 05px;
    }    
    .contact_info span{
        background: #3d84e6;color:#fff;font-size: 16px; height:35px;border-radius: 6px 6px 6px 6px;padding:5px;margin-top: 05px;margin-left:0px;font-family:'Lato', sans-serif;
    }
    </style>
    </head>
    <body>
        <?php
            if($AllTests != 0) {
                foreach($AllTests as $test) {
                    $row = $test;
                }
            }
            $this->load->view("navbar.php");
        ?>
    
            <!-- page header -->    
    <header id="head" class="secondary container">
        <h2><?php echo $_SESSION['stud_name'] ?>'s Result</h2>
    </header>    
         

        <div class="container col-sm-10-offset-2">
        <div id="page-wrapper">
        <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                <div class="page-header">
                    
                    <ol class="breadcrumb" style="margin-top: -20px;">
                        <li><a href="<?php echo base_url("index.php/"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo $_SESSION['stud_name']; ?>'s Result</li>
                    </ol>
                </div>
                </div>
                <!--End Page Header -->
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 0px;">
                    <?php
                        // print_r($_SESSION);
                        if(empty($AllTests)) {
                            echo "No Results Found !!";
                            $this->load->view('footer2');
                            $this->load->view('JsScripts');
                            die();
                        }
                    ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="background-color: #3d84e6;color:#fff;">Roll No: <?php echo $row->roll_no; ?></th>
                                <th style="background-color: #3d84e6;color:#fff;">Name : <?php echo $_SESSION['stud_name']; ?></th>
                                <th style="background-color: #3d84e6;color:#fff;">Standard : <?php echo $row->standard; ?></th>
                            </tr>
                        </thead>
                    </table>



<!-- =========================================================================================== -->
<!-- 
<?php $grand_total_marks=0;
$grand_out_of=0; ?>

 -->

<!-- <?php foreach ($AllTestSubjects as $sub) { ?>
<div class="table table-responsive">
    <table class="table table-bordered dataTable" id="sampleTable">
                        <tbody>
                            <tr>
                                <th style="background-color: #3d84e6;color:#fff;">Subject Name <br>(Date of Test)</th>
                                <?php foreach ($AllTests as $test){
                                    if($test->subject==$sub->subject)
                                    echo "<th style='background-color: #3d84e6;color:#fff;''>".$test->chapter."<br>(".$test->date.")</th>";
                                } ?>
                                 <th style="background-color: #3d84e6;color:#fff;">Total Marks</th>   
                                 <th style="background-color: #3d84e6;color:#fff;">Percentage</th>
                                </tr>

                            <?php 
                            
                             $i = 0;$total_marks=0;$out_of=0;
                            
                            ?>
                        
                            <tr>
                                <td><?=$sub->subject?></td>

                                <?php foreach ($AllTests as $test){
                                    if($test->subject==$sub->subject){
                                    echo "<td>".$test->marks."</td>"; 
                                    
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
                                }}
                                    
                                $grand_total_marks+= $total_marks;
                                $grand_out_of += $out_of;
                                ?>
                                <td><?php echo $total_marks."/".$out_of; ?></td>
                                <td><?=round(($total_marks/$out_of*100),2)."%";?></td>
                            </tr>
                            <?php ?>
                            
                        </tbody>
                    </table>

    </div>
                    <?php } ?>
 -->


<!--                     <table class="table table-bordered">
                        
                        <tr>
                                <th style="background-color: #0d47a1;color: #fff">Grand Total</th>
                                <th style="background-color: #0d47a1;color:#fff"><?php echo $grand_total_marks."/".$grand_out_of; ?></th>
                                <th style="background-color:#e65100;color:#fff">Overall Percentage</th>
                                <th style="background-color:#e65100;color:#fff"><?=round(($grand_total_marks/$grand_out_of*100),2)."%";?></th>    
                        </tr>

                    </table>
 -->




<div class="table table-responsive">
    <table class="table table-bordered dataTable" id="sampleTable">
                        <tbody>
                            <tr>
                                <th style="background-color: #3d84e6;color:#fff;">Subject Name</th>
                                <?php for ($i=0; $i <$max ; $i++) { 
                                  echo "<th style='background-color: #3d84e6;color:#fff;'>Test ".($i+1)."</th>";
                                } ?>

                                

                            <tr>


                                <?php $total_marks = array();
                                     $out_of = array();
                             for ($i=0; $i <$max ; $i++) { 
                                 $total_marks[$i] = 0;
                                 $out_of[$i] = 0;
                             } ?>

<?php 
$subject=0;
foreach ($AllTestSubjects as $sub) {
$subject++; ?>
                                
                                <th >Chapter Name [Type]<br>(Date of Test) 
                                </th>

                                <?php 
                                $counter = 0;
                                foreach ($AllTests as $test){
                                    if($test->subject==$sub->subject){
                                    echo "<th>".$test->chapter." [".$test->test_type."]<br>(".

                                    date("d/m/Y",strtotime(str_replace('-','/', $test->date))).")</th>";
                                    $counter++;

                                    }
                                } 
                                
                                if($counter < $max)
                                {
                                    for ($i=$counter; $i<$max ; $i++) { 
                                        echo "<th rowspan=2>Not Applicable/<br>Not Available</th>";
                                    }
                                }

                                ?>

                            <?php 
                            $i=0;
                            
                            ?>
                        
                            <tr>
                                <td><?=$sub->subject?></td>

                                <?php foreach ($AllTests as $test){


                                    if($test->subject==$sub->subject){
                                    echo "<td>".$test->marks."</td>"; 
                                    $marks = $test->marks; 

                                if(strcmp($marks,'N/A')!=0 || strcmp($marks,'n/a')!=0){
                                        //total logic starts
                                        $mark = explode('/',$marks);
                                        $total_marks[$i] += (int)$mark[0];
                                        $out_of[$i] += (int)$mark[1];
                                        //total logic ends
                                        $i++;
                                    } 
                                    else {
                                        echo "N/A";
                                        $total_marks[$i] += 0;
                                        $out_of[$i] += 0;
                                        $i++;
                                    }
                                }

                                }
                                ?>



                            </tr>
                            
                    <?php } ?>
                    <tr>
                        <th style='background-color:#3d84e6;color:#fff;'> Total Marks</th>
                        <?php for ($i=0; $i <$max; $i++) {    
                           echo "<th style='background-color:#3d84e6;color:#fff;'>".$total_marks[$i]."/".$out_of[$i]."</th>";
                        } ?>
                    </tr>
 
                    </table>

                        </tbody>
    </div>





<!-- ============================================================================================== -->

            
            </div>

        <!-- end page-wrapper -->
    </div>
    <!-- end wrapper -->
</div>
</div>



        <?php 
        $this->load->view('JsScripts');

        if($subject<3)
           $this->load->view('footer2');
           else
           $this->load->view('footer2');

            ?>
        
            </body>
</html>