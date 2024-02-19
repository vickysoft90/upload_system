<?php
require_once('db.php'); // Include your database connection file
$sql="SELECT * FROM uploads ORDER BY uploaded_at DESC";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo '<div class="col-md-3 mb-3">';
    echo '<div class="card">';
    echo '<img src="' . $row['file_path'] . '" class="card-img-top" title="' . $row['file_name'] . '" alt="' . $row['file_name'] . '" width="60px" height="200px">';
    echo '</div>';
    echo '</div>';
}
$conn->close();
?>