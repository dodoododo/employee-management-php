<?php
// xemthongtinpb.php - Xem thông tin phòng ban (chưa đăng nhập)
include 'db_connection.php';

$sql = "SELECT * FROM PhongBan";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem Thông Tin Phòng Ban - Quản Lý Nhân Viên</title>
    <style>
        /* CSS để làm trang xem thông tin phòng ban đẹp hơn, tương tự xoatatca.php */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f9;
            color: #333;
        }
        .view-departments-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .view-departments-container h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }
        .view-departments-container table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .view-departments-container table th, 
        .view-departments-container table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .view-departments-container table th {
            background-color: #007bff;
            color: white;
        }
        .view-departments-container table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .view-departments-container a {
            color: #007bff;
            text-decoration: none;
        }
        .view-departments-container a:hover {
            text-decoration: underline;
        }
        .view-departments-container .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 1em;
        }
        .view-departments-container .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="view-departments-container">
        <h2>Thông Tin Phòng Ban</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID PB</th><th>Tên PB</th><th>Mô Tả</th><th>Xem Nhân Viên</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["IDPB"] . "</td>";
                echo "<td>" . $row["TenPB"] . "</td>";
                echo "<td>" . $row["MoTa"] . "</td>";
                echo "<td><a href='xemthongtinNVPB.php?IDPB=" . $row["IDPB"] . "'>" . $row["IDPB"] . "</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Không có phòng ban nào.</p>";
        }
        ?>
        <a href="home.php" class="back-link">Quay về Trang Chủ</a> <!-- Hoặc thay bằng home.php nếu cần -->
    </div>
</body>
</html>
<?php
$conn->close();
?>