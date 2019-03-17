<?php
	
	/**
	*
	* Connect to DB
	*
	**/
	require_once('config/database.php');
	$db = new DB();
	$connection = $db->get_connection();
	
	/**
	*
	* Get call parameter and include corresponding file
	*
	**/
	$call = $_GET['call'];

	switch ($call) {
		case 'genre_movies':
			require_once('genre/genre.php');
			break;
		case 'add_genre':
			require_once('genre/add_genre.php');
			break;
		case 'remove_genre':
			require_once('genre/remove_genre.php');
			break;
		case 'add_movie':
			require_once('movie/add_movie.php');
			break;
		case 'remove_movie':
			require_once('movie/remove_movie.php');
			break;
		default:
			
			break;
	}
?>