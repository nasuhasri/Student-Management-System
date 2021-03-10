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
				<h2 style="text-align:center">Updating Form</h2>
				<form action="updateregaction.php" id="updateform" method="POST">
				<?php
					$conn = OpenCon();
					//Get regid from url
					$regid = $_GET["regid"];
					
					$sql = "select * from registration r, student s, course c
							where r.stuid = s.stuid
							and r.courseid = c.courseid
							and regid = $regid";
							
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0){
						//output data of each row
						while ($row = $result->fetch_assoc()){
							
							$stuid = $row["stuID"];
							$stuname = $row["stuName"];
							$registerid = $row["regID"];
							$courseid = $row["CourseID"];
							$coursename = $row["CourseName"];
							
							$sql2 = "select * from course";
							$result2 = $conn->query($sql2);
							
							echo "<table>";
								echo "<tr>";
									echo "<td> Registration ID </td>";
									echo "<td>" ?><input type="text" name="regid" value="<?php echo $registerid; ?>" readonly><?php "</td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> Student ID </td>";
									echo "<td>" ?><input type="text" name="stuid" value="<?php echo $stuid; ?>" readonly><?php "</td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> Student Name </td>";
									echo "<td>" ?><input type="text" name="stuname" value="<?php echo $stuname; ?>" readonly><?php "</td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> Registration Date </td>";
									echo "<td>" ?><input type="date" name="regdate" value="<?php echo $regdate; ?>"><?php "</td>";
								echo "</tr>";
								
								echo "<tr>";
									echo "<td> Course </td>";
									echo "<td>" ?>
											<select name = "courseid">
												<?php 
													foreach($result2 as $row){
														/*** create the options ***/
														/*** the value is what we get from database ***/
														echo '<option value="'.$row['CourseID'].'"';
														/*** Kalau value crsID==$courseid, dia akan selected ***/
														if($row['CourseID']==$courseid){
															echo 'selected';
														}
														//ITS332 - IS Development
														echo '>' .$row['CourseID']."-".$row['CourseName'] . '</option>';
													}
												?>
											</select>
											<?php "</td>";											
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
							<input type="submit" value="Submit" />
							<input type="button" value="Back" onclick="history.back()"/>
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