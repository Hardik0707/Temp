<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<?php $this->load->view('head'); ?>
	
</head>
<body>
	<?php $this->load->view('navbar'); ?>
	<div id="Contactus">

	 <header id="head" class="secondary">

    <div class="container">
      <h1>Contact Us</h1>    
    </div>
  </header>
</div>
	
	<!-- <header class="secondary" id="head"> -->
		<div class="container">
		<h1>
		Frequently Asked Questions(FAQ)
		</h1>
		</div>
	<!-- </header> -->

	<!-- container -->
		

<div class="container" style="margin-top: 25px;">
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="panel-title expand">
							<div class="right-arrow pull-right">+</div>
							<a href="#">question 1</a>
						</h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
						<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="panel-title expand">
							<div class="right-arrow pull-right">+</div>
							<a href="#">question 2</a>
						</h4>
					</div>
					<div id="collapse2" class="panel-collapse collapse">
						<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="panel-title expand">
							<div class="right-arrow pull-right">+</div>
							<a href="#">question 3</a>
						</h4>
					</div>
					<div id="collapse3" class="panel-collapse collapse">
						<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="panel-title expand">
							<div class="right-arrow pull-right">+</div>
							<a href="#">question 4</a>
						</h4>
					</div>
					<div id="collapse4" class="panel-collapse collapse">
						<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
					</div>
				</div>
			</div>
		</div> 

	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<!-- <h3 class="section-title">Your Message</h3>-->	
 				<div id="Feedback">
				    <header id="head" class="secondary">
				            <div class="container" style="width: 200px;">
				                    <h1 style="width: 0px;">Feedback</h1>
				            </div>
				    </header>
				</div>	<br>		
				<!--NOTE: Update your email Id in "contact_me.php" file in order to receive emails from your contact form-->
				<form name="sentMessage" id="contactForm"  novalidate> 
					<div class="control-group">
						<div class="controls">
							<input type="text" class="form-control" 
							placeholder="Full Name" id="name" required
							data-validation-required-message="Please enter your name" />
							<p class="help-block"></p>
						</div>
					</div> 	
					<div class="control-group">
						<div class="controls">
							<input type="email" class="form-control" placeholder="Email" 
							id="email" required
							data-validation-required-message="Please enter your email" />
						</div>
					</div> 	

					<div class="control-group">
						<div class="controls">
							<br>
							<textarea rows="4" cols="500" class="form-control" 
							placeholder="Message" id="message" required
							data-validation-required-message="Please enter your message" minlength="5" 
							data-validation-minlength-message="Min 5 characters" 
							maxlength="999" style="resize:none"></textarea>
						</div>
					</div> 		 
					<div id="success"> </div> <!-- For success/fail messages -->
					<br>
					<button type="submit" class="btn btn-primary pull-right">Send</button><br /> <br /> <br />
				</form>
			</div>
			<div class="row">				
				<div class="col-md-6">
					<!-- <h3 class="section-title">Office Address</h3> -->
					<div id="Head_branch">
    					<header id="head" class="secondary">
            			<div class="container" style="width: 180px;">
                    	<h1 style="width: 170px;">Head Branch</h1>
            		</div>
   				 </header>
			</div> <div></div>
					<div class="contact-info" style="padding-left: 20px;">

						<h5>Mumbai</h5>
						<h5>Address:</h5>
						7th floor, SV Road, <br>Malad East,<br>Mumbai-400097

						<h5>Email</h5>
						mumbai@gmail.com

						<h5>Phone</h5>
						<div class="container-fluid">
							<div class="row">

								<!-- FOR DISPLAYIG MAP-->
								<!--First column-->
								<div class="col-sm-12 col-md-12 col-lg-4">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.3507087725447!2d72.90939421490079!3d19.048311987103737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c5f39a7d77d1%3A0x9ebbdeaea9ec24ae!2sShah+and+Anchor+Kutchhi+Engineering+College!5e0!3m2!1sen!2sin!4v1502346917553" frameborder="0" style="border:0" allowfullscreen></iframe>
								</div>
								<!--/.First column-->
							</div>
						</div>
					</div>
				</div> 

			</div>


			<!--/.First column-->
		</div>
	</div></div></div>	
</div>

</div>

<div id="Branch">
    <header id="head" class="secondary">
            <div class="container">
                    <h1>Our Other Branches</h1>
            </div>
    </header>
</div>

<div class="container">
	<!-- Data being fetched from backend. -->
	<div class="row">
		<?php 
		if(isset($AllBranch))
		{
			 foreach($AllBranch as $branch) {
		?>
			<div class="col-md-6">
				<div class="team-member">
					<h4 style="text-align: left;"> <?php echo $branch->branch_area; ?> </h4> <br>
					Address: <br> <?php echo $branch->address; ?> <br>
					Email: <br> <?php echo $branch->email; ?> <br>
					Phone No: <br> <?php echo $branch->phone_no1; $branch->phone_no2 ?>
				</div>
			</div>
			<?php } 
		} 
		?>

		
	</div>

</div>
<!-- /container -->
<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src='<?php echo base_url("assets/js/modernizr-latest.js"); ?>'></script> 
<script type='text/javascript' src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script type='text/javascript' src="<?php echo base_url('assets/js/fancybox/jquery.fancybox.pack.js'); ?>"></script>

<script type='text/javascript' src="<?php echo base_url('assets/js/jquery.mobile.customized.min.js'); ?>"></script>
<script type='text/javascript' src="<?php echo base_url('assets/js/jquery.easing.1.3.js'); ?>"></script> 
<script type='text/javascript' src="<?php echo base_url('assets/js/camera.min.js'); ?>"></script> 
<script src='<?php echo base_url("assets/js/bootstrap.min.js"); ?>'></script> 
<script src='<?php echo base_url("assets/js/custom.js"); ?>'></script>

<?php $this->load->view('footer'); ?>

</body>
</html>