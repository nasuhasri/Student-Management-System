<!DOCTYPE html>
<html>
	<head>
		<title>Student Registration</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	
	<body>
		<header>
			<h2>Only Authorized User is Allowed</h2>
		</header>
		
		<section>
			<nav>
				<ul>
					<li><a href="login.php">Please Login First</a></li>
				</ul>
			</nav>
			
			<article>
				<?php
					include 'conn.php';
					
					$conn=OpenCon();
					session_start();
						//username and password sent from form
						
						$staffid = $_POST["staffid"];
						$password = $_POST["password"];
						
						$sql = "select * from staff where staffid = $staffid and password = '$password'";
						
						$result = $conn->query($sql);
						
						//output data
						if($result->num_rows > 0){
							
							while($row = $result->fetch_assoc()){
								/**This is the user who login now**/
								$_SESSION['login_user'] = $staffid;
								
								/**Redirect the page to homepage.php**/
								header("location: homepage.php");
							}
						}
						else{
							echo "Your Login Name or Password is invalid";
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