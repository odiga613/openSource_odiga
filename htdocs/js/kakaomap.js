var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
    mapOption = {
        center: new kakao.maps.LatLng(33.38648, 126.57594), // 지도의 중심좌표
        level: 10, // 지도의 확대 레벨
        mapTypeId: kakao.maps.MapTypeId.ROADMAP // 지도종류
    };
// 지도를 생성한다 
var map = new kakao.maps.Map(mapContainer, mapOption);
// 마커 이미지의 주소
var markerImageUrl = 'https://i.ibb.co/7gy2kth/1.png',
    markerImageSize = new kakao.maps.Size(25, 25), // 마커 이미지의 크기
    markerImageOptions = {
        offset: new kakao.maps.Point(10, 10) // 마커 좌표에 일치시킬 이미지 안의 좌표
    };
var markerImageUrl2 = 'https://i.ibb.co/dgFVcBQ/1-2.png',
    markerImageSize2 = new kakao.maps.Size(25, 25), // 마커 이미지의 크기
    markerImageOptions2 = {
        offset: new kakao.maps.Point(10, 10) // 마커 좌표에 일치시킬 이미지 안의 좌표
    };
var markerImageUrl3 = 'https://i.ibb.co/HVR5F6n/1-3.png',
    markerImageSize3 = new kakao.maps.Size(25, 25), // 마커 이미지의 크기
    markerImageOptions3 = {
        offset: new kakao.maps.Point(10, 10) // 마커 좌표에 일치시킬 이미지 안의 좌표
    };

// 마커 이미지를 생성한다
var markerImage = new kakao.maps.MarkerImage(markerImageUrl, markerImageSize, markerImageOptions);

var markerImage2 = new kakao.maps.MarkerImage(markerImageUrl2, markerImageSize2, markerImageOptions2);

var markerImage3 = new kakao.maps.MarkerImage(markerImageUrl3, markerImageSize3, markerImageOptions3);
// 지도에 마커를 생성하고 표시한다
var marker = new kakao.maps.Marker({
    position: new kakao.maps.LatLng(33.47843, 126.47772), // 마커의 좌표
    image: markerImage, // 마커의 이미지
    map: map // 마커를 표시할 지도 객체
});
var marker2 = new kakao.maps.Marker({
    position: new kakao.maps.LatLng(33.43129, 126.38991), // 마커의 좌표
    image: markerImage2, // 마커의 이미지
    map: map // 마커를 표시할 지도 객체
});
var marker3 = new kakao.maps.Marker({
    position: new kakao.maps.LatLng(33.35506, 126.68336), // 마커의 좌표
    image: markerImage3, // 마커의 이미지
    map: map // 마커를 표시할 지도 객체
});
var polyline = new kakao.maps.Polyline({
    map: map, // 선을 표시할 지도 객체 
    path: [ // 선을 구성하는 좌표 배열
        new kakao.maps.LatLng(33.47843, 126.47772),
        new kakao.maps.LatLng(33.43129, 126.38991),
        new kakao.maps.LatLng(33.35506, 126.68336)
    ],
    strokeWeight: 3, // 선의 두께
    strokeColor: '#CD5C4A', // 선 색
    strokeOpacity: 0.9, // 선 투명도
    strokeStyle: 'shortdash' // 선 스타일
});


// 지도에 마커와 인포윈도우를 표시하는 함수입니다
function displayMarker(locPosition, lat, lon, iwContent) {

    // 마커를 생성합니다
    var marker = new kakao.maps.Marker({
        map: map,
        position: locPosition
    });

    // 인포윈도우를 생성합니다
    var infowindow = new kakao.maps.InfoWindow({
        content: iwContent,
        removable: true
    });

    // 인포윈도우를 마커위에 표시합니다 
    infowindow.open(map, marker);

    // 지도 중심좌표를 접속위치로 변경합니다
    map.setCenter(locPosition);
}

// 사용자 마크 함수
function displayLocation(lat, lon, iwContent) {
    var locPosition = new kakao.maps.LatLng(lat, lon); // 마커가 표시될 위치를 좌표로 생성합니다
    iaContent = "<div style='padding:5px;'>"+iwContent+"</div>";
    // 마커와 인포윈도우를 표시합니다
    displayMarker(locPosition, lat, lon, iaContent);
}