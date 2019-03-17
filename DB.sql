/**
*
* You can execute that commands on SQL to generate DB
*
**/
CREATE DATABASE movies;

CREATE TABLE IF NOT EXISTS movies.genres (
  Id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Name varchar(255) NOT NULL UNIQUE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS movies.movies (
  Id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  idGenre int(11) NOT NULL,
  Title varchar(255) NOT NULL UNIQUE,
  releaseYear int(11) NOT NULL,
  FOREIGN KEY (idGenre) REFERENCES movies.genres(Id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

