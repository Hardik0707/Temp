<!DOCTYPE html>
<html>
<head>
    <title>View Subjects</title>
    <?php $this->load->view("head"); ?>
    <style type="text/css">
    .alert {
        margin: 10px 10px;
    }


    table, th, td {
        border: 3px solid black;
    }
    p.inset {border-style: inset;}

    #head.secondary{
        min-height: 40px;
        height: 40px !important;
        margin-top:10px;
        padding-bottom: 25px;
    }
    h2{
        margin-top: -07px;
    }
    caption { 
        font-size: 16px;
        display: table-caption;
        text-align: center;
    }
</style>
<script type="text/javascript">
    function getSubjects(standard) {
        $.post("<?php echo base_url(); ?>index.php/Student_Controller/FetchSubjects/", {id: standard.value}, function(data) {
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

        <?php $this->load->view("top"); ?>
        <!-- end navbar top -->
        <header id="head" class="secondary" >

            <h2>Subjects</h2>
            
        </header>
        <!-- navbar side -->
        <?php $this->load->view("panel1"); ?>

        <div class="container col-sm-9">
            <div id="page-wrapper">

                <div class="row col-sm-12">
                    <!-- Page Header -->
                    <div class="col-sm-10" style="margin-top: -20px;">
                      <div class="page-header">

                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li>Subjects</li>
                            <li class="active">Standard Wise Subjects</li>

                        </ol>   
                        </div>
                    </div>
                <!--End Page Header -->
                
                <div class="col-sm-2" style="margin-top: 10px;">
                    <a href="#" data-toggle="modal" data-target="#AddSubject" class="btn btn-default btn-sm">Add New Subject</a>
                </div>

            </div>
        </div>


        <div class="row">

            <?php $count=0; foreach($AllStandards as $standard) {
                $id = $standard->standard_id;
                $subjects = 's_'.$id;
                        //$subjects = 's_'.$$id;
                ?>

                <div class="col-lg-6">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">

                        <?php if (isset($_SESSION['SubjectAdded'])) { if ($_SESSION['SubjectAdded'] == '1' && $_SESSION['StandardId'] == $id) { ?>
                        <div class="alert alert-success"><?php echo "Record Added Succesfully" ?></div>
                        <?php unset($_SESSION['SubjectAdded']); } 
                        else if(!empty($_SESSION['SubjectAdded']) && $_SESSION['StandardId'] == $id)
                        { 
                            ?>
                        <div class="alert alert-success"><?php echo $_SESSION['SubjectAdded']; ?></div>
                        <?php unset($_SESSION['SubjectAdded']);} 
                        else if($_SESSION['SubjectAdded'] == '0' && $_SESSION['StandardId'] == $id) { ?>
                        <div class="alert alert-danger">Something went wrong. Please try again.</div>
                        <?php unset($_SESSION['SubjectAdded']); } } ?>

                        <?php if (isset($_SESSION['SubjectDeleted'])) { if ($_SESSION['SubjectDeleted'] == '1' && $_SESSION['StandardId'] == $id) { ?>
                        <div class="alert alert-success"><?php echo "Record Deleted Succesfully" ?></div>
                        <?php unset($_SESSION['SubjectDeleted']); } else if($_SESSION['SubjectDeleted'] == '0' && $_SESSION['StandardId'] == $id) { ?>
                        <div class="alert alert-danger">Something went wrong. Please try again.</div>
                        <?php unset($_SESSION['SubjectDeleted']); } } ?>

                        <?php if (isset($_SESSION['SubjectUpdated'])) { if ($_SESSION['SubjectUpdated'] == '1' && $_SESSION['StandardId'] == $id) { ?>
                        <div class="alert alert-success"><?php echo "Record Updated Succesfully" ?></div>
                        <?php unset($_SESSION['SubjectUpdated']); } else if($_SESSION['SubjectUpdated'] == '0' && $_SESSION['StandardId'] == $id) { ?>
                        <div class="alert alert-danger">Something went wrong. Please try again.</div>
                        <?php unset($_SESSION['SubjectUpdated']); }
                        else if(!empty($_SESSION['SubjectUpdated']) && $_SESSION['StandardId'] == $id)
                        { 
                            ?>
                        <div class="alert alert-success"><?php echo $_SESSION['SubjectUpdated']; ?></div>
                        <?php unset($_SESSION['SubjectUpdated']);}

                        } ?>

                        <!-- Welcome -->
                        <div class="panel-body">
                            <div class="table-responsive col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2" style="text-align: center;background-color:#3d84e6 ;color:white"><?php echo $standard->standard; ?> Standard</th>
                                        </tr>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <!-- <font face="verdana" color="" size="4"><center> -->
                                            <?php foreach($$subjects as $subject) { ?>

                                            <tr>
                                                <td><?php echo $subject->sub_name; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url("index.php/Subject_Controller/EditSubject/$subject->sub_id");?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil update"></i></a>&nbsp;
                                                    <a  onclick="return confirm('Are You Sure Remove This Record ');" href="<?php echo base_url("index.php/Subject_Controller/DeleteSubject/$subject->sub_id/$subject->standard_id")?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o delete"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>  
                            </div>
                        </div>
                    </div>

                    <?php $count++; if($count%2 == 0) { echo "</div><div class='row' text=right>"; } } ?>
                    </div>
                </div>
        <!-- Add Subject Modal -->


        <div id="AddSubject" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title">Add New Subject</h1>
                </div>
                
                <div class="modal-body">

                <form action="<?php echo base_url("index.php/Subject_Controller/InsertSubject") ?>" method="POST" role="form">

                    <div class="col-md-6 form-group">
                        <label>Standard</label>
                        <select class="form-input form-control standard" name="Standard" onchange="getSubjects(this);" required>
                            <option value="">Select Standard</option>
                            <?php foreach($AllStandards as $standard) { ?>
                            <option value="<?php echo $standard->standard_id ?>" <?php echo(isset($StudentDetails) && $standard->standard_id == $row->standard_id) ? "selected" : "" ; ?>>
                                <?php echo $standard->standard; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Enter Subject:</label>
                        <input type="text" name="SubjectName" class="form-input form-control">
                    </div>
                
                    &emsp;<input type="submit" class="btn btn-default" name="add_subject" value="Add">
                </form>
                </div>
        </div>
    </div>
</div>
<!-- Add Subject Modal Ends -->
<?php $this->load->view("footer"); ?>
<script type="text/javascript">
            //Assigning id
            $('.standard_id').click(function() {
                var id = $(this).attr('id');
                //alert(id);
                $('#standard_id').val(id);
            });

            //Ajax

        </script>
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





