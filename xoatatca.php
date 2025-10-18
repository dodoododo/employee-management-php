<?php
// xoatatca.php - Xóa nhiều nhân viên (đã đăng nhập)
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['IDNV'])) {
        $ids = $_POST['IDNV'];
        foreach ($ids as $id) {
            $sql = "DELETE FROM NhanVien WHERE IDNV = '$id'";
            $conn->query($sql);
        }
        header("Location: xoatatca.php");
        exit;
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
    <title>Xóa Nhiều Nhân Viên - Quản Lý Nhân Viên</title>
    <style>
        /* CSS để làm trang xóa nhiều đẹp hơn */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f9;
            color: #333;
        }
        .multi-delete-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .multi-delete-container h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }
        .multi-delete-container form {
            width: 100%;
        }
        .multi-delete-container table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .multi-delete-container table th, 
        .multi-delete-container table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .multi-delete-container table th {
            background-color: #007bff;
            color: white;
        }
        .multi-delete-container table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .multi-delete-container input[type="submit"] {
            background-color: #dc3545; /* Màu đỏ cho xóa */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            transition: background-color 0.3s;
            display: block;
            margin: 0 auto;
        }
        .multi-delete-container input[type="submit"]:hover {
            background-color: #c82333;
        }
        .multi-delete-container .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 1em;
        }
        .multi-delete-container .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="multi-delete-container">
        <h2>Xóa Nhiều Nhân Viên</h2>
        <form method="post">
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
                    echo "<td><input type='checkbox' name='IDNV[]' value='" . $row["IDNV"] . "'></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<input type='submit' value='Xóa Các Nhân Viên Đã Chọn'>";
            } else {
                echo "<p>Không có nhân viên nào.</p>";
            }
            ?>
        </form>
        <a href="home.php" class="back-link">Quay về Trang Chủ</a>
    </div>
</body>
</html>
<?php
}
$conn->close();
?>