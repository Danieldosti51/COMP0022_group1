LOAD DATA INFILE '/data/movies.csv'
INTO TABLE movies
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 LINES
(movieId, title, genres);

LOAD DATA INFILE '/data/links.csv'
INTO TABLE links
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
(movieId, imdbId, @tmdbId)
SET linkId = NULL,
tmdbId = NULLIF(@tmdbId, '');

LOAD DATA INFILE '/data/ratings.csv'
INTO TABLE ratings
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'
IGNORE 1 LINES
(userId, movieId, rating, rating_time)
SET ratingId = NULL;

LOAD DATA INFILE '/data/tags.csv'
INTO TABLE tags
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'
IGNORE 1 LINES
(userId, movieId, tag, tag_time)
SET tagId = NULL;