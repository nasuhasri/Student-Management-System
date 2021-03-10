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
				<h2 style = "text-align:center">Insert Student Data into Database</h2>
				<?php
					$courseid = $_POST["courseid"];
					$coursename = $_POST["coursename"];
					$coursedate = $_POST["coursedate"];
					
					/* remove -> include 'conn.php';
					bcs conn.php already in header page */
					$conn = OpenCon();
					
					$sql = "INSERT INTO course (CourseID, CourseName, CourseDate)
							VALUES ('$courseid', '$coursename', '$coursedate')";
							
					if (mysqli_query($conn, $sql)) {
						//echo "New record created successfully \n";
						
						//'$courseid' kena letak single quotation sbb data type dia varchar which is characters
						$sql2 = "select * from course where CourseID = '$courseid'";
						
						$result = $conn->query($sql2);
						
						if ($result->num_rows> 0 ){
							
							//output data of each row
							while($row = $result->fetch_assoc()){
								
								$courseid = $row["CourseID"];
								$coursename = $row["CourseName"];
								$coursedate = $row["CourseDate"];
								
								echo "<table>";
									echo "<tr>";
										echo "<td> Course ID </td>";
										echo "<td> $courseid </td>";
									echo "<tr>";
									
									echo "<tr>";
										echo "<td> Course Name </td>";
										echo "<td> $coursename </td>";
									echo "<tr>";
									
									echo "<tr>";
										echo "<td> Course Date </td>";
										echo "<td> $coursedate </td>";
									echo "<tr>";									
								echo "</table>";
										
							}
						}
					}
					else {
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
					
					CloseCon($conn);
				?>
				
				<table>
					<tr>
						<td colspan="2" align="center">
							<input type="button" value="Home" onclick="window.location.href='homepage.php'" />
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