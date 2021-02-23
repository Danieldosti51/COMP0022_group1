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
		echo 
		"<section class='movie'>
			<h2>{$row['title']}</h2>
		</section>";
	}
?>
</article>