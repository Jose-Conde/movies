<?php 
	
	// Load model with DB functions
	require_once('models/movie_model.php');

	// Store and Sanitize movie title parameter given
	$title = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['title']);
	
	// Call function to get movie id
	$movie_id = get_movie_id($title);

	if($movie_id != NULL){
		
		// Call function to remove movie by given id
		$affected_rows = remove_movie($movie_id);

		header('Content-Type: application/json');
		if($affected_rows){
			echo json_encode(array("success" => TRUE, "affected rows" => $affected_rows));
		}else{
			$error = 'Error while deleting movie in Database';
			echo json_encode(array("success" => FALSE, "error" => $error));
		}

	} else {

		$error = "Movie don't exists";
		header('Content-Type: application/json');
		echo json_encode(array("success" => FALSE, "error" => $error));

	}

?>