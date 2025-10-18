<?php
// capnhat.php - Cập nhật phòng ban (đã đăng nhập) - Bắt đầu luồng cập nhật
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
include 'db_connection.php';

$sql = "SELECT * FROM PhongBan";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Phòng Ban - Quản Lý Nhân Viên</title>
    <style>
        /* CSS để làm trang cập nhật đẹp hơn */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f9;
            color: #333;
        }
        .update-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .update-container h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }
        .update-container table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .update-container table th, 
        .update-container table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .update-container table th {
            background-color: #007bff;
            color: white;
        }
        .update-container table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .update-container table a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        .update-container table a:hover {
            text-decoration: underline;
        }
        .update-container .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 1em;
        }
        .update-container .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="update-container">
        <h2>Thông Tin Tất Cả Phòng Ban</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID PB</th><th>Tên PB</th><th>Mô Tả</th><th>Chỉnh Sửa</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["IDPB"] . "</td>";
                echo "<td>" . $row["TenPB"] . "</td>";
                echo "<td>" . $row["MoTa"] . "</td>";
                echo "<td><a href='form_capnhat.php?IDPB=" . $row["IDPB"] . "'>Chỉnh Sửa</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Không có phòng ban nào.</p>";
        }
        $conn->close();
        ?>
        <a href="home.php" class="back-link">Quay về Trang Chủ</a>
    </div>
</body>
</html>