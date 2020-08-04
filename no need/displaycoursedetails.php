<!DOCTYPE html>

<html>
	<head>
		<title>Course Registration System</title>
		
		<link rel="stylesheet" type="text/css" href="style.css">

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
				<h2 style="text-align:center">Display Course Details From Database</h2>
				<?php 
				
				$conn = OpenCon();
				$courseid = $_GET["courseid"];
				$sql= "select * from course where courseid = '$courseid'";
				$result = $conn->query($sql);

				if($result-> num_rows > 0) {
					//output data of each row
					while($row = $result->fetch_assoc()){
						$cid = $row["courseid"];
						$coursename =$row["coursename"];
						$coursedate = $row["coursedate"];
					
						echo "<table>";
						echo "<tr>";
							echo "<td>Course ID</td>";
							echo"<td>$courseid</td>";
						echo"</tr>";
						echo "<tr>";
							echo "<td>Course Name</td>";
							echo"<td>$coursename</td>";
						echo"</tr>";
						echo "<tr>";
							echo "<td>Course Date</td>";
							echo"<td>$coursedate</td>";
						echo"</tr>";
						
					echo "</table>";
					}
				}
				
				else {
					echo "Error : " . $sql. "<br>" . mysqli_error($conn);
				}
				CloseCon($conn);
				//confirmDelete(<?php echo $courseid
		   ?>
		   <table>
				<tr>
					<td colspan="2" align="center">
					<input type="submit" value="Update" onclick="window.location.href='updatecoursedetails.php?courseid=<?php echo $courseid ?>' " />
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