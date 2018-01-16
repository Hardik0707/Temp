	<div class="navbar navbar-inverse" style="padding-top: 0px;">
		<div class="contact_info" style="float: right; text-align: center; margin-top: 5px; margin-right: 10px;">
			<span class="fa fa-envelope"></span> mediamaggi@info.com 
			<span style="background: #FA6210;color: #fff;font-size: 16px;font-style: normal;border-radius: 0 6px 6px 0;">&nbsp;<span class="fa fa-phone"></span> &nbsp;+91 9876543210</span>
		</div>
		<div class="container" style="padding-top: 1.8rem">
			<div class="navbar-header">
				<!-- Button for smallest screens -->


				<a class="navbar-brand" href='<?php echo base_url("index.php/welcome"); ?>'>

					<img src='<?php echo base_url("assets/images/1logo.png"); ?>' alt="Logo">
				</a><br />

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>


			</div>

			<div class="navbar-collapse collapse"><br />
				
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
								<li><a data-toggle="modal" data-target="#myModal">Faculty</a></li>
							</ul>
						</li>


						<li><a href="<?php echo base_url('index.php/welcome/ContactUs'); ?>">Contact Us</a></li>


					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
	<!-- /.navbar -->


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Faculty Login</h4>
        </div>
        <div class="modal-body">
          <form accept-charset="UTF-8" role="form">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" required="true">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required="true">
							</div>
							
							<input class="btn btn-lg btn-block" type="submit" value="Login" style="margin-top: 30px;">
						</fieldset>
					</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  

	