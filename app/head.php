<!DOCTYPE html>
<html>
<head>
	<title>Movie database web app | Home</title>
	<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
	<script src="https://bootswatch.com/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="assets/js/queries.js"></script>

	<!-- Optional theme -->
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css">
</head>

<body>




			<img style="width: 100%;" src="assets/img/site-banner.jpg" alt="site-banner.jpg">
				<div class="container">
		<div class="top-head row">
			<div class="col-sm-12">
				<p class="info-mail text-center"><span>info@mdwa.nl</span> <a href="#" class="pull-right">Inloggen</a> <a href="#" class="pull-right" style="margin-right:5px;">Registreren</a> </p>

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
	      <a class="navbar-brand" href="#">MDWA</a>
	    </div>

	    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" aria-expanded="false" style="height: 1px;">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
	        <li><a href="/films">Films</a></li>
	        <li><a href="/zoeken">Zoeken</a></li>
			<li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mijn account <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="/mijnaccount">Mijn account</a></li>
	            <li><a href="/registreren">Registreren</a></li>
	            <li><a href="/inloggen">Inloggen</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Info</a></li>
	          </ul>
	        </li>
	        <li><a href="/contact">Contact</a></li>
	      </ul>
	      <form class="navbar-form navbar-right" role="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-default">Submit</button>
	      </form>
	    </div>
	    </div>
	  </div>
	</nav>