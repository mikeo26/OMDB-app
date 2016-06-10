<?php

session_start();
if(session_destroy()){
	session_start();
	$_SESSION['logoutmsg'] = "<p class='text-success'>U bent succesvol uitgelogd.</p>";
	header("location: index");
}

