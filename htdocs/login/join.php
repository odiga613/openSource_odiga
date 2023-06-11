<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Odiga</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
	<section class="login_section">
		<div class="login_wrap">
			<div class="logo_area">
				<p><img src="../images/logo.svg"></p>
			</div>
			<form class="login_area" method="POST" action="./join_process.php">
				<ul style="height: 400px!important;">
					<li>
						<p>이름</p>
						<input type="text" name="name" placeholder="이름" required>
					</li>
					<li>
						<p>아이디</p>
						<input type="text" name="id" placeholder="아이디" required>
					</li>
					<li>
						<p>비밀번호</p>
						<input type="password" name="pw" placeholder="비밀번호" required>
					</li>
					<li>
						<p>이메일</p>
						<input type="email" name="email" placeholder="이메일" required>
					</li>
				</ul>
				<div class="login_btn">
					<p><input type="submit" value="회원가입"></p>
				</div>
				<div class="login_join">
					<a href="./login.php">회원이신가요? &nbsp;<span>로그인</span></a>
				</div>
			</form>
		</div>
	</section>
</body>
</html>