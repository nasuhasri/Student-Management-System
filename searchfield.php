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
				<h2 style="text-align:center">Search Field</h2>
				<form action="searchfieldaction.php" id="form" method="GET">
				<table>
					<tr>
						<td>Search Data From Registration</td>
						<td><input type="text" name="searchfield" maxlength="10" placeholder="search registration" required></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value="Sumbit">
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