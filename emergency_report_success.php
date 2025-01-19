<?php
header('Content-Type: text/html; charset=utf-8');

// ชื่อ DSN ที่คุณตั้งไว้ใน ODBC
$dsn = "DRIVER={Microsoft Access Driver (*.mdb, *.accdb)};DBQ=D:\\my_database.accdb";
$username = ''; // ปกติไม่ต้องใส่ Username
$password = ''; // ปกติไม่ต้องใส่ Password

// สร้างการเชื่อมต่อ
$conn = odbc_connect($dsn, $username, $password);

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . odbc_errormsg());
}

// รับข้อมูลจากฟอร์ม
$contact = iconv('UTF-8', 'TIS-620', $_POST['contact']);
$contact_number = $_POST['contact_number'];
$cause = iconv('UTF-8', 'TIS-620', $_POST['cause']);
$s_province = iconv('UTF-8', 'TIS-620', $_POST['s-province-text']);
$s_distric = iconv('UTF-8', 'TIS-620', $_POST['s-distric-text']);
$s_street_address = iconv('UTF-8', 'TIS-620', $_POST['s-street-address-text']);
$s_addDetails = iconv('UTF-8', 'TIS-620', $_POST['s-addDetails']);
$e_province = iconv('UTF-8', 'TIS-620', $_POST['e-province-text']);
$e_distric = iconv('UTF-8', 'TIS-620', $_POST['e-distric-text']);
$e_street_address = iconv('UTF-8', 'TIS-620', $_POST['e-street-address-text']);
$e_addDetails = iconv('UTF-8', 'TIS-620', $_POST['e-addDetails']);

// เพิ่มข้อมูลลงในฐานข้อมูล
$sql = "INSERT INTO emergency_reports (contact, contact_number, cause, s_province, s_distric, s_street_address, s_addDetails, e_province, e_distric, e_street_address, e_addDetails) 
    VALUES ('$contact', '$contact_number', '$cause', '$s_province', '$s_distric', '$s_street_address', '$s_addDetails', '$e_province', '$e_distric', '$e_street_address', '$e_addDetails')";

$result = odbc_exec($conn, $sql);

if ($result) {
    echo "เพิ่มข้อมูลสำเร็จ";
} else {
    echo "เกิดข้อผิดพลาด: " . odbc_errormsg($conn);
}

odbc_close($conn);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานสภาพรถ</title>
    <link rel="stylesheet" href="./style_success.css">
</head>
<body>
    <div class="nav">
        <a class="">รายงานสภาพรถ</a>
        <a href="repair_report.html">แจ้งซ่อม</a>
        <a href="">จัดการตารางเวลารถพยาบาล</a>
    </div>
    <div class="header">
        <h1>รายงานสภาพรถ</h1>
    </div>
    <div class="success">
        <h2>บันทึกรายงานเสร็จสิ้น</h2>
    </div>
    <div class="reversed_button">
        <button onclick="location.href='car_report.html'" type="button">ย้อนกลับ</button>
        <button onclick="location.href='repair_report.html'" type="button" style="background-color: #E4AE9F;">แจ้งซ่อม</button>
    </div>
</body>
</html>