

<?php

if(isset($_POST['submit']))
{
	if(empty($_POST['semister'])||empty($_POST['courseid'])||empty($_POST['coursetitle'])||empty($_POST['coursecredit']))
	{
		echo"You have to Fill Up All The Form";
	}
	else
	{
		$semister=$_POST['semister'];
		$courseid=$_POST['courseid'];
		$coursetitle=$_POST['coursetitle'];
		$coursecredit=$_POST['coursecredit'];
		$conn=mysqli_connect("localhost","admin","");
		$db=mysqli_select_db($conn,"test");
		$query=mysqli_query($conn,"SELECT *FROM course WHERE semister='$semister' AND courseid='$courseid' AND coursetitle='$coursetitle'and coursecredit='$coursecredit'"); 
		$rows=mysqli_num_rows($query);
		if($rows==0)
		{
			echo $courseid;
			echo "inserted";
			$sql="INSERT INTO course(semister,courseid,coursetitle,coursecredit) VALUES('$semister','$courseid','$coursetitle','$coursecredit')";
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

