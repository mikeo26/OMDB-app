<?php include 'head.php'; 

if(!isset($_SESSION['user'])) {
	header("location: inloggen");
}
?>


	
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
			<?php
				if(isset($_GET['msg'])) {
					if($_GET['msg'] === 'ingelogd') {
						echo "<p class='text-success'><em>U bent succesvol ingelogd.</em></p>";
					}
				}

			?>
				<h1>Mijn account</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-md-4 col-lg-4">
				<h3>Account bewerken</h3>
				<h4>Wijzig wachtwoord</h4>
				<form id="changePass">
					<div class="form-group">
						<label for="newpass1" class="control-label">Nieuw wachtwoord</label>
						<input type="password" class="form-control" id="newpass1" name="newpass1" required minlength="6"> 
					</div>
					<div class="form-group">
						<label for="newpass2" class="control-label">Nieuw wachtwoord (herhaal)</label>
						<input type="password" class="form-control" id="newpass2" name="newpass2" required minlength="6"> 
					</div>
				</form>
										<a href="#"><div class="btn btn-primary" id="submitNewPass" name="submitNewPass">Wijzig wachtwoord</div></a>
				<h4>Wijzig e-mailadres</h4>
				<form id="changeEmail">
					<div class="form-group">
						<label for="email1" class="control-label">Nieuw e-mailadres</label>
						<input type="text" class="form-control" id="email1" name="email1"> 
					</div>
					<div class="form-group">
						<label for="email2" class="control-label">Nieuw e-mailadres (herhaal)</label>
						<input type="text" class="form-control" id="email2" name="email2"> 
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" id="submitNewMail" name="submitNewMail" value="Wijzig e-mailadres"> 
					</div>
				</form>
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