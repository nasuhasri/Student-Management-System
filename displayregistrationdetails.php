<!doctype html>

<html>
	<head>
		<title>Course Registration System</title>
		<!--rel=relationship. Link to style page -->
		<link rel="stylesheet" type="text/css" href="styles.css">
		
		<script type="text/javascript">
			function confirmDelete(regid)
			{
				if(confirm('Sure To Remove This Record?'))
				{
					window.location.href= 'deletereport.php?regid=' + regid;
				}
			}
		</script>
		
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
				<h2 style="text-align:center"> Display Registration Details From Database </h2>
				<?php
					$conn = OpenCon();
					
					/* Get registration id from url */
					$regid = $_GET["regid"];
					
					$sql = "select * from registration r, student s, course c
							where r.stuid=s.stuid
							and r.regid = $regid
							and r.courseid = c.courseid";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						/* output data of each row */
						/** Take data from database. Attribute kena sama dgn apa yang ada dlm db**/
						while ($row = $result -> fetch_assoc()){
							
							$courseid = $row["CourseID"];
							$coursename = $row["CourseName"];
							$regid = $row["regID"];
							$regdate = $row["regDate"];
							$stuid = $row["stuID"];
							$stuname = $row["stuName"];
							
							/* Display data to user in table format */
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
							<input type="submit" value="Update" onclick="window.location.href='updateregdetails.php?regid=<?php echo $regid ?>'"/>
							<input type="button" value="Delete" onclick="confirmDelete(<?php echo $regid ?>)" />
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