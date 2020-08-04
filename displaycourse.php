<!DOCTYPE html>

<html>
	<head>
		<title>Course Registration System</title>
		<link rel="stylesheet" type="text/css" href="style.css">\
		<script type="text/javascript">
			function confirmDelete(courseid)
			{
				if(confirm('Sure To Remove This Record ?'))
				{
					window.location.href='deletecourse.php?courseid='+courseid;
				}
			}
		</script>
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
				<h2 style= style="text-align: center">Display All Courses From Database</h2>
			
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

				$sql = "select * from course limit $page1,4";
				$result = $conn ->query($sql);

				echo "<table>";
					echo "<tr>";
					echo "<th>Course ID</th>";
					echo "<th>Course Name</th>";
					echo "<th>Course Date</th>";
					echo "<th>Update or Delete</th>";
				echo"</tr>";

				if($result-> num_rows > 0) {
					//output data of each row
					while($row = $result->fetch_assoc()){

						$courseid = $row["courseid"];
						$coursename =$row["coursename"];
						$coursedate = $row["coursedate"];
						
						
					echo "<tr>";
						echo "<td>$courseid</td>";
						echo "<td>$coursename</td>";
						echo "<td>$coursedate</td>";
						echo "<td>" ?><button onclick="window.location.href='updatecoursedetails.php?courseid=<?php echo $courseid ?>'""><img src="images/update.png" style="width: 20px; height: 20px;"></button>
							  		  <button onclick="confirmDelete('<?php echo $courseid ?>')"><img src="images/no.png" style="width: 20px; height: 20px;"></button><?php "</td>";
				    echo "</tr>";
				    echo "</tr>";
					}
				}else 
					echo "Error in fetching data";
				
				echo "</table>";

				$sql2 = "select count(*) FROM course";
				$result = $conn->query($sql2);
				$row = $result ->fetch_row();
				$count = ceil($row[0]/4);
				for($pageno=1;$pageno<=$count;$pageno++){
					?><a href="displaycourse.php?page=<?php echo $pageno; ?>" style="text-decoration:none"> <?php echo $pageno. " "; ?></a><?php
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