<?php 

	// Load model with DB functions
	require_once('models/genre_model.php');
	
	// Store and Sanitize genre parameter given
	$genre = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['genre']);
	
	// Call function to get genre id
	$genre_id = get_genre_id($genre);

	if($genre_id != NULL){

		// Call function to get movies with that genre id
		$movies = get_movies($genre_id);

		// Now it can show data as json for API use or it can generate a view
		// JSON
		header('Content-Type: application/json');
		echo json_encode(array("success" => TRUE, "movies" => $movies));
		// View (uncomment the next line to view a simple HTML view instead)
		// require_once('views/genre_list.php');

	} else {

		// Now it can show data as json for API use or it can generate a view with the error
		// JSON
		$error = "Genre don't exists";
		header('Content-Type: application/json');
		echo json_encode(array("success" => FALSE, "error" => $error));
		// View (uncomment the next line to view a simple HTML error view instead)
		// require_once('views/genre_error.php');

	}

?>