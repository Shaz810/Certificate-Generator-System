<!DOCTYPE html>

<html>
	<head>
		<title>Course Registration System</title>
		
		<link rel="stylesheet" type="text/css" href="style.css">
		</style>
		
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
				<h2 style="text-align:center">Insert New Course</h2>
				<form action="insertcourseaction.php" id="form" method="POST">
				<table>
				<tr> 
					<td>Course ID</td>
					<td><input type="text" name="courseid" maxlength="50" placeholder="ITS332" required></td>
				</tr>
				<tr> 
					<td>Course Name</td>
						<td> <select id="coursename" name="coursename">
						<option value="Practical Approach of Operating Systems"selected>Practical Approach of Operating Systems</option>
						<option value="Fundamentals of Data Structure">Fundamentals of Data Structure</option>
						<option value="Interactive Multimedia">Interactive Multimedia</option>
						<option value="Fundamentals of Entrepreneurship">Fundamentals of Entrepreneurship</option>
						<option value="Introduction to Probability and Statistics">Introduction to Probability and Statistics</option>
						<option value="Information Systems Development">Information Systems Development</option>
					</select></td>
					
				</tr>
				<tr> 
					<td>Course Date</td>
					<td> <input type="date" name="coursedate" required></td>
				</tr>
				<tr>
				    <td></td>
					<td colspan="2" align="center">
					<input type="submit" value="Submit">
					<input type="reset" value="Reset">
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