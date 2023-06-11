var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
    mapOption = {
        center: new kakao.maps.LatLng(33.45441, 126.56519), // 지도의 중심좌표
        level: 2, // 지도의 확대 레벨
        mapTypeId : kakao.maps.MapTypeId.ROADMAP // 지도종류
    }; 
// 지도를 생성한다 
var map = new kakao.maps.Map(mapContainer, mapOption); 
// 지도에 마커를 생성하고 표시한다
var marker = new kakao.maps.Marker({
    position: new kakao.maps.LatLng(33.45469, 126.56505), // 마커의 좌표
    map: map // 마커를 표시할 지도 객체
});
// var marker2 = new kakao.maps.Marker({
//     position: new kakao.maps.LatLng(33.45502, 126.56055), // 마커의 좌표
//     map: map // 마커를 표시할 지도 객체
// });
// // 지도에 선을 표시한다 
// var polyline = new kakao.maps.Polyline({
// 	map: map, // 선을 표시할 지도 객체 
// 	path: [ // 선을 구성하는 좌표 배열
// 		new kakao.maps.LatLng(33.45471, 126.56509),
// 		new kakao.maps.LatLng(33.45469, 126.56244),
// 		new kakao.maps.LatLng(33.45504, 126.56242),
// 		new kakao.maps.LatLng(33.45502, 126.56055)
// 	],
// 	strokeWeight: 7, // 선의 두께
// 	strokeColor: '#6D987E', // 선 색
// 	strokeOpacity: 0.9, // 선 투명도
// 	strokeStyle: 'solid' // 선 스타일
// });	

// $(document).ready(function() { //경로 숨기기
//   	$("#daum-maps-shape-0").css("display","none"); 
//   	$("#map > div:nth-child(3) > div > div:nth-child(6) > div:nth-child(2) > img:nth-child(1)").css("display","none");
// });

// function SetOnClick(){ // 경로 설정 함수
// 	var text = $("#goal").val(); //목적지 input 값
// 	if(text == "악센트동아리실"){ //값 비교
// 		alert("경로가 설정되었습니다.");
// 		$("#daum-maps-shape-0").css("display","block"); //경로 표시
// 	  	$("#map > div:nth-child(3) > div > div:nth-child(6) > div:nth-child(2) > img:nth-child(1)").css("display","block"); //마크 표시
// 	}else{
// 		alert("입력되지 않은 목적지입니다.");
// 	}
  	
// }