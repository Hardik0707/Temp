<!DOCTYPE HTML>
<html>
<head>
<title>Gallery</title>
<?php $this->load->view("gallery_head"); ?>
</head>
<body>
<?php $this->load->view("navbar"); ?>

<header id="head" class="secondary">
<div class="container">
<h1>Gallery</h1>
<p></p>
</div>
</header>


<!-- container -->
<section class="container">
<div class="row">
<div class="col-md-12">
<section id="portfolio" class="page-section section appear clearfix">
<br>
<br>
<p>


<div class="container">
<h1><center>Some Moments That we Cleerish Here..</center></h1>
</div>

<br>
<br>
</p>


<div class="row">
<nav id="filter" class="col-md-12 text-center">
<ul>
<li><a href=""<?php echo base_url('index.php/welcome/Gallery/#'); ?>"" class="current btn-theme btn-small" data-filter="*">All</a></li>
<li><a href="<?php echo base_url('index.php/welcome/Gallery/#'); ?>" class="btn-theme btn-small" data-filter=".webdesign">Classroom</a></li>
<li><a href="<?php echo base_url('index.php/welcome/Gallery/#'); ?>" class="btn-theme btn-small" data-filter=".photography">Faculty</a></li>
<li><a href="#" class="btn-theme btn-small" data-filter=".print">Events</a></li>
</ul>
</nav>
<div class="col-md-12">
<div class="row">
<div class="portfolio-items isotopeWrapper clearfix" id="3">

<article class="col-sm-4 isotopeItem webdesign">
<div class="portfolio-item">
<img src='<?php echo base_url("assets/images/portfolio/img1.jpg"); ?>' alt="" />
<div class="portfolio-desc align-center">
<div class="folio-info">
<a href='<?php echo base_url("assets/images/portfolio/img1.jpg"); ?>' class="fancybox">
	<h5>Project Title</h5>
	<i class="fa fa-link fa-2x"></i></a>
</div>
</div>
</div>
</article>

<article class="col-sm-4 isotopeItem photography">
<div class="portfolio-item">
<img src='<?php echo base_url("assets/images/portfolio/img2.jpg"); ?>' alt="" />
<div class="portfolio-desc align-center">
<div class="folio-info">
	<a href='<?php echo base_url("assets/images/portfolio/img2.jpg"); ?>' class="fancybox">
		<h5>Project Title</h5>
		<i class="fa fa-link fa-2x"></i></a>
	</div>
</div>
</div>
</article>


<article class="col-sm-4 isotopeItem photography">
<div class="portfolio-item">
<img src='<?php echo base_url("assets/images/portfolio/img3.jpg"); ?>' alt="" />
<div class="portfolio-desc align-center">
	<div class="folio-info">
		<a href='<?php echo base_url("assets/images/portfolio/img3.jpg"); ?>' class="fancybox">
			<h5>Project Title</h5>
			<i class="fa fa-link fa-2x"></i></a>
		</div>
	</div>
</div>
</article>

<article class="col-sm-4 isotopeItem print">
<div class="portfolio-item">
	<img src='<?php echo base_url("assets/images/portfolio/img4.jpg"); ?>' alt="" />
	<div class="portfolio-desc align-center">
		<div class="folio-info">
			<a href='<?php echo base_url("assets/images/portfolio/img4.jpg"); ?>' class="fancybox">
				<h5>Project Title</h5>
				<i class="fa fa-link fa-2x"></i></a>
			</div>
		</div>
	</div>
</article>

<article class="col-sm-4 isotopeItem photography">
	<div class="portfolio-item">
		<img src='<?php echo base_url("assets/images/portfolio/img5.jpg"); ?>' alt="" />
		<div class="portfolio-desc align-center">
			<div class="folio-info">
				<a href='<?php echo base_url("assets/images/portfolio/img5.jpg"); ?>' class="fancybox">
					<h5>Project Title</h5>
					<i class="fa fa-link fa-2x"></i></a>
				</div>
			</div>
		</div>
	</article>

	<article class="col-sm-4 isotopeItem webdesign">
		<div class="portfolio-item">
			<img src='<?php echo base_url("assets/images/portfolio/img6.jpg"); ?>' alt="" />
			<div class="portfolio-desc align-center">
				<div class="folio-info">
					<a href='<?php echo base_url("assets/images/portfolio/img6.jpg"); ?>' class="fancybox">
						<h5>Project Title</h5>
						<i class="fa fa-link fa-2x"></i></a>
					</div>
				</div>
			</div>
		</article>

		<article class="col-sm-4 isotopeItem print">
			<div class="portfolio-item">
				<img src='<?php echo base_url("assets/images/portfolio/img7.jpg"); ?>' alt="" />
				<div class="portfolio-desc align-center">
					<div class="folio-info">
						<a href='<?php echo base_url("images/portfolio/img7.jpg"); ?>' class="fancybox">
							<h5>Project Title</h5>
							<i class="fa fa-link fa-2x"></i></a>
						</div>
					</div>
				</div>
			</article>

			<article class="col-sm-4 isotopeItem photography">
				<div class="portfolio-item">
					<img src='<?php echo base_url("assets/images/portfolio/img8.jpg"); ?>' alt="" />
					<div class="portfolio-desc align-center">
						<div class="folio-info">
							<a href='<?php echo base_url("images/portfolio/img8.jpg"); ?>' class="fancybox">
								<h5>Project Title</h5>
								<i class="fa fa-link fa-2x"></i></a>
							</div>
						</div>
					</div>
				</article>

				<article class="col-sm-4 isotopeItem print">
					<div class="portfolio-item">
						<img src='<?php echo base_url("assets/images/portfolio/img9.jpg"); ?>' alt="" />
						<div class="portfolio-desc align-center">
							<div class="folio-info">
								<a href='<?php echo base_url("images/portfolio/img9.jpg"); ?>' class="fancybox">
									<h5>Project Title</h5>
									<i class="fa fa-link fa-2x"></i></a>
								</div>
							</div>
						</div>
					</article>
				</div>

			</div>


		</div>
	</div>

</section>
</div>
</div>

</section>
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