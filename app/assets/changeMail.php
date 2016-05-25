<?php

session_start();

require 'config.php';

if(isset($_SESSION['user'])) {
	$newmail1 = $_REQUEST['newmail1'];
	$newmail2 = $_REQUEST['newmail2'];

	$emailQuery = $db->prepare("SELECT * FROM gebruikers WHERE emailadres = '$newmail1'");
	$emailQuery -> execute();
	$checkEmail = $emailQuery->fetchColumn();
	
	if($newmail1 !== $newmail2) {
		$response['message'] = "<p class='text-danger'>De 2 e-mailadressen zijn niet identiek.</p>";
	}if($checkEmail > 1) {
		$response['message'] = "<p class='text-danger'>Dit e-mailadres bestaat al in het de database.</p>";
	} else {
		$stmt = $db->prepare("UPDATE gebruikers SET emailadres = :newmail WHERE gebruikersid = :id");
		$stmt -> bindParam("newmail", $newmail1);
		$stmt -> bindParam("id", $_SESSION['user']);

		if($stmt->execute()) {
			$response['message'] = "<p class='text-success'>Uw e-mailadres is succesvol gewijzigd.<p>";
		}
	}
}

echo json_encode($response);



