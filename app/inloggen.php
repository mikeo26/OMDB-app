<?php include 'head.php';
if(isset($_SESSION['user'])) {
	header("location: mijnaccount");
}

 ?>
	
	<div class="container">
		<div class="row">

		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
			<?php

			if(isset($_SESSION['errors'])) {
				foreach($_SESSION['errors'] as $item) {
					echo "<li class='text-danger'>" . $item . "</li>";
				}
				
				session_destroy();
			}

			?>
				<h2>Inloggen</h2>
				<p>U kunt door middel van het onderstaande formulier inloggen in uw account.</p>
					<form class="form-horizontal" method="POST" action="assets/login.php" id="loginForm">
					  <fieldset>
					    <legend>Formulier</legend>
					    <div class="form-group">
					      <label for="gebruikersnaam" class="col-lg-2 control-label">Gebruikersnaam</label>
					      <div class="col-lg-10">
					        <input type="text" class="form-control" id="gebruikersnaam" placeholder="Gebruikersnaam" name="gebruikersnaam" minlength="3" required>
					      </div>
					    </div>
					    <div class="form-group">
					      <label for="wachtwoord" class="col-lg-2 control-label">Wachtwoord</label>
					      <div class="col-lg-10">
					        <input type="password" class="form-control" id="wachtwoord" placeholder="Wachtwoord" name="wachtwoord" required>
					      </div>
					    </div>
					    <div class="form-group">
					      <div class="col-lg-10 col-lg-offset-2">
					        <button type="submit" name="inloggen" class="btn btn-primary">Inloggen</button>
					      </div>
					    </div>
					  </fieldset>
					</form>

			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>