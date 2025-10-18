<?php
// login.php - Form đăng nhập
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: home.php"); // Hoặc trang chính sau đăng nhập
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập - Quản Lý Nhân Viên</title>
    <style>
        /* CSS để làm trang đăng nhập đẹp hơn */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-container h2 {
            color: #007bff;
            margin-bottom: 20px;
            font-size: 1.8em;
        }
        .login-container form {
            display: flex;
            flex-direction: column;
        }
        .login-container label {
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
        }
        .login-container input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .login-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .login-container a {
            display: block;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
            font-size: 0.9em;
        }
        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Đăng Nhập Hệ Thống</h2>
        <form action="xulylogin.php" method="post">
            <label for="username">Tên Đăng Nhập:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Mật Khẩu:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" value="Đăng Nhập">
        </form>
        <a href="home.php">Quay về Trang Chủ</a>
    </div>
</body>
</html>