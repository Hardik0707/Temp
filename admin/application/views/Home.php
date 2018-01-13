<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <?php $this->load->view("head"); ?>
</head>
<body>
    
    <!-- Fixed navbar -->
    <?php $this->load->view("top"); ?> 
    <header id="head" class="secondary" style="height:10px;">
            <div class="container">
                    <h1>Home</h1>
            </div>
    </header>
    <?php $this->load->view("panel"); ?> 

    <!-- <h1>Welcome Hardik</h1> -->
    <?php $this->load->view("footer"); ?>

</body>
</html>    

