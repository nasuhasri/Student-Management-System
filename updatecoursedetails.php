<!doctype html>

<html>
	<head>
		<title>Course Registration System</title>
		<!--rel=relationship. Link to style page -->
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
				<h2 style="text-align:center"> Updating Course Form </h2>
				<form action = "updatecourseaction.php" id="updatecourseform" method="POST">				
				<?php
					//Connect to database bcs want to fetch data from database
					$conn = OpenCon();
					
					$courseid = $_GET["courseid"];
					
					$sql = "select * from course where courseid = '$courseid'";
					$result = $conn->query($sql);
					
					if($result->num_rows > 0) {
						//output data of each row
						while($row = $result->fetch_assoc()){
							
							$courseid = $row["CourseID"];
							$coursename = $row["CourseName"];
							$coursedate = $row["CourseDate"];
							
							echo "<table>";
								echo "<tr>";
									echo "<td> Course ID </td>";
									echo "<td>" ?> <input type="text" name="courseid" value="<?php echo $courseid; ?>" readonly><?php "</td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> Course Name </td>";
										echo "<td>" ?>
											<select id="course" name="coursename">
												<option value="Information System Development" <?php if($coursename == "Information System Development") echo "SELECTED";?>>Information System Development</option>
												<option value="Practical Approach of Operating Systems" <?php if($coursename == "Practical Approach of Operating Systems") echo "SELECTED";?>>Practical Approach of Operating Systems</option>
												<option value="Fundamentals of Data Structures" <?php if($coursename == "Fundamentals of Data Structures") echo "SELECTED";?>>Fundamentals of Data Structures</option>
												<option value="Interactive Multimedia" <?php if($coursename == "Interactive Multimedia") echo "SELECTED";?>>Interactive Multimedia</option>
												<option value="Fundamentals of Entrepreneurship" <?php if($coursename == "Fundamentals of Entrepreneurship") echo "SELECTED";?>>Fundamentals of Entrepreneurship</option>	
												<option value="Introduction to Probability and Statistics" <?php if($coursename == "Introduction to Probability and Statistics") echo "SELECTED";?>>Introduction to Probability and Statistics</option>		
											</select>
										
											<?php "</td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> Date created </td>";
									echo "<td>"?><input type="date" name="coursedate" value="<?php echo $coursedate; ?>" ><?php "</td>";
								echo "</tr>";
							echo "</table>";
						}
					}
					else {
						echo "Data cannot be displayed";
					}
					
					CloseCon($conn);
				?>
				
				<table>
					<tr>
						<td colspan="2" align="center">
							<!--Click submit then the form will go to updatecourseaction.php-->
							<input type="submit" value="Submit" />
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