<?php include('head.php');
if(isset($_GET['zoekterm'])){
	$zoekterm = urlencode(str_replace("+", "%20", $_GET['zoekterm']));
	$zoekterm = trim($zoekterm, " ");
}
?>

<div class="container zoeken">
	<div class="row">
		<div class="col-md-12">
			<h1>Zoeken</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form action="#" class="form-horizontal" id="form-zoeken">
				<fieldset>
				  	<div class="form-group">
				    	
				    	<div class="col-sm-12" id="title-wrapper">
				    		<label class="sr-only" for="titel">Titel</label>
				    		<input type="text" class="form-control" id="titel" placeholder="search" required>
				    		<div class="title-help-block help-block with-errors" style="display: none">
				    			<ul class="list-unstyled">
				    				<li>Vul dit veld in.</li>
				    			</ul>
				    		</div>
				    	</div>
				  	</div>

				  	<div class="form-group">
				  		
						<div class="col-md-3">
							<label for="jaar">Jaartal van</label>
							<select name="jaar-van" id="jaar-van" class="form-control">
								<option value="">Van</option>
								<script>
									var year = new Date().getFullYear();
									for(i=year; i >= 1920; i--){
										document.write("<option value='" + i + "'> " + i + " </option>");
									}
								</script>
					  		</select>
						</div>

						<div class="col-md-3">
							<label for="jaar-tot">Jaar tot</label>
					  		<select name="jaar-tot" id="jaar-tot" class="form-control">
					  			<option value="">Tot</option>
								<script>
									var year = new Date().getFullYear();
									for(i=year; i >= 1920; i--){
										document.write("<option value='" + i + "'> " + i + " </option>");
									}
								</script>
					  		</select>
					  	</div>

						<div class="col-md-6">
						<label for="acteur">Acteur</label>
							<input type="text" class="form-control pull-right" id="acteur" placeholder="search" />
						</div>
				  	</div>

				  	<div class="form-group">
				  		<div class="col-md-6">
				  		<label for="categorie">Categorie</label>
					  		<select name="categorie" id="categorie" class="form-control">
					  			<option value="">-- Maak een keuze --</option>
					  			<option value="horror">Horror</option>
					  			<option value="sci-fi">Sciencefiction</option>
					  			<option value="thriller">Thriller</option>
					  			<option value="drama">Drama</option>
					  			<option value="animatie">Animatie</option>
					  		</select>
					  	</div>

						<div class="col-md-6">
							<label for="regisseur">Regisseur</label>
				    		<input type="text" class="form-control" id="regisseur" placeholder="search">
						</div>
				  	</div>

				  	<div class="form-group">
				  		<div class="col-md-6">
				  			<label for="speelduur">Speelduur</label>
					  		<select name="speelduur" id="speelduur" class="form-control">
					  			<option value="">-- Maak een keuze --</option>
					  			<option value="60">< 60 minuten</option>
					  			<option value="60-90">60 - 90 minuten</option>
					  			<option value="90-240">90 - 240 minuten</option>
					  			<option value="240">240 > minuten</option>
					  		</select>
				  		</div>
				  	</div>

				  	<div class="col-md-12">
						<button type="button" class="btn btn-primary pull-right" onClick=zoeken();>Zoeken!</button>
					</div>
			  	</fieldset>
			</form>

		</div>
	</div>

  	<div class="row">
	    <div class="zoekresultaten col-md-12">
	    	<h3>Zoekresultaten</h3>
	    </div>
	</div>
	<div class="row">
		<div id="zoekresultaten" class="col-md-12">
		</div>
	</div>
</div>

<?php include('footer.php'); ?>

<script>
var errormsg = '<p class="errormsg reload" onClick="window.location.reload()" style="cursor: pointer;">Geen zoekresultaten om weer te geven. Controleer op spel en typfouten en probeer het opnieuw.</p>';
var filmdata;

function zoeken(){
	var myNode = document.getElementById("zoekresultaten");

	while (myNode.firstChild) {
	    myNode.removeChild(myNode.firstChild);
	}	

	var titel = document.getElementById("titel").value;

	if(titel == ""){
		$('#title-wrapper').addClass('has-error has-danger');
		$('.title-help-block').css('display', 'block');
	}
	var jaarVan = document.getElementById("jaar-van").value;
	var jaarTot = document.getElementById("jaar-tot").value;
	var acteur = document.getElementById("acteur").value;
	var categorie =  document.getElementById("categorie").value;
	var regisseur = document.getElementById("regisseur").value;
	var speelduur = document.getElementById("speelduur").value;

	$.ajax({
	dataType: "jsonp",
	url: 'http://www.moviemeter.nl/api/film/?q=' + titel + '&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
	type: "GET",
	cache: false,
	async: true,
	success: function(data){

		// Haal 50 films op
		for(i=0; i < 50; i++){
	    
	    	if (data.id !== undefined || data.id !== ''){

	        	filmdata = {
	        		id: data[i].id,

	        	}

	        	filmdata.title = data[i].title;
	        	filmdata.year = data[i].year;
	        	filmdata.poster = "";

	        moviemeterCall( data[i]);
			}
		} // for loop end
	},
	error: function(data){
	    $('#zoekresultaten').append(errormsg);
	  },
	  timeout: 5000 // set timeout to 5 seconds
	}); // ajax request end

	function moviemeterCall(mm){
		$.ajax({
		    dataType: "jsonp",
		    url: 'http://www.moviemeter.nl/api/film/' + filmdata.id + '&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
		    type: "GET",
		    cache: false,
		    async: true,
		    success: function(details){
		    	omdbCall(details.imdb, mm);
		    	filmdata.genres = details.genres;
		    	filmdata.actors = details.actors.name;
		    	filmdata.directors = details.directors;

	        	console.log(details);
		    }
		});
	}

	function omdbCall(id, mm){
		$.ajax({
			dataType: "jsonp",
		    url: 'http://www.omdbapi.com/?apikey=acb7db4&i=' + id,
		    type: "GET",
		    cache: false,
		    async: true,
		    success: function(omdb){

		    	if( omdb.Poster == undefined || omdb.Poster == "N/A"){
		    		var poster = "assets/img/no-poster.jpg";
		    	} else {
		    		var poster = omdb.Poster;
		    	}

		 		var title = mm.title;
				var title = title.slice(0, 40);

		    	filmdata = {
		    		id: mm.id,
		    		title: title,
		    		year: mm.year,
		    		poster: poster,
		    		actors: mm.actors,
		    		genre: mm.genre
		    	}

		    	if(jaarVan && filmdata.year < jaarVan || jaarTot && filmdata.year > jaarTot){
					delete filmdata.year;
				}

				if(filmdata.year == undefined || filmdata.year == undefined){
					delete filmdata;
				}

				$('#zoekresultaten').append("<div class='movie col-sm-2 col-md-2 col-lg-2' id='movie-id-" + filmdata.id + "'><a href='film?movie-id=" + filmdata.id + "'><p class='film-titel'>"+ filmdata.title +" (" + filmdata.year + ") </p></a> <br><a href='film?movie-id=" + filmdata.id + "'><img src='" + filmdata.poster + "' alt='Oops! Er ging iets mis met het laden van de filmposter...' style='width: 100%' class='film-poster'/></a>");
			}
		});
	}
}
</script>