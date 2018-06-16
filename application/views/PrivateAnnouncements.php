
<!DOCTYPE HTML>
<html>
<head>
	<title>Announcements</title>
	<?php $this->load->view("head"); ?>

	<style type="text/css">
	
	.card{
		border: 0px solid #3d84e6;
		height: 70px;
		box-shadow: 5px 3px 10px ;
		margin: 15px;
		border-radius: 10px;
		padding-left:0px;
		align-content: center;
	}
	.card > img{
		height: 70px;
		width: 100px;
		border-radius: 10px;
		margin-left: 1px;
		position: relative;
		
	}
	.card:hover{
		box-shadow: 7px 5px 10px #3d84e6;
	}
	.title{
		width:125px; 
		margin:0px;
		padding: 0px;
		text-transform: uppercase;
		text-align: center;
		display: inline-block;
		font-size: 14px;
		text-overflow:ellipsis;
	}

	.contact_info{
        float:right;text-align: center;padding-top:3rem;margin-right: 05px;
    }    
    .contact_info span{
        background: #3d84e6;color:#fff;font-size: 16px; height:35px;border-radius: 6px 6px 6px 6px;padding:5px;margin-top: 05px;margin-left:0px;font-family:'Lato', sans-serif;
    }
	#head.secondary{
		min-height: 45px;
		height: 45px !important;
		margin-top:-10px;
	}
	h2{
		margin-top: -05px;
	}
	
</style>

</head>
<body>
	<?php $this->load->view("navbar"); ?>

	<header id="head" class="secondary container" style="margin-top: 10px;">
		<div class="container">
			<h2>Private Announcements</h2>
		</div>
	</header>

	<div class="container" style="margin-top: 10px;">

		<div class="row col-sm-offset-1">
			<?php 
				$flag=0;
			if(isset($AllPrivate) && !empty($AllPrivate))
			{

				foreach ($AllPrivate as $private) {
					$flag++;
					?> 
					<a href="#" data-toggle="modal" data-target="#<?php echo $private->id; ?>" style="text-decoration: none;color: black;">
						<div class="card col-sm-3">


							
							<?php if($private->photo!="NULL"){ ?>
							<img src="<?php echo base_url("/admin/panel/img/Announcement/Private/$private->photo"); ?>">
							<?php }else{ ?>

							<img src="<?php echo base_url("/admin/panel/img/Announcement/Private/NULL.png"); ?>">
							<?php } ?>


							<div class="title">
								<?php echo $private->title;?> 	
							</div>
						</div>
					</a>

					<!-- Modal -->
					<div class="modal fade" id="<?php echo $private->id;?>" tabindex="-1" role="dialog"  aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
							
									<h4><?php echo $private->title;?> <div style="float:right;">
										<?php echo "Date: ".date("d/m/Y",strtotime(str_replace('-','/', $private->date))); ?>
										</div></h4>
										
								</div>
								<div class="modal-body">

								<?php if($private->photo!='NULL'){ ?>	
								<center>
								<img src="<?php echo base_url("/admin/panel/img/Announcement/private/$private->photo"); ?>" class="img-respnsive" height="200px" width="250px">
								</center>

								<br><br>
								<?php } ?>
								<p style="font-family: calibri;font-size: 20px;word-wrap: break-word;"><?php echo $private->description; ?></p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

								</div>
							</div>
						</div>
					</div>

					<?php }}

					else{
						echo "<h4>No Announcements</h4>";
						
					} ?>


				</div>
			</div>
			
				<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
				<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

				<?php 


				if($flag<=12)
					$this->load->view('footer2'); 

				else
					$this->load->view('footer');
					?>

			</body>
			</html>