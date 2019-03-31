<?php
$con=mysqli_connect('127.0.0.1','admin','');
if(!$con)
{
	echo "NOt connected";
}
if(!mysqli_select_db($con,'test'))
{
	echo "DB not select";
}
$pass=0;
$password1="";
$password2="";
if(isset($_POST['email'])){
$email=$_POST['email']; }
if(isset($_POST['username'])){
$name=$_POST['username'];}
if(isset($_POST['password'])){
$password1=$_POST['password'];}


//check for existing username
if(isset($email)and isset($name)){
$user_check_query="SELECT *FROM mainsignup WHERE username='$name'or email='$email' LIMIT 1";
$results=mysqli_query($con,$user_check_query);
$user=mysqli_fetch_assoc($results);
if($user)
{
	if($user['username']===$name)
	{
		echo "username already exists";
		$pass=1;
	}
	if($user['email']===$email)
	{
		echo "This email already has registered user id";
		$pass=1;
	}
}
else
{
	$password=($password1);
	
	if($pass!=1){
	$sql="INSERT INTO mainsignup(email,username,password) VALUES('$email','$name','$password')";
	mysqli_query($con,$sql);
	header("refresh:2;url=Log in.html");
}
}
}

?>