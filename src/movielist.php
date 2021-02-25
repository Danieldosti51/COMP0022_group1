<article id="movies">
<?php 
	$query = "SELECT * FROM movies";
	if (isset($_REQUEST['q'])) {
		$order = $_REQUEST['Order'];
		$param = filter_var($_REQUEST['q'], FILTER_SANITIZE_STRING);
		if ($order === "Latest") {
			$query = "SELECT * FROM movies WHERE title LIKE '%" . $param . "%' ORDER BY year DESC";
		} elseif ($order === "Controversial") {

			// A movie is controversial if there is a high variance in its ratings
			$query = "SELECT movieId, title, year, VARIANCE(rating) as var FROM 
			(SELECT m.movieId, m.title, m.year, r.rating
			FROM movies m, ratings r
			WHERE r.movieId = m.movieId) AS sub
			WHERE title LIKE '%" . $param . "%'
			GROUP BY movieId
			ORDER BY var DESC;";
		} elseif ($order === "Popular") {

			// A movie is popular if a large amount of people 'like' it
			// We assume that a user likes a movie if they rate it at least 4
			$query = "SELECT movieId, title, year, COUNT(rating) as count FROM 
			(SELECT m.movieId, m.title, m.year, r.rating
			FROM movies m, ratings r
			WHERE r.movieId = m.movieId
			AND rating >= 4) AS sub
			WHERE title LIKE '%" . $param . "%'
			GROUP BY movieId
			ORDER BY count DESC;";
		} else {
			$query = "SELECT * FROM movies WHERE title LIKE '%" . $param . "%'";
		}
	}
	$res = $conn->query($query) or die($conn->error);
	$rows = $res->num_rows;

	while ($row = $res->fetch_assoc()) {
		$id = $row['movieId'];
		$link = "/movie.php?id=$id";
		echo 
		"<section class='movie'>
			<a href={$link}><h2>{$row['title']}</h2></a>
		</section>";
	}
?>
</article>