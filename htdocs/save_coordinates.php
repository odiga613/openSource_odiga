<?php
// DB 연결 정보
include './lib/mysql.php';

// 전송된 데이터 가져오기
$user_pid = $_POST["user_pid"];
$user_coordinate_x = $_POST["user_coordinate_x"];
$user_coordinate_y = $_POST["user_coordinate_y"];

// DB에 좌표 저장
$sql = "INSERT INTO coordinate (user_pid, user_coordinate_x, user_coordinate_y) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE user_coordinate_x=?, user_coordinate_y=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("idddd", $user_pid, $user_coordinate_x, $user_coordinate_y, $user_coordinate_x, $user_coordinate_y);
$stmt->execute();

echo "success";

$stmt->close();
$conn->close();
?>