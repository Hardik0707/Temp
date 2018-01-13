<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="favicon" href="assets/images/favicon.png">
  <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
  <link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen"> 
  <link rel="stylesheet" href="assets/css/style.css">
    <link rel='stylesheet' id='camera-css'  href='assets/css/camera.css' type='text/css' media='all'> 


<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 110px;
    left: 0;
    background-color: #e9e9f3bd;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 22px;
    color: #3d84e6;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

.list-group-item {
  background-color: transparent !important;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.container {
  width: 1366px;
  margin-left: 0px;
  margin-right: 0px;
  padding-left: 0px;
  padding-right: 0px;
}

.btn {
  background-color: #004b8f;
}
.dropdown {
  margin-top: 26px;
  margin-right: 29px;
}

</style>
</head>
<body style="background-color: #3d84e6;">


   <div class="navbar navbar-inverse" style="padding-top: 0px;">
        <div class="container">
            <div class="navbar-header">
                    <img src="assets/images/logo3.jpg" style="width: 184px; height: 110px;">
            </div>
            <!-- <div class="dropdown">
                |<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="float: right;"> Welcome User
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Logout</a></li>
                  </ul>
            </div> -->
            <a href="#" class="btn btn-info" role="button" style="float: right; right;margin-right: 28px;margin-top: 30px;">Logout</a>
            <!--  <a href="#" class="btn btn-info" role="button" style="float: right;">Logout</a> -->
            <h1>&nbsp; JD's Tutorial</h1>
           <!--  <a href="#" class="btn btn-info" role="button" style="float: right;">Logout</a> -->
           <!-- <button name="logout" style="float: right;">Logout</button> -->
        </div>
 </div>

<div id="mySidenav" class="sidenav" style="padding-top: 50px;">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"  style="padding-top: 0px;
    right: 10px;">&times;</a>


  <div class="list-group">
  <a class="list-group-item" href="#"><i class="fa fa-tachometer fa-fw" aria-hidden="true"></i>&nbsp; Dashboard</a>
  <a class="list-group-item" href="#"><i class="fa fa-level-up fa-fw" aria-hidden="true"></i>&nbsp; Toppers</a>
  <a class="list-group-item" href="#"><i class="fa fa-book fa-fw" aria-hidden="true"></i>&nbsp; Subjects</a>
  <a class="list-group-item" href="#"><i class="fa fa-sort-amount-asc fa-fw" aria-hidden="true"></i>&nbsp; Standards</a>
  <a class="list-group-item" href="#"><i class="fa fa-user-md fa-fw" aria-hidden="true"></i>&nbsp; Faculty</a>
  <a class="list-group-item" href="#"><i class="fa fa-user fa-fw" aria-hidden="true"></i>&nbsp; Students</a>
  <a class="list-group-item" href="#"><i class="fa fa-link fa-fw" aria-hidden="true"></i>&nbsp; Branch</a>
  <a class="list-group-item" href="#"><i class="fa fa-th fa-fw" aria-hidden="true"></i>&nbsp; Results</a>
   
<!-- <li class="active">
                        <a href="#"><i class="fa fa-desktop "></i> Schedule</a>
                        <ul class="nav nav-second-level collapse in" style="height: auto;">
                            <li>
                                <a href="http://adevole.com/clients/mediamaggi/tuition_dev/admin/index.php/ScheduleController/AddSchedule"><i class="fa fa-plus "></i>Add Schedule</a>
                            </li>
                            <li>
                                <a href="http://adevole.com/clients/mediamaggi/tuition_dev/admin/index.php/ScheduleController/GetData"><i class="fa fa-eye "></i>View Schedule</a>
                            </li>
                        </ul>
                    </li>
 -->
   <a class="list-group-item" href="#"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>&nbsp; Add Schedule </a>
   <a class="list-group-item" href="#"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>&nbsp; View Schedule </a>
  <!-- <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="schedule" data-toggle="dropdown"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Schedule
    <!- <span class="caret"></span></button> ->
    <ul class="dropdown-menu" role="menu" aria-labelledby="schedule">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Add Schedule</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>
    </ul>
  </div>
    </a> -->
</div>
</div>

<div id="main">
  <span style="font-size:25px; color :#ffff; cursor:pointer" onclick="openNav()">&#9776; Home</span>
</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>
     
</body>
</html> 
