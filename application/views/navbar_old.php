<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
		
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				
					<a class="navbar-brand" href='<?php echo base_url("index.php/welcome"); ?>'>
					
					<img src='<?php echo base_url("assets/images/1logo.png"); ?>' alt="Logo">
					</a>
				
			</div>
			
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li><a href="<?php echo base_url('index.php/welcome'); ?>">Home</a></li>
					<li><a href="<?php echo base_url('index.php/welcome/#AboutUs'); ?>">About Us</a></li>
					<li>
						<a href="<?php echo base_url('index.php/welcome'); ?>">Profile of Faculty</a>
					</li>

					<li>
						<a href="<?php echo base_url('index.php/welcome'); ?>">Monthly Schedule</a>
					</li>

					<li>
						<a href="<?php echo base_url('index.php/Topper_Controller/Toppers'); ?>">Toppers</a>
					</li>
					<li>
						<a href="<?php echo base_url('index.php/welcome/Gallery'); ?>">Gallery</a>
					</li>



					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('index.php/Student_Controller/Student_Login'); ?>">Student</a></li>
							<li><a href="<?php echo base_url('index.php/Faculty_Controller/Faculty_Login'); ?>"">Faculty</a></li>
						</ul>
					</li>
					<li><a href="<?php echo base_url('index.php/welcome/ContactUs'); ?>">Contact Us</a></li>
					

				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->