<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<?php $this->load->view('head'); ?>
</head>
<body>
<?php $this->load->view('navbar'); ?>

<!-- container -->
	<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h3 class="section-title">Your Message</h3>
						<p>
						</p>
						
					  
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
		<textarea rows="10" cols="100" class="form-control" 
		placeholder="Message" id="message" required
		data-validation-required-message="Please enter your message" minlength="5" 
		data-validation-minlength-message="Min 5 characters" 
		maxlength="999" style="resize:none"></textarea>
		</div>
		</div> 		 
		<div id="success"> </div> <!-- For success/fail messages -->
		<br>
		<button type="submit" class="btn btn-primary pull-right">Send</button><br />
		</form>
					</div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-md-6">
								<h3 class="section-title">Office Address</h3>
								<div class="contact-info">
									<table>
										<tr><th>
									<h5>Mumbai</h5>
									<h5>Address:</h5>
									5th Fort,Mumbai
									
									<h5>Email</h5>
									mumbai@mediamaggi.com
									
									<h5>Phone</h5></th></tr>
																	<tr><th rowspan=1>...............................................................</th></tr><tr><th><b><h5>Thane</h5></b>
									<h5>Address:</h5>
									Charai, Thane
									
									<h5>Email:</h5><a href="mailto:hardikthakkkar0707@gmail.com">thane@mediamaggi.com
									</a>
									<h5>Phone</h5>
									022-12345678 ,022-16547899</th></tr></table>
								</div>
							</div> 
						</div> 						
					</div>
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