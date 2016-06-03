<?php

require 'config.php';

if(isset($_POST['opvragen'])) {

	$email = $_POST['emailadres'];

	$rows = $db->prepare("SELECT * FROM gebruikers WHERE emailadres = :emailadres");
	$rows -> bindParam("emailadres", $email);
	$rows -> execute();
	$num_rows = $rows->fetchColumn();

	if($num_rows < 1) {
		session_start();
		$_SESSION['message'] = "<p class='text-danger'>Het door u ingevulde e-mailadres komt niet voor in het systeem</p>";
		header("location: ../wachtwoordvergeten");
	}else {
		$newPass = substr(str_shuffle("abcdefghijklmnopqrstxyz1234567890"), 0, 8);
		$options 	= 	['cost' => 11, 'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)];
		$hashedPass = 	password_hash($newPass, PASSWORD_BCRYPT, $options);
		
		$stmt = $db->prepare("UPDATE gebruikers SET wachtwoord = :wachtwoord WHERE emailadres = :email");
		$stmt -> bindParam("wachtwoord", $hashedPass);
		$stmt -> bindParam("email", $email);

		if($stmt->execute()) {
			$to 		= 	$email;
	        $subject 	= 	"Nieuw wachtwoord MDWA";
	        $message 	= 	"www.mdwa.nl\n";
	        $message  	.=  "Beste gebruiker,\n";
	        $message  	.=  "Je nieuwe gegevens:\n";
	        $message  	.=  "Wachtwoord: " . $newPass."\n";
	        $message  	.=  "Je kunt nu inloggen met je nieuwe wachtwoord. We raden aan om het wachtwood na het inloggen direct te wijzigen.\n";
	        $from 		= 	"info@mdwa.nl";
	        $headers 	= 	"From: $from";
	        if(mail($to,$subject,$message,$headers)) {
	        	session_start();
	        	$_SESSION['message'] = "<p class='text-success'>U heeft uw wachtwoord succesvol gewijzigd.</p>";
	        	header("location: ../inloggen");
	        }
		}
	}




}