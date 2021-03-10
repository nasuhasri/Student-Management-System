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
				<h2 style="text-align:center">Update Course Data in Database</h2>
				<?php
					//$_POST["courseid"] diambil drpd method POST drpd updatecoursedetails.php 
					$crsID = $_POST["courseid"];
					$crsName = $_POST["coursename"];
					$crsDate = $_POST["coursedate"];
					
					$conn = OpenCon();
					//'$crsID' sama dgn variable yang dah declared
					$sql = "Update course 
							set courseID = '$crsID',
								courseName = '$crsName',
								courseDate = '$crsDate'								
							where courseID = '$crsID'";
					
					$result = $conn->query($sql);
					
					if ($result == true){
						//echo "Record updated successfully \n";
						
						$sql2 = "select * from course where courseid = '$crsID'";
						$result = $conn->query($sql2);
						
						if($result->num_rows > 0) {
							//output data of each row
							while($row = $result->fetch_assoc()){
								//nama variable kena lain sbb yang ni ambil drpd database
								$courseid = $row["CourseID"];
								$coursename = $row["CourseName"];
								$coursedate = $row["CourseDate"];
								
								//Display data to user in table format
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
								echo "</table>"	;				
							} // end of while
						} // end of if($result->num_rows > 0)
					} // end of if ($result == true)
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