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
				<p>Als je in bent gelogd kun je eenvoudig navigeren naar een film waarvan jij meer informatie wilt zien. Op de homepage en film pagina staan een aantal willekeurige suggesties die je wellicht leuke inspiratie geven bij het zoeken van een geschikte film.</p>
				<p>In het geval dat je al een bepaald trefwoord, jaartal of genre in gedachten hebt kun je hiervoor gebruik van de (geavanceerde) zoekfunctie. Als je dan een film naar wens hebt gevonden kun je deze aan je eigen wishlist, watchlist, bekeken lijst of collectie toevoegen. Zo heb je een mooi overzicht van je eigen verzameling.</p>
				<p>Mochten er nog zaken onduidelijk zijn, neem dan gerust contact met ons op. We zullen uw vraag zo spoedig mogelijk beantwoorden.</p>
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