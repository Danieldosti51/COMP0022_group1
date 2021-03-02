<html>
	<head>
		<title>Movies</title>
		<link rel ="stylesheet" type = "text/css" href = "css/movie_style.css"> 
	</head>
	<?php include_once("connection.php") ?>
	<main>
		<div class= "header">
			<h1>Movies</h1>
		</div>
		<div class= "menubar">	
			<a href="/movie.php" class="backbtn">Back</a>
		</div>
		<?php 
			$id = $_REQUEST['id'];
			$res = $conn -> query("SELECT * FROM movies WHERE movieId = $id");
			if ($res->num_rows == 0) {
				echo "<div class=\"content\">";
				echo "This movie does not exist";
				echo "</div>";
			} else {
				echo "<div class=\"content\">";
				$movie_row = $res->fetch_assoc();
				echo "<h2>{$movie_row['title']}</h2>";

				include_once('ratings.php');
				include_once('suggestions.php');
				echo "</div>";
			}
		?>
	</main>
<html>