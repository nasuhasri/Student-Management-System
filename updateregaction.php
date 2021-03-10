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
				<h2 style="text-align:center"> Update Registration Data in Database </h2>
				<?php
					$regid = $_POST["regid"];
					$stuid = $_POST["stuid"];
					$regdate = $_POST["regdate"];
					$courseid = $_POST["courseid"];
					
					$conn = OpenCon();
					
					$sql = "update registration
							set regdate = '$regdate', 
								courseid = '$courseid'
							where regid = $regid;";
							
					$result = $conn->query($sql);
					
					if($result == true){
						// echo "Record updated successfully \n";
						// display back all the data that has been inserted
						
						$sql2 = "select * from registration r, student s, course c 
								where r.stuid = s.stuid
								and r.courseid = c.courseid
								and regid = $regid";
						
						$result2 = $conn->query($sql2);
						
						if($result2 -> num_rows > 0){
							//output data of each row
							while ($row = $result2->fetch_assoc()){
							
								$stuid = $row["stuID"];
								$stuname = $row["stuName"];
								$registerid = $row["regID"];
								$courseid = $row["CourseID"];
								$coursename = $row["CourseName"];
								
								echo "<table>";
									echo "<tr>";
										echo "<td> Registration ID </td>";
										echo "<td> $regid </td>";
									echo "</tr>";
									
									echo "<tr>";
										echo "<td> Registration Date </td>";
										echo "<td> $regdate </td>";
									echo "</tr>";
									
									echo "<tr>";
										echo "<td> Student ID </td>";
										echo "<td> $stuid </td>";
									echo "</tr>";
									
									echo "<tr>";
										echo "<td> Full Name </td>";
										echo "<td> $stuname </td>";
									echo "</tr>";
									
									echo "<tr>";
										echo "<td> Course ID </td>";
										echo "<td> $courseid </td>";
									echo "</tr>";
									
									echo "<tr>";
										echo "<td> Course Name </td>";
										echo "<td> $coursename </td>";
									echo "</tr>";
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
							<input type="button" value="Home" onclick="window.location.href='homepage.php'"/>
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