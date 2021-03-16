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
             FROM movies m;";
    $query_ratings = 
            "SELECT *
             FROM ratings r;
             WHERE userId = $row_userId";
    $query_first_100_userId = 
            "SELECT userId
            FROM ratings r
            WHERE userId <=100;";        
    $query_movieId_genreId = 
            "SELECT genreId
             FROM movieId_genreId mg
             WHERE movieId = $movieId
            ";

    $res_movies = $conn -> query($query_movies);
    $res_ratings = $conn -> query($query_ratings);
    $res_userId_100 = $conn -> query($query_first_100_useId)
    $res_genres_of_each_movie = $conn -> query($query_movieId_genreId);

    //loop through movies.cvs

    while($row_genres_A = $conn -> query("SELECT * FROM movies;")-> fetch_assoc()){
        //get the movieID
        $movieId_A = $row_genres_A['movieId'];
        //get the genres of the movie from the server
        $res_genres_of_movie_A = $conn ->query("SELECT genreId FROM movieId_genreId mg WHERE movieId = $movieId_A";);
        //store movie genres in a array
        //turn the result to an associative
        $genreId_A = $res_genres_of_movie_A->fetch_assoc();
        
        //in the current movie, a drop down list contains userIds from 1 to 100
        //for a selective group of users: from userId 1 to userId 100
        for($userId;$userId<=100;$userId++){
            //find all the rating for current user, e.g. userId 1
            echo "<h4>This user might give a rating of:</h4>";
            while ($row_ratings = $conn -> query("SELECT userId, movieId FROM ratings WHERE userId = $row_userId;") -> fetch_assoc()) {
                    foreach($row as $movieid => $rating){
                        //get the movieId
                        $movieId_B = $row_ratings['movieId'];
                        $count_genre_matches= 0;
                        while($row_genres = $conn -> query("SELECT genreId FROM movieId_genreId mg WHERE movieId = $movieId_B";)->fetch_assoc())
                            //store rated movied genre in an array
                            $genre_B = $row_genres['genreId'];
                            //compare 
                            $matches=count(array_intersect($genre_A,$genre_B));
                            $count_genre_matches=$matches;
                            //store pair in a associative array
                            $array.append('$movieId','Number_of_matches');
                            // Movi
                    }
                $predict_rating = max[array];
                }
            }
        }
    }
?>	
</article>
