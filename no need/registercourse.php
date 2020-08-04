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
				<h2 style="text-align:center">Course Registration Forms</h2>
				<form action="registercourseaction.php" id="form" method="POST">
				<?php
						$conn = OpenCon();
						$studentid = $_GET["studentid"];
						$sql= "select * from student where stuid = $studentid";
						$result = $conn->query($sql);
		
						if($result-> num_rows > 0) {
							//output data of each row
							while($row = $result->fetch_assoc()){
								$stuid = $row["stuid"];
								$stuname =$row["stuname"];
							}
						} else {
							echo "Data cannot be displayed";
						}
						
						$sql2 = "select * from course";
						$result2 = $conn->query($sql2);
				?>
				<table>
				<tr> 
					<td>Student ID</td>
					<td><input type="text" name="stuid" value="<?php echo $stuid?>" readonly></td>
				</tr> 
				<tr> 
					<td>Full Name</td>
					<td><input type="text" value="<?php echo $stuname?>" readonly></td>
				</tr>
				<tr> 
					<td>Subject</td>
					<td><select name="courseid">
					<?php foreach($result2 as $row) : ?>
						<option value="<?= $row['courseid'];?>"><?= $row['courseid']. " - " .$row['coursename']; ?></option>
					<?php endforeach; ?>
					</select></td>
				</tr>
				<tr> 
					<td>Register Date</td>
					<td> <input type="date" name="regdate" required></td>
				</tr>
				<tr> 
					<td colspan="2" align="center">
					<input type="submit" value="Submit">
					<input type="reset" value="Reset">
					</td>
				</tr>
			<table>
			</article>
		</section>
		
		<footer>
			<?php include 'footer.php'; ?>
		</footer>	
		
		
	</body>
</html>