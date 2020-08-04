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
				<h2 style="text-align: center">Insert New Course into Database</h2>
				<?php
					$courseid = $_POST["courseid"];
					$coursename = $_POST["coursename"];
					$coursedate = $_POST["coursedate"];
					
					
					$conn = OpenCon();
					$sql = "INSERT INTO course (courseid,coursename, coursedate)
							VALUES ('$courseid', '$coursename', '$coursedate')";
					   
					if(mysqli_query($conn, $sql)) {
						//	echo "New record \n";
						//display back all the data that has been inserted.
					$sql2 ="select * from course where courseid = '$courseid'";
					
					$result = $conn->query($sql2);
					if($result->num_rows>0) {
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

				}   else {
						echo "Error : " . $sql. "<br>" . mysqli_error($conn);
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