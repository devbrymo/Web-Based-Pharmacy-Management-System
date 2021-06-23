<html>
<head>
<?php include("bootstrapCss.html"); ?>
<?php if(isset($_POST["editStockItem"])){
	
	
}?>
</head>

<body>
<?php include("header.php"); ?>
<div class="container top-120">
<div class="position-540 top-50 border-shadow">
<h2 class="text-center pad-20 page-header" >EDIT STOCK ITEM</h2>
     
      <div class="pad-20">
       <form action="editModelWindow.php" method="post">
		<div class="form-group"><input class="form-control" name="drugName" type="text" placeholder="Drug Name" required /></div>
		<div class="form-group"><input class="form-control" name="quantity" type="number" placeholder="Quantity" required /></div>
		<div class="form-group"><input class="form-control" name="price" type="number" placeholder="Price" required /></div>
		<div class="form-group">Expiry Date<input class="form-control" name="expiryDate" type="date" placeholder="Date Sold" required /></div>
		
		<div class="form-group"><button class="form-control btn btn-success" name="addToStock">UPDATE</button></div>
		</form>
      </div>
      
</div>
</div>
</body>
</html>