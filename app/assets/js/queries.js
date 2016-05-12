var errormsg = '<p class="errormsg reload" onClick="window.location.reload()">Aanbevolen films konden niet geladen worden. <br /> Klik hier om het nog een keer te proberen.</p>';

 var rand =  Math.floor((Math.random() * 100000) + 1);

$.ajax({
  dataType: "jsonp",
  url: 'http://www.moviemeter.nl/api/film/'+ rand +'&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
  type: "GET",
  cache: false,
  async: true,
  success: function(data){

    for(i=0; i < 1; i++){
            $('#aanbevolenFilmContent').append("<div class='movie' movie-id='"+data.id+"'><span>("+data.year+") "+data.title+"</span>");
            $('.loading').hide();
        }
    },
    error: function(){
      $('#aanbevolenFilmsContent').append(errormsg);
      $('.loading').hide();
    },
    timeout: 5000 // set timeout to 5 seconds
});

setTimeout( function() {
  $(".movie").each( function() {
  var id = $(this).attr("movie-id");
    $.ajax({
    dataType: "jsonp",
    url: 'http://www.moviemeter.nl/api/film/'+id+'&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
    type: "GET",
    cache: false,
    async: true,
    success: function(data) {
      $(".movie").append("<img src="+data.posters.regular+" />");
    }
  })
});
}, 300);