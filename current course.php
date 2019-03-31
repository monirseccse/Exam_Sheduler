<!DOCTYPE html>
<html>
<head>
	<title>CSE Current Course</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style >
		table{
			border-collapse: collapse;
			width: 100%;
			color: #588c7e;
			font-family: monospace;
			font-size: 25px;
			text-align: center;
		}
		th{
			background-color: #588c7e;
			color: white;
			text-align: center;
		}
		tr:nth-child(even){background-color: #f2f2f2}
	</style>
</head>
<body>
	<nav>
		<p>Exam Schedular</p>
		<ul>
		<li><a href="project.html">Home</a></li>
		<li><a href="#">Exam Routine</a>
			 <ul>
			 	  <li><a href="CSE.html">CSE</a></li>
			 	  <li><a href="EEE.html">EEE</a></li>
			 	  <li><a href="CE.html">CE</a></li>

			 	</ul>	
		</li>
		<li><a href="offday.html">Off day</a></li>	
		<li><a href="Welcome page.html">Log out</a></li>
	</ul>
	</nav>
	<table>
		<tr>
			<th>Course Id</th>
			<th>Course Title</th>
			<th>Course Credit</th>
		</tr>
<?php
		$conn=mysqli_connect("localhost","admin","");
		$db=mysqli_select_db($conn,"test");
		if($conn->connect_error)
		{
			die("Connection failed:");
		}
		$sql="SELECT courseid,coursetitle,coursecredit from course";
		$result=mysqli_query($conn,$sql);
		
		if($result->num_rows>0)
		{
			while($row=$result->fetch_assoc())
			{
				echo"<tr><td>".$row["courseid"]."</td><td>".$row["coursetitle"]."</td><td>".$row["coursecredit"]."</td></tr>";
			}
		echo"</table>";
		}
		else
		{
			echo"table is empty";
		}
	$conn->close();	
		?>
			</table>

</body>
</html>