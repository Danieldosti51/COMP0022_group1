<html>
	<?php

		$dbhost = "db";
		$dbuser = "root";
		$dbpass = "root";
		$db = "db";

		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db) or die ("Connection failed: %s\n". $conn -> error);

	?>
	<h1>Movie Titles!!</h1>
	<article>
		<?php 
		$res = $conn->query("SELECT * FROM movies") or die($conn->error);
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