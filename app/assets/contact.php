<?php

require 'config.php';

if(isset($_POST['sendcontact'])) {
	session_start();
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

    // session_start();
    // $_SESSION['contact'] = "<p class='text-success'>Uw contactaanvraag is succesvol verzonden. Wij zullen zo spoedig mogelijk contact met u opnemen.</p>";
    // header("location: ../contact");

    if($naam == "") {
    	$_SESSION['contact'] = "<p class='text-danger'>U dient alle verplichte velden in te vullen</p>";
    	header("location: ../contact");
    } elseif($email == "") {
      	$_SESSION['contact'] = "<p class='text-danger'>U dient alle verplichte velden in te vullen</p>";
    	header("location: ../contact");
    } elseif($vraag == "") {
       	$_SESSION['contact'] = "<p class='text-danger'>U dient alle verplichte velden in te vullen</p>";
    	header("location: ../contact");
    }else {
    	 if(mail($to, $subject, $message, $headers)) {

	    $_SESSION['contact'] = "<p class='text-success'>Uw contactaanvraag is succesvol verzonden. Wij zullen zo spoedig mogelijk contact met u opnemen.</p>";
	    header("location: ../contact");
	}
    }



	// if(!empty($naam)) {
	// 	header("location: /contact?succes");
	// }
}