<?php
$graph_colors = array("#DC143C","#00008B","#006400","#20B2AA","#FFA500","#8B4513","#6A5ACD","#800080","#cffa1b","#fe3bcc","#45d7f3","#04e2cd","#ec4a68","#703be8");
?>
<!DOCTYPE HTML>
<html>
<head>
  <?php $this->load->view("head") ?>

  <title>Faculty Dashboard</title>

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
     .contact_info{
        float:right;text-align: center;padding-top:3rem;margin-right: 05px;
    }    
    .contact_info span{
        background: #3d84e6;color:#fff;font-size: 16px; height:35px;border-radius: 6px 6px 6px 6px;padding:5px;margin-top: 05px;margin-left:0px;font-family:'Lato', sans-serif;
    }
         #head.secondary{
        min-height: 40px;
        height: 40px !important;
        margin-top:10px;
        padding-bottom: 25px;
    }
    </style>
</head>
<body>
  <div class="wrapper">
    <?php $this->load->view('navbar') ?>

    <!-- page header -->

    <header id="head" class="secondary">
        <h2>Search Result Form</h2>
    </header>
    <!--end page header -->
    <div class="container">


     <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-6" style="margin-top: 25px;">
        <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/Faculty_Controller/SearchResults') ?>">
          <div class="form-group">
            <label>Select Standard</label>
            <select class="form-input form-control standard" name="standard" id="standard">
              <option>Select Standard</option>
              <?php foreach($FacultyTeaches as $standard) { ?>
              <option value="<?php echo $standard->standard_id; ?>"><?php echo $standard->standard; ?></option>
              <?php } ?>
            </select>
            <input type="hidden" name="standard_name" id="standard_name" value="">
          </div>
          <div class="form-group">
            <label>Select Subject</label>
            <select class="form-input form-control" name="subject" id="subject">
              <option>Select Standard First</option>
            </select>
          </div>
          <input type="submit" class="btn btn-default" value="Submit" name="SearchResults">
        </form>
      </div>
    </div>
  </div>
  <?php $this->load->view('Dashboard_footer'); ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/responsiveslides.min.js"); ?>"></script>
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
<script type="text/javascript">
  $(document).ready(function (e){
    jQuery(document).on('change', ".standard", function(){
      var standard = $(this).val();
                      var text = $(this).find("option:selected").text(); //only time the find is required
                      //var name = $(this).attr('name');
                      var id = $(this).attr('id');
                      //alert(standard+" "+id);
                      $.post("<?php echo base_url(); ?>index.php/Faculty_Controller/FetchSubjects/", {id: standard}, function(data) {
                        console.log(data);
                          //$(this).closest("#subject").html(data);
                          $('#subject').html(data);
                        });
                      $('#standard_name').val(text);
                    });
  });
</script>


</body>
</html>