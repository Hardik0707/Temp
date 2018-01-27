		<div class="col-sm-2" style="padding-top: 20px;"> 
			<div class="navbar-header">
					
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="glyphicon glyphicon-collapse-down"></span>
					</button>
			</div>

			<nav class="navbar-collapse collapse"> 

				<ul class="nav" id="side-menu">
					<li>
						<a href="<?php  echo base_url("index.php/Login_Controller/Home")?>"><i class="fa fa-dashboard"></i> Dashboard</a>
					</li>
					<li>
						<a href="<?php echo base_url("index.php/Toper_Controller/ViewToppers"); ?>"><i class="fa fa-star-o"></i> Toppers</a>
					</li>
					<li>
						<a href="<?php echo base_url("index.php/Subject_Controller/ViewSubject"); ?>"><i class="fa fa-book"></i> Subjects</a>
					</li>
					<li>
						<a href="<?php echo base_url("index.php/Standard_Controller/ViewStandard"); ?>"><i class="fa fa-sort-amount-asc"></i> Standards</a>
					</li>
					<li>
						<a href="<?php echo base_url("index.php/Faculty_Controller/ViewFaculty"); ?>"><i class="fa fa-user-md "></i> Faculty</a>
					</li>
					<li>
						<a href="<?php echo base_url("index.php/Student_Controller/ViewStudent"); ?>"><i class="fa fa-user"></i> Student</a>
					</li>
					<li>
						<a href="<?php echo base_url("index.php/Branch_Controller/ViewBranch"); ?>"><i class="fa fa-chain "></i> Branch</a>
					</li>
					<li>
						<a href="<?php echo base_url("index.php/Result_Controller/ViewResult"); ?>"><i class="fa fa-th "></i> Results</a>
					</li>

					<li>
						<a href="<?php echo base_url("index.php/Gallery_Controller/ViewGallery"); ?>"><i class="glyphicon glyphicon-picture"></i> Gallery</a>
					</li>

                    <!-- <li>
                        <a href="<?php echo base_url("index.php/Syllabus_Controller/ViewSyllabus"); ?>"><i class="fa fa-file-pdf-o"></i>Syllabus</a>
                    </li> -->
                    <li>
                    	<a href="#"><i class="fa fa-bullhorn "></i> Announcement</a>
                    	<ul class="nav nav-second-level collapse">
                    		<li>
                    			<a href="<?php echo base_url(""); ?>"></i>  Public</a>
                    		</li>
                    		<li>
                    			<a href="<?php echo base_url(""); ?>"></i>  Private</a>
                    		</li>
                    	</ul>
                    </li>
                </ul>
            </nav> 
        </div> 

