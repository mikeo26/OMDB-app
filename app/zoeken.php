<?php include('head.php');
if(isset($_GET['zoekterm'])){
	$zoekterm = urlencode(str_replace("+", "%20", $_GET['zoekterm']));
}
?>

<div class="container">	
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<p class="zoekopdracht">Zoekopdracht:
				<?php
					if(isset($zoekterm)){
						echo urldecode($zoekterm);
					}else{
						echo 'Geen zoekterm opgegeven';
					} 
				?>
			</p>
			<p style="display: none;" id="zoekterm"><?php if(isset($zoekterm)){ echo $zoekterm;} ?></p>
			<div class="zoekresultaten"><img src="assets/img/loading.gif" alt="Loading..." class="loading"></div>
		</div>
	</div>
</div>

<?php include('footer.php'); ?>

<script>
var errormsg = '<p class="errormsg reload" onClick="window.location.reload()">Geen zoekresultaten om weer te geven. Controleer op spel en typfouten en probeer het opnieuw.</p>';

var zoekterm = document.getElementById('zoekterm').innerHTML;
document.getElementById('zoekveld').setAttribute("value", zoekterm);
  $.ajax({
    dataType: "jsonp",
    url: 'http://www.moviemeter.nl/api/film/?q=' + zoekterm + '&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
    type: "GET",
    cache: false,
    async: true,
    success: function(data){  
    	for(i=0; i < 100; i++){
    	 	console.log(data[i]);      
          	$('.zoekresultaten').append("<div class='movie' movie-id='" + data[i].id + "'><span><a href='film?movie-id=" + data[i].id + "'>(" + data[i].year + ") "+data[i].title+"</a></span>");
          	$('.loading').hide();
         }
      },
    error: function(){
        $('.zoekresultaten').append(errormsg);
        $('.loading').hide();
      },
      timeout: 5000 // set timeout to 5 seconds
  });

</script>