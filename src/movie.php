<html>
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width", initial-scale="1", shrink-to-fit="no">

    	<!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
		<title>Movies</title>
	</head>
	<?php include_once("connection.php") ?>
	<body>
		<main>
			<div class = "container-fluid">
				<div class ="row">
					<nav class="navbar navbar-expand-sm navbar-dark bg-dark position-fixed w-100 py-4">
						<a class="navbar-brand" href="#"><h1>Movies</h1></a>
						<ul class="navbar-nav mr-auto">
						</ul>
								
						<button type="button" class="btn btn-outline-light pull-right">Back</button>
					</nav>
				</div>
					<?php 
						echo "<div class =\"row \">";
						$id = $_REQUEST['id'];
						$res = $conn -> query("SELECT * FROM movies WHERE movieId = $id");
						if ($res->num_rows == 0) {
							echo "<div class=\"bg-light w-100\">";
							echo "This movie does not exist";
							echo "</div>";
						} else {
							echo "<div class=\" bg-light w-100\">";
							$movie_row = $res->fetch_assoc();
							$genres = str_replace("|", ", ", $movie_row["genres"]);
							echo "<h2>{$movie_row['title']}</h2>";
							echo "<span id='genres'>{$genres}</span>";

							include_once('ratings.php');
							include_once('suggestions.php');
							include_once('predictions.php')
							echo "</div>";
						}
						echo "</row>"
					?>
			</div>
		</main>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
<html>