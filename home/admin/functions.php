<?php
//Functions

function processMessage($message){
	if($message==true){echo "<div class='alert alert-success'><b>Success</b></div>";}
	else {echo "<div class='alert alert-danger'><b>An error has occured, try again.</b></div>"; }
}

function processMessagePopUp($message){
	if($message==true){echo "<script>alert('Success')</script>";}
	else {echo "<script>alert('The drug already exist in stock, to add, search for the drug and edit to change price or quantity')</script>"; }
}

function addToStock($connection){
	$drugName=$_POST["drugName"];	$quantity=$_POST["quantity"];
	$price=$_POST["price"];	$expiryDate=$_POST["expiryDate"];
	$query="INSERT INTO stock SET name='{$drugName}', quantity='{$quantity}',"
			."price='{$price}', expiryDate='{$expiryDate}'";
	$sql=mysqli_query($connection,$query);
	if($sql){return true;} else{ return false;}
}


?>