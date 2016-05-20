<?php

session_start();

require 'config.php';

$response['message'] = "<p class='text-danger'><em>U dient ingelogd te zijn om een film aan uw bekeken lijst toe te kunnen voegen.</p>";

if(isset($_SESSION['user'])) {
	$id = $_SESSION['user'];
	$movieId = $_REQUEST['movieId'];

	$rows = $db->prepare("SELECT * FROM bekeken WHERE gebruikersId = '$id' AND filmId = '$movieId'");
	$rows -> execute();
	$num_rows = $rows->fetchColumn();

	if($num_rows > 0) {
		$response['message'] = "<p class='text-danger'><em>U heeft deze film al aan uw bekeken lijst toegevoegd.</p>";
	}else {
	$stmt = $db->prepare("INSERT INTO bekeken (gebruikersId, filmId) VALUES (:id, :movieid)");
	$stmt->bindParam("id", $id);
	$stmt->bindParam("movieid", $movieId);
	$stmt->execute();
	$response['message'] = "<p class='text-success'><em>U heeft deze film succesvol aan uw bekeken lijst toegevoegd.</p>";
	}


}

	echo json_encode($response);


