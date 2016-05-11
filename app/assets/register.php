<?php

require 'config.php';

if(isset($_POST['register'])) {
	$gebruikersnaam = $_POST['gebruikersnaam'];
	$wachtwoord = $_POST['wachtwoord'];
	$wachtwoord2 = $_POST['herhaalwachtwoord'];
	$email = $_POST['email'];
	$verificatiecode = str_shuffle("abcdefghijklmnopqrstxyz1234567890");

	$options 	= 	['cost' => 11, 'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)];
	$hashedPass = 	password_hash($wachtwoord, PASSWORD_BCRYPT, $options);
	$query		=	$db->prepare("INSERT INTO gebruikers (gebruikersrol, emailadres, gebruikersnaam, wachtwoord, verificatiecode) VALUES (0, :email, :gebruikersnaam, :wachtwoord, :verificatiecode)");
		
	$query		->	bindParam("email", $email, PDO::PARAM_STR);
	$query		->	bindParam("gebruikersnaam", $gebruikersnaam, PDO::PARAM_STR);
	$query		->	bindParam("wachtwoord", $hashedPass, PDO::PARAM_STR);
	$query		->	bindParam("verificatiecode", $verificatiecode, PDO::PARAM_STR);
	
	if($query->execute()) {
		echo "success";
	}
}