<?php
    // $i=1;
    // //print_r($AllTestTestNames);
    // //print_r($AllTests);
    // //print_r($AllTestsResult);

    // $final_results = array();
    // $i = 0;
    
    // foreach($AllTestsResult as $test_results) {
    //     $marks = explode(",",$test_results->marks_csv);
    //     $tests = explode(",",$test_results->test_id_csv);
    //     $final_tests = "";
    //     $final_marks = "";
    //     //$AllTestTestNames = explode(",",$AllTestTestNames);
    //     $j=0; $total=0;
    //     foreach($AllTestTestNames as $test_names){
    //         if(in_array($test_names->test_name,$tests)) {
    //             $final_tests .= $test_names->test_name;
    //             $final_marks .= $marks[$j];
    //             $j++;
    //         } else {
    //             $final_tests .= $test_names->test_name;
    //             $final_marks .= "0/0";
    //         }
    //         if($total < count($AllTestTestNames)-1) : $final_marks .= ","; $final_tests .= ","; endif;
    //         $total++;
    //     }
    //     $final_results[$i]["test_id_csv"] = $final_tests;
    //     $final_results[$i]["marks_csv"] = $final_marks;
    //     $i++;
    // }


    



    //print_r($final_results);
	$graph_colors = array("#DC143C","#00008B","#006400","#20B2AA","#FFA500","#8B4513","#6A5ACD","#800080","#cffa1b","#fe3bcc","#45d7f3","#04e2cd","#ec4a68","#703be8");
    ?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php $this->load->view("head") ?>
        <title>TutionClasses</title>
        <script>
            $(document).ready(function(){
            	$(".canvasjs-chart-credit").remove();
            	$("Trial Version").hide();
            });
        </script>
        <script type="text/javascript">
            $('#box').on('click', function() {
            	$(this).toggleClass('clicked');
            });
        </script>
        <script type="text/javascript">
            window.onload = function () {
              var chart = new CanvasJS.Chart("chartContainer", {
              	//backgroundColor: "#20B2AA",
              	animationEnabled: true,
              animationDuration: 1000,
                title: {
                  text: "Student Result Graph",
                  fontSize: 30
                },
                animationEnabled: true,
                axisX: {
                  gridColor: "Silver",
                  tickColor: "silver",
                },
                toolTip: {
                  shared: true
                },
                theme: "theme2",
                axisY: {
                  gridColor: "Silver",
                  tickColor: "silver"
                },
                legend: {
                  verticalAlign: "center",
                  horizontalAlign: "right"
                },
                data: [
                <?php if($AllTestsResult != 0) { for($i=0;$i<count($AllTestsResult);$i++){?>
                {
                  type: "line",
                  showInLegend: true,
                  lineThickness: 3,
                  name: "<?php echo $AllTestsResult[$i]->subject?>",
                  markerType: "square",
                  color: "<?php echo $graph_colors[$i]; ?>",
                  dataPoints: [ <?php
										$marks = explode(",",$final_results[$i]['marks_csv']);
										$tests = explode(",",$final_results[$i]['test_id_csv']);
										for($j=0;$j<count($marks);$j++){
                                            //if($marks[$j] == '') : $marks[$j] = 0/0; endif;
											$value = explode("/",$marks[$j]);
											echo '{y: '.$value[0].', label:  "'.$tests[$j].'"}';
											if($j < count($marks)-1 ) echo ",";
										}
                	?> ]
            	 }
            <?php if($i < count($AllTestsResult)-1 ) echo ","; } } ?> ],
                legend: {
                  cursor: "pointer",
                  itemclick: function (e) {
                    if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                      e.dataSeries.visible = false;
                    }
                    else {
                      e.dataSeries.visible = true;
                    }
                    chart.render();
                  }
                }
              });

              chart.render();
            }
        </script>
        <script src="<?php echo base_url("assets/js/canvasjs.min.js"); ?>"></script>
    </head>
    <body>
        <?php
            if($AllTests != 0) {
                foreach($AllTests as $test) {
                    $row = $test;
                }
            }
            $this->load->view("top.php");
        ?>
    
            <!-- page header -->    
    <header id="head" class="secondary" style="height:40px;">
        <div class="container heading">
        <h1><?php echo $_SESSION['studentname'] ?>'s Result</h1>
        </div>
    </header>    
         

        <!-- <div class="container">
				<div class="row">
                <?php if($AllTests != 0) { ?>
               <div class="col-md-12 table-responsive" style="margin-top: 50px;">
                    <table class="table table-bordered" style="font-size: 20px;">
                        <thead>
                            <tr>
                                <th>Roll No: <?php echo $row->roll_no; ?></th>
                                <th>Name : <?php echo $row->stud_name; ?></th>
                                <th>Standard : <?php echo $row->standard; ?></th>
                            </tr>
                        </thead>
                    </table>


                
                    <table class="table table-bordered table-hover text-center" id="sampleTable">
                        <tbody>
                            <tr>
                                <th style="background-color:<?=$graph_colors[10]?>; color:#fff;text-align:center;">Tests</th>
                                <?php $j=0; foreach ($AllTestSubjects as $subject) {
                                    $subject_arr[] = $subject->subject;
                                ?>
                                <th style="background-color:<?=$graph_colors[$j]?>; color:#fff;text-align:center;"><?=$subject->subject;?></th>
                                <?php $j++; } ?>
                                <th style="background-color:<?=$graph_colors[11]?>; color:#fff;text-align:center;">Total</th>
                            </tr>
                            
                            <?php foreach ($AllTests as $test) { ?>
                            <tr>
                                <td><?=$test->test_name;?></td>
                                <?php
                                $marks = explode(',',$test->marks_csv);
                                $test_wise_subjects = explode(',',$test->subject_csv);
                                $i = 0;
                                $total_marks=0;
                                $out_of=0;
                                foreach($subject_arr as $subs) {
                                    echo "<td>";
                                    if(in_array($subs,$test_wise_subjects)) {
                                        echo $marks[$i];
                                        //total logic starts
                                        $mark = explode('/',$marks[$i]);
                                        $total_marks += (int)$mark[0];
                                        $out_of += $mark[1];+
                                        //total logic ends
                                        $i++;
                                    } else {
                                        echo "N/A";
                                    }
                                    echo "</td>";
                                }
                                ?>
                                <td><?=round(($total_marks/$out_of*100),2)."%";?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <div id="chartContainer" style="height: 400px; width: 100%;"></div>
                    <style>
                                .canvasjs-chart-credit {
                                    display:none;
                                }
                                </style>
                </div>
                <?php } else { echo "No Results Found.."; } ?>
            </div>
        </div> -->



        <div class="container col-sm-10-offset-2">
        <div id="page-wrapper">
        <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                <div class="page-header">
                    
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("index.php/"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?php echo $_SESSION['studentname'] ?>'s Result</li>
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



        <script>
            $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>