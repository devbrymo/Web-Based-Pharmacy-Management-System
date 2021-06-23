
<html>
<head>
<?php include("bootstrapCss.html"); ?>
<?php include("../includes/mysql_connection_head.php"); ?>
</head>
	 
	<body>
	 <?php include("header.php"); ?>
	 
	<div class="top-120">
	<div class="container">
<center>
	<form action="searchInStock.php" method="GET" class="top-50">
		<div class="form-group">
		<div class="input-group">
				
			<input type="text" name="search" class="form-control input-lg" placeholder="Search For A Drug..........." />
			<span class="input-group-btn">
			<button name="submit" type="submit" class="form-control input-lg btn  btn-black " ><i class="glyphicon glyphicon-search"></i></button>
			</span>
		</div>
		</div>
	</form>
</center>

<hr />
<h3><strong><em><u>Results:</u></em></strong></h3>&nbsp

<?php


	
if(isset($_REQUEST['submit'])) {
	
	$search = $_GET['search'];
	$terms = explode(" ", $search);
	$query = "SELECT * FROM stock WHERE ";
	
	$i=0;
	foreach($terms as $each) {
		$i++;
		if($i==1){
			$query .= "name LIKE '%$each%' ";
		}else {
			$query .="OR name LIKE '%$each%'";	
		}
	}
	
	
	
	
	$query = mysqli_query($connection, $query);
	$num = mysqli_num_rows($query);
	
	if($num > 0 && $search!=""){
		
		echo "<div class='alert alert-info'><h2>$num result(s) found for <b>$search!</h2></div>";
		
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
		while($get = mysqli_fetch_assoc($query)){

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
	} else {
		
		echo "<div class='alert alert-info'>
		<h2 class='text-center text-bold'>No results found!</h2>
		</div>";
	}
	
	mysqli_close($connection);
	
} else {
	
	echo "<div class='alert alert-info'><b>Please type any word...</b></div>";
	
}
?>
</div>
<div class='top-10' ></div>
<div class="container">
<p><a href="stock.php" class="btn btn-primary btn-block">Go To Stock</a></p>
<p><a href="home.php" class="btn btn-success btn-block">Go To Home</a></p>
</div>

</div>
	</div>
<?php include("modelWindow.php"); ?>
<?php if(isset($_POST["addSaleRecord"])){} ?>

<?php if(isset($_POST["searchInStock"])){} ?>	 
</body>
</html>

