<?php
if(isset($_POST['submit']))
{
	$month= $_POST['months'];
	$day= $_POST['days'];
	$year= $_POST['years'];
	$date=$_POST['dates'];
	$conn=mysqli_connect("localhost","admin","");
		$db=mysqli_select_db($conn,"test");
		$query=mysqli_query($conn,"INSERT INTO offday(dat,day,month,year)VALUES ('$date','$day','$month','$year')");
}
mysqli_close($conn);
?>