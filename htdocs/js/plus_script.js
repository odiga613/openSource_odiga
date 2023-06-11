let iconObject = L.icon({
    iconUrl: './img/marker-icon-green.png',
    shadowSize: [50, 64],
    shadowAnchor: [4, 62],
    iconAnchor: [12, 40]
});
let iconObject2 = L.icon({
    iconUrl: './img/marker-icon-red.png',
    shadowSize: [50, 64],
    shadowAnchor: [4, 62],
    iconAnchor: [12, 40]
});

$(document).ready(function (e) {
    let host;
    let defaultKey = "18357858-b79d-4a43-a5e2-11d0f6b21734";
    let ghRouting = new GraphHopper.Routing({ key: defaultKey, host: host }, { elevation: false });
    let overwriteExistingKey = function () {
        let key = $("#custom_key_input").val();
        if (key && key !== defaultKey) {
            $("#custom_key_enabled").show();
            ghRouting.key = key;
        } else {
            $("#custom_key_enabled").hide();
        }
    };
    overwriteExistingKey();
    $("#custom_key_button").click(overwriteExistingKey);
    let routingMap = createMap('routing-map');
    let routingLayer = L.geoJson().addTo(routingMap); // 라우팅 레이어 추가
    setupRoutingAPI(routingMap, routingLayer, ghRouting); // 라우팅 API 설정
    $('.leaflet-top').css('display', 'none');
    $("#search").on("change", function(){
        let search_marker = [];
        let search = document.getElementById("search");
        let x = parseFloat(search.options[search.selectedIndex].getAttribute("data-x"));
        let y = parseFloat(search.options[search.selectedIndex].getAttribute("data-y"));
        let searchLatLng = {
            lat: x,
            lng: y
        };
        routingLayer.clearLayers();
        L.marker(searchLatLng, { icon: iconObject2 }).addTo(routingLayer);
        search_marker.push(searchLatLng.lng,searchLatLng.lat);
    });
    
});

function setupRoutingAPI(map, routingLayer, ghRouting) { // 라우팅 API 설정 함수 (맵, 라우팅 레이어, GraphHopper 라우팅 객체를 매개변수로 받음)
    map.setView([33.45441, 126.56519], 17); // 맵의 초기 뷰 설정 (중심 좌표와 줌 레벨)
    let points = []; // 클릭된 지점들의 좌표를 저장할 배열
    let instructionsDiv = $("#instructions"); // 안내 정보를 표시할 요소
     let startSelect = document.getElementById("start"); // 출발지 선택 요소
    let endSelect = document.getElementById("end"); // 도착지 선택 요소
    map.on('click', function (e) { // 맵 클릭 이벤트 핸들러
        if (points.length > 1) { // 출발지와 도착지가 이미 선택된 경우
            points.length = 0; // 배열 비우기
            routingLayer.clearLayers(); // 라우팅 레이어 초기화
        }
        if (startSelect.selectedIndex > 0) { // 출발지가 선택되었을 때
            let startX = parseFloat(startSelect.options[startSelect.selectedIndex].getAttribute("data-x"));
            let startY = parseFloat(startSelect.options[startSelect.selectedIndex].getAttribute("data-y"));
            let startLatLng = {
              lat: parseFloat(startX),
              lng: parseFloat(startY)
            };
            L.marker(startLatLng, { icon: iconObject }).addTo(routingLayer); 
            points.push([startLatLng.lng,startLatLng.lat]);
        }
        if (endSelect.selectedIndex > 0) { // 도착지가 선택되었을 때
            let endX = parseFloat(endSelect.options[endSelect.selectedIndex].getAttribute("data-x"));
            let endY = parseFloat(endSelect.options[endSelect.selectedIndex].getAttribute("data-y"));
            let endLatLng = {
              lat: parseFloat(endX),
              lng: parseFloat(endY)
            };
            L.marker(endLatLng, { icon: iconObject }).addTo(routingLayer); 
            points.push([endLatLng.lng, endLatLng.lat]);
        }else{
            L.marker(e.latlng, { icon: iconObject }).addTo(routingLayer); // 클릭한 위치에 마커 추가
            points.push([e.latlng.lng, e.latlng.lat]);
        }
        if (points.length > 1) { // 출발지와 도착지가 선택된 경우
            ghRouting.doRequest({ points: points }) // GraphHopper 라우팅 요청 보내기
                .then(function (json) {
                    let path = json.paths[0]; // 경로 정보 가져오기
                    routingLayer.addData({
                        "type": "Feature",
                        "geometry": path.points
                    });
                    let outHtml = "거리(m):" + path.distance; // 거리 출력
                    outHtml += "<br/>시간(초):" + path.time / 1000; // 시간 출력
                    $("#routing-response").html(outHtml);

                    if (path.bbox) {
                        let minLon = path.bbox[0]; // 경로의 경계 상자 좌표 가져오기
                        let minLat = path.bbox[1];
                        let maxLon = path.bbox[2];
                        let maxLat = path.bbox[3];
                        let tmpB = new L.LatLngBounds(new L.LatLng(minLat, minLon), new L.LatLng(maxLat, maxLon));
                        map.fitBounds(tmpB); // 지도의 범위를 경로에 맞게 조정
                    }

                    instructionsDiv.empty();
                    if (path.instructions) {
                        let allPoints = path.points.coordinates; // 모든 경로 지점 좌표 가져오기
                        let listUL = $("<ol>");
                        instructionsDiv.append(listUL);
                        for (let idx in path.instructions) {
                            let instr = path.instructions[idx]; // 경로 안내 정보 가져오기
                            let instruction_points = allPoints.slice(instr.interval[0], instr.interval[1]); // 경로 안내에 해당하는 지점 좌표 가져오기
                            $("<li>" + instr.text + " <small>(" + ghRouting.getTurnText(instr.sign) + ")</small>"
                                + " for " + instr.distance + "m and " + Math.round(instr.time / 1000) + "sec"
                                + ", geometry points:" + instruction_points.length + "</li>").appendTo(listUL); // 안내 정보 표시
                        }
                    }

                })
                .catch(function (err) {
                    let str = "오류 발생: " + err.message; // 오류 메시지 출력
                    $("#routing-response").text(str);
                });
        }
    });

    let instructionsHeader = $("#instructions-header"); // 안내 정보의 헤더 요소
    instructionsHeader.click(function () {
        instructionsDiv.toggle(); // 안내 정보 숨기기/보이기 전환
    });

    routingLayer.options = { // 라우팅 레이어 스타일 설정
        style: { color: "red", weight: 5, opacity: 0.6 }
    };
}



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
