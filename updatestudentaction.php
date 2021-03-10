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
				<h2 style="text-align:center">Update Student Data in Database</h2>
				<!-- $_POST["studentid"] diambil drpd method POST drpd updatestudentdetails.php -->
				<?php
					//nama variable ni ambil drdpd form 
					$stuid = $_POST["studentid"];
					$stuname = $_POST["studentname"];
					$state = $_POST["state"];					
					$dateOfBirth = $_POST["birthdate"];
					$faculty = $_POST["faculty"];
					$address = $_POST["address"];
					$email = $_POST["email"];
					
					$conn = OpenCon();
					
					$sql = "Update student 
							set stuname = '$stuname',
								stuBirthDate = '$dateOfBirth',
								stuEmail = '$email',
								stuAddress = '$address',
								stuState = '$state',
								stuFaculty = '$faculty'
							where stuID = $stuid";
					
					$result = $conn->query($sql);
					
					if ($result == true){
						//echo "Record updated successfully \n";
						
						$sql2 = "select * from student where stuid = $stuid";
						$result = $conn->query($sql2);
						
						if($result->num_rows > 0) {
							//output data of each row
							while($row = $result->fetch_assoc()){
								//nama variable kena lain sbb yang ni ambil drpd database
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