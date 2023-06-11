<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Odiga</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
	<script src="../js/kakaoLogin.js"></script>
</head>
<body>
	<section class="login_section">
		<div class="login_wrap">
			<div class="logo_area">
				<p><img src="../images/logo.svg"></p>
			</div>
			<form class="login_area" method="POST" action="./login_process.php">
				<ul>
					<li>
						<p>아이디</p>
						<input type="text" name="id" placeholder="아이디">
					</li>
					<li>
						<p>비밀번호</p>
						<input type="password" name="pw" placeholder="비밀번호">
					</li>
				</ul>
				<div class="login_keep">
					<div class="keep">
						<input type="checkbox" name="" id="myCheck">
						<label for="myCheck"></label>
						<p>로그인 상태 유지</p>
					</div>
					<div class="forgot_pass">
						<a href="#">비밀번호 찾기</a>
					</div>
				</div>
				<div class="login_btn">
					<p><input type="submit" value="로그인"></p>
				</div>
				<div class="login_bottom">
					<div class="login_other">
						<i>&nbsp;</i>
						<p>간편 회원가입</p>
						<i>&nbsp;</i>
					</div>
					<div class="kakao_login" onclick="kakaoLogin();">
						<a href="javascript:void(0)">
							<p><img src="../images/kakao.svg"></p>
							<p>카카오 로그인</p>
						</a>
					</div>
				</div>
				<div class="login_join">
					<a href="./join.php">회원이 아니신가요? &nbsp;<span>회원가입</span></a>
				</div>
			</form>
		</div>
	</section>
</body>
</html>