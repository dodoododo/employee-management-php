<?php
// timkiem.php - Tìm kiếm (chưa đăng nhập)
include 'db_connection.php';

$is_ajax = isset($_GET['query']); // Check if it's an AJAX request (query is set via GET)

if ($is_ajax) {
    $query = $_GET['query'];
    $sql = "SELECT * FROM NhanVien WHERE HoTen LIKE '%$query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        if ($query === '') {
            echo "<h2>Danh Sách Nhân Viên</h2>";
        } else {
            echo "<h2>Kết Quả Tìm Kiếm Cho '" . htmlspecialchars($query) . "'</h2>";
        }
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
        echo "<p>Không tìm thấy kết quả.</p>";
    }
    $conn->close();
    exit; // End output for AJAX
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Kiếm Nhân Viên - Quản Lý Nhân Viên</title>
    <style>
        /* CSS để làm trang tìm kiếm đẹp hơn, tương tự xoatatca.php */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f9;
            color: #333;
        }
        .search-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .search-container h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }
        .search-container form {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-container input[type="text"] {
            padding: 10px;
            width: 60%;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1em;
        }
        .search-container input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            margin-left: 10px;
        }
        .search-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .search-container table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .search-container table th, 
        .search-container table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .search-container table th {
            background-color: #007bff;
            color: white;
        }
        .search-container table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .search-container .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 1em;
        }
        .search-container .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="search-container">
        <h2>Tìm Kiếm Nhân Viên</h2>
        <form method="get">
            <input type="text" id="search" name="query" oninput="searchEmployees(this.value)" placeholder="Nhập tên nhân viên...">
            <input type="submit" value="Tìm kiếm">
        </form>
        <div id="results">
            <?php
            // Initial load: show all employees
            $query = '';
            $sql = "SELECT * FROM NhanVien WHERE HoTen LIKE '%$query%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h2>Danh Sách Nhân Viên</h2>";
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
        </div>
        <a href="home.php" class="back-link">Quay về Trang Chủ</a> <!-- Hoặc thay bằng home.php nếu cần -->
    </div>

    <script>
        function searchEmployees(value) {
            fetch('timkiem.php?query=' + encodeURIComponent(value))
                .then(response => response.text())
                .then(data => {
                    document.getElementById('results').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>
<?php
$conn->close();
?>