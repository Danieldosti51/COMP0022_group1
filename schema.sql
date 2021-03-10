ALTER USER 'root' IDENTIFIED WITH mysql_native_password BY 'root';

CREATE DATABASE IF NOT EXISTS db;
USE db;

/*
CREATE TABLE IF NOT EXISTS movies (
    movieId int,
    title varchar(255) NOT NULL,
    year int,
    genres varchar(255) NOT NULL,
    PRIMARY KEY (movieId)
);
*/

CREATE TABLE IF NOT EXISTS movies (
    movieId int NOT NULL,
    title varchar(255) NOT NULL,
    year int,
    PRIMARY KEY (movieId)
);

CREATE TABLE IF NOT EXISTS genres (
    genreId int NOT NULL,
    genre varchar(255) NOT NULL,
    PRIMARY KEY (genreId)
);

CREATE TABLE IF NOT EXISTS movie_genres (
    movieId int NOT NULL,
    genreId int NOT NULL,
    FOREIGN KEY (movieId) REFERENCES movies(movieId),
    FOREIGN KEY (genreId) REFERENCES genres(genreId)
);

CREATE TABLE IF NOT EXISTS links (
    linkId int AUTO_INCREMENT,
    movieId int,
    imdbId varchar(255) DEFAULT NULL,
    tmdbId varchar(255) DEFAULT NULL,
    PRIMARY KEY (linkId),
    FOREIGN KEY (movieId) REFERENCES movies(movieId)
);

CREATE TABLE IF NOT EXISTS ratings (
    ratingId int AUTO_INCREMENT,
    userId int NOT NULL,
    movieId int,
    rating int NOT NULL,
    rating_time int NOT NULL,
    PRIMARY KEY (ratingId),
    FOREIGN KEY (movieId) REFERENCES movies(movieId)
);

CREATE TABLE IF NOT EXISTS tags (
    tagId int AUTO_INCREMENT,
    userId int NOT NULL,
    movieId int,
    tag varchar(255) NOT NULL,
    tag_time int NOT NULL,
    PRIMARY KEY (tagId),
    FOREIGN KEY (movieId) REFERENCES movies(movieId)
);