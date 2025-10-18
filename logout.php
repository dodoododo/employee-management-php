<?php
    // logout.php - File xử lý đăng xuất (thêm vào để hoàn thiện)
    session_start();
    session_destroy();
    header("Location: home.php");
    exit;
?>