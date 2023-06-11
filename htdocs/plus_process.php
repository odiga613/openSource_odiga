<?php
// MySQL 서버에 연결하고 데이터베이스 선택
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "odiga";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// POST 요청에서 데이터 가져오기
$area = $_POST['area'];
$user_target_coordinate_x = $_POST['user_target_coordinate_x'];
$user_target_coordinate_y = $_POST['user_target_coordinate_y'];

// 데이터베이스에 데이터 삽입
$sql = "INSERT INTO target (area, user_target_coordinate_x, user_target_coordinate_y)
        VALUES ('$area', '$user_target_coordinate_x', '$user_target_coordinate_y')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error inserting data: " . $conn->error;
}

// 연결 종료
$conn->close();
?>