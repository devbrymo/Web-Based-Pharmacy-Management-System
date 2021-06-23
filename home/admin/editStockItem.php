<?php session_start(); ?>
<html>
<head>
<?php include("bootstrapCss.html"); ?>
<?php include("../includes/mysql_connection_head.php"); ?>
<?php if(isset($_POST["editStockItem"])){
	$id=(int) $_POST["editStockItem"];
	$getData=mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM stock WHERE id=$id"));
	
}?>
</head>

<body>
<?php include("header.php"); ?>
<div class="container top-120">
<div class="position-540 top-50 border-shadow bg-white">
<?php
if(isset($_POST["updateStock"])){
	$drugName=$_POST["drugName"];	$quantity=$_POST["quantity"];
	$price=$_POST["price"];	$expiryDate=$_POST["expiryDate"]; $userId= (int) $_POST["id"];
	
	$query="UPDATE stock SET name='{$drugName}', quantity='{$quantity}',"
			."price='{$price}', expiryDate='{$expiryDate}' WHERE id=$userId";
	$sql=mysqli_query($connection,$query);
	if($sql){echo "<script>alert('Success')</script>"; echo "<script>window.location.href='home.php';</script>";}
	else {echo "<script>alert('An error has occured, try again.')</script>"; }
}?>
<h2 class="text-center pad-10 page-header" >EDIT STOCK ITEM</h2>
     
      <div class="pad-10">
       <form action="editStockItem.php" method="post">
		<div class="form-group">Drug Name:<input class="form-control" name="drugName" type="text" value="<?php echo $getData["name"]; ?>" required /></div>
		<div class="form-group">Quantity:<input class="form-control" name="quantity" type="number" value="<?php echo $getData["quantity"]; ?>" required /></div>
		<div class="form-group">Price:<input class="form-control" name="price" type="number" value="<?php echo $getData["price"]; ?>" required /></div>
		<div class="form-group">Expiry Date:<input class="form-control" name="expiryDate" type="date" value="<?php echo $getData["expiryDate"]; ?>" required /></div>
		<input name="id" type="hidden" value="<?php echo $getData['id'] ; ?>" />
		<input name="editStockItem" type="hidden" value="<?php echo $getData['id'] ; ?>" />
		
		<div class="form-group"><button class="form-control btn btn-success" name="updateStock">UPDATE</button></div>
		<div class="form-group"><a class="form-control btn btn-primary" href="home.php">Back To Home</a></div>
		</form>
      </div>
      
</div>
</div>
</body>
</html>