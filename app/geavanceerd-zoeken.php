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
		<div class="col-sm-12 col-md-12 col-lg-12">
			<p class="zoekopdracht">Zoekterm:
				<?php
					if(isset($zoekterm)){
						echo urldecode($zoekterm);
					}else{
						echo 'Geen zoekterm opgegeven';
					} 
				?>
			</p>
			<p style="display: none;" id="zoekterm"><?php if(isset($zoekterm)){ echo urldecode($zoekterm);} ?></p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal">
				<fieldset>
				  	<div class="form-group">
				    	<label class="sr-only" for="titel">Titel</label>
				    	<div class="col-sm-12">
				    		<input type="text" class="form-control" id="titel" placeholder="search">
				    	</div>
				  	</div>

				  	<div class="form-group">
				  		
						<div class="col-md-3">
							<label for="jaar">Jaartal van</label>
							<select name="jaar-van" id="jaar" class="form-control">
					  			<option value="">Van</option>
					  			<option value="2013">2013</option>
					  			<option value="2014">2014</option>
					  		</select>
						</div>

						<div class="col-md-3">
							<label for="jaar-tot">Jaar tot</label>
					  		<select name="jaar-tot" id="jaar-tot" class="form-control">
					  			<option value="">Tot</option>
					  			<option value="2015">2015</option>
					  			<option value="2016">2016</option>
					  		</select>
					  	</div>

						<div class="col-md-3">
						<label for="acteur">Acteur</label>
							<input type="text" class="form-control pull-right" id="acteur" placeholder="search" />
						</div>
				  	</div>

				  	<div class="form-group">
				  		<div class="col-md-6">
				  		<label for="categorie">Categorie</label>
					  		<select name="categorie" id="categorie" class="form-control">
					  			<option value="">Categorie</option>
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
					  			<option value="">Opties</option>
					  		</select>
				  		</div>
				  	</div>
					
					<div class="form-group">
						<div class="col-md-6">
							<button type="submit" class="btn btn-primary pull-right">Zoeken!</button>
						</div>
					</div>
			  	</fieldset>
			</form>
		</div>
	</div>

  	<div class="row">
	    <div class="zoekresultaten">
	    	<h3>Zoekresultaten</h3>
	    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero numquam repellendus non voluptate. Harum blanditiis ullam deleniti, repudiandae fugiat molestias fuga recusandae maiores iure dolores porro modi veritatis. Quod, necessitatibus.</p>
	      	<img src="assets/img/loading.gif" alt="Loading..." class="loading">
	    </div>
	</div>
</div>

<?php include('footer.php'); ?>

<script>
var errormsg = '<p class="errormsg reload col-sm-12 col-md-12 col-lg-12" onClick="window.location.reload()">Geen zoekresultaten om weer te geven. Controleer op spel en typfouten en probeer het opnieuw.</p>';

var filmdata;

var zoekterm = document.getElementById('zoekterm').innerHTML;
document.getElementById('zoekveld').setAttribute("value", zoekterm);


$.ajax({
dataType: "jsonp",
url: 'http://www.moviemeter.nl/api/film/?q=' + zoekterm + '&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
type: "GET",
cache: false,
async: true,
success: function(data){

	// Haal 50 films op
	for(i=0; i < 50; i++){
    
    	if (data[i].id !== undefined || data[i].id !== ''){
        	filmdata = {
        		id: data[i].id,
        		title: data[i].title,
        		year: data[i].year,
        		poster: ''
        	}

        	moviemeterCall(filmdata.id, data[i]);
		}
	} // for loop end
},
error: function(){
    $('.zoekresultaten').append(errormsg);
    $('.loading').hide();
  },
  timeout: 5000 // set timeout to 5 seconds
}); // ajax request end

function moviemeterCall(id, mm){
	$.ajax({
	    dataType: "jsonp",
	    url: 'http://www.moviemeter.nl/api/film/' + id + '&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
	    type: "GET",
	    cache: false,
	    async: true,
	    success: function(details){
	    	omdbCall(details.imdb, mm);
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
	    		$('.loading').hide();
	    	} else {
	    		var poster = omdb.Poster;
	    	}

			$('.zoekresultaten').append("<div class='movie col-sm-2 col-md-2 col-lg-2' id='movie-id-" + mm.id + "'><a href='film?movie-id=" + mm.id + "'><p class='film-titel'>"+ mm.title+" (" + mm.year + ") </p></a> <br><a href='film?movie-id=" + mm.id + "'><img src='" + poster + "' alt='Oops! Er ging iets mis met het laden van de filmposter...' style='width: 100%' class='film-poster'/></a>");
		}
	});
}
</script>