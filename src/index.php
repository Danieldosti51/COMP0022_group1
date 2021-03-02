<html>
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

    	<!-- Bootstrap CSS -->
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		
		<!-- Custom CSS -->
		<link rel ="stylesheet" type = "text/css" href = "css/index_style.css"> 

		<title>Movies</title>
		
	</head>

	<?php include_once("connection.php") ?>

	<body>
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
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	</body>
<html>