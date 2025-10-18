<?php
// xulylogin.php - Xử lý đăng nhập
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Giả sử bảng Admin có Username và Password (lưu ý: nên hash password thực tế)
    $sql = "SELECT * FROM Admin WHERE Username = '$username' AND Password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        header("Location: home.php"); // Hoặc trang chính
    } else {
        echo "Đăng nhập thất bại!";
    }
}
$conn->close();
?>