<!doctype html>

<html>
	<head>
		<title>Course Registration System</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
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
				<h2 style = "text-align: center"> Student's Registration Forms</h2> <br>
				<form action="insertstudentaction.php" id="form" method="POST">
				<table>
					<tr>
						<td>Full Name</td>
						<td><input type="text" name="fullname" maxlength="50" placeholder="Nasuha Asri" required><br></td>
					</tr>
					<tr>
						<td>Birth Date</td>
						<td><input type="date" name="birthdate" required><br></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="email" name="email" maxlength="100" placeholder="nasuhasri00@gmail.com" required><br></td>
					</tr>			
					<tr>
						<td>Address</td>
						<td><textarea name="address" rows="5" cols="20" required></textarea><br></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td><input type="radio" id="male" name="gender" value="male" /> Male
							<input type="radio" id="female" name="gender" value="female" /> Female <br></td>
					</tr>
					<tr>
						<td>State</td>
						<td><select id="state" name="state">
										 <option value="Melaka" selected>Melaka</option>
										 <option value="Johor">Johor</option>
										 <option value="Pahang">Pahang</option>
										 <option value="Selangor">Selangor</option>
										 <option value="Terengganu">Terengganu</option>
										 <option value="Kelantan">Kelantan</option>
										 <option value="Perak">Perak</option>
										 <option value="Wilayah Persekutuan Kuala Lumpur">Wilayah Persekutuan Kuala Lumpur</option>
										 <option value="Sabah">Sabah</option>
										 <option value="Sarawak">Sarawak</option>
										 <option value="Negeri Sembilan">Negeri Sembilan</option>
										 <option value="Perlis">Perlis</option>
										 <option value="Kedah">Kedah</option>
										 
										 
									   </select><br></td>
					</tr>
					<tr>
						<td>Faculty</td>
						<td><input type="radio" id="fskm" name="faculty" value="Faculty of Computer Science and Mathematics" /> Faculty of Computer Science and Mathematics <br>
							<input type="radio" id="fee" name="faculty" value="Faculty of Electrical Engineering" /> Faculty of Electrical Engineering  <br>							
							<input type="radio" id="faps" name="faculty" value="Faculty of Architecture, Planning & Surveying" /> Faculty of Architecture, Planning & Surveying  <br>							
						</td>
					</tr>
					<tr>
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