<?php

session_start();

require 'config.php';

// if(isset($_SESSION['user'])) {
// 	$id = 4;
// 	// $data = json_decode(file_get_contents("php://input"));
// 	$movieId = $_GET['movie-id'];


// 	$stmt = $db->prepare("INSERT INTO bekeken (gebruikersId, filmId) VALUES (:id, :movieid)");
// 	$stmt->bindParam("id", $id);
// 	$stmt->bindParam("movieid", $movieId);

// 	if($stmt->execute()) {
// 		echo 'success';
// 	}
// }

// if($_REQUEST['movieId']) {
// 	$id = 3;
// 	$movieId = $_REQUEST['movieId'];

// 	$stmt = $db->prepare("INSERT INTO bekeken (gebruikersId, filmId) VALUES (:id, :movieid)");
// 	$stmt->bindParam("id", $id);
// 	$stmt->bindParam("movieid", $movieId);
// 	$stmt->execute();
// }

	// $data = $_SESSION['user'] . "en " . $_REQUEST['movieId'];

	// $filename = "data.txt";
	// $fh = fopen($filename, 'w') or die("can't open file");
	// fwrite($fh, $data);
	// fclose($fh);

if(isset($_SESSION['user'])) {
	$id = $_SESSION['user'];
	$movieId = $_REQUEST['movieId'];

	$stmt = $db->prepare("INSERT INTO collectie (gebruikersId, filmId) VALUES (4, 83184)");
	// $stmt->bindParam("id", "3");
	// $stmt->bindParam("movieid", "31414");
	$stmt->execute();
}



