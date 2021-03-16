<article id="prediction2">

<?php 
    
	// Predict a user’s rating for a movie:
    //     create a tables [‘movie’, ’count_related_genre’]
    //     #find the most related movie:
    //     for each_movie in movies _this_user_rated:
    //         for genre in genres_of_each_movie
    //             if genre in newly_released_movie.genres
    //                 count++	
    //     predicted_rating = max(‘count_related_genre’).rating		
            
    //loop each user's rating,find the movie matches most
    //for each user id
    $query_movies = 
            "SELECT *
             FROM movies m"
    $query_ratings = 
            "SELECT *
             FROM ratings r"
    $query_movieId_genreId = 
            "SELECT *
             FROM movieId_genreId mg
             WHERE movieId = $movieId
            
    "

    $res_movies = $conn -> query($query_movies;
    $res_ratings = $conn -> query($query_ratings);
    $res_genres_of_each_movie = $conn -> query($query_movieId_genreId);

    //loop through movies.cvs
    if ($res_movies->num_rows != 0) {
        //store movie genres in a array
        $genre_A

        while($row_movies = $res_movies->fetch_assoc()){
            //in each movie, a drop down list contains userIds, predict each user's rating
            if ($res_ratings->num_rows != 0) {
                echo "<h4>This user might give a rating of:</h4>";
                //while still have row
                while ($row_ratings = $res_ratings->fetch_assoc()) {
                    $userId = $row_ratings['userId']
                    &temp = userId
                    //loop if userId does not change
                    if(userId = temp)
                        while(){
                            //get the movieId
                            $movieId = $row_ratings['movieId']
                            $count_genre_matches= 0
                            while($row_genres = $res_genres_of_each_movie->fetch_assoc())
                                //store rated movied genre in an arrya
                                $genre_B = $row_genres['genreId']
                                //compare 
                                $matches=count(array_intersect($genre_A,$genre_B));
                                $count_genre_matches=$matches
                                //store pair in a dictionary
                    }
                }
            }
            
        }
?>	
</article>
