<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=e1cafcb9eeed0c95c6f45f01a5755bb7"></script>
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<script src="./js/jquery.min.js"></script>
</head>
<body>
	<div id="map" style="width: 100%; height: 100vh;">
		<section class="search_box">
			<div class="search_wrap">
				<div class="search">
					<div class="search_menu">
						<img src="./images/menu.svg">
					</div>
					<div class="search_input">
						<input type="text" name="" placeholder="제주대학교 아라캠퍼스">
					</div>
					<div class="search_icon">
						<img src="./images/search.svg">
					</div>
				</div>
			</div>
		</section>
		<section class="main_bottom">
			<div class="bottom_wrap">
				<div class="bottom_title">
					<p>경로설정</p>
				</div>
				<div class="bottom_input">
					<div class="bottom_box">
						<ul>
							<li><input type="text" name="" placeholder="출발지" value="제주대학교 공과대학 4호관"></li>
							<li><input type="text" name="" placeholder="목적지" id="goal"></li>
						</ul>
					</div>
					<div class="bottom_icon">
						<p><img src="./images/change.svg"></p>
					</div>
				</div>
				<div class="bottom_btn">
					<a href="javascript:void(0);" onclick="SetOnClick();">목적지 설정</a>
				</div>
			</div>
		</section>
	</div>
</body>
<script type="text/javascript" src="./js/map.js"></script>
</html>