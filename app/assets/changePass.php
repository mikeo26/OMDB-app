<?php

session_start();

require 'config.php';

if(isset($_SESSION['user'])) {
	$newpass1 = $_REQUEST['newpass1'];
	$newpass2 = $_REQUEST['newpass2'];
	
	if($newpass1 !== $newpass2) {
		$response['message'] = "<p class='text-danger'>De 2 wachtwoorden zijn niet identiek</p>";
	} else {
		$options = ['cost' => 11, 'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)];
		$hashedPass = password_hash($newpass1, PASSWORD_BCRYPT, $options);
		$stmt = $db->prepare("UPDATE gebruikers SET wachtwoord = :newpass WHERE gebruikersid = :id");
		$stmt -> bindParam("newpass", $hashedPass);
		$stmt -> bindParam("id", $_SESSION['user']);

		if($stmt->execute()) {
			$response['message'] = "<p class='text-success'>Wachtwoord is succesvol gewijzigd.<p>";
		}
	}
}

echo json_encode($response);