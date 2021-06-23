
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
	if(isset($_POST["analysisForADate"])){
	$date=$_POST["date"];
	$query=mysqli_query($connection,"select * from saleRecord WHERE dateSold='{$date}'");
	$query2=mysqli_query($connection,"select * from saleRecord WHERE dateSold='{$date}'");}
	
	if(isset($_POST["analysisForAMonth"])){ 
	$theMonth=(int) $_POST["month"];
	$month=(int) $_POST["month"];
	if($month<10){$month=(string) "0".$month;}
	$date=$_POST["year"] . "-" . $month;
	$dateComplete=$_POST["year"] . "-" . $month . "-" . "01";
	$query=mysqli_query($connection,"select * from saleRecord WHERE dateSold LIKE '%$date%'");
	$query2=mysqli_query($connection,"select * from saleRecord WHERE dateSold LIKE '%$date%'");}
	
	$totalPrice=0; $totalProduct=0; $calculate=array(); $i=0; $totalPandS=0;
	
		while($analysis=mysqli_fetch_array($query2)){
			$getQuantity=(int) $analysis["quantity"];
			$getPrice=(int) $analysis["price"];
			
			//$getPrice=(int) $analysis["price"];
			
			$totalProduct=$totalProduct + $getQuantity;
			$totalPrice=$totalPrice + $getPrice;
			
		}
		
			//Calculate Profit And Loss
			
			$query3=mysqli_query($connection,"select * from stock");
			$query4=mysqli_query($connection,"select * from stock ");
			//START FOR DATE SEARCH
		if(isset($_POST["analysisForADate"])){$myDate=$date;
			while($getPandS=mysqli_fetch_array($query3)){
			
			$date1=date_create($myDate); //Get Current Date
			$getDates=$getPandS["expiryDate"]; //Get Expiry Date
			$date2=date_create($getDates); //Create Expiry Date
			$diff=date_diff($date2,$date1); 
			
			$dateDiff=$diff->format('%R%a');
			//echo "<script>alert('{$dateDiff}')</script>";
			if($dateDiff >= 0){
				$calculate[$i]=(int) $getPandS["price"] * $getPandS["quantity"];
				$totalPandS=$totalPandS + $calculate[$i];
				
				}
			}
		
		}
			//END FOR DATE SEARCH
			
			//START FOR MONTH SEARCH
			if(isset($_POST["analysisForAMonth"])){ 
	$date_array = getdate();
	$currentMonth= $date_array["mon"];
	$searchedMonth=$theMonth;
	
	
	
	
	while($getPandS2=mysqli_fetch_array($query4))
	{
		if($currentMonth>$searchedMonth)
		{ 	//All Drugs For That Month Are Expired
			$calculate[$i]=(int) $getPandS2["price"] * $getPandS2["quantity"];
			$totalPandS=$totalPandS + $calculate[$i];
		}
		
		if($currentMonth<=$searchedMonth)
		{	//Calculate Drugs That Have Expired From Current Date

			$myformated_date = $date_array["year"] . "-";
			$myformated_date .= $date_array["mon"] . "-";
			$myformated_date .= $date_array["mday"];
			$dateSearched=$myformated_date; //Current Date
			
			$date1=date_create($dateSearched); //Get Current Date
			$getDates=$getPandS2["expiryDate"]; //Get Expiry Date
			$date2=date_create($getDates); //Create Expiry Date
			$diff2=date_diff($date2,$date1); 
					
			$dateDiff2=$diff2->format('%R%a');
			//echo "<script>alert('{$dateDiff}')</script>";
				if($dateDiff2 >= 0)
				{
				$calculate[$i]=(int) $getPandS2["price"] * $getPandS2["quantity"];
				$totalPandS=$totalPandS + $calculate[$i];
				}
		}
	}
}
			//END FOR MONTH SEARCH
		
	$numOfRecord=mysqli_num_rows($query);
	
	$loss=$totalPandS;
	
	
	echo "<div class='row'><div class='col-md-5'>";
	echo"<div class='well'>";
	echo "<div class=''><h2 class='text-bold b2 pad-5 text-white'>ANALYSIS FOR $date</h2></div>";
	echo "<div class=''><h3 class='text-bold'>Total Product Sold: $totalProduct Items</h3></div>";
	echo "<br/>";
	echo "<div class=''><h3 class='text-bold'>Total Sale Price: $totalPrice Naira</h3></div>";
	echo "<br/>";
	echo "<div class=''><h3 class='text-bold'>Loss From Expired Items: $loss Naira</h3></div>";
	
	echo "</div>";
	echo "</div>";
	echo "<div class='col-md-7'>";
	echo "<div class='col-md-6'>"
			."<div class='alert alert-info text-center text-bold'><h3>$numOfRecord Record Found</h3></div>"
			."<center><img src='../img/invoic_1.jpg' class='img-responsive pad-10' width='80%' /></center>"
			."</div>";
	echo "<div class='col-md-5'><a href='home.php' class='alert btn btn-success btn-block'><h3>Go Back Home</h3></a>";
	echo '<center><img src="../img/payment.png" class="img-responsive" width="80%" /></center>';
	echo "</div>";
	if($numOfRecord>0){
	?>
	<div class="pad-15" style="margin-right:53px;">

	<button class="btn btn-primary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
	View Item Sold
	</button>
	
	</div>
	<?php
	}
	echo "</div>";
	echo "</div>";
	if($numOfRecord>0){
	?>
	
	<div class="collapse" id="collapseExample">
	<?php
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
			<td>{$get["soldBy"]}</td>
			</tr>
			";
		}
		echo "</table></div>";
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

