<article id="suggestions">
<?php 
	
	// Selects all movies that users have also liked 
	// (We assume a user likes a movie if they rate it at least 4)
	$query = 
		"SELECT m.movieId, m.title, m.year, COUNT(m.movieId) as freq
		FROM movies m, ratings r
		WHERE r.movieId = m.movieId
		AND r.rating >= 4
		AND r.userId IN (SELECT userId FROM ratings WHERE movieId = ".$id." AND rating >= 4)
		AND m.movieId != ".$id."
		GROUP BY m.movieId
		ORDER BY freq DESC
		LIMIT 4;";

	$res = $conn -> query($query);
	if ($res->num_rows != 0) {
		echo "<h4>Viewers who likes this movie also likes:</h4>";
		while ($row = $res->fetch_assoc()) {
			$movie_id = $row['movieId'];
			$link = "/movie.php?id=$movie_id";
			echo 
			"<section class='movie_suggestion'>
				<a href={$link}>{$row['title']}</a>
			</section>";
		}	
	}

	$tag_query = 
		"SELECT t.tag, COUNT(t.tag) AS freq
		FROM tags t, movies m, ratings r
		WHERE m.movieId = r.movieId
		AND t.movieId = m.movieId
		AND r.rating >= 4
		AND r.userId IN (SELECT userId FROM ratings WHERE movieId = ".$id." AND rating >= 4)
		AND m.movieId != ".$id."
		GROUP BY t.tag
		ORDER BY freq DESC
		LIMIT 10;";

	$res_tags = $conn -> query($tag_query);
	if ($res_tags->num_rows != 0) {
		echo "<h4>Viewers who like this movie also likes the following types of movie:</h4>";
		while ($row = $res_tags->fetch_assoc()) {
			echo 
			"<section class='tag_suggestion'>
				<p>{$row['tag']}</p>
			</section>";
		}	
	}

	$tag_query_2 = 
		"SELECT t.tag, COUNT(t.tag) AS freq
		FROM tags t, movies m, ratings r
		WHERE m.movieId = r.movieId
		AND t.movieId = m.movieId
		AND r.rating >= 4
		AND r.userId IN (SELECT userId FROM ratings WHERE movieId = ".$id." AND rating < 2)
		AND m.movieId != ".$id."
		GROUP BY t.tag
		ORDER BY freq DESC
		LIMIT 10;";

	$res_tags_2 = $conn -> query($tag_query_2);
	if ($res_tags_2->num_rows != 0) {
		echo "<h4>Viewers who dislike this movie likes the following types of movie:</h4>";
		while ($row = $res_tags_2->fetch_assoc()) {
			echo 
			"<section class='tag_suggestion'>
				<p>{$row['tag']}</p>
			</section>";
		}	
	}

?>	
</article>