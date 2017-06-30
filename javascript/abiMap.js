var map; // la carte google maps
var infowindow; // l'info bulle pour google maps
function initMap() {
  // NB : google offre aussi un service de calcul de coordonnées а l'aide de l'objet Geocoder...
  var latlng = new google.maps.LatLng(43.727456, 7.284336); // le point central = adresse ABI
  var myOptions = { // les options...sous forme de tableau JavaScript en notation JSON...
    center: latlng,
    zoom: 15,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  // instancier l'objet google maps pour affichage dans le div "map_canvas" prévu
  map = new google.maps.Map(document.getElementById("myGoogleMap"),myOptions);
  // instancier l'info bulle personnalisée
  infowindow = new google.maps.InfoWindow({
    content: "ABI : Nous sommes ici ! <br />244 route de Turin <br />06300 Nice",
    size: new google.maps.Size(50, 50),
    position: latlng
  });
  // instancier le marker personnalisé
  var marker = new google.maps.Marker({
    map: map,
    position: latlng
  });
  // ajouter l'appel de la fonction info() au click sur le marker
  google.maps.event.addListener(marker, 'click', function() {
    info();//bordel
  });
  // afficher tout de suite l'info bulle
  info();
} // fin initialize()
// fonction d'affichage de l'info-bulle GoogleMaps
// cette fonction est appelée par initialize() et au click sur le marker ==> 2 var map et infowindow glabales
function info() {
  infowindow.open(map);
} // fin info()
