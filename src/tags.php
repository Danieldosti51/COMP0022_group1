<?php 

	$tags = array();

	$tags_query = "SELECT * FROM tags WHERE movieID = ".$id."";

	$res_tags = $conn -> query($tags_query);
	while ($tags_row = $res_tags->fetch_assoc()) $tags[] = trim($tags_row['tag']);

	$tags_str = implode(", ", array_unique($tags));
	echo "<h4>Tags:</h4>";
	echo "<p><span id=genres>$tags_str</span></p>";

?>