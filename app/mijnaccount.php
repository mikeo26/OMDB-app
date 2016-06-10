<?php include 'head.php'; 

if(!isset($_SESSION['user'])) {
	header("location: inloggen");
}

if($_SESSION['active'] !== '1') {
	echo "<div class='container'>U account moet nog geactiveerd worden. Kijk uw e-mail voor meer informatie.</div>";
	include 'footer.php';
	die();
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
				<h2>Account bewerken</h2>
				<h3>Wijzig wachtwoord</h3>
				<div class="statusMessage1"></div>
				<form id="changePass">
					<div class="form-group">
						<label for="newpass1" class="control-label">Nieuw wachtwoord</label>
						<input type="password" class="form-control" id="newpass1" name="newpass1" required minlength="6"> 
						<div id="newpass1Error"></div>
					</div>
					<div class="form-group">
						<label for="newpass2" class="control-label">Nieuw wachtwoord (herhaal)</label>
						<input type="password" class="form-control" id="newpass2" name="newpass2" required minlength="6"> 
						<div id="newpass2Error"></div>
					</div>

				</form>
					<button class="btn btn-primary" id="submitNewPass" name="submitNewPass">Wijzig wachtwoord</button> 

				<h3>Wijzig e-mailadres</h3>
				<div class="statusMessage2"></div>
				<form id="changeEmail">
					<div class="form-group">
						<label for="email1" class="control-label">Nieuw e-mailadres</label>
						<input type="text" class="form-control" id="email1" name="email1">
						<div id="newmail1Error"></div> 
					</div>
					<div class="form-group">
						<label for="email2" class="control-label">Nieuw e-mailadres (herhaal)</label>
						<input type="text" class="form-control" id="email2" name="email2"> 
						<div id="newmail2Error"></div> 
					</div>
				</form>
					<button class="btn btn-primary" id="submitNewMail" name="submitNewMail">Wijzig e-mailadres</button> 
			</div>

			<div class="col-sm-8 col-md-8 col-lg-8">
			<h2>Persoonlijke lijsten</h2>
			<div class="lijsten"></div>
			<ul class="nav nav-tabs">
  <li class="active"><a href="#collectie" data-toggle="tab" aria-expanded="true">Collectie</a></li>
  <li class=""><a href="#bekeken" data-toggle="tab" aria-expanded="false">Bekeken</a></li>
   <li class=""><a href="#wishlist" data-toggle="tab" aria-expanded="false">Wisthlist</a></li>
    <li class=""><a href="#watchlist" data-toggle="tab" aria-expanded="false">Watchlist</a></li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="collectie">
    <h4>Collectie</h4>
    <ul id="collectieLijst">
    </ul>
  </div>
  <div class="tab-pane fade" id="bekeken">
   	<h4>Bekeken</h4>
   	<ul id="bekekenLijst">
   	</ul>
  </div>
  <div class="tab-pane fade" id="wishlist">
    <h4>Wishlist</h4>
    <ul id="wishlistLijst">
    </ul>
  </div>
  <div class="tab-pane fade" id="watchlist">
    <h4>Watchlist</h4>
    <ul id="watchlistLijst">
    </ul>
  </div>
</div>
			</div>
		</div>
	</div>

<script>
$(document).ready(function(){
	// COLLECTIE LIJST
<?php 

$stmt = $db->prepare("SELECT filmId FROM collectie WHERE gebruikersId = :gebruikersId");
$stmt->bindParam("gebruikersId", $_SESSION['user']);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$collectieArray = array();

foreach($results as $result) {
	array_push($collectieArray, $result['filmId']);
}

echo "var myData = " . json_encode($collectieArray);
?>

	myData.forEach(function(value, key) {
		$.ajax({
			dataType: "jsonp",
			url: 'http://www.moviemeter.nl/api/film/' + value + '&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
			type: "GET",
			cache: true,
			async: true,
			success: function(data){
				$("ul#collectieLijst").append("<li><a data-cat='collectie' data-id='" + data.id +"' href='film?movie-id=" + data.id + "'>" + data.title + "</a> <span data-cat='collectie' data-id='"+ data.id +"' title='verwijder' id='remove' style='color:red;cursor:pointer;float:right;' class='remove fa fa-remove'></span></li>");
			},
		});
	});

	// BEKEKEN LIJST
<?php 

$stmt2 = $db->prepare("SELECT filmId FROM bekeken WHERE gebruikersId = :gebruikersId");
$stmt2->bindParam("gebruikersId", $_SESSION['user']);
$stmt2->execute();
$results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$bekekenArray = array();

foreach($results2 as $result2) {
	array_push($bekekenArray, $result2['filmId']);
}

echo "var myData2 = " . json_encode($bekekenArray);
?>


	myData2.forEach(function(value, key) {
		$.ajax({
			dataType: "jsonp",
			url: 'http://www.moviemeter.nl/api/film/' + value + '&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
			type: "GET",
			cache: true,
			async: true,
			success: function(data){
				$("ul#bekekenLijst").append("<li><a data-cat='bekeken' data-id='" + data.id +"' href='film?movie-id=" + data.id + "'>" + data.title + "</a> <span data-cat='bekeken' data-id='"+ data.id +"' title='verwijder' id='remove' style='color:red;cursor:pointer;float:right;' class='remove fa fa-remove'></span></li>");
			},
		});
	});

	// WISHLIST LIJST
<?php 

$stmt3 = $db->prepare("SELECT filmId FROM wishlist WHERE gebruikersId = :gebruikersId");
$stmt3->bindParam("gebruikersId", $_SESSION['user']);
$stmt3->execute();
$results3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

$wishlistArray = array();

foreach($results3 as $result3) {
	array_push($wishlistArray, $result3['filmId']);
}

echo "var myData3 = " . json_encode($wishlistArray);
?>


	myData3.forEach(function(value, key) {
		$.ajax({
			dataType: "jsonp",
			url: 'http://www.moviemeter.nl/api/film/' + value + '&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
			type: "GET",
			cache: true,
			async: true,
			success: function(data){
				$("ul#wishlistLijst").append("<li><a data-cat='wishlist' data-id='" + data.id +"' href='film?movie-id=" + data.id + "'>" + data.title + "</a> <span data-cat='wishlist' data-id='"+ data.id +"' title='verwijder' id='remove' style='color:red;cursor:pointer;float:right;' class='remove fa fa-remove'></span></li>");
			},
		});
	});

	// WATCHLIST LIJST
<?php 

$stmt4 = $db->prepare("SELECT filmId FROM watchlist WHERE gebruikersId = :gebruikersId");
$stmt4->bindParam("gebruikersId", $_SESSION['user']);
$stmt4->execute();
$results4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

$watchlistArray = array();

foreach($results4 as $result4) {
	array_push($watchlistArray, $result4['filmId']);
}

echo "var myData4 = " . json_encode($watchlistArray);
?>


	myData4.forEach(function(value, key) {
		$.ajax({
			dataType: "jsonp",
			url: 'http://www.moviemeter.nl/api/film/' + value + '&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
			type: "GET",
			cache: true,
			async: true,
			success: function(data){
				$("ul#watchlistLijst").append("<li><a href='film?movie-id=" + data.id + "'>" + data.title + "</a> <span data-cat='watchlist' data-id='"+ data.id +"' title='verwijder' style='color:red;cursor:pointer;float:right;' class='remove fa fa-remove'></span></li>");
			},
		});
	});

	// REMOVE FUNCTION
	$(document).on('click', '.remove', function(){
		var cat = $(this).attr('data-cat');

		var filmId = $(this).attr('data-id');

		var currentListItem = $(this).parent();

		var filmName = currentListItem.text();

		$.post(
			"assets/remove.php",
			{ cat: cat, filmId: filmId  },
			function(data) {
				var obj = JSON.parse(data);
				currentListItem.remove();
				$(".lijsten").html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button> <strong>" + filmName + "</strong>"+ obj.message +"</div>")

			}
		);
	});
});

</script>

<?php include 'footer.php'; ?>