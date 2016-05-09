var errormsg = '<p class="errormsg reload" onClick="window.location.reload()">Content could not be loaded <br /> Tap here to try again</p>';

$.ajax({
  dataType: "jsonp",
  url: 'http://www.moviemeter.nl/api/film/?q=staR%20wars&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
  type: "GET",
  cache: false,
  async: true,
  success: function(data){

    for(i=0; i < 7; i++){
            
            $('#aanbevolenFilmContent').append("<div id='movie' movie-id='"+data[i].id+"'><span>("+data[i].year+") "+data[i].title+"</span>");
            $('.loading').hide();
            console.log(data[i].title);
        }
    },
    error: function(){
      $('#aanbevolenFilmsContent').append(errormsg);
      $('.loading').hide();
    },
    timeout: 5000 // set timeout to 5 seconds
});

setTimeout( function() {
  $("#movie").each( function() {
  var id = $(this).attr("movie-id");
  console.log("derp");
    $.ajax({
    dataType: "jsonp",
    url: 'http://www.moviemeter.nl/api/film/'+id+'&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
    type: "GET",
    cache: false,
    async: true,
    success: function(data) {
      $("#movie").append("<img src="+data.posters.small+" />");
    }
  })
});
}, 300);