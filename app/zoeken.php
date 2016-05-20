<?php include('head.php');
if(isset($_GET['zoekterm'])){
	$zoekterm = urlencode(str_replace("+", "%20", $_GET['zoekterm']));
}
?>

<div class="container zoeken">	
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
    <div class="zoekresultaten">
      <img src="assets/img/loading.gif" alt="Loading..." class="loading">
    </div>
  </div>
</div>

<?php include('footer.php'); ?>

<script>
var errormsg = '<p class="errormsg reload" onClick="window.location.reload()">Geen zoekresultaten om weer te geven. Controleer op spel en typfouten en probeer het opnieuw.</p>';

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
    	// Haal 5 films op
    	for(i=0; i < 100; i++){
        
        	if (data[i].id !== undefined || data[i].id !== ''){
	        	filmdata = {
	        		id: data[i].id,
	        		title: data[i].title,
	        		year: data[i].year,
	        		poster: ''
	        	}

	        	moviemeterCall(filmdata.id);
			}

			

			
      	} // for loop end
    },
    error: function(){
        $('.zoekresultaten').append(errormsg);
        $('.loading').hide();
      },
      timeout: 5000 // set timeout to 5 seconds
  }); // ajax 1 end


function moviemeterCall(id){
	$.ajax({
		    dataType: "jsonp",
		    url: 'http://www.moviemeter.nl/api/film/' + id + '&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
		    type: "GET",
		    cache: false,
		    async: true,
		    success: function(details){
		    	omdbCall(details.imdb);
		    }
		   });
}

function omdbCall(id){
	$.ajax({
		    		dataType: "jsonp",
				    url: 'http://www.omdbapi.com/?apikey=acb7db4&i=' + id,
				    type: "GET",
				    cache: false,
				    async: true,
				    success: function(data){

				    	// $('#movie-id-'+ id).append("<img src='" + omdb.Poster + "' />");

						// document.getElementById("movie-id-82240").setAttribute("src", omdb.Poster);

						console.log(data);

						$('.zoekresultaten').append("<div class='movie col-md-4' id='movie-id-" + data.id + "'><span><a href='film?movie-id=" + data.id + "'>"+ data.title+" (" + data.year + ") </a> <br><img src='assets/img/loading.gif' alt='Film poster'></span>");

						$.each(data, function( key, value ) {
							console.log(key+value)
								// $('.apiData-'+index).html(value);
								// $('body').prepend('<p>'+index+' => '+value+'</p>');
								// console.log( $('.apiData-'+index).html(value) );

								// 
						});
					}

					
		    	});
}



</script>