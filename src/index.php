<html>
	<head>
		<title>Movies</title>
		<link rel ="stylesheet" type = "text/css" href = "css/index_style.css"> 
	</head>
	<?php include_once("connection.php") ?>
	<main>
	<div class="header">
		<h1>Movies</h1>
	</div>
	<div class="menubar">
		<div class="searchbar">
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
		</div>
	</div>
		<?php include_once("movielist.php") ?>	
	</main>
<html>