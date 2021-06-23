<?php session_start(); ?>
<html>
<head>
<?php include("bootstrapCss.html"); ?>
<?php include("../includes/mysql_connection_head.php"); ?>
<style>
		body{
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
	 
<div class="container top-120">
<div class="row top-30">
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
			if(mysqli_num_rows($search)>0){
				while($get = mysqli_fetch_array($search)){

					echo"
					
					<tr>
					<td>{$get["id"]}</td>
					<td>{$get["name"]}</td>
					<td>{$get["price"]}</td>
					<td>{$get["expiryDate"]}</td>
					<td>{$get["quantity"]}</td>
					<td><form action='editStockItem.php' method='post'>
					<button class='btn btn-primary btn-block' value='{$get["id"]}' name='editStockItem'>
					<i class='glyphicon glyphicon-edit'></i></button></form></td>
					</tr>
					";
				}
			}
				else{ echo defaultScreen();}
				echo "</table> </div>";
				
			
			
			
			?>
		</div>
		
				<div class="col-md-6">
			<?php 
			$searchDate=mysqli_query($connection,"SELECT * FROM stock");
			$affectedRows=0; 
			
			echo "
			<div class='alert alert-info'>
			<h2 class='text-bold'>The Following Drugs Are Close To Expiry Date</h2>
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
				$show=true;
				while($getDate=mysqli_fetch_array($searchDate)){
				$date1=date_create($date);
				$getDates=$getDate["expiryDate"];
				$date2=date_create($getDates);
				$diff=date_diff($date1,$date2); $dateDiff=$diff->format('%a');
				if($dateDiff < 10){
					$show=false;
					echo"
					
					<tr>
					<td>{$getDate["id"]}</td>
					<td>{$getDate["name"]}</td>
					<td>{$getDate["price"]}</td>
					<td>{$getDate["expiryDate"]}</td>
					<td>{$getDate["quantity"]}</td>
					<td><form action='editStockItem.php' method='post'>
					<button class='btn btn-primary btn-block' value='{$getDate["id"]}' name='editStockItem'>
					<i class='glyphicon glyphicon-edit'></i></button></form></td>
					</tr>
					";
					}
					
				}
				if($show){echo defaultScreen2();}
				echo "</table> </div>";
				
			
			?>
		</div>

</div>
</div>
<?php //include("modelWindow.php"); ?>

</body>
</html>

<?php

function defaultScreen(){
	
	return "<div class='well'><h3>No LImited Items In Stock</h3></div>";
}

function defaultScreen2(){
	
	return "<div class='well'><h3>No Item About To Expire</h3></div>";
}


?>