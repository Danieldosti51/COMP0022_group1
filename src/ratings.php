<?php
	$rating_res = $conn -> query("SELECT rating, rating_time FROM ratings WHERE movieId = $id"); 
?>
<section id="ratings">
	<?php 
		$total = 0.0;
		$rows = $rating_res->num_rows;
		while ($row = $rating_res->fetch_assoc()) {
			$total += $row['rating'];
		}
		$avg = number_format($total / $rows, 2);
		echo "<p>Average rating: $avg</p>";
	?>
</section>