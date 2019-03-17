<?php 
	
	// Load model with DB functions
	require_once('models/movie_model.php');

	// Store and Sanitize parameters given
	$genre = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['genre']);
	$title = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['title']);
	$release = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['release']);
	
	// Call function to get genre id
	$genre_id = get_genre_id($genre);

	if($genre_id != NULL){

		// Call function to get movie id
		$movie_id = get_movie_id($title);

		if($movie_id == NULL){

			// Call function to add movie
			$new_movie = add_movie($genre_id,$title,$release);

			header('Content-Type: application/json');
			if($new_movie){
				echo json_encode(array("success" => TRUE, "inserted_id" => $new_movie));
			}else{
				$error = 'Error while inserting movie in Database';
				echo json_encode(array("success" => FALSE, "error" => $error));
			}

		} else {

			$error = "Movie already exists";
			header('Content-Type: application/json');
			echo json_encode(array("success" => FALSE, "error" => $error));

		}

	} else {

		$error = "Genre don't exists";
		header('Content-Type: application/json');
		echo json_encode(array("success" => FALSE, "error" => $error));

	}

?>