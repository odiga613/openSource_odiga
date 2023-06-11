let iconObject = L.icon({
    iconUrl: './img/marker-icon.png', // 마커 아이콘의 이미지 URL
    shadowSize: [50, 64], // 그림자 크기
    shadowAnchor: [4, 62], // 그림자 위치
    iconAnchor: [12, 40] // 아이콘 위치
});

$(document).ready(function (e) {
    let host; // GraphHopper 서버 호스트 주소
    let defaultKey = "9db0a28e-4851-433f-86c7-94b8a695fb18"; // 기본 API 키
    let ghRouting = new GraphHopper.Routing({key: defaultKey, host: host}, {elevation: false}); // GraphHopper 라우팅 객체 생성
    let overwriteExistingKey = function () {
        let key = $("#custom_key_input").val(); // 사용자가 입력한 API 키
        if (key && key !== defaultKey) {
            $("#custom_key_enabled").show(); // 사용자 정의 키가 있는 경우 표시
            ghRouting.key = key; // 사용자 정의 키로 라우팅 객체의 키를 업데이트
        } else {
            $("#custom_key_enabled").hide(); // 사용자 정의 키가 없는 경우 숨김
        }
    };
    overwriteExistingKey();
    $("#custom_key_button").click(overwriteExistingKey); // 키 설정 버튼 클릭 시 키를 업데이트
    let routingMap = createMap('routing-map'); // 라우팅 지도 생성
    setupRoutingAPI(routingMap, ghRouting); // 라우팅 API 설정
});

// 라우팅 지도와 GraphHopper 라우팅 객체를 초기화하고 설정하는 함수
function setupRoutingAPI(map, ghRouting) {
    map.setView([33.45441, 126.56519], 17); // 지도의 중심 좌표와 줌 레벨 설정
    let points = []; // 클릭된 지점들의 좌표를 저장할 배열
    let instructionsDiv = $("#instructions"); // 경로 안내 결과를 표시할 요소
    map.on('click', function (e) {
        if (points.length > 1) {
            points.length = 0; // 저장된 지점 초기화
            routingLayer.clearLayers(); // 라우팅 레이어 초기화
        }

        L.marker(e.latlng, {icon: iconObject}).addTo(routingLayer); // 클릭된 지점에 마커 추가

        points.push([e.latlng.lng, e.latlng.lat]); // 클릭된 지점의 좌표를 배열에 추가
        if (points.length > 1) {
            ghRouting.doRequest({points: points})
                .then(function (json) {
                    let path = json.paths[0]; // 경로 정보 가져옴
                    routingLayer.addData({
                        "type": "Feature",
                        "geometry": path.points
                    });
                    let outHtml = "거리(m):" + path.distance;
                    outHtml += "<br/>시간(초):" + path.time / 1000;
                    $("#routing-response").html(outHtml);

                    if (path.bbox) {
                        let minLon = path.bbox[0];
                        let minLat = path.bbox[1];
                        let maxLon = path.bbox[2];
                        let maxLat = path.bbox[3];
                        let tmpB = new L.LatLngBounds(new L.LatLng(minLat, minLon), new L.LatLng(maxLat, maxLon));
                        map.fitBounds(tmpB); // 경로가 보여지도록 지도의 범위 조정
                    }

                    instructionsDiv.empty();
                    if (path.instructions) {
                        let allPoints = path.points.coordinates;
                        let listUL = $("<ol>");
                        instructionsDiv.append(listUL);
                        for (let idx in path.instructions) {
                            let instr = path.instructions[idx];
                            let instruction_points = allPoints.slice(instr.interval[0], instr.interval[1]);
                            $("<li>" + instr.text + " <small>(" + ghRouting.getTurnText(instr.sign) + ")</small>"
                                + " for " + instr.distance + "m and " + Math.round(instr.time / 1000) + "sec"
                                + ", geometry points:" + instruction_points.length + "</li>").appendTo(listUL);
                        }
                    }

                })
                .catch(function (err) {
                    let str = "오류 발생: " + err.message;
                    $("#routing-response").text(str);
                });
        }
    });

    let instructionsHeader = $("#instructions-header");
    instructionsHeader.click(function () {
        instructionsDiv.toggle();
    });

    let routingLayer = L.geoJson().addTo(map);
    routingLayer.options = {
        style: {color: "red", "weight": 5, "opacity": 0.6}
    };
}

// 지도를 생성하고 초기화하는 함수
function createMap(divId) {
    let osmAttr = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';

    let osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: osmAttr
    });

    let map = L.map(divId, {
        layers: [osm],
        center: [33.45441, 126.56519], // 원하는 중심 좌표
        zoom: 13 // 원하는 줌 레벨
    });

    L.control.layers({
        "OpenStreetMap": osm
    }).addTo(map);

    return map;
}
