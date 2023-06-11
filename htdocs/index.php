<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=e1cafcb9eeed0c95c6f45f01a5755bb7"></script>
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/leaflet.css?v=1.3.1" />
    <script type="text/javascript" src="js/leaflet.js?v=1.3.1"></script>
    <link rel="stylesheet" href="css/style.css" />
    <script type="text/javascript" src="dist/graphhopper-client.js?v=0.9.0-4"></script>
    <script type="text/javascript" src="js/togeojson.js"></script>
</head>
<body>
	<div id="routing-map" style="cursor: default; height:80vh; width: 100%;"></div>
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
                    <li>
                        <select name="start" id="start"> <!-- id 추가 -->
                            <option value="">출발지</option>
                            <?php include './lib/select_list.php'; ?>
                        </select>
                    </li>
                    <li>
                        <select name="end" id="end"> <!-- id 추가 -->
                            <option value="">도착지</option>
                            <?php include './lib/select_list.php'; ?>
                        </select>
                    </li>
                </ul>
            </div>
            <div class="bottom_icon">
                <p><img src="./images/change.svg"></p>
            </div>
        </div>
        <div class="bottom_btn">
            <a href="javascript:void(0);" onclick="setOnClick();">목적지 설정</a> <!-- 함수명 수정 -->
        </div>
    </div>
</section>
</body>
<script type="text/javascript" src="./js/map.js"></script>
<script type="text/javascript" src="js/script.js?v=5.1"></script>
</html>