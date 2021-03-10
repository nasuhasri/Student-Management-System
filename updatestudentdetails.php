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
				<h2 style="text-align:center"> Updating Form </h2>
				<form action = "updatestudentaction.php" id="updateform" method="POST">
				<?php
					//Connect to database bcs want to fetch data from database
					$conn = OpenCon();
					
					$studentid = $_GET["studentid"];
					
					$sql = "select * from student where stuid = $studentid";
					$result = $conn->query($sql);
					
					if($result->num_rows > 0) {
						//output data of each row
						while($row = $result->fetch_assoc()){
							
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
									echo "<td>" ?> <input type="text" name="studentid" value="<?php echo $studentid; ?>" readonly><?php "</td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> Full Name </td>";
									echo "<td> "?> <input type="text" name="studentname" value="<?php echo $studentname;?>" ><?php "</td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> Birth Date </td>";
									echo "<td>"?><input type="date" name="birthdate" value="<?php echo $studentbirthdate; ?>" ><?php "</td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> Email Address </td>";
									echo "<td>"?><input type="text" name="email" value="<?php echo $studentemail; ?>" ><?php "</td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> Address </td>";
									echo "<td>"?><textarea name="address" cols="20" rows="5"> <?php echo $studentaddress; ?> </textarea> <?php "</td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> State </td>";
										echo "<td>" ?>
											<select id="state" name="state">
												<option value="Johor" <?php if($studentstate == "Johor") echo "SELECTED";?>>Johor</option>
												<option value="Kedah" <?php if($studentstate == "Kedah") echo "SELECTED";?>>Kedah</option>
												<option value="Kelantan" <?php if($studentstate == "Kelantan") echo "SELECTED";?>>Kelantan</option>
												<option value="Negeri Sembilan" <?php if($studentstate == "Negeri Sembilan") echo "SELECTED";?>>Negeri Sembilan</option>
												<option value="Melaka" <?php if($studentstate == "Melaka") echo "SELECTED";?>>Melaka</option>
												<option value="Pahang" <?php if($studentstate == "Pahang") echo "SELECTED";?>>Pahang</option>
												<option value="Perak" <?php if($studentstate == "Perak") echo "SELECTED";?>>Perak</option>
												<option value="Perlis" <?php if($studentstate == "Perlis") echo "SELECTED";?>>Perlis</option>
												<option value="Sabah" <?php if($studentstate == "Sabah") echo "SELECTED";?>>Sabah</option>
												<option value="Sarawak" <?php if($studentstate == "Sarawak") echo "SELECTED";?>>Sarawak</option>
												<option value="Terengganu" <?php if($studentstate == "Terengganu") echo "SELECTED";?>>Terengganu</option>
												<option value="Selangor" <?php if($studentstate == "Selangor") echo "SELECTED";?>>Selangor</option>
												<option value="W.P Kuala Lumpur" <?php if($studentstate == "W.P Kuala Lumpur") echo "SELECTED";?>>W.P Kuala Lumpur</option>
												<option value="W.P Putrajaya" <?php if($studentstate == "W.P Putrajaya") echo "SELECTED";?>>W.P Putrajaya</option>
												<option value="W.P Labuan" <?php if($studentstate == "W.P Labuan") echo "SELECTED";?>>W.P Labuan</option>
											</select>
										
											<?php "</td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> Faculty </td>";
									echo "<td>"?>
										<input type="radio" id="fskm" name="faculty" value="Faculty of Computer Science and Mathematics"
											<?php if($studentfaculty == "Faculty of Computer Science and Mathematics") echo "CHECKED";?>/>Faculty of Computer Science and Mathematics <br>
										<input type="radio" id="fee" name="faculty" value="Faculty of Electrical Engineering"
											<?php if($studentfaculty == "Faculty of Electrical Engineering") echo "CHECKED";?>/>Faculty of Electrical Engineering <br>
										<input type="radio" id="faps" name="faculty" value="Faculty of Architecture, Planning & Surveying"
											<?php if($studentfaculty == "Faculty of Architecture, Planning & Surveying") echo "CHECKED";?>/>Faculty of Architecture, Planning & Surveying <?php  "</td>";
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
							<!--Click submit then the form will go to updatestudentaction.php-->
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