<html>
	<head>
		<title>Movies</title>
	</head>
	<?php include_once("connection.php") ?>
	<main>
		<h1>Movies!!</h1>
		<?php 
			$id = $_REQUEST['id'];
			$res = $conn -> query("SELECT * FROM movies WHERE movieId = $id");
			if ($res->num_rows == 0) {
				echo "This movie does not exist";
			} else {
				$movie_row = $res->fetch_assoc();
				echo "<h2>{$movie_row['title']}</h2>";

				include_once('ratings.php');
				include_once('suggestions.php');
			}
		?>
	</main>
<html>