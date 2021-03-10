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
				<h2 style="text-align:center">Result of Searching</h2>
				<?php
					$searching = $_GET["searchfield"];
					
					$conn = OpenCon();
					
					/**$login_id coming from session.php**/
					$staffid = $login_id;
					
					//get page number
					$page = 0;
					
					//set variable
					if(isset($_GET["page"])==true){
						$page = $_GET["page"];
					}
					else{
						$page = 0;
					}
					
					//algo for pagination in sql
					if ($page=="" || $page=="1"){
						$page1 = 0;
					}
					else{
						$page1 = ($page*7)-7;
					}
					
					$sql = "select * from registration r, student s, course c, staff st
							where r.stuid = s.stuid
							and r.courseid = c.courseid
							and r.staffid = st.staffid
							and st.staffid = $staffid
							and (r.regid like '%$searching%'
							or r.regdate like '%$searching%'
							or r.stuid like '%$searching%'
							or s.stuname like '%$searching%'
							or r.courseid like '%$searching%'
							or c.coursename like '%$searching%')
							limit $page1, 7";
					
					$result = $conn->query($sql);
					
				    if($result->num_rows > 0){
						
						echo "<table>";
							echo "<tr>";
								echo "<th> Registration ID </th>";
								echo "<th> Registration Date </th>";
								echo "<th> Student ID </th>";
								echo "<th> Student Name </th>";
								echo "<th> Course ID </th>";
								echo "<th> Course Name </th>";
								echo "<th></th>";
							echo "</tr>";
							
							// output data of each row
							while($row = $result->fetch_assoc()){
								
								$studentid = $row["stuID"];
								$studentname = $row["stuName"];
								$regid = $row["regID"];
								$regdate = $row["regDate"];
								$courseid = $row["CourseID"];
								$coursename = $row["CourseName"];
								
								echo "<tr>";
									//echo "<td> $regid </td>";
									echo "<td><a href=displayregistrationdetails.php?regid=$regid>$regid</a></td>";
									echo "<td> $regdate </td>";
									echo "<td><a href=displaystudentdetails.php?studentid=$studentid>$studentid</a></td>";
									echo "<td> $studentname </td>";
									echo "<td><a href=displaycoursedetails.php?courseid=$courseid>$courseid</a></td>";
									echo "<td> $coursename </td>";
									echo "<td>"?><button onclick="window.location.href='updateregdetails.php?regid=<?php echo $regid ?>'">UPDATE</button>
												<button onclick="confirmDelete('<?php echo $regid ?>')">DELETE</button><?php "</td>";
								echo "</tr>";
							}
					}
					else {
						echo "No result";
					}
					
					echo "</table>";
					
					//count number of record
					if($result->num_rows > 0){
						$sql2 = "select count(*) from registration r, student s, course c
								where r.stuid = s.stuid
								and r.courseid = c.courseid
								and (r.regid like '%$searching%'
								or r.regdate like '%$searching%'
								or r.stuid like '%$searching%'
								or s.stuname like '%$searching%'
								or r.courseid like '%$searching%'
								or c.coursename like '%$searching%')";
							
						$result = $conn->query($sql2);
						$row = $result->fetch_row();
						$count = ceil($row[0]/7);
						
						for($pageno=1;$pageno<=$count;$pageno++){
							?><a href="searchfieldaction.php?page=<?php echo $pageno; ?>&searchfield=<?php echo $searching; ?>"
							style="text-decoration:none"> <?php echo $pageno. " ";?></a><?php
						}
					}
					
					CloseCon($conn);
				?>
				<table>
					<tr>
						<td colspan="2" align="center">
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