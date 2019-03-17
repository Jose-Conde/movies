<?php 
	
	/**
	*
	* Check genre and return Id if exists or False if not
	*
	* @param string $genre Name of Genre
	* @return integer Id
	*
	**/
	function get_genre_id($genre){
		global $connection;
		$query = 'SELECT * FROM genres WHERE Name="' . $genre . '" LIMIT 1';
		$result = mysqli_query($connection, $query);
		$row = mysqli_fetch_assoc($result);
		return $row['Id'];
	}

	/**
	*
	* Check movie and return Id if exists or False if not
	*
	* @param string $title Title of Movie
	* @return integer Id
	*
	**/
	function get_movie_id($title){
		global $connection;
		$query = 'SELECT * FROM movies WHERE Title="' . $title . '" LIMIT 1';
		$result = mysqli_query($connection, $query);
		$row = mysqli_fetch_assoc($result);
		return $row['Id'];
	}

	/**
	*
	* Add movie and return Id
	*
	* @param integer $genre_id Id of Genre
	* @param string $title Title of Movie
	* @param string $release Year of Release
	* @return integer Id or false
	*
	**/
	function add_movie($genre_id,$title, $release){
		global $connection;
		$query = 'INSERT INTO movies SET idGenre="' . $genre_id . '", Title="' . $title . '", releaseYear="' . $release . '"';
		if(mysqli_query($connection, $query)){
			$result = mysqli_insert_id ($connection);
		}else{
			$result = FALSE;
		}
		return $result;
	}


	/**
	*
	* Remove movie
	*
	* @param integer $movie_id Id of Movie
	* @return integer Id or false
	*
	**/
	function remove_movie($movie_id){
		global $connection;
		$query = 'DELETE FROM movies WHERE Id="' . $movie_id . '"';
		if(mysqli_query($connection, $query)){
			$result = mysqli_affected_rows ($connection);
		}else{
			$result = FALSE;
		}
		return $result;
	}

?>