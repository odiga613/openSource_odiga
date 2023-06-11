let iconObject = L.icon({
    iconUrl: './img/marker-icon-green.png',
    shadowSize: [50, 64],
    shadowAnchor: [4, 62],
    iconAnchor: [12, 40]
});

let map = null;
let marker = null;

$(document).ready(function (e) {
    map = createMap('routing-map');
    $('.leaflet-top').css('display', 'none');
    
    map.on('click', function (e) {
        if (marker) {
            map.removeLayer(marker);
        }

        marker = L.marker(e.latlng, { icon: iconObject }).addTo(map);

        let user_target_coordinate_x = e.latlng.lat;
        let user_target_coordinate_y = e.latlng.lng;
        
    });
});

function createMap(divId) {
    let osmAttr = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';

    let osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: osmAttr
    });

    let map = L.map(divId, {
        layers: [osm],
        center: [33.45441, 126.56519],
        zoom: 13
    });

    L.control.layers({
        "OpenStreetMap": osm
    }).addTo(map);

    return map;
}

function SetOnClick() {
    let area = $('#area').val();
    let user_target_coordinate_x = null;
    let user_target_coordinate_y = null;

    if (marker) {
        user_target_coordinate_x = marker.getLatLng().lat;
        user_target_coordinate_y = marker.getLatLng().lng;
    }
    $.ajax({
        url: 'plus_process.php',
        type: 'POST',
        data: {
            area: area,
            user_target_coordinate_x: user_target_coordinate_x,
            user_target_coordinate_y: user_target_coordinate_y
        },
        success: function (response) {
            alert("장소가 저장되었습니다.");
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}