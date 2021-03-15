<?php 

	$genres = array();

	$genre_query = "SELECT g.genre 
					FROM genres g, movies m, movie_genres t
					WHERE m.movieId = ".$id." 
					AND t.movieId = m.movieId
					AND g.genreId = t.genreId";

	$res_genres = $conn -> query($genre_query);
	while ($genre_row = $res_genres->fetch_assoc()) $genres[] = trim($genre_row['genre']);

	$genre_str = implode(", ", $genres);
	echo "<h4>Generes:</h4>";
	echo "<p><span id=genres>$genre_str</span></p>";

?>