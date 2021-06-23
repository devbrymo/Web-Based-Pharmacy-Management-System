<?php
#This File get data from all forms that posted hear and assign them to some unique variable

if(isset($_POST["user_signup_submit"]))
{
	if(isset($_POST["admin_login_submit"])) #get admin Login data
	{
	$admin_login_username=$_POST["admin_login_username"];
	$admin_login_password=$_POST["admin_login_password"];
	}

	if(isset($_POST["user_login_submit"])) #get user login data
	{
	$user_login_username=$_POST["user_login_username"];
	$user_login_password=$_POST["user_login_password"];
	}

	if(isset($_POST["user_signup_submit"])) #get user signup data
	{
	$user_signup_username=$_POST["user_signup_username"];
	$user_signup_password=$_POST["user_signup_password"];
	}
}
?>

<?
if(isset($_POST["user_signup_submit"]))
{
header("Location: post.php");
exit;
}
?>