<?php session_start(); ?>
<html>
<head>
	<title>Pharmacy Management System</title>
	<?php include("includes/bootstraphead.html"); ?>
	<?php include("includes/mysql_connection_head.php"); ?>
	<style>
		body{
				  background-image:url("img/new1.jpg");
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

<body>

	<div class="container ">
	<div class="position-70 bg-black-fade pad-20 " style="height:100%">
	
	<h1 class="text-center text-gold top-50"><i class="glyphicon glyphicon-lock"></i> ACCOUNT LOGIN</h1>
	<h2 class="text-center text-bold text-white">PHARMACY MANAGEMENT SYSTEM</h2>
	<center>
	<div class="row bg-black-fade pad-30 top-10">
	<div class="col-md-6">
	<a data-toggle="modal" data-target="#admin" class="btn">
		<img src="image/login.png" class="img responsive img-thumbnail" /></a>
		<h3 class="text-white text-bold">ADMINISTRATOR</h3>
	</div>
	<div class="col-md-6">
	<a data-toggle="modal" data-target="#pharmacist" class="btn">
	<img src="img/pharmacist.png" class="img responsive img-thumbnail" /></a>
	<h3 class="text-white text-bold">PHARMACIST</h3>
	</div>
	</div>
	</center>
	
	<?php include("modelLogin.php"); ?>
	<?php
					
					if(isset($_POST["adminPost"])){
					$admin=$_POST["username"];
					$pass=$_POST["password"];
					$query=mysqli_query($connection,"SELECT * FROM adminData WHERE username='{$admin}' AND password='{$pass}' ");
					$get=mysqli_fetch_array($query);
					if(mysqli_num_rows($query)>0){
						$_SESSION["name"]=$get["adminName"];
						$_SESSION["username"]=$get["username"];
						$_SESSION["key"]=$get["password"];
						$_SESSION["id"]=$get["adminId"];
						
						echo "<script>window.location.href='admin/home.php'</script>";
						exit();
					}
					else{echo "<div class='alert alert-warning top-10'><p>Invalid Username Or Password</p></div>";}
					}
	?>
	
	<?php
					
					if(isset($_POST["pharmacistPost"])){
					$admin=$_POST["username"];
					$pass=$_POST["password"];
					$query=mysqli_query($connection,"SELECT * FROM pharmacyDb WHERE username='{$admin}' AND password='{$pass}' ");
					$get=mysqli_fetch_array($query);
					if(mysqli_num_rows($query)>0){
						$_SESSION["name"]=$get["name"];
						$_SESSION["username"]=$get["username"];
						$_SESSION["regNo"]=$get["regNo"];
						echo "<script>window.location.href='pharmacist/home.php'</script>";
						exit();
					}
					else{echo "<div class='alert alert-warning top-10'><p>Invalid Username Or Password</p></div>";}
					}
	?>
	<marquee>
	<h3 class="text-center text-bold text-gold">FEDERAL UNIVERSITY DUTSINMA KATSINA</h3>
	</marquee>
	
	</div>
	</div>

</body>

</html>