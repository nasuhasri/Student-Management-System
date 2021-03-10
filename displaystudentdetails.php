<!doctype html>

<html>
	<head>
		<title>Course Registration System</title>
		<!--rel=relationship. Link to style page -->
		<link rel="stylesheet" type="text/css" href="styles.css">
		
		<script type="text/javascript">
			function confirmDelete(stuid)
			{
				if(confirm('Sure To Remove This Record?'))
				{
					window.location.href= 'deletestudent.php?stuid=' + stuid;
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
				<h2 style="text-align:center"> Display Student Details From Database </h2>
				<?php 
					//echo 'This is students details'; 
					$conn = OpenCon();
					//Get student id from url
					$studentid = $_GET["studentid"];
					
					$sql = "select * from student where stuid = $studentid";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						//output data of each row
						while ($row = $result -> fetch_assoc()){
							
							$today = date("Y-m-d");
							$age = date_diff(date_create($row["stuBirthDate"]), date_create($today));
							$studentid = $row["stuID"];
							$studentname = $row["stuName"];
							$studentbirthdate = $row["stuBirthDate"];
							$studentstate = $row["stuState"];
							$studentfaculty = $row["stuFaculty"];
							$studentemail = $row["stuEmail"];
							$studentaddress = $row["stuAddress"];
							
							//Display data to user in table format
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
									echo "<td> Birth Date </td>";
									echo "<td> $studentbirthdate </td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> Age </td>";
									echo "<td>" .$age->format('%y'). "</td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> Email Address </td>";
									echo "<td> $studentemail </td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> Address </td>";
									echo "<td> $studentaddress </td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> State </td>";
									echo "<td> $studentstate </td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> Faculty </td>";
									echo "<td> $studentfaculty </td>";
								echo "</tr>";								
							echo "</table>"	;								
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
							<input type="button" value="Register Course" onclick="window.location.href='registercourse1.php?studentid=<?php echo $studentid ?>'"/>
							<input type="submit" value="Update" onclick="window.location.href= 'updatestudentdetails.php?studentid= <?php echo $studentid ?>' "/>
							<input type="button" value="Delete" onclick="confirmDelete(<?php echo $studentid ?>)" />
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