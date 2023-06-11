<?php
	session_start();
	$connect = mysqli_connect("localhost","root","","odiga");
	$name = $_POST["name"];
	$id = $_POST["id"];
	$pw = $_POST["pw"];
	$email = $_POST["email"];
	$sql = "INSERT INTO user (user_kakao, user_name, user_id, user_pw, user_email, user_image) VALUES(0, '$name','$id','$pw','$email','http://k.kakaocdn.net/dn/dpk9l1/btqmGhA2lKL/Oz0wDuJn1YV2DIn92f6DVK/img_640x640.jpg')";
	$result = mysqli_query($connect,$sql);
	if($result){
?>
		<script>
			alert("회원가입이 됐습니다. 로그인 해주세요.");
			location.href='./login.php';
		</script>
<?php

	}else{
?>
		<script>
			alert("회원가입에 실패하셨습니다. 다시 시도해주세요.");
			location.href='./join.php';
		</script>
<?php
	}
?>