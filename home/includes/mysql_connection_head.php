<?php

$connection=mysqli_connect("localhost","root","","pharmacyApp");
if(!$connection)
{
	die("Connection Not Successfull" .mysqli_connect_error());
}

?>