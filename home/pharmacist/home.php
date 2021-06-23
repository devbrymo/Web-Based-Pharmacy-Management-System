<?php session_start(); ?>
<html>
<head>
<?php include("bootstrapCss.html"); ?>
<?php include("../includes/mysql_connection_head.php"); ?>
<style>
		.notification{
				  background-image:url("../img/new1.jpg");
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
	 <?php include("header.php"); ?>
	 <?php include("modelWindow.php"); ?>
	 <div class="top-120">
	 <div class="container-fluid">
<div class="row">


				<div class="col-md-3">
				<div class="top-10">
				<h3><a data-toggle="modal" data-toggle="modal" data-target="#addRecord" class="jumbotron btn btn-primary btn-block text-white text-center text-bold">NEW SALE RECORD</a></h3>
				</div>
				</div>
				
				<div class="col-md-3">
				<div class="top-10">
				<h3><a data-toggle="modal" data-toggle="modal" data-target="#addStock" class="jumbotron btn btn-success btn-block text-white text-center text-bold">NEW STOCK ITEM</a></h3>
				</div>
				</div>
				
				<div class="col-md-3">
				<div class="top-10">
				<h3><a data-toggle="modal" data-toggle="modal" data-target="#searchInStock" class="jumbotron btn btn-primary btn-block text-white text-center text-bold">SEARCH IN STOCK</a></h3>
				</div>
				</div> 
				
				<div class="col-md-3">
				<div class="top-10">
				<h3><a href="logout.php" class="jumbotron btn btn-danger btn-block text-white text-center text-bold">LOGOUT</a></h3>
				</div>
				</div>
			


</div>
<br>
<div class="row">
<div class="col-md-4">
<ul class="list-group  text-bold">
			<li class="list-group-item active">ACCOUNT DETAILS</li>
			<li class="list-group-item"><b><i class="glyphicon glyphicon-user"></i> NAME: <?php echo strtoupper($_SESSION["name"]); ?></b></li>
			<li class="list-group-item"><b><i class="glyphicon glyphicon-sunglasses"></i> REGISTRATION NUMBER:  <?php echo strtoupper($_SESSION["regNo"]); ?></b></li>
			<li class="list-group-item"><b><i class="glyphicon glyphicon-user"></i> USERNAME: <?php echo strtoupper($_SESSION["username"]); ?></b></li>
			
</ul>
<div class="b6">
<div class="pad-30 text-center text-bold text-white">

<h3>DATE: <?php echo $date; ?></h3>
<h3>TIME: <?php echo $time; ?></h3>
</div>
</div>
</div>
<div class="col-md-8 notification">


	 <div class="bg-black-fade">
	 <div class="pad-20">
	 <div class="row">
		 <div class="col-md-3">
		 <img src="../img/manager_icon.png" class="img-responsive"  />
		 </div>
		 
		 <div class="col-md-9">
		 <h2 class="text-white text-bold">USER: <?php echo strtoupper($_SESSION["name"]); ?></h2>
		 <h3 class="text-white text-bold">WELCOME TO THE PHARMACY MANAGEMENT SYSTEM</h3>
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
		  
			if(mysqli_num_rows($search)>0){$alert2=true; }
			if(($alert1)||($alert2)){echo notification();} else {echo alertView();} ?>
		 </div>
		 
	 </div>
	 </div>

</div>

</div>
</div>
</div>
</div>

<?php include("functions.php"); ?>	
<?php if(isset($_POST["addToStock"])){$message=addToStock($connection); processMessagePopUp($message);} ?>
 
</body>
</html>
<?php
	function notification(){
	return "<div class='alert alert-warning'>
	<h4 class='text-center'>Alert !!!</h4>
	<h3 class='text-center'>New Notification</h3>
	<center><a class='btn btn-lg btn-danger' href='notification.php'>
	Click Here To View
	</a></center>
	</div>";}
	
	
	function alertView(){
	return "<div class='alert alert-info'>
	<h4 class='text-center'>Take Note Pharmacist</h4>
	<h3 class='text-center'>Notifications Would Be Displayed Here</h3>
	<center><a class='btn btn-lg btn-success' target='_blank' href='../calculator.php'>
	Click Here To Use A Calculator
	</a></center>
	</div>";}
	
?>