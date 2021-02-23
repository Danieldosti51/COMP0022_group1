<article id="movies">
<?php 
	$query = "SELECT * FROM movies";
	if (isset($_REQUEST['q'])) {
		$param = filter_var($_REQUEST['q'], FILTER_SANITIZE_STRING);
		$query = "SELECT * FROM movies WHERE title LIKE '%" . $param . "%'";
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