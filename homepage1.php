<!doctype html>

<html>
	<head>
		<title>Taiwan with Layout</title>
		
		<style>
			* {
				box-sizing: border-box;
			}
		
		
			body {
				background-color: powderblue;
				font-family: Arial, Helvetica, sans-serif;
			}
			
			/*style the header*/
			header {
				background-color: #4169E1;
				padding: 30px;
				text-align: center;
				font-size: 35px;
				color: white;
			}
			
			/*Create 2 columns/boxes that floats next to each other*/
			nav { 
				float: left;
				width: 30%;
				height: 450px;
				background: pink;
				padding: 20px;
			}

			/* Style the list inside the menu */
			nav ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
				background-color: pink;
			}

			li a {
				display: block;
				color: #000;
				padding: 8px 16px;
				text-decoration: none;
			}

			/*Change the link color on hover */
			li a:hover {
				background-color: powderblue;
				color: white;
			}

			article {
				float: left;
				padding: 20px;
				width: 70%;
				background-color: #DB7093;
				height: 450px;
				text-align: center;
			}

			/* Clear floats after the columns */
			section:after {
				content: "";
				display: table;
				clear: both;
			}

			/* Style the footer */
			footer {
				background-color: #1E90FF;
				padding: 10px;
				text-align: center;
				color: white;
			}

			/*Responsive layout - makes the two columns/boxes stack on top of
			 each other instead of next to each other, on small screens *//
			 @media (max-width: 600px) {
				nav, article { 
					width: 100%;
					height: auto;
				}
			}

			img { 
				width: 100%;
				height: 350px;
			}
		</style>
		
	</head>
	
	<body>
		
		<header>
			<h2>Taiwan</h2>
		</header>
		
		<section>
			<nav>
				<ul>
					<li><a href="Taiwan.html">Santorini basic</a></li>
					<li><a href="TaiwanWithColourCSS.html">Santorini with Colour</a></li>
				</ul>
			</nav>
			
			<article>
				<img src="jiufen.jpg" alt="Jiu Fen Scenery">
				<p>This is a scenery of Taipei Tower at night!</p>
			</article>
		</section>
		
		<footer>
			<p>byNasuhasri</p>
		</footer>	
		
		
	</body>
</html>