<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login</title>
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

            .form-control{
            	border-radius: 20px 20px;
            }
	</style>
</head>
<body>

	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<center>
				<img src='<?php echo base_url("assets/images/logo.jpg"); ?>' alt="Logo" style="height:100;width: 150px;">
			</center>
		</div>
	</div>	


	<header id="head" class="secondary">
		
			<h2>Administrator Panel</h2>
			</header>


	<div class="container">

		<div style="margin-top: 4rem;">
			<div class="col-md-4 col-md-offset-4"
			style="background: #e9e9f3bd; height: 240px; border-radius: 20px 20px;">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:transparent;border: 0px; ">
					<h2 class="panel-title"><center>Admin Login</center></h2>
				</div>
				<div class="panel-body">
					

					<form accept-charset="UTF-8" role="form" method="POST" action="<?php echo base_url('index.php/Login_Controller/Home'); ?>">
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" required="true">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" required="true">
							</div>
							
							<input class="btn btn-lg btn-block" type="submit" value="Login" style="border-radius: 20px 20px;">
						
					</form>
					<?php if(isset($msg))
					{
						echo "<p style='text-align: center;font-weight: 900;color:Red;margin-top:5px;'>*".$msg."</p>";
					}?>
				</div>
			</div>
		</div>
	</div>
</div>	

<?php $this->load->view('footer'); ?>

</body>
</html>	