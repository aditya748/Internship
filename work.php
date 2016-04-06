<?php
include('connection.php');
session_start(); ?>
<!doctype html>
<html>
<head>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/cook.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/social.css">

</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
     <button type="button" class="navbar-toggle pull-left"  data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><img src="aa.png" height="80px" width="100px" style="margin-top:-30px"/></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php
		if(empty($_SESSION['user'])){
	   ?>
	   <li><a href="index.php">Home</a></li>
	   <?php
		}
		else{
	   ?>
	   <li><a href="index.php">Home</a></li>
	   <?php
		}
	   ?>
        
        <li class="active"><a href="work.php">How It Works</a></li>
      </ul>
     
    </div>
  </div>
</nav>
 <div class="container">
 <img src="images/yfoodworks.png" class="img-responsive" alt="Responsive image">
 </div>

</body>
</html>