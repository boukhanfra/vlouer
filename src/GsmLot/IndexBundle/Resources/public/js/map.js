var check = false;

function initialize(city,offer_id)
{
    if(!check)
    {

        var lat= 0;
        var lng =0;

        $.ajax({
            url : 'http://maps.googleapis.com/maps/api/geocode/json?address='+city+'&sensor=false'
        }).done(
            function(data){
                lat = data.results[0].geometry.location.lat;
                lng = data.results[0].geometry.location.lng;
                var map = null ;

                var mapCanvas = document.getElementById('map'+offer_id);

                mapCanvas.innerHTML = "";

                var options = {
                    center: {lat: lat, lng: lng},
                    zoom: 11
                };

                map = new google.maps.Map(mapCanvas,options);

                check = true;

            }
        );

    }
    else
    {
        check = false;
    }

}