<?php session_start(); ?>
<html>
<head>
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
<nav class="navbar navbar-inverse navbar-fixed-top " >
<div class="pad-10 bg-black-fade">
	<div class="container-fluid">
	<div class="rows">
	<div class="col-md-1">
		<img src="img/logoAuk.png" class="img-responsive" width="85%"/>
	</div>
	<div class="col-md-10">
		<h2 class="text-white">AL-QALAM UNIVERSITY KATSINA PHARMACY MANAGEMENT SYSTEM</h2>
	</div>
	<div class="col-md-1">
		<h2 class=""></h2>
	</div>
	</div>
	</div>
</div>
</nav>	 
	 
<div class="container top-120">
<div class="row">
		<div class="col-md-6">
			<?php 
			
			$search=mysqli_query($connection,"SELECT * FROM stock WHERE quantity < 10");
			echo "
			<div class='alert alert-info'>
			<h2 class='text-bold'>The Following Drugs Are Limited In Stock</h2>
				<table class='table table-bordered bg-white'>
					<tr>
					<th>Id</th>
					<th>Drug Name</th>
					<th>Price</th>
					<th>Expiry Date</th>
					<th>Quantity</th>
					<th>Edit</th>
					</tr>
				";
				while($get = mysqli_fetch_array($search)){

					echo"
					
					<tr>
					<td>{$get["id"]}</td>
					<td>{$get["name"]}</td>
					<td>{$get["price"]}</td>
					<td>{$get["expiryDate"]}</td>
					<td>{$get["quantity"]}</td>
					<td><form action='pharmacist/editStockItem.php' method='post'>
					<button class='btn btn-primary btn-block' value='{$get["id"]}' name='editStockItem'>
					<i class='glyphicon glyphicon-edit'></i></button></form></td>
					</tr>
					";
				}
				echo "</table> </div>";
				
			
			?>
		</div>
		
				<div class="col-md-6">
			<?php 
			
			$search=mysqli_query($connection,"SELECT * FROM stock WHERE quantity < 10");
			echo "
			<div class='alert alert-info'>
			<h2 class='text-bold'>The Following Drugs Are About To Expire</h2>
				<table class='table table-bordered bg-white'>
					<tr>
					<th>Id</th>
					<th>Drug Name</th>
					<th>Price</th>
					<th>Expiry Date</th>
					<th>Quantity</th>
					<th>Edit</th>
					</tr>
				";
				while($get = mysqli_fetch_array($search)){

					echo"
					
					<tr>
					<td>{$get["id"]}</td>
					<td>{$get["name"]}</td>
					<td>{$get["price"]}</td>
					<td>{$get["expiryDate"]}</td>
					<td>{$get["quantity"]}</td>
					<td><form action='pharmacist/editStockItem.php' method='post'>
					<button class='btn btn-primary btn-block' value='{$get["id"]}' name='editStockItem'>
					<i class='glyphicon glyphicon-edit'></i></button></form></td>
					</tr>
					";
				}
				echo "</table> </div>";
				
			
			?>
		</div>

</div>
</div>
<?php //include("modelWindow.php"); ?>

</body>
</html>
