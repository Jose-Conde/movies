<?php 
	
	// Load model with DB functions
	require_once('models/genre_model.php');

	// Store and Sanitize genre parameter given
	$genre = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['genre']);
	
	// Call function to get genre id
	$genre_id = get_genre_id($genre);

	if($genre_id == NULL){

		// Call function to add genre with given name
		$new_genre = add_genre($genre);

		header('Content-Type: application/json');
		if($new_genre){
			echo json_encode(array("success" => TRUE, "inserted_id" => $new_genre));
		}else{
			$error = 'Error while inserting genre in Database';
			echo json_encode(array("success" => FALSE, "error" => $error));
		}

	} else {

		$error = "Genre already exists";
		header('Content-Type: application/json');
		echo json_encode(array("success" => FALSE, "error" => $error));

	}

?>