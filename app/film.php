<!-- Author: Menno van der Krift -->
<?php include('head.php');
	// random movie-id: 104182
	if(!isset($_GET['movie-id'])) { // als GET movie-id niet bestaat, ga naar 404 pagina
		header("location: 404");
	} else if (empty($_GET['movie-id'])) { // als GET movie-id leeg is, ga naar 404 pagina
		header("location: 404");
	} else if (!is_numeric($_GET['movie-id'])){ // als GET movie-id geen nummer is, ga naar 404 pagina
		header ("location: 404");
	} else {
		$movieId = $_GET['movie-id'];
		$userId = $_SESSION['user'];
	}

	$rows1 = $db->prepare("SELECT * FROM bekeken WHERE gebruikersId = '$userId' AND filmId = '$movieId'");
	$rows1 -> execute();
	$num_rows1 = $rows1->fetchColumn();

	if($num_rows1 > 0) {
		$bekekenImg = "assets/img/addBekeken-checked.png";
	} else {
		$bekekenImg = "assets/img/addBekeken.png";
	}

	$rows2 = $db->prepare("SELECT * FROM collectie WHERE gebruikersId = '$userId' AND filmId = '$movieId'");
	$rows2 -> execute();
	$num_rows2 = $rows2->fetchColumn();

	if($num_rows2 > 0) {
		$collectieImg = "assets/img/addCollectie-checked.png";
	} else {
		$collectieImg = "assets/img/addCollectie.png";
	}

	$rows3 = $db->prepare("SELECT * FROM wishlist WHERE gebruikersId = '$userId' AND filmId = '$movieId'");
	$rows3 -> execute();
	$num_rows3 = $rows3->fetchColumn();

	if($num_rows3 > 0) {
		$wishlistImg = "assets/img/addWishlist-checked.png";
	} else {
		$wishlistImg = "assets/img/addWishlist.png";
	}

	$rows4 = $db->prepare("SELECT * FROM watchlist WHERE gebruikersId = '$userId' AND filmId = '$movieId'");
	$rows4 -> execute();
	$num_rows4 = $rows4->fetchColumn();

	if($num_rows4 > 0) {
		$watchlistImg = "assets/img/addWatchlist-checked.png";
	} else {
		$watchlistImg = "assets/img/addWatchlist.png";
	}

	

	// als film met movie-id == 0, direct naar 404 pagina
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<span id="movie-id" style="display: none;"><?= $movieId ?></span>
			<span id="movie-imdb" style="display: none"></span>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6 col-md-4 col-lg-4 movie-poster"> <img src="assets/img/loading.gif" alt="Loading..." style="display: block; margin: 0 auto" class="loading-poster"/></div>

		<div class="col-sm-6 col-md-8 col-lg-8">
			<h1 class="movie-title"></h1>
			<span data-url="addBekeken" filmId="<?php echo $movieId; ?>" id="addbekeken"><img src="<?= $bekekenImg ?>" alt="Bekeken" title="Bekeken" class="icon inactive"/> bekeken</span>
			<span data-url="addCollectie" filmId="<?php echo $movieId; ?>" id="collectie"><img src="<?= $collectieImg ?>" alt="Collectie" title="Collectie" class="icon inactive"> collectie</span>
			<span data-url="addWishlist" filmId="<?php echo $movieId; ?>" id="wishlist"><img src="<?= $wishlistImg ?>" alt="Wishlist" title="Wishlist" class="icon inactive"> wishlist</span>
			<span data-url="addWatchlist" filmId="<?php echo $movieId; ?>" id="watchlist"><img src="<?= $watchlistImg ?>" alt="Watchlist" title="Watchlist" class="icon inactive"> watchlist</span>
			<div class="apiResponse"></div>
			
			<p class="movie-plot"><br></p>
			<small class="movie-genres">Genres: </small><br>
			<small class="movie-directors">Regiseur: &nbsp;</small><br>
			<small class="movie-actors">Acteurs: &nbsp;</small><br>
			<small class="movie-duration">Speelduur: <span class="movie-time"></span></small><br><br>

			<a href="#" id="imdb-link" target="_blank" title="IMDb"><img src="assets/img/imdb-logo.png" alt="IMDB logo" class="imdb-logo"></a>
			<a href="#" id="moviemeter-link" target="_blank" title="Movie meter"> <img src="assets/img/moviemeter-logo.png" alt="Movie meter logo" class="moviemeter-logo" /></a>
		</div>
	</div>
	
	<br>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-2">
						<small class="movie-mmrating rating">Moviemeter.nl waardering
				<p style="width: 140px !important">
					<span class="movie-score" style="background-image:url('assets/img/rating.png');height: 14px; display: block">
					</span>
				</p>
			</small>
		</div>

		<div class="col-md-2">
						<small class="movie-imdb rating">IMDB waardering
				<p style="width: 140px !important">
					<span class="movie-imdb-rating" style="background-image:url('assets/img/rating.png'); height: 14px; display: block"></span>
				</p>
			</small>
		</div>

		<div class="col-md-2">
						<small class="movie-metascore rating">Metascore
				<p style="width: 140px !important">
					<span class="movie-metascore-rating" style="background-image:url('assets/img/rating.png'); height: 14px; display: block"></span>
				</p>
			</small>
		</div>

		<div class="col-md-2"></div>
	</div>
</div>

<script>
var errormsg = '<p class="errormsg reload" onClick="window.location.reload()">De content kon niet worden geladen <br /> Klik hier om het nog een keer te proberen.</p>';
var movieId = document.getElementById('movie-id').innerHTML;

$.ajax({
	dataType: "jsonp",
	url: 'http://www.moviemeter.nl/api/film/' + movieId + '&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
	type: "GET",
	cache: false,
	async: true,
	success: function(data){
	$('.loading').hide();
	    
	$('.movie-title').append(data.title + " <small>(" + data.year + ")</small>");
	$('#movie-imdb').append(data.imdb);

	// Movie genres
	for(i=0; i < data.genres.length; i++){
	  $('.movie-genres').append(data.genres[i]);
	  $('.movie-genres').append(', ');
	}
	var x = $('.movie-genres').html();
	var z = x.slice(0,-2);
	$('.movie-genres').replaceWith('<small class="movie-genres">' + z + "</small>");

	$('.movie-plot').append(data.plot);

	for(i=0; i < data.directors.length; i++){
	  $('.movie-directors').append(data.directors[i]);
	  $('.movie-directors').append(', ');
	}
	var x = $('.movie-directors').html();
	var z = x.slice(0,-2);
	$('.movie-directors').replaceWith('<small class="movie-directors">' + z + "</small>");


	for(i=0; i < data.actors.length; i++){
	  $('.movie-actors').append(data.actors[i].name);
	  $('.movie-actors').append(', ');
	}
	var x = $('.movie-actors').html();
	var z = x.slice(0,-2);
	$('.movie-actors').replaceWith('<small class="movie-actors">' + z + "</small>");

	if(data.duration !== null){
		$('.movie-time').append(data.duration + " minuten");
	} else {
		$('.movie-time').append(" Niet beschikbaar");
	}


	// movie rating * 20 = with in percentages
	var rating = data.average * 20;
	if(rating == 0){
		$('.movie-score').append('<b>Movie meter rating niet beschikbaar </b> <br><br>')
						 .css("width", '100%')
						 .css('background-image', 'none')
						 .addClass('no-rating');
	}else{
		$('.movie-score').css('width', rating+ '%');
	}
	

	document.getElementById('moviemeter-link').setAttribute("href", data.url);

	var imdb = document.getElementById('movie-imdb').innerHTML;
		$.ajax({
			type: 'GET',
			url: 'http://www.omdbapi.com/?apikey=acb7db4&i=' + imdb,
			success: function(omdb){
				$('.loading-poster').hide();
				if (omdb.Poster == 'N/A' || omdb.Poster == undefined){
					$('.movie-poster').append("<img src='assets/img/no-poster.jpg' class='movie-poster' />");
				}else{
					$('.movie-poster').append("<img src='" + omdb.Poster + "' class='movie-poster' />");
				}

				var imdbRating = omdb.imdbRating * 10;
				$('.movie-imdb-rating').css('width', imdbRating + '%');

				
				if(omdb.Metascore == "N/A" || omdb.Metascore == undefined){
					$('.movie-metascore-rating').append("<b>Metascore niet beschikbaar</b>")
												.css("width", '100%')
												.css('background-image', 'none')
												.addClass('no-rating');
				} else { 
					$('.movie-metascore-rating').css('width', omdb.Metascore + '%');
				}

				document.getElementById('imdb-link').setAttribute("href", "http://www.imdb.com/title/" + omdb.imdbID);
			},
			error: function(){
				// error handling
				$('.movie-poster').append("<p>Oops! Kan de film poster niet vinden :(</p>");
			}
		});
	},
	error: function(){
	$('.loading').hide();
	$('.container').append(errormsg);
	},
	timeout: 5000 // set timeout to 5 seconds
});

//Scripts voor films toevoegen aan persoonlijke lijsten
$(document).ready(function(){
	



	$("*[data-url]").click(function(){
		url = $(this).attr('data-url');

		var filmId = $(this).attr('filmid');
		
		console.log(filmId);
		
		var film = {
			movieId: filmId
		};
		
		console.log(url)

		var that = this;

		$.post(
			"assets/"+url+".php",
			{ movieId: filmId },
			function(data) {
				var obj = JSON.parse(data);
				console.log(data);
				console.log(obj.message);
				if(obj.status == 'success') {
					$(that).children("img").attr("src", "assets/img/" + url + "-checked.png");	
				}
				$(".apiResponse").html(obj.message);

			}
		);
	});



});
</script>

<?php include('footer.php'); ?>