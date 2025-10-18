<?php
// form_capnhat.php - Form cập nhật phòng ban
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
include 'db_connection.php';

if (isset($_GET['IDPB'])) {
    $id_pb = $_GET['IDPB'];
    $sql = "SELECT * FROM PhongBan WHERE IDPB = '$id_pb'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Phòng Ban - Quản Lý Nhân Viên</title>
    <style>
        /* CSS để làm form cập nhật đẹp hơn */
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
        .update-form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .update-form-container h2 {
            color: #007bff;
            margin-bottom: 20px;
            font-size: 1.8em;
        }
        .update-form-container form {
            display: flex;
            flex-direction: column;
        }
        .update-form-container label {
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .update-form-container input[type="text"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
        }
        .update-form-container input[type="submit"] {
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
        .update-form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .update-form-container a {
            display: block;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
            font-size: 0.9em;
        }
        .update-form-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="update-form-container">
        <h2>Cập Nhật Phòng Ban</h2>
        <form action="xulycapnhat.php" method="post">
            <input type="hidden" name="IDPB" value="<?php echo $row['IDPB']; ?>">
            <label for="IDPB_display">ID PB:</label>
            <input type="text" id="IDPB_display" value="<?php echo $row['IDPB']; ?>" disabled>
            
            <label for="TenPB">Tên PB:</label>
            <input type="text" id="TenPB" name="TenPB" value="<?php echo $row['TenPB']; ?>" required>
            
            <label for="MoTa">Mô Tả:</label>
            <input type="text" id="MoTa" name="MoTa" value="<?php echo $row['MoTa']; ?>">
            
            <input type="submit" value="Cập Nhật">
        </form>
        <a href="capnhat.php">Quay về Danh Sách Phòng Ban</a>
        <a href="home.php">Quay về Trang Chủ</a>
    </div>
</body>
</html>
<?php
}
$conn->close();
?>