<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <script type='text/javascript' src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src='<?php echo base_url("assets/js/bootstrap.min.js"); ?>'></script> 
    <script type='text/javascript' src="<?php echo base_url('assets/js/fancybox/jquery.fancybox.pack.js'); ?>"></script>
    
    <script type='text/javascript' src="<?php echo base_url('assets/js/jquery.mobile.customized.min.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('assets/js/jquery.easing.1.3.js'); ?>"></script> 
    <script type='text/javascript' src="<?php echo base_url('assets/js/camera.min.js'); ?>"></script> 
    <script src='<?php echo base_url("assets/js/modernizr-latest.js"); ?>'></script> 
    <script src='<?php echo base_url("assets/js/custom.js"); ?>'></script>

    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery(".AboutUs").click(function() {
                
                jQuery('html, body').animate({
                    scrollTop: jQuery("#AboutUs").offset().top
                }, 6000);
            });

             jQuery(".Faculty").click(function() {
                jQuery('html, body').animate({
                    scrollTop: jQuery("#Faculty").offset().top
                }, 6000);
            });
        });

        
    </script>

