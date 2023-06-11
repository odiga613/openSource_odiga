<?php 
session_start(); 
if (!isset($_SESSION['kakao_nickname'])) {
    header('Location: ./login.php');
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Kakao 지도 시작하기</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/theme.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
	<div class="page-loader">
		<div class="page_logo">
			<img src="./images/logo.svg">
		</div>
	</div>
	<div class="map_title">
		<p class="title_text"><?=$_SESSION["kakao_nickname"]?>님의 일정표</p>
	</div>
	<div class="map_bottom">
		<div class="map_bottom_bar"><div class="map_menu_bar"></div></div>
		<div class="map_wrap">
			<div class="map_list">
				<ul>
					<li>
						<div class="map_num">
							<p>1</p>
						</div>
						<div class="map_text">
							<p>도두해안도로</p>
							<p>드라이브 명소 · 도두동</p>
						</div>
						<div class="map_upload">
							<img src="./images/target.svg">
						</div>
					</li>
					<li>
						<div class="map_num">
							<p>2</p>
						</div>
						<div class="map_text">
							<p>슬로보트</p>
							<p>카페, 디저트 · 애월읍</p>
						</div>
						<div class="map_upload">
							<img src="./images/target.svg">
						</div>
					</li>
					<li>
						<div class="map_num">
							<p>3</p>
						</div>
						<div class="map_text">
							<p>협재 해수욕장</p>
							<p>해수욕장, 해변 · 도두동</p>
						</div>
						<div class="map_upload">
							<img src="./images/target.svg">
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div id="map" style="width:100vw;height:100vh;"></div>
	<script src="//dapi.kakao.com/v2/maps/sdk.js?appkey=0e2d971d60a7f8f8cfb27620fb24d4b5"></script>
	<script type="text/javascript" src="./js/kakaomap.js"></script>
	<script type="text/javascript">
		if (navigator.geolocation) {
		
		    // GeoLocation을 이용해서 접속 위치를 얻어옵니다
		    navigator.geolocation.getCurrentPosition(function(position) {
		
		        var lat = position.coords.latitude, // 위도
		            lon = position.coords.longitude; // 경도
		
		        var locPosition = new kakao.maps.LatLng(lat, lon), // 마커가 표시될 위치를 geolocation으로 얻어온 좌표로 생성합니다
		            message = ''; // 인포윈도우에 표시될 내용입니다
		
		        // 마커와 인포윈도우를 표시합니다
		        var user_pid = <?= json_encode($_SESSION["pid"]) ?>;
				var user_nickname = <?= json_encode($_SESSION["kakao_nickname"]) ?>;
				displayLocation(lat, lon,user_nickname);
		            // DB에 좌표 저장
		            $.ajax({
		                type: "POST",
		                url: "save_coordinates.php",
		                data: {
		                    user_pid: user_pid,
		                    user_coordinate_x: lat,
		                    user_coordinate_y: lon
		                },
		                success: function(data) {
		                    console.log(data);
		                }
		            });
		
		    });
		
		} else { // HTML5의 GeoLocation을 사용할 수 없을때 마커 표시 위치와 인포윈도우 내용을 설정합니다
		    message = 'geolocation을 사용할수 없어요..'
		   	displayMarker(locPosition);
		}
		<?php include './user_location_list.php'; ?>

	</script>
	
</body>
<script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.bootstrap.js"></script>
    <script src="js/jquery.magnific-popup.js"></script>
    <script src="js/jquery.owl.carousel.js"></script>
    <script src="js/main.js"></script>
</html>
</body>
</html>