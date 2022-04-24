function initMap(){
    var geocoder = new google.maps.Geocoder();
}
function geolocalisation(){
    var geocoder = new google.maps.Geocoder();
    var adresse = document.getElementById("adr").value;
    geocoder.geocode( { 'address': adresse}, function(results, status) {  
        if(status=="OK"){
            latitude = results[0].geometry.location.lat();
            longitude = results[0].geometry.location.lng();
            console.log(latitude);
            var sendAjax = $.ajax({
                type: "POST",
                url: 'insert-in-bdd.php',
                data: '$lat='+latitude+'&lng='+longitude,
                success: handleResponse
            });
            console.log(latitude);
        }
        function handleResponse(){
            $('#answer')[0].innerHTML = sendAjax.responseText;
            print($('#answer')[0].innerHTML);
        }
        
    });
}
//184 Impasse du chateau de currault