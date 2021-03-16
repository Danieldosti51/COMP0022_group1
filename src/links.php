<section id="links">
<?php 
	
	$query_links = 
		"SELECT imdbId, tmdbId FROM links WHERE movieId = ".$id.";";

	$res = $conn -> query($query_links);
	$row = $res->fetch_assoc();
	$imdbId = $row['imdbId'];
	$tmdbId = $row['tmdbId'];

	// prepend 0 to id until it matches format expected in link
	while (strlen($imdbId) < 7) $imdbId = "0".$imdbId;
	$imdb_link = "https://www.imdb.com/title/tt".$imdbId;
	echo "<h4><a href={$imdb_link}>Link to IMDB page</a></h4>";

	$tmdb_link = "https://www.themoviedb.org/movie/".$tmdbId;
	echo "<h4><a href={$tmdb_link}>Link to TMDB page</a></h4>";

?>	
</section>
