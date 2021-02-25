<html>
	<head>
		<title>Movies</title>
	</head>
	<?php include_once("connection.php") ?>
	<main>
		<h1>Movies!!</h1>
		<form name="searchbar" method="get">
			<input type="text" name="q" placeholder="Search" />
			<select name="Order">
				<option value="Default">Default</option>
				<option value="Latest">Latest</option>
				<option value="Controversial">Controversial</option>
				<option value="Popular">Popular</option>
			</select>
			<button type="submit">Submit</button>
		</form>
		<?php include_once("movielist.php") ?>		
	</main>
<html>