<?php
	session_start();
	$connect = mysqli_connect("localhost","root","","jajima");
	$id = $_POST["id"];
	$pass = $_POST["pass"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$school = $_POST["school"];
	$sql = "INSERT INTO user (user_name,user_id,user_password,user_email,user_school) VALUES('$name','$id','$pass','$email','$school')";
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