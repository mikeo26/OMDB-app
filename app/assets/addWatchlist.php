<?php

session_start();

require 'config.php';

$response['message'] = "<p class='text-danger'><em>U dient ingelogd/geactiveerd te zijn om een film aan uw collectie toe te kunnen voegen.</p>";

if(isset($_SESSION['user']) && $_SESSION['active'] == '1' ) {
	$id = $_SESSION['user'];
	$movieId = $_REQUEST['movieId'];

	$rows = $db->prepare("SELECT * FROM watchlist WHERE gebruikersId = '$id' AND filmId = '$movieId'");
	$rows -> execute();
	$num_rows = $rows->fetchColumn();

	if($num_rows > 0) {
		$response['message'] = "<p class='text-danger'><em>U heeft deze film al aan uw watchlist toegevoegd.</p>";
	}else {
	$stmt = $db->prepare("INSERT INTO watchlist (gebruikersId, filmId) VALUES (:id, :movieid)");
	$stmt->bindParam("id", $id);
	$stmt->bindParam("movieid", $movieId);
	$stmt->execute();
	$response['message'] = "<p class='text-success'><em>U heeft deze film succesvol aan uw watchlist toegevoegd.</p>";
	}


}

	echo json_encode($response);


