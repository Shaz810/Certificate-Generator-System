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
				<h2 style="text-align:center">Delete Course</h2>
				<?php

				$courseid = $_GET["courseid"];
				$conn = OpenCon();

				$sql = "delete from course where courseid = '$courseid'";
				
				$result = $conn->query($sql);

				if(! $result) {
					die('Could not delete data: ' . mysqli_error());
				}
				else {
					echo "Data has been deleted";
				}

				?>
			</article>
		</section>
		
		<footer>
			<?php include 'footer.php'; ?>
		</footer>	
		
		
	</body>
</html>