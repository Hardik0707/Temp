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

	<!-- =============================Sent Successful Message================================== -->
                  <!-- Modal -->
  <div class="modal fade" id="message" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
        
            <div class="modal-body" style="color:Red;">
                <h4><?php echo $_SESSION['sentAdmin'];?></h4>
            </div>
        </div>
      </div>
    </div>
  </div>


	<!-- ========================Forgot Password===============================-->
  <div class="modal fade" id="forgot" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" data-backdrop="static">&times;</button>
          <h4 class="modal-title" style="text-align: center;font-size:28px;">Forgot Password</h4>
        </div>
        <div class="modal-body">
          <form accept-charset="UTF-8" role="form" action="<?php echo base_url('index.php/Login_Controller/ForgotPassword'); ?>" Method="POST" name="for" > 
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="email" type="text" required="true">
							</div>
							
							<center>
							<input class="btn btn-sm" type="submit" value="Submit" style="margin-top: 05px;border-radius: 20px 20px">
							</center>

						</fieldset>
					</form>
        </div>
       
      </div>
      
    </div>
  </div>



	<header id="head" class="secondary">
		
			<h2>Administrator Panel</h2>
			</header>


	<div class="container">

		<div style="margin-top: 4rem;">
			<div class="col-md-4 col-md-offset-4"
			style="background: #e9e9f3bd; height: 270px; border-radius: 20px 20px;">
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
					<br>
					<center>
					<a href="" data-toggle="modal" data-target="#forgot">Forgot Password?</a>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>	

<?php $this->load->view('footer'); ?>


<?php 
    if( isset($_SESSION['sent'])){
    ?>
    <script type='text/javascript'>
        jQuery(document).ready(function(){
        jQuery('#message').modal('toggle');
        setTimeout(function(){jQuery('#message').modal('hide');
        },3000);
    });
    </script>

<?php $this->session->unset_userdata('sentAdmin');}?>

</body>
</html>	