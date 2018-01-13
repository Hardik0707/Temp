<!DOCTYPE>
<html>
<head>
	<title>JD Tutorial</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="JD Tutorial">
	<meta name="author" content="JD.com">
	<?php $this->load->view("head"); ?>
    

        <style type="text/css">


    .carousel indicator{

        border: 1px solid black;    
    }

    .testimonials h3{margin-top:15px; }
    
    #camera_wrap_4,#head
    {
    height: 400px !important;
    }

    @media (max-width: 420px){
    #camera_wrap_4, #head
     {
    height: 300px !important;
    }     
    }

    #head.secondary{
        height: 100px !important;
    }

    </style>
</head>
<body>
	
	<?php $this->load->view("navbar"); ?>
	<?php $this->load->view("slider"); ?>  


    <br><br>   
    <!-- Testimonials -->

    <header id="head" class="secondary">
            <div class="container">
                    <h2>Testimonials</h2>
            </div>
    </header>    


    <div class="container" id="testimonials-row"> 
        <div class="row"> 
            <div class="col-md-12 column"> 
                <h2 class="page-header" style="text-align:center;"> 
                    <small>Our Students Love Us!</small>
                </h2>

                <div class="carousel slide" id="testimonials-rotate"> 
                    <div class="carousel-inner"> 
                        <div class="item active">   
                            <div class="col-lg-2">
                                <img alt="" src="<?php echo base_url('assets/images/Testimonials/1.jpg'); ?>" class="img-circle img-responsive"/>
                            </div> 
                            <div class="testimonials col-lg-10"> 
                                <h3><p>Stay positive and happy. Work hard and don't give up hope. Be open to criticism and keep learning. Surround yourself with happy, warm and genuine people
                                 Stay positive and happy. Work hard and don't give up hope. Be open to criticism and keep learning. Surround yourself with happy, warm and genuine people</p>
                                
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
                            <p>Stay positive and happy. Work hard and don't give up hope. Be open to criticism and keep learning. Surround yourself with happy, warm and genuine people
                            Stay positive and happy. Work hard and don't give up hope. Be open to criticism and keep learning. Surround yourself with happy, warm and genuine people </p>- 
                            
                            <small>The Beast</small> </h3> 
                            </div> 

                           
                        </div> 
                        <div class="item"> 
                            <div class="col-lg-2">
                                <img alt="" src="<?php echo base_url('assets/images/Testimonials/3.jpg'); ?>" class="img-circle img-responsive"/>
                            </div> 
                            <div class="testimonials col-lg-10"> 
                                <h3><p>Stay positive and happy. Work hard and don't give up hope. Be open to criticism and keep learning. Surround yourself with happy, warm and genuine people
                            Stay positive and happy. Work hard and don't give up hope. Be open to criticism and keep learning. Surround yourself with happy, warm and genuine people</p> - <small>The Rock</small> 
                                </h3> 
                            </div> 
                        </div> 
                    </div> 
                    
                
                

                <!-- <ol class="carousel-indicators"> 
                        <li class="active" data-slide-to="0" data-target="#testimonials-rotate"> 
                        </li> 
                        <li data-slide-to="1" data-target="#testimonials-rotate"> 
                        </li> 
                        <li data-slide-to="2" data-target="#testimonials-rotate"> 
                        </li> 
                </ol>  -->
                <div class="pull-right">
                   <a class="left" href="#testimonials-rotate" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> 
                   <a class="right" href="#testimonials-rotate" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                   </a>
                   <div class="clearfix">

                   </div>  
               </div>
               </div>  
           </div> 
       </div> 
   </div><!--end of container-->

                    
                    <!-- About Us -->
<br><br>
<div id="AboutUs">
	<header id="head" class="secondary">
            <div class="container">
                    <h2>About Us</h2>
            </div>
    </header>
</div>
    <!-- container -->
    <section class="container" >
        <div class="row">
            <!-- main content -->
            <section class="col-sm-8 maincontent">
            	<center><h2>Turn A Setback Into A Comeback</h2>
                <!-- <h3>About Us</h3> -->
                  <br><br>
                    <img src='<?php echo base_url("assets/images/about.jpg"); ?>' alt="" class="img-rounded pull-right" width="350">
                      
                    <p>
                    Nevertheless, we immensely value our traditional ethos and systems of education. MaggieMedia through the adoption of methods of teaching and syllabus of national and state Examination Boards. The essence of our success is not only in our best quality of our teacher, our institute and culture centers, our education hub, our modern infrastructure… but also because “we care”. We have a best and well qualified teachers staff for making your children future brighter.
                </p>
                </center>
                
            </section>
            <!-- /main -->

            <!-- Sidebar -->
            <aside class="col-sm-4 sidebar sidebar-right">

                <div class="panel">
                    <h4>Latest News</h4>
                    <ul class="list-unstyled list-spaces">
                        <li><a href="">Upcoming Exams</a><br>
                            <span class="small text-muted">Date:12/01/18-Std:4-Sucject:English.</span></li>
                        <li><a href="">Anouncement</a><br>
                            <span class="small text-muted">Date:13/01/2018-Lectures Cancel For std 5</span></li>
                        <li><a href="">Holidays</a><br>
                            <span class="small text-muted">Date:14/01/2018-Holiday</span></li>
                        <li><a href="">Change in Schedule</a><br>
                            <span class="small text-muted">For std 5:Lectures of 17/01/18 will be conducted on 20/01/2018</span></li>
                        <li><a href="">Other Announcement</a><br>
                            <span class="small text-muted"></span></li>
                    </ul>
                </div>

            </aside>
            <!-- /Sidebar -->

        </div>
    </section>
    <section class="team-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Our Team</h3>
                    <p></p>
                    <br />
                </div>
            </div>
            <div class="row">

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <!-- Team Member -->
                    <div class="team-member">
                        <!-- Image Hover Block -->
                        <div class="member-img">
                            <!-- Image  -->
                            <img class="img-responsive" src='<?php echo base_url("assets/images/photo-1.jpg"); ?>' alt="">
                        </div>
                        <!-- Member Details -->
                        <h4>John Doe</h4>
                        <!-- Designation -->
                        <span class="pos">CEO</span>
                        <div class="team-socials">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <!-- Team Member -->
                    <div class="team-member pDark">
                        <!-- Image Hover Block -->
                        <div class="member-img">
                            <!-- Image  -->
                            <img class="img-responsive" src='<?php echo base_url("assets/images/photo-2.jpg"); ?>' alt="">
                        </div>
                        <!-- Member Details -->
                        <h4>Larry Doe</h4>
                        <!-- Designation -->
                        <span class="pos">Director</span>
                        <div class="team-socials">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <!-- Team Member -->
                    <div class="team-member pDark">
                        <!-- Image Hover Block -->
                        <div class="member-img">
                            <!-- Image  -->
                            <img class="img-responsive" src='<?php echo base_url("assets/images/photo-3.jpg"); ?>' alt="">
                        </div>
                        <!-- Member Details -->
                        <h4>Ranith Kays</h4>
                        <!-- Designation -->
                        <span class="pos">Manager</span>
                        <div class="team-socials">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <!-- Team Member -->
                    <div class="team-member pDark">
                        <!-- Image Hover Block -->
                        <div class="member-img">
                            <!-- Image  -->
                            <img class="img-responsive" src='<?php echo base_url("assets/images/photo-4.jpg"); ?>' alt="">
                        </div>
                        <!-- Member Details -->
                        <h4>Joan Ray</h4>
                        <!-- Designation -->
                        <span class="pos">Creative</span>
                        <div class="team-socials">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view("footer"); ?> 

</body>
</html>