<?php session_start(); ?>
<html>
<head>
<?php include("bootstrapCss.html"); ?>
<?php include("../includes/mysql_connection_head.php"); ?>

</head>
	 
<body>
	 <?php include("header.php"); ?>
	 
<div class="container top-120">
	 
	 <div class="position-90 top-50 bg-black-fade">
	 <div class="pad-20">
	 <div class="row">
		 <div class="col-md-3">
		 <img src="../img/admin_icon.jpg" class="img-responsive"  />
		 <?php if(isset($_POST["addAccount"])){echo addAccount($connection);} ?>
		 <?php if(isset($_POST["deleteAccount"])){echo deleteAccount($connection);} ?>
		 <?php if(isset($_POST["updateProfile"])){echo updateProfile($connection);} ?>
		 
		  <?php 
		  $searchDate=mysqli_query($connection,"SELECT expiryDate FROM stock");
		  $affectedRows=0; $alert1=false; $alert2=false;
			while($getDate=mysqli_fetch_array($searchDate)){
				$date1=date_create($date);
				$getDates=$getDate["expiryDate"];
				$date2=date_create($getDates);
				$diff=date_diff($date1,$date2); $dateDiff=$diff->format('%a');
				if($dateDiff < 10){$affectedRows++;}
				}
			if($affectedRows>0){$alert1=true;}
		?>
		
		 <?php $search=mysqli_query($connection,"SELECT * FROM stock WHERE quantity < 10");
			if(mysqli_num_rows($search)>0){$alert2=true;}
			if(($alert1)||($alert2)){echo notification();} ?>
		 </div>
		 <div class="col-md-9">
		 <h2 class="text-white text-bold">USER: <?php echo strtoupper($_SESSION["name"]); ?></h2>
		 <h3 class="text-white text-bold">WELCOME TO THE PHARMACY MANAGEMENT SYSTEM</h3>
		 <div class="row">


				<div class="col-md-3">
				<div class="top-10">
				<a data-toggle="modal" data-toggle="modal" data-target="#addAccount" class="pad-10 btn btn-primary btn-block text-white text-center text-bold"><h3 class="pad-10"><i class="glyphicon glyphicon-plus"></i> Add <br>Pharmacist <br>Account</h3><a>
				</div>
				</div>
				
				<div class="col-md-3">
				<div class="top-10">
				<a data-toggle="modal" data-toggle="modal" data-target="#viewAccount" class="pad-10 btn btn-success btn-block text-white text-center text-bold"><h3 class="pad-10"><i class="glyphicon glyphicon-eye-open"></i> View<br>Pharmacist <br>Account</h3></a>
				</div>
				</div>
				
				<div class="col-md-3">
				<div class="top-10">
				<a href="stock.php" class="pad-10 btn btn-primary btn-block text-white text-center text-bold"><h3 class="pad-10"><i class="glyphicon glyphicon-eye-open"></i> View<br>Items <br>In Stock</h3></a>
				</div>
				</div> 
				
				<div class="col-md-3">
				<div class="top-10">
				<a data-toggle="modal" data-toggle="modal" data-target="#searchInStock" class="pad-10 btn btn-success btn-block text-white text-center text-bold"><h3 class="pad-10"><i class="glyphicon glyphicon-search"></i> Search<br>For An Item<br>In Stock</h3></a>
				</div>
				</div> 
			


	</div>
	
	<div class="row">


				<div class="col-md-4">
				<div class="top-10">
				<a data-toggle="modal" data-toggle="modal" data-target="#viewSale" class="pad-10 btn btn-info btn-block text-white text-center text-bold"><h3 class="pad-10"><i class="glyphicon glyphicon-calendar"></i> View Sales</h3><a>
				</div>
				</div>
				
				<div class="col-md-4">
				<div class="top-10">
				<a data-toggle="modal" data-toggle="modal" data-target="#viewAnalysis" class="pad-10 btn btn-success btn-block text-white text-center text-bold"><h3 class="pad-10"><i class="glyphicon glyphicon-scale"></i> Sale Analysis</h3><a>
				</div>
				</div>
				
				<div class="col-md-4">
				<div class="top-10">
				<a href="../calculator.php" target="_blank" class="pad-10 btn btn-warning btn-block text-white text-center text-bold"><h3 class="pad-10"><i class="glyphicon glyphicon-equalizer"></i>Use Calculator</h3></a>
				</div>
				</div>
				
				 
			


	</div>
		 </div>
	 </div>
	 </div>

</div>
</div>
<?php include("modelWindow.php"); ?>

</body>
</html>
<?php

function addAccount($connection){
	$name=$_POST["name"]; $regNo=$_POST["regNo"]; $username=$_POST["username"]; $password=$_POST["password"];
	$sql="INSERT INTO pharmacyDb SET name='{$name}', regNo='{$regNo}', username='{$username}', password='{$password}'";
	$postAccount=mysqli_query($connection,$sql);
	if($postAccount){ return "<div class='alert alert-success'>Success, Account Created</div>";}
	else{ return "<div class='alert alert-danger'>Error, Account Not Created</div>";}
	
}

function deleteAccount($connection){
	$deleteId=(int) $_POST["deleteAccount"];
	$sql="DELETE FROM pharmacyDb WHERE id={$deleteId}";
	$deleteAccount=mysqli_query($connection,$sql);
	if($deleteAccount){ return "<div class='alert alert-success'>Success, Account Deleted</div>";}
	else{ return "<div class='alert alert-danger'>Error, Account Not Deleted</div>";}
	
}

function notification(){
	return "<div class='alert alert-warning'>
	<h4 class='text-center'>Alert !!!</h4>
	<h3 class='text-center'>New Notification</h3>
	<a class='btn btn-lg btn-danger' href='notification.php'>
	Click Here To View
	</a></div>";}
	
	
function updateProfile($connection){
		 $name=$_POST["name"];
		 $admin=$_POST["adminUsername"];
		 $key=$_POST["adminKey"];
		 
		 $updateQuery=mysqli_query($connection,"UPDATE adminData SET adminName='{$name}',username='{$admin}',password='{$key}' WHERE adminId=1");
		 if($updateQuery){$_SESSION["name"]=$name; $_SESSION["username"]=$admin;
		 $_SESSION["key"]=$key;
			 return "<p class='lead text-center bg-white text-bold text-success'>Success, Profile Updated</p>";}
	}



?>