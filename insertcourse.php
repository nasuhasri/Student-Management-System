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
				<h2 style = "text-align: center"> New Course Forms</h2> <br>
				<form action="insertcourseaction.php" id="form" method="POST">
				<table>
					<tr>
						<td>Course ID</td>
						<td><input type="text" name="courseid" maxlength="10" placeholder="ITS332" required><br></td>
					</tr>
					
					<tr>
						<td>Course Name</td>
						<td><select id="course" name="coursename">
										 <option value="Information System Development" selected>Information System Development</option>
										 <option value="Practical Approach of Operating Systems">Practical Approach of Operating Systems</option>
										 <option value="Fundamentals of Data Structures">Fundamentals of Data Structures</option>
										 <option value="Interactive Multimedia">Interactive Multimedia</option>
										 <option value="Fundamentals of Entrepreneurship">Fundamentals of Entrepreneurship</option>
										 <option value="Introduction to Probability and Statistics">Introduction to Probability and Statistics</option>
							</select><br>
						</td>
					</tr>
					
					<tr>
						<td>Course Date</td>
						<td><input type="date" name="coursedate" required><br></td>
					</tr>
					
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value="Submit">
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