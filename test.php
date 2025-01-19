<?php
$dsn = "DRIVER={Microsoft Access Driver (*.mdb, *.accdb)};DBQ=D:\\path\\to\\your\\database.accdb";
$username = '';
$password = '';

$conn = odbc_connect($dsn, $username, $password);

if ($conn) {
    echo "เชื่อมต่อฐานข้อมูลสำเร็จ";
    odbc_close($conn);
} else {
    echo "เชื่อมต่อฐานข้อมูลล้มเหลว: " . odbc_errormsg();
}
?>