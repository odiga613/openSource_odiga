<?php
    session_start();
    if(isset($_SESSION["user_id"])){
    header("Location:../index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>어쩌다 제주</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
</head>
<body>
	<section class="login_section">
		<form class="login_wrap" action="login_process.php" method="POST">
			<div class="logo_area">
				<p class="logo"><img src="../images/logo.svg"></p>
			</div>
			<div class="login_area">
				<div class="login_title">
					<p>로그인</p>
				</div>
				<ul>
					<li><input type="text" name="id" placeholder="아이디" class="login_input"></li>
					<li><input type="password" name="pw" placeholder="비밀번호" class="login_input"></li>
					<li>
						<input type="submit" name="" value="로그인" class="login_btn">
					</li>
					<li>
						<p><a href="#">회원가입</a></p>
						<p><a href="#">아이디 찾기</a> | <a href="#">비밀번호</a></p>
					</li>
				</ul>
				<i><span></span><p>SNS 간편 로그인</p></i>
				<div class="kakao_login" onclick="kakaoLogin();"><a href="javascript:void(0)"><div><img src="../images/kakao.svg"><p>카카오 로그인</p></div></a></div>
			</div>
		</form>
	</section>
</body>
<!-- 카카오 스크립트 -->
<script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
<script>
Kakao.init('a1bfedfd24ea1a4bf1ad63d174fae802'); //발급받은 키 중 javascript키를 사용해준다.
console.log(Kakao.isInitialized()); // sdk초기화여부판단
let responseData;
//카카오로그인
function kakaoLogin() {
    Kakao.Auth.login({
      success: function (response) {
        Kakao.API.request({
          url: '/v2/user/me',
          success: function (response) {
             responseData = response;
             saveToDatabase(responseData);
             location.href = "../index.php";
          },
          fail: function (error) {
            console.log(error)
          },
        })
      },
      fail: function (error) {
        console.log(error)
      },
    })
  }
//카카오로그아웃  
function kakaoLogout() {
    if (Kakao.Auth.getAccessToken()) {
      Kakao.API.request({
        url: '/v1/user/unlink',
        success: function (response) {
           console.log(response)
        },
        fail: function (error) {
          console.log(error)
        },
      })
      Kakao.Auth.setAccessToken(undefined)
    }
  }  

function saveToDatabase(responseData) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "saveToDatabase.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };
    let data = JSON.stringify(responseData);
    xhr.send(data);
}
</script>
</html>