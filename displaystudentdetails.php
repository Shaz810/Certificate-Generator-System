<!DOCTYPE html>

<html>
	<head>
		<title>Course Registration System</title>
		
		<link rel="stylesheet" type="text/css" href="style.css">

		<script type="text/javascript">
			function confirmDelete(stuid)
			{
				if(confirm('Sure To Remove This Record ?'))
				{
					window.location.href='deletestudent.php?stuid='+stuid;
				}
			}
		</script>
	</head>
	
	<body>
		
		<header>
		    <?php include 'header.php'; ?>
		</header>
		
		<section>
			<nav>
				<?php include 'navigation.php'; ?>
			</nav>
			
			<article>
				<h2 style="text-align:center">Display Student Details From Database</h2>
				<?php 
				
				$conn = OpenCon();
				$studentid = $_GET["studentid"];
				$sql= "select * from student where stuid = $studentid";
				$result = $conn->query($sql);

				if($result-> num_rows > 0) {
					//output data of each row
					while($row = $result->fetch_assoc()){

						$today = date("Y-m-d");
						$age = date_diff(date_create($row["stubirthdate"]), date_create($today));
						$studentid = $row["stuid"];
						$studentname =$row["stuname"];
						$studentbirthdate = $row["stubirthdate"];
						$studentstate = $row["stustate"];
						$studentfaculty = $row["stufaculty"];
						$studentemail = $row["stuemail"];
						$studentaddress = $row["stuaddress"];
						echo "<table>";
						echo "<tr>";
							echo "<td>Student ID</td>";
							echo"<td>$studentid</td>";
						echo"</tr>";
						echo "<tr>";
							echo "<td>Full Name</td>";
							echo"<td>$studentname</td>";
						echo"</tr>";
						echo "<tr>";
							echo "<td>Birth Date</td>";
							echo"<td>$studentbirthdate</td>";
						echo"</tr>";
						echo "<tr>";
							echo "<td>Age</td>";
							echo "<td>".$age->format('%y')."</td>";
						echo"</tr>";
						echo "<tr>";
							echo "<td>Email Address</td>";
							echo"<td>$studentemail</td>";
						echo"</tr>";
						echo "<tr>";
							echo "<td>Address</td>";
							echo"<td>$studentaddress</td>";
						echo"</tr>";
						echo "<tr>";
							echo "<td>State</td>";
							echo"<td>$studentstate</td>";
						echo"</tr>";
						echo "<tr>";
							echo "<td>Faculty</td>";
							echo"<td>$studentfaculty</td>";
						echo"</tr>";
					echo "</table>";
					}
				}
				
				else {
					echo "Error : " . $sql. "<br>" . mysqli_error($conn);
				}
				CloseCon($conn);
				//confirmDelete(<?php echo $studentid
		   ?>
		   <table>
				<tr>
					<td colspan="2" align="center">
					<input type="button" value="Register Course" onclick="window.location.href='registercourse.php?studentid=<?php echo $studentid ?>' " />
					<input type="submit" value="Update" onclick="window.location.href='updatestudentdetails.php?studentid=<?php echo $studentid ?>' " />
					<input type="button" value="Delete" onclick="confirmDelete(<?php echo $studentid ?>)" />
					</td>
				</tr>
			</table>
			</article>
		</section>
		
		<footer>
			<?php include 'footer.php'; ?>
		</footer>	
		
		
	</body>
</html>