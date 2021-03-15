<?php 
	$res_yr = $conn -> query("SELECT * FROM movies WHERE movieId = $id");
    
    if ($res_yr->num_rows > 0){
        $row = $res_yr->fetch_assoc();
        $yr = $row['year'];
        echo "<h4>Year of released:</h4>";
        echo "<p>".$yr."</p>";
    }
?>