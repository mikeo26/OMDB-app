<?php include 'head.php'; ?>
	
	<div class="container">
		<div class="row">

		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
			<?php
			if(isset($_GET['succes'])) {
				echo "<p>Uw contactaanvraag is succesvol verzonden. Wij zullen zo spoedig mogelijk contact met u opnemen. Klik <a href='/'>hier</a> om terug te keren naar de homepage.";
				echo "</div>";
				include 'footer.php';
				die();
			} ?>


			</div>
		</div>
		<div class="row">
			<div class="col-sm-8 col-md-8 col-lg-8">
			<?php if(isset($_SESSION['contact'])) { echo $_SESSION['contact']; unset($_SESSION['contact']); } ?>
				<h2>Contact</h2>
					<form class="form-horizontal" method="POST" action="assets/contact.php" id="contactForm">
					  <fieldset>
					    <div class="form-group">
					      <label for="naam" class="col-lg-2 control-label">Naam*</label>
					      <div class="col-lg-10">
					        <input type="text" class="form-control" placeholder="Uw naam" id="naam" name="naam" <?php if(isset($_SESSION['username'])) { echo "value='" . $_SESSION['username'] . "'"; } ?> minlength="3" required>
					      </div>
					    </div>
					    <div class="form-group">
					      <label for="e-mail" class="col-lg-2 control-label">E-mailadres*</label>
					      <div class="col-lg-10">
					        <input type="email" class="form-control" id="email" placeholder="Uw e-mailadres" <?php if(isset($_SESSION['email'])) { echo "value='" . $_SESSION['email'] . "'"; } ?> name="email" required>
					      </div>
					    </div>
					    <div class="form-group">
					      <label for="telefoon" class="col-lg-2 control-label">Telefoonnummer</label>
					      <div class="col-lg-10">
					        <input type="text" class="form-control" id="telefoon" placeholder="Uw telefoonnummer" name="telefoon" minlength="8">
					      </div>
					    </div>
					    <div class="form-group">
					      <label for="vraag" class="col-lg-2 control-label">Vraag*</label>
					      <div class="col-lg-10">
					        <textarea class="form-control" id="vraag" placeholder="Uw vraag..." name="vraag" minlength="10" required></textarea>
					      </div>
					    </div>
					    <div class="form-group">
					      <div class="col-lg-10 col-lg-offset-2">
					        <button type="submit" name="sendcontact" class="btn btn-primary">Verstuur</button>
					      </div>
					    </div>
					  </fieldset>
					</form>
			
			</div>

			<div class="col-sm-4 col-md-4 col-lg-4">
				<h2>Contactgegevens</h2>
				Peter van der krift<br>
				Aardrijk 67<br>
				4824 BT Breda

			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>