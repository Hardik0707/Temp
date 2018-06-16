<!DOCTYPE HTML>
<html>
<head>
	<title>Gallery</title>
	<?php $this->load->view("gallery_head"); ?>
	<style type="text/css">

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

	img{
		height:275px	;
		width:250px;
	}
</style>
</head>
<body>
	<?php $this->load->view("navbar"); ?>

	<header id="head" class="secondary container" style="margin-top: 10px;">
		<div class="container">
			<h2>Gallery</h2>

		</div>
	</header>


	<!-- container -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<section id="portfolio" class="page-section section appear clearfix">
					<p>


						<div class="container">
							<h1 style="text-align: center;">Some Moments That we Cleerish Here..</h1>
						</div>
					</p>


					<div class="row">
						<nav id="filter" class="col-md-12 text-center">
							<ul style="padding: 0px;margin: 0px;">
								<li><a href="<?php echo base_url('index.php/GalleryDisplay_Controller/Gallery/#'); ?>" class="current btn-theme btn-small" data-filter="*">All</a></li>

								<li><a href="<?php echo base_url('index.php/GalleryDisplay_Controller/Gallery/#'); ?>" class="btn-theme btn-small" data-filter=".Classroom">Classroom</a></li>

								<li><a href="<?php echo base_url('index.php/GalleryDisplay_Controller/Gallery/#'); ?>" class="btn-theme btn-small" data-filter=".Event">Events</a></li>

							</ul>
						</nav>

						<div class="col-md-12">
							<div class="row">
								<div class="portfolio-items isotopeWrapper clearfix" id="3">

									<?php 
									if (isset($AllImages)) {

										foreach($AllImages as $image) {
											?>	
											<article class="col-sm-4 isotopeItem <?php echo $image->category ?>">
												<div class="portfolio-item">
													<img src='<?php echo base_url("admin/panel/img/gallery/$image->photo"); ?>' alt="" />
													<div class="portfolio-desc align-center">
														<div class="folio-info">
															<a href='<?php echo base_url("admin/panel/img/gallery/$image->photo"); ?>' class="fancybox">
																<h5><?php echo $image->description; ?></h5>
																<i class="fa fa-link fa-2x"></i></a>
															</div>
														</div>
													</div>
												</article>
												<?php 
											}}
											?>

												</div>

											</div>


										</div>
									</div>

								</section>
							</div>
						</div>

					</div>
					<!-- /container -->

					<?php $this->load->view("footer"); ?>

					<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
					<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
					<script src='<?php echo base_url("assets/js/jquery.cslider.js"); ?>'></script>
					<script src='<?php echo base_url("assets/js/jquery.isotope.min.js"); ?>'></script>
					<script src='<?php echo base_url("assets/js/fancybox/jquery.fancybox.pack.js"); ?>' type="text/javascript"></script>
					<script src='<?php echo base_url("assets/js/custom.js"); ?>'></script>


				</body>
				</html>	