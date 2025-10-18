<?php
// xemthongtinnv.php - Xem thông tin nhân viên (chưa đăng nhập)
include 'db_connection.php';

$sql = "SELECT * FROM NhanVien";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem Thông Tin Nhân Viên - Quản Lý Nhân Viên</title>
    <style>
        /* CSS để làm trang xem thông tin nhân viên đẹp hơn, tương tự xoatatca.php */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f9;
            color: #333;
        }
        .view-employees-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .view-employees-container h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }
        .view-employees-container table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .view-employees-container table th, 
        .view-employees-container table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .view-employees-container table th {
            background-color: #007bff;
            color: white;
        }
        .view-employees-container table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .view-employees-container .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 1em;
        }
        .view-employees-container .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="view-employees-container">
        <h2>Thông Tin Nhân Viên</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID NV</th><th>Họ Tên</th><th>ID PB</th><th>Địa Chỉ</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["IDNV"] . "</td>";
                echo "<td>" . $row["HoTen"] . "</td>";
                echo "<td>" . $row["IDPB"] . "</td>";
                echo "<td>" . $row["DiaChi"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Không có nhân viên nào.</p>";
        }
        ?>
        <a href="home.php" class="back-link">Quay về Trang Chủ</a> <!-- Hoặc thay bằng home.php nếu cần -->
    </div>
</body>
</html>
<?php
$conn->close();
?>