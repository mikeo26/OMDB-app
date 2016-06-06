<?php include 'head.php';
if($_SESSION['role'] !== '1') {
	header("location: mijnaccount");
}

 ?>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
			<h1>Admin</h1>

			<?php

				if(isset($_SESSION['message'])) {
					echo "<p class='text-success'>" . $_SESSION['message'] . "</p>";
					unset($_SESSION['message']);
				}

			?>

			<div class="col-sm-6 col-md-6 col-lg-6">
			<h3>Verwijder gebruikers</h3>
			<table>
			  <tr>
			    <thead>
			      <th style="width:75px;">ID</th>
			      <th style="width:200px;">Gebruikersnaam</th>
			      <th>Verwijder gebruiker</th>
			    </thead>
			  </tr>
			  <tbody>
			<?php

			$stmt = $db->prepare("SELECT * FROM gebruikers");
			$stmt->execute();

			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach($results as $result) {
				echo "<tr><td>" . $result['gebruikersid'] . "</td><td>" . $result['gebruikersnaam'] . "</td><td><a href='assets/deleteUser.php?id=" . $result['gebruikersid'] . "'>Verwijder</a></td></tr>";
			}
			?>
			</tbody>
			</table>

			</div>

			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>