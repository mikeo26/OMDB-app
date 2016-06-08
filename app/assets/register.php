<?php

require 'config.php';

if(isset($_POST['register'])) {
	$gebruikersnaam = $_POST['gebruikersnaam'];
	$wachtwoord = $_POST['wachtwoord'];
	$wachtwoord2 = $_POST['herhaalwachtwoord'];
	$email = $_POST['email'];
	$verificatiecode = str_shuffle("abcdefghijklmnopqrstxyz1234567890");

	$gebruikersQuery = $db->prepare("SELECT * FROM gebruikers WHERE gebruikersnaam = '$gebruikersnaam'");
	$gebruikersQuery -> execute();
	$checkGebruikers = $gebruikersQuery->fetchColumn();

	$emailQuery = $db->prepare("SELECT * FROM gebruikers WHERE emailadres = '$email'");
	$emailQuery -> execute();
	$checkEmail = $emailQuery->fetchColumn();

	session_start();

	if($checkGebruikers > 0) {
		$_SESSION['errors']['1'] = "Er is al een gebruikers met deze gebruikersnaam geregistreerd.";
		header("location: ../registreren");
	}elseif($checkEmail > 0) {
		$_SESSION['errors']['2'] = "Er is al een gebruiker met dit e-mailadres geregistreerd.";
		header("location: ../registreren");
	}elseif($wachtwoord !== $wachtwoord2) {
		$_SESSION['errors']['3'] = "De 2 wachtwoorden komen niet overeen";
		header("location: ../registreren");
	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		$_SESSION['errors']['4'] = "Het door u ingevulde e-mailadres is geen geldig e-mailadres";
		header("location: ../registreren");
	}else {
		$options 	= 	['cost' => 11, 'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)];
		$hashedPass = 	password_hash($wachtwoord, PASSWORD_BCRYPT, $options);
		$query		=	$db->prepare("INSERT INTO gebruikers (gebruikersrol, emailadres, gebruikersnaam, wachtwoord, verificatiecode) VALUES (0, :email, :gebruikersnaam, :wachtwoord, :verificatiecode)");
			
		$query		->	bindParam("email", $email, PDO::PARAM_STR);
		$query		->	bindParam("gebruikersnaam", $gebruikersnaam, PDO::PARAM_STR);
		$query		->	bindParam("wachtwoord", $hashedPass, PDO::PARAM_STR);
		$query		->	bindParam("verificatiecode", $verificatiecode, PDO::PARAM_STR);
	
	if($query->execute()) {
		$to 		= 	$email;
        $subject 	= 	"Registratie MDWA";
        $message 	= 	"www.mdwa.nl\n";
        $message  	.=  "Welkom " . $gebruikersnaam."\n";
        $message  	.=  "Je inlog gegevens:\n";
        $message  	.=  "Gebruikersnaam: " . $gebruikersnaam."\n";
        $message  	.=  "E-mailadres: " . $email."\n";
        $message  	.=  "Wachtwoord: " . $wachtwoord."\n";
        $message  	.=  "Klik hier om je account te activeren: " . "http://www.mdwa.nl/activate/" . $verificatiecode."\n";
        $from 		= 	"info@mdwa.nl";
        $headers 	= 	"From: $from";
        if(mail($to,$subject,$message,$headers)) {
        	session_start();
        	$_SESSION['registered'] = "U bent succesvol geregistreerd. U ontvangt een activatie e-mail binnen enkele minuten. Vergeet niet voor de zekerheid uw spambox te checken.";
        	header("location: /index.php");
        }
	}
	}


}