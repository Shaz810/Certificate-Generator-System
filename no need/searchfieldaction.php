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
				<h2 style="text-align:center">Result of Searching</h2>
				<?php
				
				$searching = $_GET["searchfield"];
				
				$conn = OpenCon();
				
				//get page number
				$page = 0;
				
				//set variable
				if(isset($_GET["page"])==true)
				{
					$page = $_GET["page"];
				}
				else
				{
					$page = 0;
				}
				
				//algo for pagination in sql
				if($page=="" || $page=="1")
				{
					$page1 = 0;
				}
				else
				{
					$page1 = ($page*7)-7;
				}
				
				$sql = "select *
						from registration r, student s, course c, staff f
						where r.stuid = s.stuid
						and r.courseid = c.courseid
						and r.staffid = f.staffid
						and f.staffid = $user_check
						and (r.regid like '%$searching%'
						or r.regdate like '%$searching%'
						or r.stuid like '%$searching%'
						or s.stuname like '%$searching%'
						or r.courseid like '%$searching%'
						or c.coursename like '%$searching%')
						limit $page1,7";
						
				$result = $conn->query($sql);
				
				if($result->num_rows>0)
				{
					echo"<table>";
						echo"<tr>";
							echo"<th>Registration ID</th>";
							echo"<th>Registration Date</th>";
							echo"<th>Student ID</th>";
							echo"<th>Student Name</th>";
							echo"<th>Course ID</th>";
							echo"<th>Course Name</th>";
						echo"</tr>";
						
					//output data of each row
					while($row = $result->fetch_assoc())
					{
						$studentid = $row["stuid"];
						$studentname = $row["stuname"];
						$regid = $row["regid"];
						$regdate = $row["regdate"];
						$courseid = $row["courseid"];
						$coursename = $row["coursename"];
						
						echo"<tr>";
							echo"<td><a href=displayreport.php>$regid</a></td>";
							echo"<td>$regdate</td>";
							echo"<td><a href=displaystudentdetails.php>studentid=$studentid</a></td>";
							echo"<td>$studentname</td>";
							echo"<td><a href=displaycourse.php>$courseid</a></td>";
							echo"<td>$coursename</td>";
						echo"</tr>";
					}
				}
				else
				{
					echo"No Result";
				}
				echo"</table>";
				
				//count number of record
				if($result->num_rows > 0)
				{
					$sql2 = "select count(*)
					from registration r, student s, course c
					where r.stuid = s.stuid
					and r.courseid = c.courseid
					and (r.regid like '%$searching%'
					or r.regdate like '%$searching%'
					or r.stuid like '%$searching%'
					or s.stuname like '%$searching%'
					or r.courseid like '%$searching%'
					or c.coursename like '%$searching%')";
					
					$result = $conn->query($sql2);
					$row = $result->fetch_row();
					$count = ceil($row[0]/7);
					
					for($pageno=1;$pageno<=$count;$pageno++)
					{
						?><a href="searchfieldaction.php?page=<?php echo $pageno; ?>&searchfield=<?php echo $searching; ?>"
						style="text-decoration:none"><?php echo $pageno. " ";?></a><?php
					} 
				}
				CloseCon($conn);
				?>
				
				<table>
					<tr>
						<td colspan="2" align="center">
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