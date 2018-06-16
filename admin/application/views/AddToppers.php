<!DOCTYPE html>
<html>
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
        <!--  wrapper -->
        <div id="wrapper">
            <!-- navbar top -->
            <?php $this->load->view("top"); ?>
            <!-- end navbar top -->

            <header id="head" class="secondary">
                <?php if(!isset($EditTopper)){ echo "<h2>Add Topper Student</h2>"; }else{ echo "<h2>Edit Topper Student</h2>"; } ?>
            </header>
            <!-- navbar side -->
            <?php $this->load->view("panel1"); ?>
            <!-- end navbar side -->
            <!--  page-wrapper -->
            <div class="container col-sm-9">
            <div id="page-wrapper">
                <div class="row">
                    <!-- page header -->
                    <div class="col-lg-12" style="margin-top: -20px;">
                         <div class="page-header">
                       <ol class="breadcrumb">
                            <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="<?php echo base_url("index.php/Toper_Controller/ViewToppers"); ?>">Toppers</a></li>
                            <li class="active"><?php if(!isset($EditTopper)){ echo "Add Topper Student"; }else{ echo "Edit Topper Student"; } ?></li>
                        </ol>
                      </div>

                    </div>
                    <!--end page header -->
                
                <?php
                    if(isset($EditTopper)){
                        $insert="UpdateTopper";
                        foreach ($EditTopper as $value) {
                            $row=$value;
                        }
                    } else {
                        $insert="InsertNewTopper";
                    }
                ?>

                <?php
                                if (isset($_SESSION['InsertTopper'])) {
                                    ?>
                                    <div class="alert alert-danger"><?php echo $_SESSION['InsertTopper'] ?></div>
                                    <?php unset($_SESSION['InsertTopper']);
                                } 
                                ?>

                <div class="row">
                    <div class="col-lg-11">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            
                            <div class="panel-body">
                                
                                    
                                        <?php echo(isset($error)) ? '<div class="alert alert-danger">'.$error.'</div>' : ''; ?>
                                        <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url("index.php/Toper_Controller/$insert") ?>">
                                             <div class="form-group col-md-6">
                                                <label>Result Year</label>
                                                <select class="form-input form-control" name="ResultYear" <?php echo(!isset($row)) ? "required" : ""; ?>>
                                                    <?php foreach($AllYears as $years) { ?>
                                                    <option value="<?php echo $years->year_id; ?>" <?php if(isset($row)) : echo($row->year_id == $years->year_id) ? "selected" : ""; endif; ?>>
                                                        <?php echo $years->year; ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                    
                                            <div class="form-group">
                                              <?php if (isset($row)) { ?>
                                              <input type="hidden" class="form-input form-control" placeholder="Result Year" name="toperid" value=" <?php if(isset ($row)){ echo $row->topper_id; } ?>">
                                              <?php  }?>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Standard</label>
                                                <select class="form-input form-control" name="Standard" <?php echo(!isset($row)) ? "required" : ""; ?>>
                                                     <?php foreach($AllStandards as $standards) { ?>
                                                    <option value="<?php echo $standards->standard_id; ?>" <?php if(isset($row)) : echo($row->standard_id == $standards->standard_id) ? "selected" : ""; endif;?>>
                                                        <?php echo $standards->standard; ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Subject</label>
                                                <input class="form-input form-control" placeholder="Subject" name="Subject" value="<?php if(isset($row)){echo $row->subject;}?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Student Name</label>
                                                <input class="form-input form-control" placeholder="Student Name" name="StudentName" value="<?php if(isset($row)){echo $row->student_name;}?>" <?php echo(!isset($row)) ? "required" : ""; ?>>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Result  [Ex: 99% or 198 / 200]</label>
                                                <input class="form-input form-control" type="text" placeholder="Result" name="Result" value="<?php if(isset($row)){echo $row->result;}?>" <?php echo(!isset($row)) ? "required" : ""; ?> >
                                            </div>

                                            <div class="col-md-6 form-group">
                                            <label>Student's Quote</label>
                                            <textarea class="form-input form-control branch" name="quote" maxlength="150" required></textarea>      
                                            </div>


                                            <div class="form-group col-md-6">
                                                <label>Student Photo <span style="color:blue;font-size:12px;font-weight: normal;">(Note: Photo format : jpg | png | jpeg | gif & Maximum Size : 500kb are allowed.)</span></label>

                                                <input type="file" class="form-input" name="ImageUpload" accept="image/*" value="<?php if(isset($row)){ echo $row->photo;}?> " >
                                               <?php if(isset($row)) {?> <img src="<?php echo base_url("panel/img/topperimage/$row->photo")?>"  width="100px" height="100px"><?php } ?>
                                            </div>

                                            <div class="form-group col-md-6">
                                            <input type="submit" class="btn btn-default" value="Submit" name="ActionTopper">
                                            <input type="reset" class="btn btn-default" value="Reset">
                                            </div>
                                        </form>
                                
                                
                            </div>
                            <!-- end page-wrapper -->

                        </div>

                        <!-- end page-wrapper -->
                    </div>
                </div>

                    <!-- end wrapper -->
                </div>
</div></div>
</div>
                <!-- Core Scripts - Include with every page -->
<?php $this->load->view("footer"); ?>
                </body>
                </html>





