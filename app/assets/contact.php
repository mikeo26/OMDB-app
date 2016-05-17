<?php

require 'config.php';

if(isset($_POST['sendcontact'])) {
	$naam 		= $_POST['naam'];
	$email 		= $_POST['email'];
	$telefoon 	= $_POST['telefoon'];
	$vraag 		= $_POST['vraag'];

	$to 		= "mikeo26@gmail.com";
	$subject 	= "Contactaanvraag via MDWA.nl contactformulier";
	$message	= "Contactformulier is zojuist ingevuld\n";
	$message	.= "Door: " . $naam . "\n";
	$message	.= "E-mailadres: " . $email . "\n";
	$message	.= "Telefoon: " . $telefoon . "\n";
	$message	.= "Vraag: " . $vraag;
    $from 		= "info@mdwa.nl";
    $headers 	= "From: $from";

	if(mail($to, $subject, $message, $headers)) {
		header("location: contact?succes");
	}

	// if(!empty($naam)) {
	// 	header("location: /contact?succes");
	// }
}