<?php
	session_start(); 
	$connect = mysqli_connect("localhost","root","","odiga"); 
	$id = $_POST['id']; 
	$pass = $_POST['pw'];
	$sql = "SELECT * FROM user WHERE user_id = '$id' AND user_pw = '$pass'"; 
	$result = mysqli_query($connect,$sql); 
	$data = mysqli_fetch_array($result);
	if($data){
		$_SESSION['user_pid'] = $data['pid'];
		$_SESSION['user_name'] = $data['user_name'];
		$_SESSION['user_email'] = $data['user_email'];
		$_SESSION['user_image'] = $data['user_image'];
		echo "<script>location.href='../index.php';</script>";
	}else{
?>	
		<script>
			alert("로그인 정보가 올바르지 않습니다.");
			location.href='./login.php';
		</script>
<?php

	}
?>