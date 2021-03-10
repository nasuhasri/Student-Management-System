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
				<h2 style="text-align:center">Insert Course Registration Data into Database</h2>
				<?php
					//echo "This is to process registration";
					
					//Value is from the form registercourse1.php
					$stuid = $_POST["stuid"];
					$cid = $_POST["courseid"];
					$regid = rand(0, 999999);
					$regdate = $_POST["regdate"];
					/**$login_id coming from session.php**/
					$staffid = $login_id;
					
					$conn = OpenCon();
					
					$sql = "INSERT INTO registration (regID, stuID, CourseID, regDate, staffid)
							VALUES ($regid, $stuid, '$cid', '$regdate', $staffid)";
							
					if (mysqli_query($conn, $sql)) {
						//echo "New record created successfullly \n";
						
						//display back all data that has been inserted
						$sql2 = "select * from registration r, student s, course c
								where r.stuid=s.stuid
								and r.courseid = c.courseid
								and regid = $regid";
						
						$result = $conn->query($sql2);
						
						if ($result->num_rows > 0) {
							//output data of each row
							while($row = $result->fetch_assoc()){
								
								$studentid = $row["stuID"];
								$studentname = $row["stuName"];
								$courseid = $row["CourseID"];
								$coursename = $row["CourseName"];
								$regdate = $row["regDate"];
								
								echo "<table>";
									echo "<tr>";
										echo "<td> Student ID </td>";
										echo "<td> $studentid </td>";
									echo "</tr>";
									
									echo "<tr>";
										echo "<td> Full Name </td>";
										echo "<td> $studentname </td>";
									echo "</tr>";
									
									echo "<tr>";
										echo "<td> Course ID </td>";
										echo "<td> $courseid </td>";
									echo "</tr>";
									
									echo "<tr>";
										echo "<td> Course Name </td>";
										echo "<td> $coursename </td>";
									echo "</tr>";

									echo "<tr>";
										echo "<td> Registration Date </td>";
										echo "<td> $regdate </td>";
									echo "</tr>";
									
								echo "</table>";
							}
						}
					}
					else {
						echo "Error: " . $sql. "<br>" . mysqli_error($conn);
					}
					
					CloseCon($conn);
				?>
				
				<table>
					<tr>
						<td colspan="2" align="center">
							<input type = "button" value="Home" onclick="window.location.href='homepage.php'" />
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