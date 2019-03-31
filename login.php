<?php include"signup.php";?>
<?php
session_start();
if (isset($_SESSION['destroyed'])
    && $_SESSION['destroyed'] < time() - 300) {
    // Should not happen usually. This could be attack or due to unstable network.
    // Remove all authentication status of this users session.
    remove_all_authentication_flag_from_active_sessions($_SESSION['username']);
    throw(new DestroyedSessionAccessException);
}
if(isset($_POST['submit']))
{
	if(empty($_POST['username'])||empty($_POST['password']))
	{
		echo"username or password is invalid";
	}
	else
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$conn=mysqli_connect("localhost","admin","");
		$db=mysqli_select_db($conn,"test");
		$query=mysqli_query($conn,"SELECT *FROM mainsignup WHERE password='$password'AND username='$username'");
		$rows=mysqli_num_rows($query);
		if($rows==1)
		{
			
			header("refresh:2;url=project.html");
		}
		else
		{
			
				header("refresh:2;url=Log in.html");
		}
		mysqli_close($conn);
	}
}
?>