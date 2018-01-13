<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Student Login</title>
	<?php $this->load->view("head"); ?>
</head>
<body>

<?php $this->load->view("navbar"); ?>


<!-- <body style="background-color: #3d84e6;"> -->


	<header id="head" class="secondary">
            <div class="container">
                    <h1>Login</h1>
            </div>
    </header>

<div class="container">
	<div style="
    margin-top: 8rem;">
		<div class="col-md-4 col-md-offset-4"
		 style="background: #e9e9f3bd; height: 240px; border-radius: 12px;">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:  transparent !important; ">
					<h3 class="panel-title"><center>Student Login</center></h3>
				</div>
				<div class="panel-body">
					<form accept-charset="UTF-8" role="form">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" required="true">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required="true">
							</div>
							<!-- <div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me"> Remember Me
								</label>
							</div> -->
							<input class="btn btn-lg btn-block" type="submit" value="Login" style="margin-top: 30px;">
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
 </div>
<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <script src='<?php echo base_url("assets/js/modernizr-latest.js"); ?>'></script> 
    <script type='text/javascript' src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('assets/js/fancybox/jquery.fancybox.pack.js'); ?>"></script>
    
    <script type='text/javascript' src="<?php echo base_url('assets/js/jquery.mobile.customized.min.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('assets/js/jquery.easing.1.3.js'); ?>"></script> 
    <script type='text/javascript' src="<?php echo base_url('assets/js/camera.min.js'); ?>"></script> 
    <script src='<?php echo base_url("assets/js/bootstrap.min.js"); ?>'></script> 
    <script src='<?php echo base_url("assets/js/custom.js"); ?>'></script>
<?php $this->load->view("footer"); ?>
  
</body>
</html>
