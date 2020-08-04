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
				<h2 style="text-align:center">Updating Form </h2>
				<form action="updatestudentaction.php" id="updateform" method="POST">

				<?php
					$conn = OpenCon();
					$studentid = $_GET["studentid"];

					$sql = "select * from student where stuid = $studentid";
					$result = $conn->query($sql);
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
								echo "<td>"?><input type="text" name="studentid" value="<?php echo $studentid;?>" reaadonly><?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Full Name</td>";
								echo "<td>"?><input type="text" name="studentname" value="<?php echo $studentname;?>" reaadonly><?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Birth Date</td>";
								echo "<td>"?><input type="date" name="birthdate" value="<?php echo $studentbirthdate;?>" reaadonly><?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Email Address</td>";
								echo "<td>"?><input type="text" name="email" value="<?php echo $studentemail;?>" reaadonly><?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Address</td>";
								echo "<td>"?><textarea name="address" rows="5" cols="20"> <?php echo $studentaddress;?> </textarea><?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>State</td>";
									echo "<td>"?>
										<select id="state" name="state">
											<option value="Johor" <?php if($studentstate == "Johor") echo "SELECTED"; ?>>Johor</option>
											<option value="Selangor" <?php if($studentstate == "Selangor") echo "SELECTED"; ?>>Selangor</option>
											<option value="Sarawak" <?php if($studentstate == "Sarawak") echo "SELECTED"; ?>>Sarawak</option>
											<option value="Sabah" <?php if($studentstate == "Sabah") echo "SELECTED"; ?>>Sabah</option>
											<option value="Pahang" <?php if($studentstate == "Pahang") echo "SELECTED"; ?>>Pahang</option>
											<option value="Perak" <?php if($studentstate == "Perak") echo "SELECTED"; ?>>Perak</option>
											<option value="Kedah" <?php if($studentstate == "Kedah") echo "SELECTED"; ?>>Kedah</option>
											<option value="Negeri Sembilan" <?php if($studentstate == "Negeri Sembilan") echo "SELECTED"; ?>>Negeri Sembilan</option>
											<option value="Terengganu" <?php if($studentstate == "Terengganu") echo "SELECTED"; ?>>Terengganu</option>
											<option value="Penang" <?php if($studentstate == "Penang") echo "SELECTED"; ?>>Penang</option>
											<option value="Kelantan" <?php if($studentstate == "Kelantan") echo "SELECTED"; ?>>Kelantan</option>
											<option value="Perlis" <?php if($studentstate == "Perlis") echo "SELECTED"; ?>>Perlis</option>
											<option value="W.P Kuala Lumpur" <?php if($studentstate == "W.P Kuala Lumpur") echo "SELECTED"; ?>>W.P Kuala Lumpur</option>
											<option value="W.P Labuan" <?php if($studentstate == "W.P Labuan") echo "SELECTED"; ?>>W.P Labuan</option>
											<option value="W.P Putrajaya" <?php if($studentstate == "W.P Putrajaya") echo "SELECTED"; ?>>W.P Putrajaya</option>
											<option value="Melaka" <?php if($studentstate == "Melaka") echo "SELECTED"; ?>>Melaka</option>
										</select>
										<?php "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>Faculty</td>";
									echo "<td>"?>
										<input type="radio" id="Faculty Art and Design" name="faculty" value="Faculty Art and Design"
											<?php if($studentfaculty == "Faculty Art and Design") echo "CHECKED";?>/>Faculty Art and Design <br>
										<input type="radio" id="Faculty Plantation and Agrotechnology" name="faculty" value="Faculty Plantation and Agrotechnology"
											<?php if($studentfaculty == "Faculty Plantation and Agrotechnology") echo "CHECKED";?>/>Faculty Plantation and Agrotechnology <br>	
										<input type="radio" id="Faculty Science Computer and Mathematics" name="faculty" value="Faculty Science Computer and Mathematics"
											<?php if($studentfaculty == "Faculty Science Computer and Mathematics") echo "CHECKED";?>/>Faculty Science Computer and Mathematics <?php "</td>";
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