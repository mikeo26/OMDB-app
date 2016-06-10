<?php

require 'assets/config.php';

if(isset($_GET['code'])) {
	$activationlink = $_GET['code'];
	$query = $db -> prepare("SELECT * FROM gebruikers WHERE verificatieCode = :activationlink");
	$query -> bindParam("activationlink", $activationlink, PDO::PARAM_STR);
	if($query -> execute()) {
		while($userid = $query->fetch(PDO::FETCH_OBJ)) {
			$id = $userid->gebruikersid;
			$activateQuery = $db -> prepare("UPDATE gebruikers SET active = 1 WHERE gebruikersid = '$id'");
			$activateQuery -> execute();
			$msg = "Je account is succesvol geactiveerd.";
			header("location: index.php?msg=" . $msg);
		}

	}

}