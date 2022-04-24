geocoder = new google.maps.Geocoder();


function getCoordinates(address, callback) {
    var coordinates;
    

    geocoder.geocode({ address: address }, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            
            coordinates = results[0].geometry.location;
            
            $.ajax({
                url: "updatepos.php",
                type: "POST",
                data: 'latlng=' + coordinates,
                async: false,
                success: function (resultat) {
                    console.log(resultat);
                }
            })
            callback(coordinates);
        }
        else {
            console.log('Adresse incorrect');

            
        }
    });


}

function exec(adr) {
    
    getCoordinates(adr, function(coordinates){ console.log(coordinates) });
}