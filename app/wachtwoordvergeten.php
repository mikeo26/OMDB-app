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
				<h2>Wachtwoord vergeten?</h2>
				<p>U kunt door middel van het onderstaande formulier uw wachtwoord opnieuw opvragen.</p>
				<?php

				if(isset($_SESSION['message'])) {
					echo $_SESSION['message'];
				}
				?>
					<form class="form-horizontal" method="POST" action="assets/resetwachtwoord.php" id="wachtwoordform">
					  <fieldset>
					    <legend>Formulier</legend>
					    <div class="form-group">
					      <label for="gebruikersnaam" class="col-lg-2 control-label">E-mailadres</label>
					      <div class="col-lg-10">
					        <input type="text" class="form-control" id="emailadres" placeholder="E-mailadres" name="emailadres" minlength="3" required>
					      </div>
					    </div>
					    <div class="form-group">
					      <div class="col-lg-10 col-lg-offset-2">
					        <button type="submit" name="opvragen" class="btn btn-primary">Opvragen!</button>
					      </div>
					    </div>
					  </fieldset>
					</form>

			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>