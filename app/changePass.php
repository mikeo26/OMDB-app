<?php

require 'config.php';

if(isset($_SESSION['user'])) {
	$newpass1 = $_REQUEST['newpass1'];
	$newpass2 = $_REQUEST['newpass2'];

	$filename = "test.txt";
	$fh = fopen($filename, 'w') or die("can't open file");
	fwrite($fh, $newpass1);
	fclose($fh);
}