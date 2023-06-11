<?php
include './lib/mysql.php';

// coordinate 테이블의 모든 레코드 가져오기
$sql = "SELECT * FROM coordinate WHERE user_pid != ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION["pid"]);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $user_pid = $row["user_pid"];
        $user_coordinate_x = $row["user_coordinate_x"];
        $user_coordinate_y = $row["user_coordinate_y"];

        // user 테이블에서 kakao_nickname 가져오기
        $stmt = $conn->prepare("SELECT kakao_nickname FROM user WHERE pid=?");
        $stmt->bind_param("i", $user_pid);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $stmt_row = $stmt_result->fetch_assoc();
            $kakao_nickname = $stmt_row["kakao_nickname"];
        } else {
            $kakao_nickname = "";
        }

        // displayLocation 함수 호출
        echo "displayLocation($user_coordinate_x, $user_coordinate_y, '$kakao_nickname');";
    }
}

$conn->close();
?>