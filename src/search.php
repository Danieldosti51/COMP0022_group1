<html>
	<?php

		$dbhost = "db";
		$dbuser = "root";
		$dbpass = "root";
		$db = "db";

		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db) or die ("Connection failed: %s\n". $conn -> error);

	?>
	<h1>Movie Titles!!</h1>
	<form action="search.php" method="get">
		<input type="text" name="q" />
		<input type="submit" />
	</form>
	<article>
		<?php 
			$param = filter_var($_REQUEST['q'], FILTER_SANITIZE_STRING);
			$query = "SELECT * FROM movies WHERE title LIKE '%" . $param . "%'";

			$res = $conn->query($query) or die($conn->error);
			$rows = $res->num_rows;

			while ($row = $res->fetch_assoc()) {
				echo 
				"<section>
					<h2>{$row['title']}</h2>
				</section>";
			}
		?>
	</article>
<html>