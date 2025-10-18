<?php
// xulycapnhat.php - Xử lý cập nhật phòng ban
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pb = $_POST['IDPB'];
    $ten_pb = $_POST['TenPB'];
    $mo_ta = $_POST['MoTa'];

    $sql = "UPDATE PhongBan SET TenPB = '$ten_pb', MoTa = '$mo_ta' WHERE IDPB = '$id_pb'";
    if ($conn->query($sql) === TRUE) {
        header("Location: capnhat.php");
        exit;
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
$conn->close();
?>