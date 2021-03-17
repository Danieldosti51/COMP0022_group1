<article id="prediction">
<?php 
	
	$pred_rating_query = 
		"SELECT AVG(r.rating) AS average
		FROM (SELECT * FROM ratings WHERE movieId = ".$id." AND userId IN (SELECT userId FROM tags WHERE movieId = ".$id.") LIMIT 20) AS t, ratings r
		WHERE r.movieId = t.movieId
		AND r.userId = t.userId;";

	$res_avg = $conn -> query($pred_rating_query);
	if ($res_avg->num_rows != 0) {
		echo "<h4>Predicted average rating: </h4>";
		$row = $res_avg->fetch_assoc();
		if ($row['average'] != NULL) {
			 echo "<p>{$row['average']}</p>";
		} else {
			echo "<p class=\"text-danger\">Not available due to limited information</p>";
		}
	} 

	$pred_tag_query = 
		"SELECT t.tag, COUNT(t.tag) AS freq
		FROM (SELECT * FROM ratings WHERE movieId = ".$id." AND userId IN (SELECT userId FROM tags WHERE movieId = ".$id.") LIMIT 20) AS r, tags t
		WHERE r.userId = t.userId
		AND r.movieId = t.movieId
		GROUP BY t.tag
		ORDER BY freq DESC;";

	$res_tags_pred = $conn -> query($pred_tag_query);
	echo "<h4>Predicted tags from sample audience:</h4>";
	if ($res_tags_pred->num_rows != 0) {
		while ($tag_row = $res_tags_pred->fetch_assoc()) {
			echo 
			"<section class='tag_prediction'>
				<p>{$tag_row['tag']}</p>
			</section>";
		}	
	} else {
		echo "<p class=\"text-danger\"> Not available due to limited information</p>";
	}

?>	
</article>