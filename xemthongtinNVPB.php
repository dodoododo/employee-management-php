<?php
// xemthongtinNVPB.php - Xem thông tin NV theo PB (chưa đăng nhập)
include 'db_connection.php';

if (isset($_GET['IDPB'])) {
    $id_pb = $_GET['IDPB'];
    $sql = "SELECT * FROM NhanVien WHERE IDPB = '$id_pb'";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem Thông Tin Nhân Viên Theo Phòng Ban - Quản Lý Nhân Viên</title>
    <style>
        /* CSS để làm trang xem thông tin nhân viên theo phòng ban đẹp hơn, tương tự xoatatca.php */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f9;
            color: #333;
        }
        .view-employees-by-dept-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .view-employees-by-dept-container h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }
        .view-employees-by-dept-container table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .view-employees-by-dept-container table th, 
        .view-employees-by-dept-container table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .view-employees-by-dept-container table th {
            background-color: #007bff;
            color: white;
        }
        .view-employees-by-dept-container table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .view-employees-by-dept-container .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 1em;
        }
        .view-employees-by-dept-container .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="view-employees-by-dept-container">
        <h2>Thông Tin Nhân Viên Phòng Ban <?php echo $id_pb; ?></h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID NV</th><th>Họ Tên</th><th>Địa Chỉ</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["IDNV"] . "</td>";
                echo "<td>" . $row["HoTen"] . "</td>";
                echo "<td>" . $row["DiaChi"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Không có nhân viên nào trong phòng ban này.</p>";
        }
        ?>
        <a href="xemthongtinpb.php" class="back-link">Quay về Danh Sách Phòng Ban</a> <!-- Hoặc thay bằng login.php nếu cần -->
    </div>
</body>
</html>
<?php
}
$conn->close();
?>