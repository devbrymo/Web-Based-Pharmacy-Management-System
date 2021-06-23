<?php session_start(); ?>
<html>
<head>
<?php include("bootstrapCss.html"); ?>
<?php include("../includes/mysql_connection_head.php"); ?>
</head>
	 
	<body>
	 <?php include("header.php"); ?>
	 
	<div class="container top-120">
	<div class="top-30 border-shadow bg-white pad-15">
	
	
	<?php
	if(isset($_POST["saleForADate"])){
	$date=$_POST["date"];
	$query=mysqli_query($connection,"select * from saleRecord WHERE dateSold='{$date}'");}
	
	if(isset($_POST["saleForAMonth"])){ 
	$month=(int) $_POST["month"];
	if($month<10){$month=(string) "0".$month;}
	$date=$_POST["year"] . "-" . $month;
	$query=mysqli_query($connection,"select * from saleRecord WHERE dateSold LIKE '%$date%'");}
	$numOfRecord=mysqli_num_rows($query);
	echo "<div class='row'><div class='col-md-5'>";
	echo "<div class=''><h2 class='text-bold'>SALE FOR $date</h2></div></div>";
	echo "<div class='col-md-4'>"
			."<div class='alert alert-info text-center text-bold'><h3>$numOfRecord Record Found</h3></div></div>";
	echo "<div class='col-md-3'><a href='home.php' class='alert btn btn-success btn-block'><h3>Go Back Home</h3></a>";
	echo "</div>";
	echo "</div>";
	if($numOfRecord>0){
	echo "
		<table class='table table-bordered'>
			<tr>
			<th>Receipt Id</th>
			<th>Drug Name</th>
			<th>Price Sold</th>
			<th>Qantity</th>
			<th>Date Sold</th>
			<th>Sold By</th>
			</tr>
		";
		while($get = mysqli_fetch_array($query)){

			echo"
			
			<tr>
			<td>{$get["id"]}</td>
			<td>{$get["name"]}</td>
			<td>{$get["price"]}</td>
			<td>{$get["quantity"]}</td>
			<td>{$get["dateSold"]}</td>
			<td>PMC/{$get["id"]}</td>
			</tr>
			";
		}
		echo "</table>";
	}
	else{
		
		echo" <div class='alert alert-warning'><h2>NO RECORD FOUND FOR $date</h2></div>";
	}
		?>
	</div>
	</div>
<?php include("modelWindow.php"); ?>
	 
</body>
</html>

