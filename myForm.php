<html>
<head>
	<title>Upload Form</title>
	
	<style>
	.container{margin:auto; max-width:600; position:relative; background-color: #e6e6ff; padding:50px;}
	.input-design{box-sizing:border-box; width:100%; padding:10px; margin:10px;}
	.input-file{box-sizing:border-box; width:100%; padding:10px; margin:10px; border: solid black 2px;}
	.input-file{box-sizing:border-box; width:100%; padding:10px; margin:10px; border: solid black 2px;}
	.btn-primary {color: #fff;background-color: #337ab7;border-color: #2e6da4;}
	.btn-primary:hover {color: #fff;background-color: #286090;border-color: #204d74;}
	</style>
	<?php
	$databaseUsername="";
	$databasePassword="";
	$databaseName="";
	$tableName="";
	//$connection=mysqli_connect("localhost",$databaseUsername,$databasePassword,$databaseName);
	//if(!$connection){die("Connection Not Successfull" .mysqli_error($connection));}
	?>
</head>

<body>

	<div class="container">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
	<input type="text" name="phoneNumber" class="input-design" placeholder="Phone Number" />
	<input type="text" name="token" class="input-design" placeholder="Token" />
	<input type="file" name="userPicture" class="input-file"  placeholder="Picture" />
	<button class="input-design btn-primary" name="picSubmit">Submit</button>
	</form>
	</div>
	
<?php
	 if(isset($_POST["picSubmit"])){
		$dir="userPictures/";	

		$file=$dir . basename($_FILES["userPicture"]["name"]); #full file information
		$upload=1; 
		
		$exe=pathinfo($file,PATHINFO_EXTENSION); #gets file extention
		
		#Check if file is valid
		
			$check=getimagesize($_FILES["userPicture"]["tmp_name"]);
			if($check!==false){$uploadOk=1;}
			else{ $uploadOk=0;}
		
		
		#check if file already exist
		#if(file_exists($file)){?><!--<script> alert("File Already Exist");</script>--><?php #$uploadOk=0;}
		
		#check file size
		if($_FILES["userPicture"]["size"]>5000000){?><script> alert("File too large");</script><?php $uploadOk=0;}
		
		#check file type
		if($exe != "jpg" && $exe != "png" && $exe != "jpeg" && $exe != "gif" && $exe != "JPG" && $exe != "JPEG" && $exe != "PNG" && $exe != "GIF")
		{?><script> alert("Invalid Image Type");</script>
		<?php $uploadOk=0;}
		
		
		#main file upload code
		if($uploadOk==0){echo "<script>alert('File Upload Unsuccessful.')</script> ";}
		else
		{
			if(move_uploaded_file($_FILES["userPicture"]["tmp_name"],$file))
			{ 
				postData($file, $connection);
			}
			else {?><script>alert("Error Uploading File")</script><?php }
		}
		
		}
	 
	 
	 
	 ?>
	 <?php
			function postData($file,$connection)
			{
				$phoneNumber=$_POST["phoneNumber"];
				$token=$_POST["token"];
				$query="INSERT INTO $tableName SET phonenumber='{$phoneNumber}',"
						."token='{$token}', picture='{$file}'";
				$postQuery=mysqli_query($connection,$query);
			}
	 ?>
</body>

</html>