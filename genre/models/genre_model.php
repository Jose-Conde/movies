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
	* Return all movies from a genre
	*
	* @param integer $genre Id of th genre
	* @return array List of movies - False if no movies in genre
	*
	**/
	function get_movies($genre_id){
		global $connection;
		$return = array();
		$query = 'SELECT Title, releaseYear FROM movies WHERE idGenre=' . $genre_id;
		$result = mysqli_query($connection, $query);
		while($row = mysqli_fetch_assoc($result))
		{
			$return[]=$row;
		}
		return $return;
	}


	/**
	*
	* Add genre and return Id
	*
	* @param string $name Name of Genre
	* @return integer Id or false
	*
	**/
	function add_genre($name){
		global $connection;
		$query = 'INSERT INTO genres SET Name="' . $name . '"';
		if(mysqli_query($connection, $query)){
			$result = mysqli_insert_id ($connection);
		}else{
			$result = FALSE;
		}
		return $result;
	}


	/**
	*
	* Remove genre
	* Due to the foreign key on movies table and the on delete cascade statement in it, it's unnecessary to delete movies row with that genre ID, it automatically does.
	*
	* @param integer $genre_id Id of Genre
	* @return integer Id or false
	*
	**/
	function remove_genre($genre_id){
		global $connection;
		$query = 'DELETE FROM genres WHERE Id="' . $genre_id . '"';
		if(mysqli_query($connection, $query)){
			$result = mysqli_affected_rows ($connection);
		}else{
			$result = FALSE;
		}
		return $result;
	}

?>