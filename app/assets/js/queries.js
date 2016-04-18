var errormsg = '<p class="errormsg reload" onClick="window.location.reload()">Content could not be loaded <br /> Tap here to try again</p>';

$.ajax({
  dataType: "jsonp",
  url: 'http://www.moviemeter.nl/api/film/?q=staR%20wars&api_key=3d91abb206c948bb7ca0b1b9b57be4aa',
  type: "GET",
  cache: false,
  async: true,
  success: function(data){

    // if(data){
    //         i=0;
    //         $('#aanbevolenFilmsContent').append(data[i].title);
    //         $('.loading').hide();
    //         console.log(data);
    //     }
    // },

    for(i=0; i < 7; i++){
            $('#aanbevolenFilmContent').append("(" + data[i].year + ") " + data[i].title + "<br />");
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