

<?php
//echo"khela suru";
if(isset($_POST['submit']))
{
	//echo"suru";
	if(isset($_POST['courseid'])&&isset($_POST['coursetitle'])&&isset($_POST['coursecredit']))
	{
		//echo"value assign hoise";
		$courseid=$_POST['courseid'];
		$coursetitle=$_POST['coursetitle'];
		$coursecredit=$_POST['coursecredit'];
		echo$courseid;
		echo $coursetitle;
		echo $coursecredit;
		$conn=mysqli_connect("localhost","admin","");
		$db=mysqli_select_db($conn,"test");
		if(mysqli_connect_errno())
		{
			echo "Failed to COnnect";
		}
		
		$query=mysqli_query($conn,"SELECT *FROM course WHERE courseid='$courseid' AND coursetitle='$coursetitle'and coursecredit='$coursecredit'"); 

		$row=mysqli_num_rows($query);
		echo $row;
		if($row>=1)
		{
			
			$sql="DELETE FROM course  WHERE courseid='$courseid' AND coursetitle='$coursetitle' AND coursecredit='$coursecredit' ";
	mysqli_query($conn,$sql);
		}
		else
		{
		echo"Not Exists In Database";
		}
			mysqli_close($conn);
	}
		
	
	
}
?>

