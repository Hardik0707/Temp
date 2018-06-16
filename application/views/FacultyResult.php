<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('head'); ?>
	<style type="text/css">
		th{
			background-color: #3d84e6;
			color: white;
			text-align: center;	
		}
        .contact_info{
        float:right;text-align: center;padding-top:3rem;margin-right: 05px;
    }    
    .contact_info span{
        background: #3d84e6;color:#fff;font-size: 16px; height:35px;border-radius: 6px 6px 6px 6px;padding:5px;margin-top: 05px;margin-left:0px;font-family:'Lato', sans-serif;
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
	<?php $this->load->view('navbar'); ?>
	<header id="head" class="secondary container">
        <h2>Search Result</h2>
    </header>    
    <div class="container">
          <div class="row" style="margin: -25px 0px -25px -25px;">
         
            <div class="col-lg-12 col-sm-4">
                <div class="page-header text-center">
                    <h3><?php echo "Standard : ".$_SESSION['standard']."  | Subject : ".$_SESSION['subject']; ?></h3>
                    <ol class="breadcrumb" style="margin-top: 0px;">
                        <li><a href="<?php echo base_url("index.php/Faculty_Controller/ViewResults"); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Search Results</li>
                    </ol>
                  </div>
            </div>
            <!--end page header -->

            		<?php 


                    $flag=0;
                    if(!empty($AllTests)){ ?>
            <div class="container">
                <div class="row">
            		<div class="col-md-12 table-responsive">
            			<table class="table table-bordered table-hover text-center" id="sampleTable">
            				<tbody>
            					<tr>
            					<th>Student Name <br> (Test Type) <br> [Date]</th>
            					<?php if(isset($AllTests))
            					{
            						foreach ($AllTests as $value) {
            							echo "<th>".$value->chapter."<br>(".$value->test_type.")<br>[".date("d/m/Y",strtotime(str_replace('-','/', $value->date)))."]</th>";
            						}
            					}	
            					 ?>
            					 <th>Total Marks</th>
            					 <th>Percentage</th>
            					 </tr>
            					 <tr>
            					<?php if(isset($Students))
            					{

            						foreach ($Students as $value) {
            							$flag++;
            							echo "<td>".$value->stud_name."</td>";
            						 
            						 	$total_marks=0;
            						 	$out_of=0;
            						 	foreach (${'StudentResult_'.$value->stud_id} as $student) {


            						 		if($student->marks!='N/A' && $student->marks!='n/a')
            						 		{	
            						 		$Exam_Marks = explode('/', $student->marks);
            						 		$total_marks = $total_marks + $Exam_Marks[0];
            						 		$out_of = $out_of + $Exam_Marks[1];
            						 		echo "<td>".$student->marks."</td>";
                                            }
                                            else
                                            {
                                             echo "<td>".$student->marks."</td>";   
                                            }
            						 	}


                                        if($total_marks == 0 && $out_of == 0)
                                        {
                                           echo "<td>-</td>";
                                           echo "<td>-</td>"; 
                                        } 
                                        else{
            						 	echo "<td>".$total_marks."/".$out_of."</td>";
            						 	echo "<td>".round(($total_marks/$out_of*100),2)."%</td>"; }           	
            						 	echo "</tr>";
            						} 
            					} 
                            ?>          					 
            				</tbody>
            			</table>
            		</div>

  
            	</div>
            </div>

            <?php }
                else
                {
                echo "<h3 class='col-sm-offset-1'>No Records Available<h3>";
                }
                ?>

        </div>
    </div>

    <?php  if($flag<7)
                    $this->load->view('Dashboard_footer'); 

                else
                    $this->load->view('footer');
                    ?>
</body>
</html>