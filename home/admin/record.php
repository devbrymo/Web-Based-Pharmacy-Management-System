<?php session_start(); ?>
<html>
<head>
<?php include("bootstrapCss.html"); ?>
<?php include("../includes/mysql_connection_head.php"); ?>
</head>
	 
<body>
	 <?php //include("header.php"); ?>
	 
	 <div class="top-40">
	 <div class="container-fluid">
	<?php if(isset($_POST["addSaleRecord"])){
		//Get Data From Form
		$drugName=$_POST["drugName"];	$quantity=$_POST["quantity"];
		$price=$_POST["priceSold"];	$date=$_POST["dateSold"]; $usage=$_POST["usage"];
		//Get Quantity From Stock
		$sql1=mysqli_query($connection,"SELECT id, quantity from stock WHERE name LIKE '%$drugName%'");
		
		$getQuantity=mysqli_fetch_array($sql1);
		$newQuantity=$getQuantity["quantity"]-$quantity;
		//Update Quantity
		$postNewQuantity=mysqli_query($connection,"UPDATE stock set quantity=$newQuantity WHERE id={$getQuantity["id"]}");
		//Insert Sale Record
		if($postNewQuantity){
		$query="INSERT INTO saleRecord SET name='{$drugName}', quantity='{$quantity}',"
		."price='{$price}', dateSold='{$date}', drugUsage='{$usage}'";
		$sql2=mysqli_query($connection,$query);
		}
		else{$sql1=false; $sql2=false; $postNewQuantity=false;}
	if(($sql1)&&($sql2)&&($postNewQuantity)){
	?>
	<div class="position-60 well">
	<h3 class="text-bold text-center">AL-QALAM UNIVERSITY PHARMACY</h3>
	<h2 class="text-bold text-center">PAYMENT RECEIPT</h2>
	
	<table class="table table-bordered table-striped">
		<tr>
		<td><b>Drug Name:</b></td>
		<td><?php echo $drugName; ?>
		</tr>
		
		<tr>
		<td><b>Quantity:</b></td>
		<td><?php echo $quantity; ?>
		</tr>
		
		<tr>
		<td><b>Price:</b></td>
		<td><?php echo $price . " Naira"; ?>
		</tr>
		
		<tr>
		<td><b>Date:</b></td>
		<td><?php echo $date; ?>
		</tr>
		
		<tr>
		<td><b>Receipt Id:</b></td>
		<td>
		<?php $getId=mysqli_fetch_array(mysqli_query($connection,"SELECT id FROM saleRecord ORDER BY id DESC LIMIT 1"));
				echo $getId["id"]; ?>
		</tr>
		
		<tr>
		<td><b>Prescription:</b></td>
		<td><?php echo $usage; ?>
		</tr>
	</table>
	<a href="home.php" class="btn btn-primary">Go Back Home</a>
	<a onClick="print()" class="btn btn-primary">Print</a>
	</div>
	
	<?php
	}
	else
	{
	?>
	
	<div class="position-540">
	<div class=" top-50 alert alert-warning">
	<h3 class="text-bold text-center">An Error Has Occured, The System Could Not Find The Name Of The Drug In Stock, Try Again</h3>
	<center><a href="home.php" class="btn btn-danger btn-lg btn-block">Go Back Home</a></center> </div>
	</div>
	<?php
	}
	}	?>
	</div>
	</div>

</body>
</html>