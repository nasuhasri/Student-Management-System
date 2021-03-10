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
				<h2 style="text-align:center">Login</h2>
				<form action="loginaction.php" id="form" method="POST">
				<table>
					<tr>
						<td>Staff ID</td>
						<td><input type="text" name="staffid" maxlength="10" placeholder="Staff ID" required></td>
					</tr>
					
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" maxlength="10" placeholder="Password" required></td>
					</tr>
					
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value="Login">
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