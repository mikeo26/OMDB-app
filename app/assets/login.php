<?php

require 'config.php';

if(isset($_POST['inloggen'])) {
	$gebruikersnaam = $_POST['gebruikersnaam'];
	$wachtwoord = $_POST['wachtwoord'];

	$stmt = $db->prepare("SELECT * FROM gebruikers WHERE gebruikersnaam = :gebruikersnaam");
	$stmt -> bindParam("gebruikersnaam", $gebruikersnaam);
	$stmt -> execute();

	$user   = $stmt->fetch(PDO::FETCH_OBJ);
	$dbpass = $user->wachtwoord;

	if(password_verify($wachtwoord, $dbpass)) {
		session_start();
		$_SESSION['user'] = $user->gebruikersid;
		$_SESSION['role'] = $user->gebruikersrol;
		$_SESSION['active'] = $user->active;
		$_SESSION['username'] = $user->gebruikersnaam;
		$_SESSION['email'] = $user->emailadres;
		header("location: ../mijnaccount?msg=ingelogd");
	}else {
		session_start();
		$_SESSION['message'] = "<p class='text-danger'>De ingevulde gegevens zijn onjuist</p>";
		header("location: ../inloggen");
	}
}