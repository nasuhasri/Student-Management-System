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
				<h2 style="text-align:center"> Delete Student </h2>
				<?php
					//take student id from url
					$stuid = $_GET["stuid"];					
					$conn = OpenCon();					
					$sql = "delete from student where stuid = $stuid";
					$result = $conn->query($sql);
					
					if(! $result){
						die('Could not delete data: '. mysqli_error());
					}
					else {
						echo "Data has been deleted";
					}
					
					//header("Location:displaystudent.php");
					
				?>
			</article>
		</section>
		
		<footer>
			<?php include 'footer.php'; ?>
		</footer>	
		
		
	</body>
</html>