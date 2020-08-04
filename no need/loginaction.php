<!DOCTYPE html>
<html>
	<head>
		<title>Student Registration</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
		
		<header>
		    <h2>Only Authorized User is Allowed</h2>
		</header>
		
		<section>
			<nav>
			<ul>
				<li><a href="login.php">Please Login First</a></li>
			</ul>
			</nav>
			
			<article>
				<?php
				
				include 'conn.php';
				$conn = OpenCon();
				session_start();
				
					//username and password sent from form
					$staffid = $_POST["staffid"];
					$password = $_POST["password"];
					
					$sql = "SELECT * FROM staff WHERE staffid = $staffid and password = '$password'";
					
					$result = $conn->query($sql);
					//output data
					
					if($result->num_rows>0)
					{
						while($row=$result->fetch_assoc())
						{
							$_SESSION['login_user'] = $staffid;
							
							header("location: homepage.php");
						}
					}
					else
					{
						echo "Your Login Name or Password is invalid";
					}
					
					CloseCon($conn);
				?>
			</article>
		</section>

<footer>
	<?php include 'footer.php'; ?>
</footer>
</body>
</html>