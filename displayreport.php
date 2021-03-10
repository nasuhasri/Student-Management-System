<!doctype html>

<html>
	<head>
		<title>Course Registration System</title>
		<!--rel=relationship. Link to style page -->
		<link rel="stylesheet" type="text/css" href="styles.css">
		
		<!-- Javascript function for deleting data -->
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
				<h2 style="text-align:center">Display All Students' Registration From Database</h2>
				<?php
					$conn=OpenCon();
					
					//get page number
					$page=0;
					
					//set variable
					if(isset($_GET["page"])==true){
						$page = $_GET["page"];
					}
					else {
						$page=0;
					}
					
					//algo for pagination in sql
					if($page=="" || $page=="1"){
						$page1 = 0;
					}
					else {
						$page1 = ($page*5)-5;
					}
					
					/**$login_id coming from session.php**/
					$staffid = $login_id;
					
					$sql = "select * from registration r, student s, course c, staff st
							where r.stuid=s.stuid
							and r.courseid = c.courseid
							and r.staffid = st.staffid
							and r.staffid = $user_check
							order by regdate desc
							limit $page1, 5";
							
					/*$sql2 = "select count(*) from registration r, staff st
							where r.staffid = st.staffid
							and st.staffid = $user_check";*/
							
					$result = $conn->query($sql);
					
					echo "<table>";
						echo "<tr>";
							echo "<th> Registration ID </th>";
							echo "<th> Registration Date </th>";
							echo "<th> Student ID </th>";
							echo "<th> Student Name </th>";
							echo "<th> Course ID </th>";
							echo "<th> Course Name </th>";
							echo "<th> </th>";
						echo "</tr>";
						
						if ($result->num_rows > 0) {
							//output data of each row
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
									/* Get student id from url */
									echo "<td><a href=displaystudentdetails.php?studentid=$studentid>$studentid </a></td>";
									echo "<td> $studentname </td>";
									/* Get course id from url */
									/* url..crsid=2018 >> 2018256718*/
									echo "<td><a href=displaycoursedetails.php?courseid=$courseid>$courseid </a></td>";
									echo "<td> $coursename </td>";
									echo "<td>" ?><button onclick="window.location.href='updateregdetails.php?regid=<?php echo $regid ?>'">UPDATE</button>
												<button onclick="confirmDelete('<?php echo $regid ?>')"> DELETE </button> <?php "</td>";
								echo "</tr>";
							} //end of while
						} // end of if
						else {
							echo "Error in fetching data";
						}
					echo "</table>";
					
					//count number of record
					$sql2 = "select count(*) from registration r, staff st
							where r.staffid = st.staffid
							and st.staffid = $user_check";
					$result = $conn->query($sql2);
					$row = $result->fetch_row();
					$count = ceil($row[0]/5);
					
					//user select number nanti dia naik atas
					for($pageno=1; $pageno<=$count; $pageno++){
						?><a href="displayreport.php?page=<?php echo $pageno; ?>" style="text-decoration:none"> <?php echo $pageno. " ";?> </a><?php
					}
					
					CloseCon($conn);
				?>
			</article>
		</section>
		
		<footer>
			<?php include 'footer.php'; ?>
		</footer>	
		
		
	</body>
</html>