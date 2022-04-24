// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.
let map, infoWindow;
var xhr = new XMLHttpRequest();
var latitude
var longitude
var xhr2 = new XMLHttpRequest();
xhr.onreadystatechange = function () {

  if (this.readyState == 4 && this.status == 200) {

    latitude = this.response;
    alert(latitude)
    xhr2.onreadystatechange = function () {

      if (this.readyState == 4 && this.status == 200) {
        
        longitude = this.response;
        alert(longitude)
        function initMap() {
          map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: latitude, lng: longitude },
            zoom: 13,
        
          });
        
          infoWindow = new google.maps.InfoWindow();
          function addMarker(pos) {
            const marker = new google.maps.Marker({
              position: pos,
              map: map,
            });
          }
        
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
              (position) => {
                const pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude,
                };
        
                infoWindow.setPosition(pos);
                addMarker(pos);
        
                map.setCenter(pos);
              },
              () => {
                handleLocationError(true, infoWindow, map.getCenter());
              }
            );
          } else {
            handleLocationError(false, infoWindow, map.getCenter());
          }
        
        }
        
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
          infoWindow.setPosition(pos);
          infoWindow.setContent(
            browserHasGeolocation
              ? "Error: The Geolocation service failed."
              : "Error: Your browser doesn't support geolocation."
          );
          infoWindow.open(map);
        
        }
        window.initMap = initMap;
      } else if (this.readyState == 4 && this.status == 404) {
        alert("Erreur 404");
      }
    }

  } else if (this.readyState == 4 && this.status == 404) {
    alert("Erreur 404");
  }
  xhr2.open("GET", "./script/getlong.php", "true");
  xhr2.responseType = "text";
  xhr2.send();
}
xhr.open("GET", "./script/getlat.php", "true");
xhr.responseType = "text";
xhr.send();







