<?php

// مفتاح الواجهة
$api_key = "AIzaSyBwkyxOuXWJhTjXLagC8AGNVYS_M4dP7eE";

// معرف الشيت
$spreadsheet_id = "1rGdaKTEAXh4dYc1-FmJH3p1nQXBU6LuBzsJT5_zPuI8";

// رقم العميل الذي سيتم البحث عنه
$customer_number = isset($_POST['phone']) ? $_POST['phone'] : ''; // يجب تحصيل رقم العميل هذا من النموذج

// تحويل الرقم إلى نص
$customer_number_str = strval($customer_number);

// بناء الرابط لجلب البيانات من الشيت
$url = "https://sheets.googleapis.com/v4/spreadsheets/{$spreadsheet_id}/values/A1:Z100?key={$api_key}";

// جلب البيانات باستخدام cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// تحويل الرد إلى مصفوفة JSON
$data = json_decode($response, true);

// البحث عن القيمة المطلوبة في النطاق المحدد
$found = false;
if (!empty($data['values'])) {
    foreach ($data['values'] as $row) {
        // البحث في الصف عن القيمة المطلوبة
        if (in_array($customer_number_str, $row)) {
            $found = true;
            echo "Customer Data: ";
            echo implode(", ", $row); // اظهار الصف كاملاً
            echo "<br>";
            break;
        }
    }
}

// البحث مرة أخرى في النطاق المحدد
$found_again = false;
if (!empty($data['values'])) {
    foreach ($data['values'] as $row) {
        // البحث في الصف عن القيمة المطلوبة (بدون الصفر الأول)
        $customer_number_str_trimmed = ltrim($customer_number_str, '0');
        if (in_array($customer_number_str_trimmed, $row)) {
            $found_again = true;
            echo "Customer Data (without leading zero): ";
            echo implode(", ", $row); // اظهار الصف كاملاً
            echo "<br>";
            break;
        }
    }
}

// إذا لم يتم العثور على القيمة المطلوبة في أي من البحثين
if (!$found && !$found_again) {
    if (empty($customer_number)) {
        echo "Please provide a customer number.";
    } else {
        echo "Sorry, the customer number {$customer_number} was not found in the spreadsheet.";
    }
}

?>
