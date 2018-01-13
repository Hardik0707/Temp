<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login</title>
	<?php $this->load->view("head"); ?>
	</head>
<body>

<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<center>
				<img src='<?php echo base_url("assets/images/1logo.png"); ?>' alt="Logo">
			</center>
	</div>
	</div>	


<header id="head" class="secondary" style="height:50px;">
            <div class="container">
                    <h1>Administrator Panel</h1>
            </div>
</header>

<div class="container">
	<div style="
    margin-top: 8rem;">
		<div class="col-md-4 col-md-offset-4"
		 style="background: #e9e9f3bd; height: 240px; border-radius: 12px;">
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:  transparent !important; ">
					<h3 class="panel-title"><center>Admin Login</center></h3>
				</div>
				<div class="panel-body">
					 <?php if(isset($msg))
                        {
                    		echo "<p style='text-align: center;font-weight: 900;color: white;'>".$msg."</p>";
                    	}?>
					<form accept-charset="UTF-8" role="form" method="POST" action="<?php echo base_url('index.php/Login_Controller/Home'); ?>">
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
<footer class="col-md-12 panel" style="background-color:#e9e9f3bd;border: 1px dotted black;color:Black; ">
            <div class="panel-body">
              <p class="text-right">
                Copyright &copy; 2018  Cabbagesoft Technologies.
              </p>
            </div>
</footer>
</body>
</html>	