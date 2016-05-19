<?php

require 'assets/config.php';
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
	<script src="https://bootswatch.com/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="assets/js/queries.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>

	<!-- Optional theme -->
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css">
</head>

<body>
	<img style="width: 100%;" src="assets/img/site-banner.jpg" alt="site-banner.jpg">
	<div class="container">
		<div class="top-head">
			<div class="col-sm-12">
				<p class="info-mail text-center">info@mdwa.nl</span>
				<?php
				if(isset($_SESSION['user'])) { 
					echo "<a href='logout' class='pull-right'>Uitloggen</a>";
				} else {
					echo '<a href="inloggen" class="pull-right">Inloggen</a> <a href="registreren" class="pull-right" style="margin-right:5px;">Registreren</a> </p>';
				}
				?>
				</div>
		</div>
	</div>

	<nav class="navbar navbar-default" style="border-radius: 0">
	  <div class="container-fluid">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index">MDWA</a>
	    </div>

	    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" aria-expanded="false" style="height: 1px;">
	      <ul class="nav navbar-nav">
	        <li><a href="index">Home <span class="sr-only">(current)</span></a></li>
	        <li><a href="films">Films</a></li>
	        <li><a href="zoeken">Zoeken</a></li>
			<?php if(!isset($_SESSION['user'])) {
				?>
			<li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mijn account <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="mijnaccount">Mijn account</a></li>
	            <li class="divider"></li>
	            <li><a href="registreren">Registreren</a></li>
	            <li><a href="inloggen">Inloggen</a></li>
	          </ul>
	        </li>
			<?php } else { ?>
			<li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mijn account <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="mijnaccount">Mijn account</a></li>
	            <li class="divider"></li>
	            <li><a href="logout">Uitloggen</a></li>
	          </ul>
	        </li>
	        <?php } ?>
	        <li><a href="contact">Contact</a></li>
	      </ul>
	      <form method="POST" action="zoeken?zoekterm=&zoekterm"class="navbar-form navbar-right" role="search">
	        <div class="form-group">
	          	<input type="text" class="form-control" placeholder="Zoeken &hellip;" name="zoekterm" id="zoekveld">
	        </div>
	      	<button type="submit" class="btn btn-default">Submit</button>
	      </form>
	    </div>
	    </div>
	  </div>
	</nav>

	<?php if(isset($_SESSION['registered'])) { echo $_SESSION['registered']; }