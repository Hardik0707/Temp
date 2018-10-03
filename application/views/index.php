<!DOCTYPE>
<html>
<head>
	<title>JD Tutorial</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="As your child takes steps towards Std. 10th, you do have speculations about his or her performance which being the main reason of providing your child with special coaching which is offered by JDs Tutorials.">

	<meta name="author" content="JD Tutorial">
    
	<?php $this->load->view("head"); ?>
        <style type="text/css">


    .contact_info{
        float:right;text-align: center;padding-top:3rem;margin-right: 05px;
    }    
    .contact_info span{
        background: #3d84e6;color:#fff;font-size: 16px; height:35px;border-radius: 6px 6px 6px 6px;padding:5px;margin-top: 05px;margin-left:0px;font-family:'Lato', sans-serif;
    }
    .carousel indicator{

        border: 1px solid #000000;    
    }

    .camera_wrap .camera_pag .camera_pag_ul li
    {
        margin: 5px 5px;
    }
    .testimonials h3{margin-top:15px; }
    
    #camera_wrap_4,#head
    {
    height: 400px !important;
    }

    @media (max-width: 420px){
    #camera_wrap_4, #head
     {
    height: 320px !important;
    }     
    }


    #head.secondary{
        height: 45px !important;
        min-height: 45px;
        margin-top:-10px;
    }

    h2{
       margin-top: -05px;
    }
    blockquote {
        margin: 0em 0em;
        color: #8f7f8f;
        padding-left: 0.5em;
        border: 0px;     }

        blockquote p:first-letter {
            float: left;
            margin: 0em .3em .1em 0;
            font-family: "Monotype Corsiva", "Apple Chancery", fantasy;
            font-size: 220%;
            font-weight: bold; }

            blockquote p:first-line {
                font-variant: small-caps; }
    
    </style>
</head>
<body>
	   
    <!-- =============================Sent Successful Message================================== -->
                  <!-- Modal -->
  <div class="modal fade" id="message" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
        
            <div class="modal-body" style="color:Red;">
                <h4><?php echo $_SESSION['sent'];?></h4>
            </div>
        </div>
      </div>
    </div>
  </div>



	<?php $this->load->view("navbar"); ?>
    
	<div class="container">
    <?php $this->load->view("slider"); ?>  
    </div>
    <br><br>   
    <!-- Testimonials -->
    <header id="head" class="secondary container" >
            <div class="container">
                    <h2>Testimonials</h2>
            </div>
    </header>    



      <div class="container" id="testimonials-row" data-ride="carousel"> 
        <div class="row"> 
            <div class="col-md-12 column"> 
                <h2 class="page-header" style="text-align:center; margin: 20px 0 20px;"> 
                    <small>Our Students Love Us!</small>
                </h2>

                <div class="carousel slide" id="testimonials-rotate"> 
                    <ol class="carousel-indicators">
    <li data-target="testimonials-row" data-slide-to="0" class="active"></li>
    <li data-target="testimonials-row" data-slide-to="1"></li>
    <li data-target="testimonials-row" data-slide-to="2"></li>
  </ol>
                    <div class="carousel-inner"> 
                        <div class="item active">   
                            <div class="col-lg-2">
                                <img alt="" src="<?php echo base_url('assets/images/Testimonials/1.jpg'); ?>" class="img-circle img-responsive"/>
                            </div> 
                            <div class="testimonials col-lg-10"> 
                                <h3><p>“Thank you so much....We too had a very good time under your tutelage.....it really was an unforgettable experience and a pleasant memory for us students to cherish forever....Thanks a lot”
</p>
                                
                                    - <small>Viper</small> 
                                </h3> 
                            </div> 
                            
                        </div> 
                        <div class="item">  
                            <div class="col-lg-2">
                                <img alt="" src="<?php echo base_url('assets/images/Testimonials/2.jpg'); ?>" class="img-circle img-responsive"/>
                            </div> 
                            <div class="testimonials col-lg-10"> 
                            <h3>
                            <p>Thank u Sir for taking us to silent resort and giving wonderful memories with JDs ! Wonderful day and unforgettable experience !
</p>- 
                            
                            <small>The Beast</small> </h3> 
                            </div> 

                           
                        </div> 
                        <div class="item"> 
                            <div class="col-lg-2">
                                <img alt="" src="<?php echo base_url('assets/images/Testimonials/3.jpg'); ?>" class="img-circle img-responsive"/>
                            </div> 
                            <div class="testimonials col-lg-10"> 
                                <h3><p>“Regular tests have boosted up confidence in kids before their semester tests. Daily practice is mantra  which JDs  follow it with utmost rigor” 
</p> - <small>The Rock</small> 
                                </h3> 
                            </div> 
                        </div> 
                    </div> 
                    
            
     <a class="left carousel-control" href="#testimonials-row" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#testimonials-row" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>   <div class="clearfix">

                   </div>  
               </div>
               </div>  
           </div> 
       </div> 

                    
                    <!-- About Us -->
<br><br>
<div id="AboutUs">
	<header id="head" class="secondary container">
            <div class="container">
                    <h2>About Us</h2>
            </div>
    </header>
</div>
    <!-- container -->
    <section class="container">
        <div class="row">
            <!-- main content -->
            <section class="col-sm-8 maincontent" style="margin-top: 10px;">
            	
                <h2 style="margin: 0.1em 0.1em 0.4em 0.1em; text-align: center;">Building “Neev” for Future</h2> 

                <img src='<?php echo base_url("assets/images/about.jpg"); ?>' alt="" class="img-rounded pull-right" style="width: 350px;height: 250px;">
                <blockquote>
                    
                   
                <p>
                    “As your child takes steps towards Std. 10th, you do have speculations about his or her performance which being the main reason of providing your child with special coaching which is offered by JDs Tutorials. <br>
                    &emsp;Our objective is to focus on reaching each one with a unique teaching methodology which makes the student to feel learning as a pleasure rather than a pressure. We standing beside them always, make them realize their potential and responsibility and motivate them, guide them constantly to stay on and stick on to their goal.”                
                </p>

                </blockquote>
            </section>
            <!-- /main -->

            <!-- Sidebar -->
            <aside class="col-sm-4 sidebar sidebar-right">  
                <div class="panel">
                    <h3 style="text-align: center;">Announcement</h3>
                    <ul class="list-unstyled list-spaces">
                    <?php 
                    if(isset($AllPublic) && !empty($AllPublic))
                    {
                        foreach ($AllPublic as $public) { ?>
                    
                        <li>
                            <a href="#" data-toggle="modal" data-target="#<?php echo $public->id; ?>" ><?php echo $public->title;?></a>
                            <br>
                            <span class="small text-muted"><?php echo "Date: ".date("d/m/Y",strtotime(str_replace('-','/', $public->date))); ?></span>
                        </li>

                        <!-- Modal -->
                    <div class="modal fade" id="<?php echo $public->id;?>" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    
                                    <h4><?php echo $public->title;?> 

                                        <div style="float:right;">

                                        <?php echo "Date: ".date("d/m/Y",strtotime(str_replace('-','/', $public->date))); ?>
                                        </div></h4>
                                    
                                </div>
                                <div class="modal-body">

                                <?php if($public->photo!='NULL'){ ?>    
                                <center>
                                <img src="<?php echo base_url("/admin/panel/img/Announcement/Public/$public->photo"); ?>" class="img-respnsive" height="200px" width="250px">
                                </center>

                                <br><br>
                                <?php } ?>
                                <p style="font-family: calibri;font-size: 20px;word-wrap: break-word;"><?php echo $public->description; ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                     <?php }} ?>   
                        <li><a href="<?php echo base_url("index.php/Announcement_Controller/PublicAC"); ?>">More Announcements</a><br>
                            <span class="small text-muted"></span></li>
                    </ul>
                </div>

            </aside>
            <!-- /Sidebar -->

        </div>
    </section>

     <!-- Profile of Faculty -->
<br><br>

<div id="Faculty">
    <header id="head" class="secondary container">
            <div class="container">
                    <h2>Faculty</h2>
            </div>
    </header>
</div>

    <section class="team-content">
        <div class="container">
            <br>
            
            <div class="row">

<!-- Dynamic Part -->

<?php  
    if(isset($AllFaculty))
    {
        
        foreach($AllFaculty as $faculty) {
            if($faculty->active==1){
     ?>      
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <!-- Team Member -->
                    
                    <div class="team-member">
                        <!-- Image Hover Block -->
                        <div class="member-img">
                            <!-- Image  -->
                            <img class="img-responsive" src='<?php echo base_url("admin/panel/img/Faculty/$faculty->photo"); ?>' alt="Faculty" style="height: 275px;width:275px;">
                        </div>
                        <!-- Member Details -->
                        
                        <h4><?php echo $faculty->faculty_name; ?></h4>
                        <!-- Designation -->
                        <div>   
                            <b>Degree: </b><?php echo $faculty->degree; ?><br>    
                         <b>Achievments:</b> <?php echo $faculty->achievment; ?>   <br>  
                         <b>Contact No:</b> <?php echo $faculty->contact_no; ?>  <br>    
                         <b>Email: </b><?php echo $faculty->email; ?>  
                        </div>
                    </div>
                </div>

<?php }}
} ?>
<!-- End of Dynamic Part -->

               
            </div>
        </div>
    </section>
    <?php $this->load->view("footer"); ?> 
</body>
</html>
