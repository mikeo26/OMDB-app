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
			<h1 class="movie-title"></h1>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4 col-md-4 col-lg-4 movie-poster">
<!--  			<img src="assets/img/movie-poster.jpg" alt="Movie poster" class="movie-poster img-rounded" style="width: 100%">
 --> 		</div>

		<div class="col-sm-8 col-md-8 col-lg-8">
			<p class="movie-plot"><br></p>
			<small class="movie-genres">Genres: </small><br>
			<small class="movie-director">Regiseur: &nbsp;</small><br>
			<small class="movie-actors">Acteurs: &nbsp;</small><br>
			<small class="movie-duration">Speelduur: <span class="movie-time"></span> minuten</small><br>
			<small class="movie-rating">Waardering: <span class="movie-score"></span>/5</small>
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
	var moviePoster  = data.posters.regular;
	console.log(moviePoster);
	$('.movie-poster').append('<img src="'+ moviePoster +'" alt="Kan film poster van ' + data.title + ' niet vinden"/>');      
	$('.movie-title').append(data.title + " <small>(" + data.year + ")</small>");

	  for(i=0; i < data.genres.length; i++){
	  	$('.movie-genres').append(data.genres[i]);
	  	$('.movie-genres').append(', ');
	  }

	  $('.movie-plot').append(data.plot);
	  $('.movie-director').append(data.directors);
	  // $('.movie-actors').append(data.actors[0].name); //nog loopen door alle acteurs
	  for(i=0; i < data.actors.length; i++){
	  	$('.movie-actors').append(data.actors[i].name);
	  	$('.movie-actors').append(', ');
	  }

	  $('.movie-time').append(data.duration);
	  $('.movie-score').append(data.average);
	  $('.loading').hide();
	},
	error: function(){
	$('#aanbevolenFilmsContent').append(errormsg);
	$('.loading').hide();
	},
	timeout: 5000 // set timeout to 5 seconds
});

</script>

<?php include('footer.php'); ?>