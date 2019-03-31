<?php

if(isset($_POST['submit']))
{
	if(empty($_POST['name'])||empty($_POST['regno']))
	{
		echo"student name or registration number is invalid";
	}
	else
	{
		$username=$_POST['name'];
		$password=$_POST['regno'];
		
		$conn=mysqli_connect("localhost","admin","");
		$db=mysqli_select_db($conn,"test");
		$query=mysqli_query($conn,"SELECT *FROM students WHERE name='$username' AND regno='$password'"); 
		$rows=mysqli_num_rows($query);
		if($rows==0)
		{
			echo"aise";
			$sql="INSERT INTO students(name,regno) VALUES('$username','$password')";
	mysqli_query($conn,$sql);
		}
		else
		{
		echo"already exists";
		}
		mysqli_close($conn);
	}
}
?>