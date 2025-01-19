<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-emergency_report.css">
    <script src="script-emergency_report.js" defer></script>
    <title>รายงานเคสฉุกเฉิน</title>
</head>
<body>
    <div class="header">
        <h1 class="title">รายงานเคสฉุกเฉิน</h1>
    </div>
    <form id="emergency_report" action="emergency_report_success.php" method="post">
        <div class="emergencyReport">
            <div class="top-row">
                <label for="contact">ผู้ติดต่อ</label>
                <input type="text" name="contact" id="contact" value="" required>
                <label for="contact_number">เบอร์โทรติดต่อ</label>
                <input type="text" name="contact_number" id="contact_number" value="" required>
            </div>
            <div class="center-row">
                <label for="cause">สาเหตุ/อาการป่วย</label>
                <select name="cause" id="cause" required>
                    <option value="" disabled selected>ระบุ</option>
                    <option value="อุบัติเหตุ">อุบัติเหตุ</option>
                    <option value="อาการป่วย">อาการป่วย</option>
                    <option value="อื่นๆ">อื่นๆ</option>
                </select>
            </div>
            <div class="h-start-point">
                <label for="start-point">สถานที่ต้นทาง</label>
                <select name="s-province" id="s-province" required>
                    <option value="" disabled selected>จังหวัด</option>
                </select>
                <input type="hidden" name="s-province-text" id="s-province-text">
                <select name="s-distric" id="s-distric" required>
                    <option value="" disabled selected>อำเภอ</option>
                </select>
                <input type="hidden" name="s-distric-text" id="s-distric-text">
                <select name="s-street-address" id="s-street-address">
                    <option value="" disabled selected>ตำบล</option>
                </select>
                <input type="hidden" name="s-street-address-text" id="s-street-address-text">
                <input type="text" name="s-addDetails" id="s-addDetails" placeholder="รายละเอียดเพิ่มเติม">
            </div>
            <div class="h-end-point">
                <label for="end-point">สถานที่ปลายทาง</label>
                <select name="e-province" id="e-province" required>
                    <option value="" disabled selected>จังหวัด</option>
                </select>
                <input type="hidden" name="e-province-text" id="e-province-text">
                <select name="e-distric" id="e-distric" required>
                    <option value="" disabled selected>อำเภอ</option>
                </select>
                <input type="hidden" name="e-distric-text" id="e-distric-text">
                <select name="e-street-address" id="e-street-address">
                    <option value="" disabled selected>ตำบล</option>
                </select>
                <input type="hidden" name="e-street-address-text" id="e-street-address-text">
                <input type="text" name="e-addDetails" id="e-addDetails" placeholder="รายละเอียดเพิ่มเติม">
            </div>
            <div class="button">
                <button class="submit-button" type="submit">บันทึก</button>
                <button class="cancel-button" type="button">ยกเลิก</button>
            </div>
        </div>
    </form>
</body>
</html>