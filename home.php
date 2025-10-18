<?php
// home.php - Trang chủ hiển thị chức năng tùy theo trạng thái đăng nhập
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ - Quản Lý Nhân Viên</title>
    <style>
        /* CSS để làm trang nhìn đẹp */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f9;
            color: #333;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        header h1 {
            margin: 0;
            font-size: 2em;
        }
        nav {
            background-color: #ffffff;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }
        nav ul li {
            display: inline-block;
            margin: 15px;
        }
        nav ul li a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            padding: 10px 20px;
            border: 1px solid #007bff;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        nav ul li a:hover {
            background-color: #007bff;
            color: white;
        }
        section {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        section h2 {
            color: #007bff;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #f4f7f9;
            color: #666;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Quản Lý Nhân Viên</h1>
    </header>
    
    <nav>
        <ul>
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                // Chức năng khi đã đăng nhập
                echo '<li><a href="chen.php">Chèn Nhân Viên Mới</a></li>';
                echo '<li><a href="capnhat.php">Cập Nhật Phòng Ban</a></li>';
                echo '<li><a href="xoa.php">Xóa Một Nhân Viên</a></li>';
                echo '<li><a href="xoatatca.php">Xóa Nhiều Nhân Viên</a></li>';
                echo '<li><a href="xemthongtinnv.php">Xem Thông Tin Nhân Viên</a></li>';
                echo '<li><a href="xemthongtinpb.php">Xem Thông Tin Phòng Ban</a></li>';
                echo '<li><a href="timkiem.php">Tìm Kiếm</a></li>';
                echo '<li><a href="logout.php">Đăng Xuất</a></li>';
            } else {
                // Chức năng khi chưa đăng nhập
                echo '<li><a href="xemthongtinnv.php">Xem Thông Tin Nhân Viên</a></li>';
                echo '<li><a href="xemthongtinpb.php">Xem Thông Tin Phòng Ban</a></li>';
                echo '<li><a href="timkiem.php">Tìm Kiếm</a></li>';
                echo '<li><a href="login.php">Đăng Nhập</a></li>';
            }
            ?>
        </ul>
    </nav>
    
    <section>
        <h2>Chào mừng đến với Hệ Thống Quản Lý Nhân Viên</h2>
        <p>Sử dụng menu bên trên để truy cập các chức năng. Hệ thống hỗ trợ xem thông tin và quản lý nhân viên một cách dễ dàng.</p>
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            echo '<p>Bạn đã đăng nhập. Bạn có quyền quản trị viên để chỉnh sửa dữ liệu.</p>';
        } else {
            echo '<p>Bạn chưa đăng nhập. Đăng nhập để truy cập thêm chức năng quản lý.</p>';
        }
        ?>
    </section>
</body>
</html>