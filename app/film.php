<?php include('head.php'); ?>

<?php

	// random movie-id: 104182

	if(!isset($_GET['movie-id'])) { // als GET movie-id niet bestaat, ga naar 404 pagina
		header("location: 404");
	} else if (empty($_GET['movie-id'])) { // als GET movie-id leeg is, ga naar 404 pagina
		header("location: 404");
	} else if (!is_numeric($_GET['movie-id'])){ // als GET movie-id geen nummer is, ga naar 404 pagina
		header ("location: 404");
	} else {
		$movieId = $_GET['movie-id'];
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
		<div class="col-sm-4 col-md-4 col-lg-4 movie-poster"></div>

		<div class="col-sm-8 col-md-8 col-lg-8">
			<h1 class="movie-title"></h1>
			<a href="#" id="bekeken"><img src="assets/img/bekeken.png" alt="Bekeken" title="Bekeken" class="icon"/></a>
			<a href="#" id="collectie"><img src="assets/img/collectie.jpg" alt="Collectie" title="Collectie" class="icon"></a>
			<a href="#"><img src="assets/img/wishlist.png" alt="Wishlist" title="Wishlist" class="icon"></a>
			<a href="#"><img src="assets/img/watchlist.png" alt="Watchlist" title="Watchlist" class="icon"></a>
			<p class="movie-plot"><br></p>
			<small class="movie-genres">Genres: </small><br>
			<small class="movie-director">Regiseur: &nbsp;</small><br>
			<small class="movie-actors">Acteurs: &nbsp;</small><br>
			<small class="movie-duration">Speelduur: <span class="movie-time"></span> minuten</small><br><br>
			<small class="movie-mmrating">Moviemeter.nl waardering
				<p style="width: 140px !important">
					<span class="movie-score" style="background-image:url('assets/img/rating.png');height: 14px; display: block">
					</span>
				</p>
			</small>

			<small class="movie-imdb">IMDB waardering
				<p style="width: 140px !important">
					<span class="movie-imdb-rating" style="background-image:url('assets/img/rating.png'); height: 14px; display: block"></span>
				</p>
			</small>

			<small class="movie-metascore">Metascore
				<p style="width: 140px !important">
					<span class="movie-metascore-rating" style="background-image:url('assets/img/rating.png'); height: 14px; display: block"></span>
				</p>
			</small>

			<a href="#" id="imdb-link" target="_blank" title="IMDb"><img src="assets/img/imdb-logo.png" alt="IMDB logo" class="imdb-logo"></a>
			<a href="#" id="moviemeter-link" target="_blank" title="Movie meter"> <img src="assets/img/moviemeter-logo.png" alt="Movie meter logo" class="moviemeter-logo" /></a>
		</div>
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
	$('.movie-director').append(data.directors);

	  // $('.movie-actors').append(data.actors[0].name); //nog loopen door alle acteurs
	for(i=0; i < data.actors.length; i++){
	  $('.movie-actors').append(data.actors[i].name);
	  $('.movie-actors').append(', ');
	}
	var x = $('.movie-actors').html();
	var z = x.slice(0,-2);
	$('.movie-actors').replaceWith('<small class="movie-actors">' + z + "</small>");

	$('.movie-time').append(data.duration);
	
	// movie rating * 20 = with in percentages
	var rating = data.average * 20;
	$('.movie-score').css('width', rating+ '%');

	document.getElementById('moviemeter-link').setAttribute("href", data.url);

	var imdb = document.getElementById('movie-imdb').innerHTML;
		$.ajax({
			type: 'GET',
			url: 'http://www.omdbapi.com/?apikey=acb7db4&i=' + imdb,
			success: function(omdb){
				$('.movie-poster').append("<img src='" + omdb.Poster + "' class='movie-poster' />");

				var imdbRating = omdb.imdbRating * 10;
				$('.movie-imdb-rating').css('width', imdbRating + '%');

				var metascore = omdb.Metascore;
				$('.movie-metascore-rating').css('width', metascore + '%');

				document.getElementById('imdb-link').setAttribute("href", "http://www.imdb.com/title/" + omdb.imdbID);
			},
			error: function(){
				// error handling
				console.log('Kan poster niet ophalen');
			}
		});
	},
	error: function(){
	$('.loading').hide();
	$('.container').append(errormsg);
	},
	timeout: 5000 // set timeout to 5 seconds
});
</script>

<?php include('footer.php'); ?>