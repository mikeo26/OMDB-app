var errormsg = '<p class="errormsg reload" onClick="window.location.reload()">De content kon niet worden geladen <br /> Klik hier om het nog een keer te proberen.</p>';

// Home pagina - Aanbevolen films
for(i=0; i < 4; i++){
  var rand =  Math.floor((Math.random() * 100000) + 1);
  $.ajax({
    dataType: "jsonp",
    url: 'http://www.moviemeter.nl/api/film/'+ rand +'&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
    type: "GET",
    cache: false,
    async: true,
    success: function(data){          
          $('#aanbevolenFilmContent').append("<div id='" + data.id + "' class='movie' movie-id='" + data.id + "'><span><a href='film?movie-id=" + data.id + "'>" +data.title+" (" + data.year + ") </a></span>");
          $('.loading').hide();

            $.ajax({
            dataType: "jsonp",
            url: 'http://www.omdbapi.com/?apikey=acb7db4&i=' + data.imdb,
            type: "GET",
            cache: false,
            async: true,
            success: function(omdb){

              if( omdb.Poster == undefined || omdb.Poster == "N/A"){
                var poster = "assets/img/no-poster.jpg";
              } else {
                var poster = omdb.Poster;
              }

              var title = data.title;

              filmdata = {
                id: data.id,
                title: title,
                year: data.year,
                poster: poster
              }

              var filmId = "#" + data.id;
              console.log(filmId);
              $(filmId).append("<img src='" + filmdata.poster + "' alt='Oops! Er ging iets mis met het laden van de filmposter...' style='width: 100%' class='film-poster' /> <br>");

              }
              });

      },
    error: function(){
        $('#aanbevolenFilmsContent').append(errormsg);
        $('.loading').hide();
      },
      timeout: 5000 // set timeout to 5 seconds
  });
}


/*********************************************************************************************************************************/
/*********************************************************************************************************************************/
/*********************************************************************************************************************************/


// Films pagina
for(i=0; i < 4; i++){
  var rand1 =  Math.floor((Math.random() * 100000) + 1);
  $.ajax({
    dataType: "jsonp",
    url: 'http://www.moviemeter.nl/api/film/'+ rand1 +'&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
    type: "GET",
    cache: false,
    async: true,
    success: function(data){

      $.ajax({
        dataType: "jsonp",
        url: 'http://www.omdbapi.com/?apikey=acb7db4&i=' + data.imdb,
        type: "GET",
        cache: false,
        async: true,
        success: function(omdb){

          if( omdb.Poster == undefined || omdb.Poster == "N/A"){
            var poster = "assets/img/no-poster.jpg";
          } else {
            var poster = omdb.Poster;
          }

          var title = data.title;
          var title = title.slice(0, 40);

          filmdata = {
            id: data.id,
            title: title,
            year: data.year,
            poster: poster,
            actors: data.actors
          }

          var test = filmdata.actors;

          if(data.duration == null) {
            duration = "Speelduur niet beschikbaar";
          }else {
            duration = data.duration + " minuten";
          }

          if(data.average == 0) {
            var avrating = "Rating niet beschikbaar";
          }else {
            var avrating = data.average;
          }

          $('#filmOverzicht').append("<div class='films col-md-6' id='movie-id-" + filmdata.id + "'><img src='" + filmdata.poster + "' alt='Oops! Er ging iets mis met het laden van de filmposter...' style='width: 100%' class='film-poster'/><a href='film?movie-id=" + filmdata.id + "'><h4 class='film-titel'>"+ filmdata.title +" (" + filmdata.year + ") </h4></a> <br><a href='film?movie-id=" + filmdata.id + "'></a><span class='filmsInfo'>Rating: " + avrating + " / 5</span><br><span class='filmsInfo'>Speelduur: " + duration + "</span>");

      }
    });
      },
    error: function(){
        $('#aanbevolenFilmsContent').append(errormsg);
        $('.loading').hide();
      },
      timeout: 5000 // set timeout to 5 seconds
  });
}
