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
				<h2 style= style="text-align: center">Display All Students From Database</h2>
			
			<?php 

				$conn = OpenCon();
				//get page number
				$page = 0;

				//set variable
				if(isset($_GET["page"])==true) {
					$page = ($_GET["page"]);
				}
				else {
					$page = 0;	
				}

				//algo for pagination in sql
				if ($page=="" || $page=="1"){
						$page1 = 0;
				}
				else {
					$page1= ($page*4)-4;
				}

				$sql = "select * from student limit $page1,4";
				$result = $conn ->query($sql);

				echo "<table>";
					echo "<tr>";
					echo "<th>Student ID</th>";
					echo "<th>Student Name</th>";
					echo "<th>Student Age</th>";
					echo "<th>Student Email</th>";
					echo "<th>Student Faculty</th>";
					echo "<th>Student State</th>";
				echo"</tr>";

				if($result-> num_rows > 0) {
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
					echo "<tr>";
						//echo "<td>$studentid</td>";
						echo "<td><a href=displaystudentdetails.php?studentid=$studentid>$studentid</a></td>";
						echo "<td>$studentname</td>";
						echo "<td>".$age->format('%y')."</td>";
						echo "<td>$studentemail</td>";
						echo "<td>$studentfaculty</td>";
						echo "<td>$studentstate</td>";
				    echo "</tr>";
					}
				}else 
					echo "Error in fetching data";
				
				echo "</table>";

				$sql2 = "select count(*) FROM student";
				$result = $conn->query($sql2);
				$row = $result ->fetch_row();
				$count = ceil($row[0]/4);
				for($pageno=1;$pageno<=$count;$pageno++){
					?><a href="displaystudent.php?page=<?php echo $pageno; ?>" style="text-decoration:none"> <?php echo $pageno. " "; ?></a><?php
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