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
				<h2 style="text-align:center">Student Registration Form</h2>
				<form action="insertstudentaction.php " id="form" method="POST">
				<table>
				<tr> 
					<td>Full Name</td>
					<td><input type="text" name="fullname" maxlength="50" placeholder="Noah Bin Iskandar" required></td>
				</tr>
				<tr> 
					<td>Birth Date</td>
					<td> <input type="date" name="birthdate" required></td>
				</tr>
				<tr> 
					<td>Email</td>
					<td> <input type="email" name="email" maxlength="100" placeholder="noah00@gmail.com" required></td>
				</tr>
				<tr> 
					<td>Address</td>
					<td> <textarea name="address" rows="5" cols="20"></textarea></td>
					</tr>
				<tr> 
					<td>State</td>
						<td> <select id="state" name="state">
						<option value="Johor" selected>Johor</option>
						<option value="Selangor">Selangor</option>
						<option value="Sarawak">Sarawak</option>
						<option value="Sabah">Sabah</option>
						<option value="Pahang">Pahang</option>
						<option value="Perak">Perak</option>
						<option value="Kedah">Kedah</option>
						<option value="Negeri Sembilan">Negeri Sembilan</option>
						<option value="Terengganu">Terengganu</option>
						<option value="Penang">Penang</option>
						<option value="Kelantan">Kelantan</option>
						<option value="Perlis">Perlis</option>
						<option value="W.P Kuala Lumpur">W.P Kuala Lumpur</option>
						<option value="W.P Labuan">W.P Labuan</option>
						<option value="W.P Putrajaya">W.P Putrajaya</option>
						<option value="Melaka">Melaka</option>
					</select></td>
				</tr>
				<tr> 
					<td>Faculty</td>
					<td> <input type="radio" id="faculty art and design" name="faculty" value="fskm" />Faculty Art and Design<br>
					<input type="radio" id="faculty plantation and agrotechnology" name="faculty" value="fpa" />Faculty Plantation and Agrotechnology<br>
					<input type="radio" id="faculty science computer and mathemathics" name="faculty" value="fs" />Faculty Science Computer and Mathematics</td>
				</tr>
				</table>
				<table>
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