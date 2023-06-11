<?php
session_start(); // 세션 시작
include '../lib/mysql.php';
$data = json_decode(file_get_contents('php://input'), true); // JSON 데이터를 PHP 배열로 변환

$kakao_nickname = $data["properties"]["nickname"]; // kakao_nickname 값 설정
$kakao_thumbnail_image = $data["properties"]["thumbnail_image"]; // kakao_thumbnail_image 값 설정
$kakao_email = $data["kakao_account"]["email"]; // kakao_email 값 설정

// DB에서 kakao_nickname이 이미 존재하는지 확인
$sql = "SELECT * FROM user WHERE user_kakao_nick=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $kakao_nickname);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    // kakao_nickname이 이미 DB에 존재하는 경우
    $row = $result->fetch_assoc(); // 레코드 가져오기
    $_SESSION['user_id'] = $kakao_nickname;
} else {
    $user_kakao_k = 1;
    $stmt = $conn->prepare("INSERT INTO user (user_kakao_mail, user_kakao_nick, user_img, user_k) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $kakao_email, $kakao_nickname, $kakao_thumbnail_image, $user_kakao_k);
    $stmt->execute();
    // 새로 삽입된 레코드의 pid 가져오기
    $_SESSION['user_id'] = $kakao_nickname; // 세션에 kakao_nickname 저장
}

echo "성공"; // 성공 메시지 출력
header('Location:../index.php');
$stmt->close(); // statement 종료
$conn->close(); // 연결 종료
?>