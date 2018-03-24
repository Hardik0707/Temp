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
	</style>
</head>
<body>
	<?php $this->load->view('top'); ?>
	<header id="head" class="secondary" style="height:40px;">
        <div class="container heading">
        <h1><?php echo "Search Results";	 ?></h1>
        </div>
    </header>    
    <div class="container">
          <div class="row">
         
            <div class="col-lg-12">
                <div class="page-header text-center">
                    <h3><?php echo "Standard :".$_SESSION['standard']."  | Subject : ".$_SESSION['subject']; ?></h3>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("index.php/Faculty_Controller/ViewResults"); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Search Results</li>
                    </ol>
                  </div>
            </div>
            <!--end page header -->

            <div class="container">
            	<div class="row">
            		
            		<div class="col-md-12 table-responsive" style="margin-top: 50px;">
            			<table class="table table-bordered table-hover text-center" id="sampleTable">
            				<tbody>
            					<tr>
            					<th>Student Name <br> (Test Type)</th>
            					<?php if(isset($AllTests))
            					{
            						foreach ($AllTests as $value) {
            							echo "<th>".$value->chapter."<br>(".$value->test_type.")</th>";
            						}
            					}	
            					 ?>
            					 <th>Total Marks</th>
            					 <th>Percentage</th>
            					 </tr>
            					 <?php ?>
            					 <tr>
            					<?php if(isset($Students))
            					{
            						foreach ($Students as $value) {
            							
            							echo "<td>".$value->stud_name."</td>";
            						 
            						 	$total_marks=0;
            						 	$out_of=0;
            						 	foreach (${'StudentResult_'.$value->stud_id} as $student) {


            						 		if($student->marks!='N/A' && $student->marks!='n/a')
            						 		{	
            						 		$Exam_Marks = explode('/', $student->marks);
            						 		$total_marks = $total_marks + $Exam_Marks[0];
            						 		$out_of = $out_of + $Exam_Marks[1];
            						 		}	

            						 		echo "<td>".$student->marks."</td>";
            						 	}
            						 	echo "<td>".$total_marks."/".$out_of."</td>";
            						 	echo "<td>".round(($total_marks/$out_of*100),2)."%</td>";            	
            						 	echo "</tr>";
            						} 
            					}?>
            					 
            				</tbody>
            			</table>
            		</div>
            	</div>
            </div>



        </div>
    </div>
</body>
</html>