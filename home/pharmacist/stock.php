
<html>
<head>
<?php include("bootstrapCss.html"); ?>
<?php include("../includes/mysql_connection_head.php"); ?>
</head>
	 
	<body>
	 <?php include("header.php"); ?>
	 
	<div class="container top-120">
	<div class="top-30 border-shadow pad-5">
	<div class="rows">
	<div class="col-md-4"><h2 class="text-bold page-header">STOCK ITEMS</h2></div>
	<div class="col-md-8">
	<form action="searchInStock.php" method="GET" class="top-50">
		<div class="form-group">
		<div class="input-group">
				
			<input type="text" name="search" class="form-control" placeholder="Search For A Drug..........." />
			<span class="input-group-btn">
			<button name="submit" type="submit" class="form-control btn  btn-black " ><i class="glyphicon glyphicon-search"></i></button>
			</span>
		</div>
		</div>
	</form>
	</div>
	</div>
	<?php
	$query=mysqli_query($connection,"select * from stock");
	echo "
		<table class='table table-bordered'>
			<tr>
			<th>Id</th>
			<th>Drug Name</th>
			<th>Price</th>
			<th>Expiry Date</th>
			<th>Quantity</th>
			<th>Edit</th>
			</tr>
		";
		while($get = mysqli_fetch_array($query)){

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
		echo "</table>";
		?>
	</div>
	</div>
<?php include("modelWindow.php"); ?>
	 
</body>
</html>

