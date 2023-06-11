<?php
$db = new mysqli('localhost', 'root', '', 'odiga');
$query = "SELECT * FROM target";
$result = $db->query($query);
while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row['pid'] . '" data-x="'.$row['user_target_coordinate_x'].'" data-y="'.$row['user_target_coordinate_y'].'">' . $row['area'] . '</option>';
    echo "";
}
$db->close();
?>
