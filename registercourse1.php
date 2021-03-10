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
				<h2 style="text-align:center">Course Registration Form</h2>
				<form action="registercourseaction.php" id="form" method="POST">
				<?php
					echo "This is to register course";
					//Do get method bcs it is in url
					$stuid = $_GET["studentid"];
					
					//include 'conn.php';
					$conn = OpenCon();
					
					$sql1 = "select * from student where stuid = $stuid";
					
					$result1 = $conn->query($sql1);
					
					if ($result1->num_rows > 0) {
						// output data of each row
						while ($row = $result1->fetch_assoc()) {
							
							$stuid = $row["stuID"];
							$stuname = $row["stuName"];
						}
					}
					else {
						echo "Data cannot be displayed";
					}
					
					$sql2 = "select * from course";
					
					$result2 = $conn->query($sql2);
				?>
				
				<table>
					<tr>
						<td>Student ID</td>
						<td><input type="text" name="stuid" value="<?php echo $stuid?>" readonly></td>
					</tr>
					
					<tr>
						<td>Full Name</td>
						<td><input type="text" value="<?php echo $stuname?>" readonly></td>
					</tr>
					
					<tr>
						<td>Subject</td>
						<!--Drop down pakai select -->
						<td><select name = "courseid">
							<?php foreach ($result2 as $row): ?>
								<!--value=courseid. tapi display courseid-coursename -->
								<!--open option: courseid / display kat user / close option-->
								<option value="<?= $row['CourseID']; ?>"> <?=$row['CourseID']. " - ".$row['CourseName'];?> </option>
							<?php endforeach ?>
						</select></td>
					</tr>
					
					<tr>
						<td>Register Date</td>
						<td><input type="date" name="regdate" required ></td>
					</tr>
					
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value="Submit">
							<input type="reset" value="Reset">
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