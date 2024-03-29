<?php
include("inc/connection.php");

if(isset($_POST["submit"])) {
    $fullname = mysqli_real_escape_string($conn, $_POST["fullname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $whatsapp = mysqli_real_escape_string($conn, $_POST["whatsapp"]);
    $username = strtolower(mysqli_real_escape_string($conn, $_POST["register-username"]));
    $password = mysqli_real_escape_string($conn, $_POST["register-password"]);
    $additional_details = mysqli_real_escape_string($conn, $_POST["additional-details"]);

    $err_s = 0; // إعادة تعيين القيمة بصفر

    if(empty($username)) {
        $username_error = "Please enter a username <br>";
        $err_s = 1;
    } elseif(strlen($username) < 6) {
        $username_error = "Use a username longer than 6 letters <br>";
        $err_s = 1;
    } elseif(preg_match('/^\d/', $username)) { // استخدام تعبير منتظم للتحقق من عدم وجود أرقام في اسم المستخدم
        $username_error = "Use letters for your username <br>";
        $err_s = 1;
    }

    // تقوم بفحص باقي الحقول بنفس الطريقة

    if($err_s == 0) {
        $sql = "INSERT INTO users (`Full Name`, email, phone, whatsapp, username, password, `Additional Details`) 
                VALUES ('$fullname', '$email', '$phone', '$whatsapp', '$username', '$password', '$additional_details')";

        if(mysqli_query($conn, $sql)) {
            // تم التسجيل بنجاح، قم بتعيين متغير لإظهار رسالة النجاح
            $registration_success = true;
        } else {
            // في حالة فشل التسجيل، يمكنك تسجيل الخطأ أو إظهار رسالة خطأ للمستخدم
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // في حالة وجود أي أخطاء في البيانات المدخلة، قم بإعادة توجيه المستخدم إلى الصفحة السابقة
        include("index.php");
    }
}
?>
