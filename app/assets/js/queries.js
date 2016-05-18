var errormsg = '<p class="errormsg reload" onClick="window.location.reload()">De content kon niet worden geladen <br /> Klik hier om het nog een keer te proberen.</p>';

for(i=0; i < 10; i++){
  var rand =  Math.floor((Math.random() * 100000) + 1);
  $.ajax({
    dataType: "jsonp",
    url: 'http://www.moviemeter.nl/api/film/'+ rand +'&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
    type: "GET",
    cache: false,
    async: true,
    success: function(data){          
          $('#aanbevolenFilmContent').append("<div class='movie' movie-id='" + data.id + "'><span><a href='film?movie-id=" + data.id + "'>(" + data.year + ") "+data.title+"</a></span>");
          $('.loading').hide();
      },
    error: function(){
        $('#aanbevolenFilmsContent').append(errormsg);
        $('.loading').hide();
      },
      timeout: 5000 // set timeout to 5 seconds
  });
}