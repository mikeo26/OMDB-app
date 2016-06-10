<?php include 'head.php'; ?>
	
	<div class="container">
		<div class="row">
			<?php 
			if(isset($_SESSION['registered'])) { echo "<p class='text-success'>" . $_SESSION['registered'] . "</p>"; unset($_SESSION['registered']);
			unset($_SESSION['registered']);
		} 
			if(isset($_SESSION['logoutmsg'])) { echo $_SESSION['logoutmsg'];
			unset($_SESSION['logoutmsg']); }
			?>


		</div>
		<div class="row">
			<div class="col-sm-8 col-md-8 col-lg-8">
				<h2>Movie Database Web App</h2>
				<p>Op deze website kun je je eigen gebruikersaccount aanmaken om je persoonlijke films collectie, bekeken, watchlist en wishlist bij te houden.</p>
			</div>

			<div class="col-sm-4 col-md-4 col-lg-4">
				<h3>Aanbevolen films</h3>
				<div class="loading">
					<img src="assets/img/loading.gif" alt="Laden..." class="loading">
					<br>
					<p> Aanbevolen films aan het laden...</p>
				</div>
				<div id="aanbevolenFilmContent" class="aanbevolen-films"> <?php include 'assets/no-javascript.php'; ?></div>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>