<article id="movies">
<?php 
	$query = "SELECT * FROM movies";
	if (isset($_REQUEST['q'])) {
		$order = $_REQUEST['Order'];
		$category = $_REQUEST['Searchby'];
		$asds = $_REQUEST['AsDs'];
		$param = filter_var($_REQUEST['q'], FILTER_SANITIZE_STRING);

		if ($asds === "Ascend") {
			$use_order = 'ASC';
		} else {
			$use_order = 'DESC';
		}

		if ($category ==="Name"){
			if ($order === "ReleaseYr") {
				$query = "SELECT * FROM movies WHERE title LIKE '%" . $param . "%' ORDER BY year $use_order";
			} elseif ($order === "Controversy") {
				// A movie is controversial if there is a high variance in its ratings
				$query = "SELECT movieId, title, year, VARIANCE(rating) as var FROM 
				(SELECT m.movieId, m.title, m.year, r.rating
				FROM movies m, ratings r
				WHERE r.movieId = m.movieId) AS sub
				WHERE title LIKE '%" . $param . "%'
				GROUP BY movieId
				ORDER BY var $use_order;";
			} elseif ($order === "Popularity") {	
				// A movie is popular if a large amount of people 'like' it
				// We assume that a user likes a movie if they rate it at least 4
				$query = "SELECT movieId, title, year, COUNT(rating) as count FROM 
				(SELECT m.movieId, m.title, m.year, r.rating
				FROM movies m, ratings r
				WHERE r.movieId = m.movieId
				AND rating >= 4) AS sub
				WHERE title LIKE '%" . $param . "%'
				GROUP BY movieId
				ORDER BY count $use_order;";
			} elseif ($order === "Alphabetical") {
				$query = "SELECT * FROM movies WHERE title LIKE '%" . $param . "%' ORDER BY title $use_order";
			}
			 else {
				$query = "SELECT * FROM movies WHERE title LIKE '%" . $param . "%'";
			}
		} elseif ($category === "Genre"){
			if ($order === "ReleaseYr"){
				$query = "SELECT m.movieid, m.title 
				FROM movies m, movie_genres mg, genres g 
				WHERE m.movieId = mg.movieId AND mg.genreId = g.genreId AND g.genre LIKE '%" . $param . "%'
				ORDER BY m.year $use_order";
			}
			elseif($order === "Controversy"){
				$query = "SELECT movieId, title, year, VARIANCE(rating) as var FROM 
				(SELECT m.movieId, m.title, m.year, r.rating
				FROM movies m, ratings r, genres g, movie_genres mg
				WHERE r.movieId = m.movieId
                AND m.movieId = mg.movieId
                AND mg.genreid = g.genreid 
                AND g.genre LIKE '%" . $param . "%') AS sub
				GROUP BY movieId
				ORDER BY var $use_order";
			}
			elseif($order === "Popularity"){
				$query = "SELECT movieId, title, year, COUNT(rating) as 'count' FROM 
				(SELECT m.movieId, m.title, m.year, r.rating
				FROM movies m, ratings r,genres g, movie_genres mg
				WHERE r.movieId = m.movieId
                AND m.movieId = mg.movieId
                AND mg.genreid = g.genreid 
				AND rating >= 4
                AND g.genre LIKE '%" . $param . "%') AS sub
				GROUP BY movieId
				ORDER BY count $use_order";
			}
			elseif($order === "Alphabetical"){
				$query = "SELECT m.movieid, m.title 
				FROM movies m, movie_genres mg, genres g 
				WHERE m.movieId = mg.movieId AND mg.genreId = g.genreId AND g.genre LIKE '%" . $param . "%'
				ORDER BY m.title $use_order";
			}
			else {
				$query = "SELECT m.movieid, m.title 
				FROM movies m, movie_genres mg, genres g 
				WHERE m.movieId = mg.movieId AND mg.genreId = g.genreId AND g.genre LIKE '%" . $param . "%'";
			}
			
		} elseif ($category === "Tag") {
			if ($order === "ReleaseYr") {
				$query = "SELECT * FROM movies WHERE movieID IN 
				(SELECT movieID FROM tags WHERE tag LIKE '%" . $param . "%') ORDER BY year $use_order";
			} elseif ($order === "Alphabetical") {
				$query = "SELECT * FROM movies WHERE movieID IN 
				(SELECT movieID FROM tags WHERE tag LIKE '%" . $param . "%') ORDER BY title $use_order";
			} elseif ($order === "Controversy") {
				$query = "SELECT movieId, title, year, VARIANCE(rating) as var FROM 
				(SELECT m.movieId, m.title, m.year, r.rating
				FROM movies m, ratings r, tags t
				WHERE r.movieId = m.movieId
                AND m.movieId = t.movieId
                AND t.tag LIKE '%" . $param . "%') AS sub
				GROUP BY movieId
				ORDER BY var $use_order";
			} elseif ($order === "Popularity") {
				$query = "SELECT movieId, title, year, COUNT(rating) as 'count' FROM 
				(SELECT m.movieId, m.title, m.year, r.rating
				FROM movies m, ratings r,tags t
				WHERE r.movieId = m.movieId
                AND m.movieId = t.movieId
				AND rating >= 4
                AND t.tag LIKE '%" . $param . "%') AS sub
				GROUP BY movieId
				ORDER BY count $use_order";
			} else {
				$query = "SELECT * FROM movies WHERE movieID IN 
				(SELECT movieID FROM tags WHERE tag LIKE '%" . $param . "%')" ;
			}
		}
		
	}
	$res = $conn->query($query) or die($conn->error);
	$rows = $res->num_rows;
    echo "<div class=\"table-responsive\">";
	echo "<table>";
	while ($row = $res->fetch_assoc()) {
		$id = $row['movieId'];
		$link = "/movie.php?id=$id";
		echo "<tr>";
		echo "<td> <a href={$link}><h4 class=\"text-dark pl-4\">{$row['title']}</h4></a> </td>"; 
		echo "</tr>";
	}
	echo "</table>";
	echo "</div>";
?>
</article>