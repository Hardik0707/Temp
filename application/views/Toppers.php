<!DOCTYPE html>
<html>
<head>
	<title>Toppers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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

<body >
	<?php $this->load->view('navbar') ?>

  <header id="head" class="secondary">

    <div class="container">
      <h2>Toppers</h2>    
    </div>
  </header>


  <div class="container" style="margin-top: 25px;" data-spy="scroll" data-target="#myScrollspy" data-offset="20">
    <div class="row">

      <nav class="col-sm-3">
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

          <div class="panel panel-primary">
            <?php 
            foreach($AllYears as $year) {
              $year_in = 'a_'.$year->year_id;  

              ?>
              <br>

              <div class="panel-heading" id="<?php echo $year->year; ?>"><?php echo $year->year; ?></div>

                <div class="panel-body">
                  <?php 
                  if(isset($$year_in) && !empty($$year_in)) 
                  { 
                    foreach($$year_in as $value) 
                    { 
                      ?>


                      <figure class="toppers col-sm-5">

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
                      </div>       <!-- end of Panel body -->

                      <?php 
                    }

                  } ?> 
                </div> <!-- end of Panel body -->
              </div> <!-- end of col-sm-9 -->
            </div>  <!-- end of row -->
          </div>  <!-- end of container -->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        
       
        <script>
          $("figure").mouseleave(
            function () {
              $(this).removeClass("hover");
            }
            );
          </script>
 <?php $this->load->view('footer') ?>
        </body>
        </html>
