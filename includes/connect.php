<?php
require_once 'config.php';
    //1.สร้างการเชื่อมต่อ ตัวแปร $conn (4พารามิเตอร์)
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "data_member";
    $conn = mysqli_connect($host, $user, $pass, $db);

    //3.ตั้งค่าภาษาไทย
    mysqli_query($conn,"SET NAMES UTF8");
?>