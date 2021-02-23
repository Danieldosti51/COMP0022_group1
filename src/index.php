<html>
	<head>
		<title>Movies</title>
	</head>
	<?php include_once("connection.php") ?>
	<main>
		<h1>Movies!!</h1>
		<form name="searchbar" method="get">
			<input type="text" name="q" placeholder="Search" required pattern=".*\S.*" />
			<button type="submit">Submit</button>
		</form>
		<?php include_once("movielist.php") ?>		
	</main>
<html>