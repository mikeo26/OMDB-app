<?php

require 'config.php';

session_start();

if($_SESSION['role'] !== '1') {
	header("location: ../index");
}

$id = $_GET['id'];

$stmt = $db->prepare("DELETE FROM gebruikers WHERE gebruikersid = :id");
$stmt->bindParam("id", $id);

if($stmt->execute()) {
	$_SESSION['message'] = "Gebruiker succesvol verwijderd";
	header("location: ../admin");
}