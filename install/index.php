<?php include("database.php"); ?>
<html>
<head>
<!--Bootstrap Style-->

	<!--Bootstrap Css-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../home/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../home/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../home/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="../home/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    
	
	<!--Bootsrap Script-->
	<script src="../home/bootstrap/js/jquery.min.js"></script>
	<script src="../home/bootstrap/js/transition.js"></script>
	<script src="../home/bootstrap/js/modal.js"></script>
	<script src="../home/bootstrap/js/tooltip.js"></script>
	<script src="../home/bootstrap/js/popover.js"></script>
	<script src="../home/bootstrap/js/collapse.js"></script>
	<script src="../home/bootstrap/js/bootstrap.js"></script>
	<script src="../home/bootstrap/js/bootstrap.min.js"></script>

   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../home/bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="../home/css/colors.css" rel="stylesheet">
    <link href="../home/css/custom.css" rel="stylesheet">
	<link href="../home/css/CssBox.css" rel="stylesheet">
	<style>
		body{
				  background-image:url("../home/img/new2.jpg");
				  background-repeat: no-repeat;
				  background-attachment: fixed;
				  background-position: center center;
				  -webkit-background-size: cover;
				  -moz-background-size: cover;
				  background-size: cover;
				  -o-background-size: cover;
			}
	</style>
	
	</head>
	
	<body >
	<?php if(!isset($_POST["install"]))
	{
	?>
	<div class="container">
	
	<div class="position-540 bg-black-fade top-30">
	<div class="pad-30">
	<center><img src="../home/img/prescri.jpg" class="img-responsive img-thumbnail" width="50%" /></center>
	<h2 class="text-center text-bold text-gold">PHARMACY MANAGEMENT SYSTEM</h2>
	
	<h2 class="text-center text-white">Database One Time Installation</h2>
	<form action="index.php" method="POST"><center><button class="btn btn-success btn-lg " type="submit" name="install">Install Database</button></center></form>
	
	
	
	</div>
	</div>
	
	</div>
	<?php
	}
	?>
	<?php

if(isset($_POST["install"]))
{
$query="";
$sqlScript=file('../home/includes/pharmacydb.sql');
foreach($sqlScript as $line)
{
	$startWith=substr(trim($line),0,2);
	$endWith=substr(trim($line),-1,1);
	
	if(empty($line)||$startWith=='-'||$startWith=='/*'||$startWith=='//'){continue;}
	$query=$query.$line;
	
	if($endWith==';'){
		$done=mysqli_query($cn,$query)or die("Error" .mysqli_error($cn));
		$query="";
	}
}
	if($done)
	{
	?>
	<div class="container">
	
	<div class="position-520 bg-black-fade top-30">
	<div class="pad-30">
	<center><img src="../home/img/prescri.jpg" class="img-responsive img-thumbnail" width="50%" /></center>
	<h2 class="text-center text-bold text-gold">PHARMACY MANAGEMENT SYSTEM</h2>
	
	<div class="alert alert-success">Installation Complete</div>
	<form action="index.php" method="POST"><center><button class="btn btn-success btn-lg " type="submit" name="finish">Click Here To Start</button></center></form>
	
	
	
	</div>
	</div>
	
	</div>
	<?php
	}

}

?>
<?php	if(isset($_POST["finish"])){header("Location: ../home/index.php"); exit(); } ?>
	</body>
</html>


