<!DOCTYPE html>
<html>
<head>
	<title>Toppers</title>

	<?php $this->load->view('head') ?>
	  <link href="<?php echo base_url('assets/css/topper.css'); ?>" rel="stylesheet">
  <style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Raleway:400,200,300,800);
  @import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);

#head.secondary{
        height: 100px !important;
        padding-bottom: 25px;
    }

#scroll{
  height:500px;
  overflow-y: auto;
}

div.col-sm-9 div{
height: auto;
width: auto;
overflow-y: auto;
}

  </style>
</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="20">
	
	<?php $this->load->view('navbar') ?>

  <header id="head" class="secondary">

  <div class="container">
  <h2>Toppers</h2>    
  </div>
  </header>


<div class="container" style="margin-top: 25px;">
<div class="row">

<nav class="col-sm-3" id="myScrollspy">
        <ul class="nav nav-pills nav-stacked">
           <?php if(isset($AllYears)) {
                foreach($AllYears as $year) {
                $year_in = 'a_'.$year->year_id;
            ?>
            <li>
            <a href="#<?php echo $year->year; ?>"> <?php echo $year->year; ?> 
            </a>
            </li>         
          <?php } ?>

        </ul>
</nav> 

<div class="col-sm-9" id="scroll">
<?php 
foreach($AllYears as $year) {
$year_in = 'a_'.$year->year_id;  
//echo $year_in;
?>
<br>

<div id="<?php echo $year->year; ?>" >
<h1><?php echo $year->year; ?></h1>
  <?php 
  if(isset($$year_in) && !empty($$year_in)) 
    { 
    foreach($$year_in as $value) 
      { 
        ?>

  <figure class="toppers">
  
  <img src="<?php echo ($value->photo == '') ? base_url("admin/panel/img/male.png") : base_url("admin/panel/img/topperimage/".$value->photo); ?>"/> 
  
  <figcaption>
    <h2><?php echo $value->student_name;?></h2>
   <p style="text-align: center;">Standard : <?php echo $value->standard ?>
    <br>
    Subject : <?php echo $value->subject ?><br>
    Result : <?php echo $value->result;?></p>
  </figcaption> 
</figure>
<?php } } 
else { ?>
  <div class="col-sm-9">
  No Toppers
  </div>
  <?php } ?>
</div>

<?php 
// exit(0);
}

} ?> 
</div>
</div>
</div>
<script>


$("figure").mouseleave(
  function () {
    $(this).removeClass("hover");
  }
);
</script>

	<?php $this->load->view('footer') ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
