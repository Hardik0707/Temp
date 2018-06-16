<!DOCTYPE html>
<html>
<head>
	<title>Our Toppers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php $this->load->view('head') ?>
  
  <style type="text/css">
  
  .card{
    border: 0px solid #3d84e6;
    height: auto;
    box-shadow: 5px 3px 10px ;
    margin: 15px;
    border-radius: 10px;
    padding-left:0px;
    align-content: center;
  }
  .topper{
    height: 100px;
    width: 100px;
    border-radius: 10px;
    margin-left: 1px;
    position: relative;
    
  }
  .card:hover{
    box-shadow: 7px 5px 10px #3d84e6;
  }
  .title{
    margin-left: 20px;
    text-transform: uppercase;
    text-align: center;
    display: inline-flex;
    position: relative;
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

  h4{
    font-size: 1.2em;
  }

  blockquote {
/*border: 1px solid #b3b3b3;*/
/*border-left: 10px solid #b3b3b3;*/
border-radius: 0px;/*background: #fafafa;*/
font-size: 1.8em;
margin: 10px;
padding: 10px 20px;
}
 
blockquote p {
margin: 0;
line-height: 30px;
padding-bottom: 20px;
}
 
blockquote .small {
display: block;
font-size: 80%;
color: brown;
text-align: right;
} 
</style>
  
</style>
</head>

<body >
	<?php $this->load->view('navbar') ?>

  <header id="head" class="secondary container" style="margin-top: 10px;">
      <h2>Toppers</h2>    
  </header>


  <div class="container" data-spy="scroll" data-target="#myScrollspy" data-offset="20">
    <div class="row">

      <nav class="col-sm-2" style="margin-top: 25px;">
        <ul class="nav nav-pills nav-stacked">
         
         <?php if(isset($AllYears)) {
          foreach($AllYears as $year) {
            $year_in = 'a_'.$year->year_id;
            ?>
            <li>
              <a href="#<?php echo $year->year; ?>"> <?php echo $year->year; ?> 
              </a>
            </li>         
            <?php }?>

          </ul>
        </nav>   
        <div class="col-sm-10" id="scroll">

          <div class="panel panel-primary">
            
            <?php 
            foreach($AllYears as $year) {
              $year_in = 'a_'.$year->year_id;  

              ?>
              <br>

              <div class="panel-heading" id="<?php echo $year->year; ?>" style="border-radius: 5px 5px;"><?php echo $year->year; ?>
              </div>

                <div class="panel-body">
                  <?php 
                  if(isset($$year_in) && !empty($$year_in)) 
                  { 
                    foreach($$year_in as $value) 
                    { 
                      ?>
                      
                      <div class="card col-sm-11">
                      <div class="row"> 
                        
                        <div class="col-sm col-lg-3">
                          <img src="<?php echo ($value->photo == '') ? base_url("admin/panel/img/male.png") : base_url("admin/panel/img/topperimage/".$value->photo); ?>" class="topper">
                         </div>
                           <div class="col-sm-5 col-lg-3"> 
                              <h4>Name : <?php echo $value->student_name; ?></h4>                             
                              <h4>Standard: <?php echo $value->standard_id; ?></h4>
                              <h4>Result : <?php echo $value->result; ?></h4>
                           </div>   
                              <blockquote class="col-sm-11 col-lg-4">
                              "<?php echo $value->quote; ?>"
                              </blockquote>
                        </div>
                      </div>
                    
                            
                            


                            
                       
                        <?php } } 

                        else { ?>
                        
                        <div class="col-sm-9">
                          <h3>No Toppers</h3>
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
