var GoogleMapsLoader = require("google-maps"); // only for common js environments

/* Google maps */
GoogleMapsLoader.KEY = "AIzaSyAvsvZ8pzEJ0cqUTZJWaL344DHwKuy881Q";

function initGoogleMaps() {
    if ($('#map').length === 0) return;
    /* lat/long used by Google Maps */
    var myLatLng = new google.maps.LatLng(36.689437, -4.445302);
    var myLatLngcenter = new google.maps.LatLng(
        36.689437 + 0.018, -4.445302 - 0.018
    );
    /* options for the map */
    var myOptions = {
        scrollwheel: false,
        zoom: 13,
        center: myLatLngcenter,
        draggable: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    /* placing the map object */
    var map = new google.maps.Map(document.getElementById("map"), myOptions);
    /* placing the marker with his options */
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: "La térmica"
    });
    /* for responsive layouts */
    google.maps.event.addDomListener(window, "resize", function () {
        map.setCenter(myLatLng);
    });
    var url =
        "https://maps.google.com/maps?q=Av.+de+los+Guindos%2C+48,+M%C3%A1laga&hl=en&t=m&z=17&iwloc=A";
    if ($(window).width() < 992) {
        var infowindow = new google.maps.InfoWindow({
            content: '<p class="google-maps-window">La térmica<br />Av. de los Guindos, 48<br />29004 Málaga</p><a href="' +
                url +
                '" target="_blank">Directions</a>'
        });
        google.maps.event.addListener(marker, "click", function () {
            infowindow.open(map, marker);
        });
    } else {
        google.maps.event.addListener(marker, "click", function () {
            var win = window.open(url, "_blank");
            win.focus();
        });
    }
}

module.exports = (() => {
    $(window).on("resize", function () {
        GoogleMapsLoader.load(function (google) {
            initGoogleMaps();
        });
    });

    /* On load events */
    $(window).on("load", function () {
        GoogleMapsLoader.load(function (google) {
            initGoogleMaps();
        });
    });
})()