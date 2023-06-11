<?php
session_start(); // 세션 시작
$servername = "localhost"; // MySQL 서버 주소
$username = "root"; // MySQL 사용자 이름
$password = ""; // MySQL 비밀번호
$dbname = "odiga"; // MySQL 데이터베이스 이름
// DB 연결
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$data = json_decode(file_get_contents('php://input'), true); // JSON 데이터를 PHP 배열로 변환

$kakao_nickname = $data["properties"]["nickname"]; // kakao_nickname 값 설정
$kakao_profile_image = $data["properties"]["profile_image"]; // kakao_profile_image 값 설정
$kakao_email = $data["kakao_account"]["email"]; // kakao_email 값 설정

// DB에서 user_email이 이미 존재하는지 확인
$sql = "SELECT * FROM user WHERE user_email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $kakao_email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    // user_email이 이미 DB에 존재하는 경우
    $row = $result->fetch_assoc(); // 레코드 가져오기
    $_SESSION['user_id'] = $kakao_nickname; //로그인 성공
} else {
    $user_kakao = 1;
    $stmt = $conn->prepare("INSERT INTO user (user_kakao, user_name, user_email, user_image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_kakao, $kakao_nickname, $kakao_email, $kakao_profile_image);
    $stmt->execute();
    // 새로 삽입된 레코드의 pid 가져오기
    $_SESSION['user_id'] = $kakao_nickname; // 세션에 kakao_nickname 저장
}

header('Location:../index.php');
$stmt->close(); // statement 종료
$conn->close(); // 연결 종료
?>