
jQuery(document).ready(function ($) {
    initMap();
    var map;
    function initMap() {
        var template = path.templateUrl;
        console.log(template);

        var myLatLng = {lat: 52.549511, lng:  -0.316116};

        var locations = [
            ['Philz Coffee<br>\
    801 S Hope St A, Los Angeles, CA 90017<br>\
   <a href="https://goo.gl/maps/L8ETMBt7cRA2">Get Directions</a>',   52.550130, -0.324918, template+'/assets/images/map-marker-alt-solid.svg'],
            ['Philz Coffee<br>\
    525 Santa Monica Blvd, Santa Monica, CA 90401<br>\
   <a href="https://goo.gl/maps/PY1abQhuW9C2">Get Directions</a>', 34.017951, -118.493567, template+'/assets/images/circle-solid.svg'],
            ['Philz Coffee<br>\
    146 South Lake Avenue #106, At Shoppers Lane, Pasadena, CA 91101<br>\
    <a href="https://goo.gl/maps/eUmyNuMyYNN2">Get Directions</a>', 52.564684, -0.287199, template+'/assets/images/circle-solid.svg'],
            ['Philz Coffee<br>\
    21016 Pacific Coast Hwy, Huntington Beach, CA 92648<br>\
    <a href="https://goo.gl/maps/Cp2TZoeGCXw">Get Directions</a>', 52.558088, -0.302746, template+'/assets/images/circle-solid.svg']];

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: myLatLng
        });

        for (var count = 0; count < locations.length; count++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[count][1], locations[count][2]),
                map: map,
                icon: locations[count][3],
                title: locations[count][0]
            });
        }

        var infowindow =  new google.maps.InfoWindow({});
        google.maps.event.addListener(marker, 'click', (function (marker, count) {
            return function () {
                infowindow.setContent(locations[count][0]);
                infowindow.open(map, marker);
            }
        })(marker, count));


    }
});