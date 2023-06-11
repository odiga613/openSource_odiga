<?php
session_start(); // 세션 시작

include './lib/mysql.php';

$data = json_decode(file_get_contents('php://input'), true); // JSON 데이터를 PHP 배열로 변환

$kakao_pid = $data["id"]; // kakao_pid 값 설정
$kakao_nickname = $data["properties"]["nickname"]; // kakao_nickname 값 설정
$kakao_profile_image = $data["properties"]["profile_image"]; // kakao_profile_image 값 설정
$kakao_thumbnail_image = $data["properties"]["thumbnail_image"]; // kakao_thumbnail_image 값 설정
$kakao_email = $data["kakao_account"]["email"]; // kakao_email 값 설정

// DB에서 kakao_nickname이 이미 존재하는지 확인
$sql = "SELECT pid FROM user WHERE kakao_nickname=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $kakao_nickname);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    // kakao_nickname이 이미 DB에 존재하는 경우
    $row = $result->fetch_assoc(); // 레코드 가져오기
    $_SESSION["kakao_nickname"] = $kakao_nickname; // 세션에 kakao_nickname 저장
    $_SESSION["pid"] = $row["pid"]; // 세션에 pid 저장
} else {
    // kakao_nickname이 DB에 존재하지 않는 경우
    // 새 레코드 삽입
    $stmt = $conn->prepare("INSERT INTO user (kakao_pid, kakao_nickname, kakao_profile_image, kakao_thumbnail_image, kakao_email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $kakao_pid, $kakao_nickname, $kakao_profile_image, $kakao_thumbnail_image, $kakao_email);
    $stmt->execute();

    // 새로 삽입된 레코드의 pid 가져오기
    $last_id = $conn->insert_id;
    $_SESSION["kakao_nickname"] = $kakao_nickname; // 세션에 kakao_nickname 저장
    $_SESSION["pid"] = $last_id; // 세션에 pid 저장
}

echo "성공"; // 성공 메시지 출력
header('Location:./index.php');
$stmt->close(); // statement 종료
$conn->close(); // 연결 종료
?>