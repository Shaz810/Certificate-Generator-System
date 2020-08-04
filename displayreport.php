<!DOCTYPE html>

<html>
	<head>
		<title>Course Registration System</title>
		
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript">
			function confirmDelete(regid)
			{
				if(confirm('Sure To Remove This Record ?'))
				{
					window.location.href='deleteregister.php?regid='+regid;
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
				<h2 style="text-align:center">Display All Students' Registration From Database</h2>
				<?php

				$conn = OpenCon();
				//get page number
				$page = 0;

				//set variable
				if(isset($_GET["page"])==true) {
					$page = ($_GET["page"]);
				}	else {
					$page = 0;	
				}

				//algo for pagination in sql
				if ($page=="" || $page=="1"){
						$page1 = 0;
				}
				else {
					$page1= ($page*4)-4;
				}

				$sql = "select * 
						from registration r, student s, course c, staff f
						where r.stuid = s.stuid
						and r.courseid = c.courseid
						and r.staffid = f.staffid
						and f.staffid = $user_check
						order by regdate desc
						limit $page1,4";

				$result = $conn ->query($sql);

				echo "<table>";
					echo "<tr>";
					echo "<th>Registration ID</th>";
					echo "<th>Registration Date</th>";
					echo "<th>Student ID</th>";
					echo "<th>Student Name</th>";
					echo "<th>Course ID</th>";
					echo "<th>Course Name</th>";
					echo "<th>Action</th>";
					echo "<th></th>";
				echo"</tr>";

				if($result-> num_rows > 0) {
					//output data of each row
					while($row = $result->fetch_assoc()){
						$regid = $row["regid"];
						$regdate =$row["regdate"];	
						$studentid = $row["stuid"];
						$studentname = $row["stuname"];
						$courseid = $row["courseid"];
						$coursename =$row["coursename"];
						
						
					echo "<tr>";
						echo "<td>$regid</td>";
						echo "<td>$regdate</td>";
						echo "<td><a href=displaystudentdetails.php?studentid=$studentid>$studentid</a></td>";
						echo "<td>$studentname</td>";
						echo "<td><a href=displaycoursedetails.php?courseid=$courseid>$courseid</a></td>";
						echo "<td>$coursename</td>";
						echo "<td>" ?><button onclick="window.location.href='updateregdetails.php?regid=<?php echo $regid ?>'"><img src="images/update.png" style="width: 20px; height: 20px;"></button>
									  <button id="PrintButton" onclick="PrintPage()"><img src="images/printer.jpg" style="width: 20px; height: 20px;"></button>
									  <button value="Delete" onclick="confirmDelete('<?php echo $regid ?>')"><img src="images/no.png" style="width: 20px; height: 20px;"></button><?php "</td>";
				    echo "</tr>";
					}
				}else 
				{
					echo "Error in fetching data";
				}
				echo "</table>";

				$sql2 = "select count(*) FROM registration";
				$result = $conn->query($sql2);
				$row = $result ->fetch_row();
				$count = ceil($row[0]/4);
				for($pageno=1;$pageno<=$count;$pageno++){
					?><a href="displayreport.php?page=<?php echo $pageno; ?>" style="text-decoration:none"> <?php echo $pageno. " "; ?></a><?php
				}

				CloseCon($conn);
				?>
	
			</article>
		</section>
		
		<footer>
			<?php include 'footer.php'; ?>
		</footer>	
		
		
	</body>

<script type="text/javascript">
	function PrintPage() {
		window.print();
	}
</script>

</html>