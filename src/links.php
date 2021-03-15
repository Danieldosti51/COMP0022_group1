<section id="links">
<?php 
	
	$query_links = 
		"SELECT imdbId, tmdbId FROM links WHERE movieId = ".$id.";";

	$res = $conn -> query($query_links);
	$row = $res->fetch_assoc();
	$imdbId = $row['imdbId'];

	// prepend 0 to id until it matches format expected in link
	while (strlen($imdbId) < 7) $imdbId = "0".$imdbId;
	$imdb_link = "https://www.imdb.com/title/tt".$imdbId;
	echo "<h3><a href={$imdb_link}>Link to IMDB</a></h3>";


?>	
</section>
