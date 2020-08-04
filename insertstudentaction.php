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
				<ul>
					<?php include 'navigation.php'; ?>
				</ul>
			</nav>
			
			<article>
				<h2 style="text-align: center">Insert Student Data into Database</h2>
				<?php
					$fullname = $_POST["fullname"];
					$state = $_POST["state"];
					$dateOfBirth = $_POST["birthdate"];
					$faculty = $_POST["faculty"];
					$email= $_POST["email"];
					$address= $_POST["address"];
					$stuid = date("yy").rand(100000,999999);

					$conn = OpenCon();
					$sql = "INSERT INTO student (stuid,stuname, stubirthdate, stuemail, stuaddress, stustate, stufaculty)
							VALUES ($stuid, '$fullname', '$dateOfBirth', '$email', '$address', '$state', '$faculty')";
					   
					if(mysqli_query($conn, $sql)) {
						//	echo "New record \n";
						//display back all the data that has been inserted.
					$sql2 ="select * from student where stuid = $stuid";
					
					$result = $conn->query($sql2);
					if($result-> num_rows> 0) {
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
					}
					else {
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