<?php
	session_start(); 
	$connect = mysqli_connect("localhost","root","","ajdb"); 
	$id = $_POST['id']; 
	$pass = $_POST['pw'];
	$sql = "SELECT * FROM user WHERE user_id = '$id' AND user_pw = '$pass'"; 
	$result = mysqli_query($connect,$sql); 
	$data = mysqli_fetch_array($result);
	if($data){
		$_SESSION['user_id'] = $data['user_id'];
		header('Location: ../index.php');
	}else{
?>	
		<script>
			alert("로그인 정보가 올바르지 않습니다.");
			location.href='./login.php';
		</script>
<?php

	}
?>