<article id="suggestions">
<h3>Users also liked:</h3>
<?php 
	
	// Selects all movies that users have also liked 
	// (We assume a user likes a movie if they rate it at least 4)
	$query = 
		"SELECT m.movieId, m.title, m.year, COUNT(m.movieId) as freq
		FROM movies m, ratings r
		WHERE r.movieId = m.movieId
		AND r.rating >= 4
		AND r.userId IN (SELECT userId FROM ratings WHERE movieId = ".$id." AND rating > 4)
		AND m.movieId != ".$id."
		GROUP BY m.movieId
		ORDER BY freq DESC
		LIMIT 4;";

	$res = $conn -> query($query);
	while ($row = $res->fetch_assoc()) {
		$id = $row['movieId'];
		$link = "/movie.php?id=$id";
		echo 
		"<section class='movie_suggestion'>
			<a href={$link}>{$row['title']}</a>
		</section>";
	}
?>	
</article>