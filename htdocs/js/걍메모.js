        $connect = mysqli_connect("localhost","root","","odiga");
        $area = $_POST["area"];
        $x = $_POST["latitude"];
        $y = $_POST["longitude"];
        $email = $_POST["email"];
        $sql = "INSERT INTO target (area, user_target_coordinate_x, user_target_coordinate_y) VALUES('$area','$x','$y')";
        $result = mysqli_query($connect,$sql);




















let iconObject = L.icon({
    iconUrl: './img/marker-icon-green.png',
    shadowSize: [50, 64],
    shadowAnchor: [4, 62],
    iconAnchor: [12, 40]
});

$(document).ready(function (e) {
    let map = createMap('routing-map');
    let marker = null;
    $('.leaflet-top').css('display', 'none');
    map.on('click', function (e) {
        if (marker) {
            map.removeLayer(marker);
        }

        marker = L.marker(e.latlng, { icon: iconObject }).addTo(map);

        let latitude = e.latlng.lat;
        let longitude = e.latlng.lng;

        // console.log("위도: " + latitude + ", 경도: " + longitude);
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

function SetOnClick(){
    let area = $('#area').val();
    // alert(area);
}