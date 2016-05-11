<?php include 'head.php'; ?>
	
	<div class="container">
		<div class="row">

		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h2>Registreren</h2>
				<p>Wilt u uw eigen filmcollectie, wishlist en watchlist bij kunnen houden? Dan kunt u hier een eigen account aan maken om dat te kunnen doen.</p>
					<form class="form-horizontal" method="POST" action="assets/register.php">
					  <fieldset>
					    <legend>Formulier</legend>
					    <div class="form-group">
					      <label for="gebruikersnaam" class="col-lg-2 control-label">Gebruikersnaam</label>
					      <div class="col-lg-10">
					        <input type="text" class="form-control" id="gebruikersnaam" placeholder="Gebruikersnaam" name="gebruikersnaam">
					      </div>
					    </div>
					    <div class="form-group">
					      <label for="e-mail" class="col-lg-2 control-label">E-mailadres</label>
					      <div class="col-lg-10">
					        <input type="email" class="form-control" id="email" placeholder="E-mailadres" name="email">
					      </div>
					    </div>
					    <div class="form-group">
					      <label for="wachtwoord" class="col-lg-2 control-label">Wachtwoord</label>
					      <div class="col-lg-10">
					        <input type="password" class="form-control" id="wachtwoord" placeholder="Wachtwoord" name="wachtwoord">
					      </div>
					    </div>
					    <div class="form-group">
					      <label for="herhaalwachtwoord" class="col-lg-2 control-label">Herhaal wachtwoord</label>
					      <div class="col-lg-10">
					        <input type="wachtwoord" class="form-control" id="herhaalwachtwoord" placeholder="Herhaal wachtwoord" name="herhaalwachtwoord">
					      </div>
					    </div>
					    <div class="form-group">
					      <div class="col-lg-10 col-lg-offset-2">
					        <button type="submit" name="register" class="btn btn-primary">Registreren</button>
					      </div>
					    </div>
					  </fieldset>
					</form>

			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>