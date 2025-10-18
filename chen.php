<?php
// chen.php - Chèn nhân viên mới (đã đăng nhập)
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
include 'db_connection.php';

// Handle AJAX check for IDNV
if (isset($_GET['check_id'])) {
    $id_nv = $_GET['check_id'];
    $check_sql = "SELECT * FROM NhanVien WHERE IDNV = '$id_nv'";
    $check_result = $conn->query($check_sql);
    if ($check_result->num_rows > 0) {
        echo "exists";
    } else {
        echo "available";
    }
    $conn->close();
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_nv = $_POST['IDNV'];
    $ho_ten = $_POST['HoTen'];
    $id_pb = $_POST['IDPB'];
    $dia_chi = $_POST['DiaChi'];

    // Kiểm tra trùng mã NV (server-side for security)
    $check_sql = "SELECT * FROM NhanVien WHERE IDNV = '$id_nv'";
    $check_result = $conn->query($check_sql);
    if ($check_result->num_rows > 0) {
        echo "Mã nhân viên đã tồn tại!";
    } else {
        $sql = "INSERT INTO NhanVien (IDNV, HoTen, IDPB, DiaChi) VALUES ('$id_nv', '$ho_ten', '$id_pb', '$dia_chi')";
        if ($conn->query($sql) === TRUE) {
            header("Location: xemthongtinnv.php");
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }
} else {
    // Lấy danh sách phòng ban từ CSDL
    $sql_pb = "SELECT IDPB, TenPB FROM PhongBan";
    $result_pb = $conn->query($sql_pb);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chèn Nhân Viên Mới - Quản Lý Nhân Viên</title>
    <style>
        /* CSS để làm trang chèn đẹp hơn */
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
        .insert-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .insert-container h2 {
            color: #007bff;
            margin-bottom: 20px;
            font-size: 1.8em;
        }
        .insert-container form {
            display: flex;
            flex-direction: column;
        }
        .insert-container label {
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .insert-container input[type="text"],
        .insert-container select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
        }
        .insert-container input[type="submit"] {
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
        .insert-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .insert-container a {
            display: block;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
            font-size: 0.9em;
        }
        .insert-container a:hover {
            text-decoration: underline;
        }
        .insert-container #id_status {
            text-align: left;
            margin-top: -10px;
            margin-bottom: 10px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="insert-container">
        <h2>Chèn Nhân Viên Mới</h2>
        <form method="post">
            <label for="IDNV">ID NV:</label>
            <input type="text" id="IDNV" name="IDNV" required oninput="checkID(this.value)">
            <span id="id_status"></span>
            
            <label for="HoTen">Họ Tên:</label>
            <input type="text" id="HoTen" name="HoTen" required>
            
            <label for="IDPB">ID PB:</label>
            <select id="IDPB" name="IDPB" required>
                <option value="">Chọn phòng ban</option>
                <?php
                if ($result_pb->num_rows > 0) {
                    while($row_pb = $result_pb->fetch_assoc()) {
                        echo "<option value='" . $row_pb["IDPB"] . "'>" . $row_pb["IDPB"] . " - " . $row_pb["TenPB"] . "</option>";
                    }
                } else {
                    echo "<option value=''>Không có phòng ban nào</option>";
                }
                ?>
            </select>
            
            <label for="DiaChi">Địa Chỉ:</label>
            <input type="text" id="DiaChi" name="DiaChi">
            
            <input type="submit" id="submit_btn" value="Chèn">
        </form>
        <a href="home.php">Quay về Trang Chủ</a>
    </div>

    <script>
        function checkID(value) {
            if (value === '') {
                document.getElementById('id_status').innerHTML = '';
                document.getElementById('submit_btn').disabled = false;
                return;
            }
            fetch('chen.php?check_id=' + encodeURIComponent(value))
                .then(response => response.text())
                .then(data => {
                    let status = document.getElementById('id_status');
                    let submitBtn = document.getElementById('submit_btn');
                    if (data === 'exists') {
                        status.innerHTML = 'ID đã tồn tại';
                        status.style.color = 'red';
                        submitBtn.disabled = true;
                    } else {
                        status.innerHTML = '';
                        submitBtn.disabled = false;
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>
<?php
}
$conn->close();
?>