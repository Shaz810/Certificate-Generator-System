<!DOCTYPE html>
<?php
	require 'conn.php';
	//$conn = OpenCon();
?>
<html lang="en">
	<head>
		<style>	
		.table {
			width: 100%;
			margin-bottom: 20px;
		}	
		
		.table-striped tbody > tr:nth-child(odd) > td,
		.table-striped tbody > tr:nth-child(odd) > th {
			background-color: #f9f9f9;
		}
		
		@media print{
			#print {
				display:none;
			}
		}
		@media print {
			#PrintButton {
				display: none;
			}
		}
		
		@page {
			size: auto;   /* auto is the initial value */
			margin: 0;  /* this affects the margin in the printer settings */
		}
	</style>
	</head>
<body>
	<h2>Sourcecodester</h2>
	<br /> <br /> <br /> <br />
	<b style="color:blue;">Date Prepared:</b>
	<?php
		$date = date("Y-m-d", strtotime("+6 HOURS"));
		echo $date;
	?>
	<br /><br />
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Registration ID</th>
				<th>Registration Date</th>
				<th>Student ID</th>
				<th>Student Name</th>
				<th>Course ID</th>
				<th>Course Name</th>
			</tr>
		</thead>
		<tbody>
			<?php
				require 'conn.php';
				
				$query = $conn->query("select * 
				from registration r, student s, course c, staff f
				where r.stuid = s.stuid
				and r.courseid = c.courseid
				and r.staffid = f.staffid
				and f.staffid = $user_check
				order by regdate desc");
				while($fetch = $query->fetch_array()){
					
			?>
			
			<tr>
				<td style="text-align:center;"><?php echo $fetch['regid']?></td>
				<td style="text-align:center;"><?php echo $fetch['regdate']?></td>
				<td style="text-align:center;"><?php echo $fetch['stuid']?></td>
				<td style="text-align:center;"><?php echo $fetch['stuname']?></td>
				<td style="text-align:center;"><?php echo $fetch['courseid']?></td>
				<td style="text-align:center;"><?php echo $fetch['coursename']?></td>
			</tr>
			
			<?php
				}
			?>
		</tbody>
	</table>
	<center><button id="PrintButton" onclick="PrintPage()">Print</button></center>
</body>
<script type="text/javascript">
	function PrintPage() {
		window.print();
	}
</script>
</html>


