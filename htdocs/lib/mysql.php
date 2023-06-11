<?php // DB 연결 정보
$servername = "localhost"; // MySQL 서버 주소
$username = "root"; // MySQL 사용자 이름
$password = ""; // MySQL 비밀번호
$dbname = "phococo"; // MySQL 데이터베이스 이름

// DB 연결
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>