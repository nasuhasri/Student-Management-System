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
				<h2 style="text-align:center"> Display Course Details From Database </h2>
				<?php
					$conn = OpenCon();
					/* Get course id from url */
					$courseid = $_GET["courseid"];
					
					$sql = "select * from course where courseid = '$courseid'";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						/* output data of each row */
						/** Take data from database. Attribute kena sama dgn apa yang ada dlm db**/
						while ($row = $result -> fetch_assoc()){
							
							$courseid = $row["CourseID"];
							$coursename = $row["CourseName"];
							$coursedate = $row["CourseDate"];
							
							/* Display data to user in table format */
							echo "<table>";
								echo "<tr>";
									echo "<td> Course ID </td>";
									echo "<td> $courseid </td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> Course Name </td>";
									echo "<td> $coursename </td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> Course Date </td>";
									echo "<td> $coursedate </td>";
								echo "</tr>";
							echo "</table>";
						} // end of while
					} // end of if
					else {						
						echo "Data cannot be displayed";
					}
					
					CloseCon($conn);
				?>
				
				<table>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value="Update" onclick="window.location.href='updatecoursedetails.php?courseid=<?php echo $courseid ?>'"/>
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