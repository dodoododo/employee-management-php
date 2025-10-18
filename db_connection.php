<?php
// db_connection.php - File chung để kết nối CSDL
$servername = "localhost";
$username = "root"; // Thay bằng username DB của bạn
$password = "123456"; // Thay bằng password DB của bạn
$dbname = "dulieu"; // Tên database

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>