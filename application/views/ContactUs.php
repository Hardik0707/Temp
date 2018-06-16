<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name = "description" content="">
	<meta name="author" content="JD Tutorial">
	<title>Contact Us</title>
	<?php $this->load->view('head'); ?>
	
	<style type="text/css">
	.contact_info{
        float:right;text-align: center;padding-top:3rem;margin-right: 05px;
    }    
    .contact_info span{
        background: #3d84e6;color:#fff;font-size: 16px; height:35px;border-radius: 6px 6px 6px 6px;padding:5px;margin-top: 05px;margin-left:0px;font-family:'Lato', sans-serif;
    }
    #head.secondary{
        height: 45px !important;
        min-height: 45px;
        margin-top:-10px;

    }

    h2{
       margin-top: -05px;
    }
	</style>
</head>
<body>

	<?php $this->load->view('navbar'); ?>
	
	<!-- ====================================================== -->
	<div>
		<header id="head" class="secondary container" style="margin-top: 10px;">
				<h2>Contact Us</h2>    
		</header>
	</div>
	<!-- ========================================================= -->
		<div class="container" style="margin-top: 15px;">
			<h2>
				Frequently Asked Questions(FAQ)
			</h2>
		</div>
		<!-- </header> -->

		<!-- container -->
		<div class="container" style="margin-top: 10px;">
			<div class="panel-group" id="accordion">
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="panel-title expand">
							<div class="right-arrow pull-right">+
							</div>
							<a href="#">question 1</a>
						</h4>
					</div>
					
					<div id="collapse1" class="panel-collapse collapse">
						<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						</div>
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
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						</div>
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






	<div class="container">
		<div class="row">


			<div class="container col-md-6">
					<header id="head" class="secondary">
							<h2>Feedback</h2>
					</header>
				<br>		
				
				<form name="sentMessage" method="POST" action="<?php echo base_url('index.php/ContactUS_Controller/feedback'); ?>"  novalidate> 
					<div class="control-group col-xs-5">
						<div class="controls">
							<input type="text" class="form-control" 
							placeholder="Full Name" name="name"  required
							data-validation-required-message="Please enter your name" />
							<p class="help-block"></p>
						</div>
					</div> 	

					<div class="control-group col-xs-7">
						<div class="controls">
							<input type="email" class="form-control" placeholder="Email" 
							name="email" required
							data-validation-required-message="Please enter your email" />
						</div>
					</div> 	
					<div class="control-group col-sm-12">
						<div class="controls">
							<textarea rows="4" cols="500" class="form-control" 
							placeholder="Message" name="message" required
							data-validation-required-message="Please enter your message" minlength="5" 
							data-validation-minlength-message="Min 5 characters" 
							maxlength="999" style="resize:none"></textarea>
						</div>
						<span style="color:green;">
						<?php if(isset($_SESSION['feedback'])){
						echo "Feedback sent successfully!";
						$this->session->unset_userdata('feedback');

						}
						if(isset($_SESSION['feedbackfail'])){
						echo "Feedback not sent !";
						$this->session->unset_userdata('feedbackfail');
						}
						?>
						</span>
						<input type="submit" class="btn pull-right" value="Send" name="send" style="margin: 10px 10px 20px 10px;">
					</div> 

				</form>
			</div>

			<div class="container col-md-6">
				<header id="head" class="secondary">
								<h2>Head Branch</h2>				
				</header>

				<div class="contact-info" style="padding-left:20px;margin-top: 5px;margin-bottom: 20px;">

				<h3 align="center"><u>Mumbai</u></h3>
				<center>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30136.97285565413!2d72.82168834910802!3d19.233531217838006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b0ce3cd117f7%3A0x515d558b955bf692!2sBorivali+West%2C+Mumbai%2C+Maharashtra!5e0!3m2!1sen!2sin!4v1521647356664" frameborder="0" style="border:0; float: right;margin:10px 10px 15px 0px;width:320px;height: 210px;" allowfullscreen class="embed-responsive-item"></iframe>
				</center>
				<h4>Address:</h4>
				7th floor, SV Road<br>Borivali West<br>Mumbai-400092.

				<h4>Email</h4>
				acdehs@#$__asjdhj@gmail.com

				<h4>Phone</h4>
				Jimit Sir: 7303781863 <br>
				Deval Sir: 9920564563
				</div>			
			</div> 

		</div> 
		<!-- End of Row -->
	</div>
	<!-- End of Container -->



<div id="Branch">
	<header id="head" class="secondary container">
		<div class="container">
			<h2>Our Other Branches</h2>
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
				<div class="col-sm-4" style="align-items: center;">
						<h3> <?php echo $branch->branch_area; ?> </h3>
						<h5>Address: <?php echo $branch->address; ?></h5> 
						<h5> Email:  <?php echo $branch->email; ?> </h5>
						<h5>Phone No: <?php echo $branch->phone_no1; $branch->phone_no2 ?></h5>
					
				</div>
				<?php } 
			} 
			else
				echo "No Other Branches are situated Right now";
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