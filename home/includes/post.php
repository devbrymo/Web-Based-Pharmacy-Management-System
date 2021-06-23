<html>
<head>
<?php
require("bootstraphead.html");
require("mysql_connection_head.php");
?>
<style>
.form{
			width:450px;
			height:350px;
			position:relative;
			top:90px;
			margin: auto;
			padding: auto;
			
		}
		
		body{
			background-image:url("../image/b21.jpg");
		}
</style>
</head


<?php

if(isset($_POST["user_signup_submit"])) #post user signup data
{
	$sql_user_insert="INSERT INTO user_data (USERNAME,PASSWORD) VALUES ('$user_signup_username','$user_signup_password') ";#sql Command
	$sql_user_post_signup=mysql_query($sql_user_insert,$connection);#apply sql Command
	
	if($sql_user_post_signup)
	{
		echo "
		 <div class='well form'>
		 <h3 class='text-center'><b style='color:green' >$user_signup_username</b></h3>
		 <p class='lead text-center'>You are welcome to Fudma Baze, the home for all fudma student.<br>
		 Created for Fudma By Fudma, Login to check out what we are talking about<br>
		 Long Leave FUDMA Baze</p>
		 <a href='../pages/user_login.php' class='btn btn-lg btn-success btn-block'>Login And Start Flexing</a>
		 </div>


	";
	}
	
	if(!($sql_user_post_signup))
	{
	
	echo "<div class='well form'>
		 <h3 class='text-center'><b style='color:green' >$user_signup_username</b></h3>
		 <p class='lead text-center'>Sorry That Username Already Exist.</p>
		 <p class='lead text-center'>Try {$user_signup_username}22 or {$user_signup_username}01</p>
		 <a href='../pages/user_signup.php' class='btn btn-lg btn-success btn-block'>Go Try Again</a>
		 </div>


	";
	}
	#WELCOME Message
}





?>


