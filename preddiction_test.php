<?php
	$test_res = $conn -> query("SELECT userID, rating, rating_time FROM ratings WHERE movieId = $id"); 
?>