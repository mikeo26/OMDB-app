<?php include 'head.php'; 

if(!isset($_SESSION['user'])) {
	header("location: inloggen");
}
?>


	
	<div class="container">
		<div class="row">

		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h1>Mijn account</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-md-4 col-lg-4">
				<h3>edit account</h3>
			</div>

			<div class="col-sm-4 col-md-4 col-lg-4">
				<h3>Collectie</h3>
				<ul>
					<li>Film 1</li>
					<li>Film 2</li>
					<li>Film 3</li>
				</ul>
				<h3>Bekeken</h3>
				<ul>
					<li>Film 1</li>
					<li>Film 2</li>
					<li>Film 3</li>
				</ul>
			</div>

			<div class="col-sm-4 col-md-4 col-lg-4">
				<h3>Wishlist</h3>
				<ul>
					<li>Film 1</li>
					<li>Film 2</li>
					<li>Film 3</li>
				</ul>
				<h3>Watchlist</h3>
				<ul>
					<li>Film 1</li>
					<li>Film 2</li>
					<li>Film 3</li>
				</ul>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>