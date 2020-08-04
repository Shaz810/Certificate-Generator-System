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
			<h2 style="text-align:center">Update Student Course in Database</h2>
				<?php
				$courseID = $_POST["courseid"];
				$courseName = $_POST["coursename"];
				$courseDate = $_POST["coursedate"];
				$conn = OpenCon();

				$sql = "update course 
				set coursename = '$courseName',
					coursedate = '$courseDate'
				where courseid = '$courseID';";

				$result = $conn->query($sql);
				if ($result == true) {
					$sql2 = "select * from course where courseid = '$courseID'";
					$result = $conn->query($sql2);
					if($result-> num_rows> 0) {
						//output data of each row
						while($row = $result->fetch_assoc()){

							$courseID = $row["courseid"];
							$courseName =$row["coursename"];
							$courseDate = $row["coursedate"];
						
							
							echo "<table>";
							echo "<tr>";
								echo "<td>Course ID</td>";
								echo"<td>$courseID</td>";
							echo"</tr>";
							echo "<tr>";
								echo "<td>Course Name</td>";
								echo"<td>$courseName</td>";
							echo"</tr>";
							echo "<tr>";
								echo "<td>Course Date</td>";
								echo"<td>$courseDate</td>";
							echo"</tr>";
						echo "</table>";
						}
					} else {
						 echo "Data cannot be displayed";
					}
				}	else {
					echo "Error: " .$sql . "<br>" . mysqli_error($conn);
			   }
					CloseCon($conn);
				?>
				<table>
			   <tr>
					<td colspan="2" align="center">
				    <input type="button" value="Home" onclick="window.location.href='homepage.php'"/>
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