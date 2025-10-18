<?php
// xoa.php - Xóa một nhân viên (đã đăng nhập)
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
include 'db_connection.php';

if (isset($_REQUEST['IDNV'])) {
    $id_nv = $_REQUEST['IDNV'];
    $sql = "DELETE FROM NhanVien WHERE IDNV = '$id_nv'";
    if ($conn->query($sql) === TRUE) {
        header("Location: xoa.php");
        exit;
    } else {
        echo "Lỗi: " . $conn->error;
    }
} else {
    $sql = "SELECT * FROM NhanVien";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa Nhân Viên - Quản Lý Nhân Viên</title>
    <style>
        /* CSS để làm trang xóa đẹp hơn */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f9;
            color: #333;
        }
        .delete-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .delete-container h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }
        .delete-container table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .delete-container table th, 
        .delete-container table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .delete-container table th {
            background-color: #007bff;
            color: white;
        }
        .delete-container table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .delete-container table a {
            color: #dc3545; /* Màu đỏ cho xóa */
            text-decoration: none;
            font-weight: bold;
        }
        .delete-container table a:hover {
            text-decoration: underline;
        }
        .delete-container .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 1em;
        }
        .delete-container .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="delete-container">
        <h2>Danh Sách Nhân Viên Để Xóa</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID NV</th><th>Họ Tên</th><th>ID PB</th><th>Địa Chỉ</th><th>Xóa</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["IDNV"] . "</td>";
                echo "<td>" . $row["HoTen"] . "</td>";
                echo "<td>" . $row["IDPB"] . "</td>";
                echo "<td>" . $row["DiaChi"] . "</td>";
                echo "<td><a href='xoa.php?IDNV=" . $row["IDNV"] . "'>Xóa</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Không có nhân viên nào.</p>";
        }
        ?>
        <a href="home.php" class="back-link">Quay về Trang Chủ</a>
    </div>
</body>
</html>
<?php
}
$conn->close();
?>