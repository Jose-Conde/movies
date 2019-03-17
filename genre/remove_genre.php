<?php 
	
	// Load model with DB functions
	require_once('models/genre_model.php');

	// Store and Sanitize genre parameter given
	$genre = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['genre']);
	
	// Call function to get genre id
	$genre_id = get_genre_id($genre);

	if($genre_id != NULL){

		// Call function to delete genre with given genre id
		$affected_rows = remove_genre($genre_id);

		header('Content-Type: application/json');
		if($affected_rows){
			echo json_encode(array("success" => TRUE, "affected rows" => $affected_rows));
		}else{
			$error = 'Error while deleting genre in Database';
			echo json_encode(array("success" => FALSE, "error" => $error));
		}

	} else {

		$error = "Genre don't exists";
		header('Content-Type: application/json');
		echo json_encode(array("success" => FALSE, "error" => $error));

	}

?>