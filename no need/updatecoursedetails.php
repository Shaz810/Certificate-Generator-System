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
			<h2 style="text-align:center">Updating Course Form </h2>
				<form action="updatecourseaction.php" id="updateform" method="POST">

				<?php
					$conn = OpenCon();
					$courseid = $_GET["courseid"];

					$sql = "select * from course where courseid = '$courseid'";
					$result = $conn->query($sql);
					if($result-> num_rows> 0) {
						//output data of each row
						while($row = $result->fetch_assoc()){

							$courseID = $row["courseid"];
							$courseName = $row["coursename"];
							$courseDate = $row["coursedate"];

							echo "<table>";
							echo "<tr>";
								echo "<td>Course ID</td>";
								echo "<td>"?><input type="text" name="courseid" value="<?php echo $courseID;?>" readonly><?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Course Name</td>";
									echo "<td>"?>
										<select id="coursename" name="coursename">
											<option value="Practical Approach of Operating Systems" <?php if($courseName == "Practical Approach of Operating Systems") echo "SELECTED"; ?>>Practical Approach of Operating Systems</option>
											<option value="Fundamentals of Data Structure" <?php if($courseName == "Fundamentals of Data Structure") echo "SELECTED"; ?>>Fundamentals of Data Structure</option>
											<option value="Interactive Multimedia" <?php if($courseName == "Interactive Multimedia") echo "SELECTED"; ?>>Interactive Multimedia</option>
											<option value="Information Systems Development" <?php if($courseName == "Information Systems Development") echo "SELECTED"; ?>>Information Systems Development</option>
											<option value="Fundamentals of Entrepreneurship" <?php if($courseName == "Fundamentals of Entrepreneurship") echo "SELECTED"; ?>>Fundamentals of Entrepreneurship</option>
											<option value="Introduction to Probability and Statistics" <?php if($courseName == "Introduction to Probability and Statistics") echo "SELECTED"; ?>>Introduction to Probability and Statistics</option>
										</select>
										<?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Course Date</td>";
								echo "<td>"?><input type="date" name="coursedate" value="<?php echo $courseDate;?>" reaadonly><?php "</td>";
							echo "</tr>";
							echo "</table>";
						}
					} else {
						echo "Data cannot be displayed";
					}

					CloseCOn($conn);
					?>
					<table>
					<tr>
						<td></td>
						<td colspan="2" align="center">
							<input type="submit" value="Submit" />
							<input type="button" value="Back" onclick="history.back()" />
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