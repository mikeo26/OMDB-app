<?php

session_start();

require 'config.php';

$id = $_SESSION['user'];
$movieId = $_REQUEST['filmId'];
$cat = $_REQUEST['cat'];

$response['message'] = "Er ging iets mis";

if($cat == 'collectie') {
	$stmt = $db->prepare("DELETE FROM collectie WHERE gebruikersId = :id AND filmId = :filmId");
	$stmt -> bindParam("id", $id);
	$stmt -> bindParam("filmId", $movieId);
	if($stmt->execute()) {
		$response['message'] = "<p class='test-success'>Film succesvol verwijderd uit uw collectie</p>";
	}

}elseif($cat == 'bekeken') {
	$stmt = $db->prepare("DELETE FROM bekeken WHERE gebruikersId = :id AND filmId = :filmId");
	$stmt -> bindParam("id", $id);
	$stmt -> bindParam("filmId", $movieId);
	if($stmt->execute()) {
		$response['message'] = "<p class='test-success'>Film succesvol verwijderd uit uw bekeken lijst</p>";
	}	
}elseif($cat == 'wishlist') {
	$stmt = $db->prepare("DELETE FROM wishlist WHERE gebruikersId = :id AND filmId = :filmId");
	$stmt -> bindParam("id", $id);
	$stmt -> bindParam("filmId", $movieId);
	if($stmt->execute()) {
		$response['message'] = "<p class='test-success'>Film succesvol verwijderd uit uw wishlist</p>";
	}
}elseif($cat == 'watchlist') {
	$stmt = $db->prepare("DELETE FROM watchlist WHERE gebruikersId = :id AND filmId = :filmId");
	$stmt -> bindParam("id", $id);
	$stmt -> bindParam("filmId", $movieId);
	if($stmt->execute()) {
		$response['message'] = "<p class='test-success'>Film succesvol verwijderd uit uw watchlist</p>";
	}
}

echo json_encode($response);