<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="styles.css"> <!-- تحتاج إلى تعديل المسار إذا كانت لديك ملفات CSS مخصصة -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 80%;
            max-width: 600px;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        #customerData {
            margin-top: 20px;
            text-align: left;
        }

        .customer-info {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        .customer-info:last-child {
            border-bottom: none;
        }

        .customer-info label {
            font-weight: bold;
            color: #555;
        }

        .customer-info span {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Website</h1>
        <div id="customerData">
            <!-- هنا سيتم عرض بيانات العميل -->
        </div>
    </div>

    <script>
        // عند تحميل الصفحة، اجلب بيانات العميل باستخدام AJAX وعرضها في الصفحة
        window.onload = function() {
            // ارسل طلب AJAX لجلب بيانات العميل
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_customer_data.php', true); // تحتاج إلى تغيير اسم الملف بناءً على اسم ملف الكود PHP الذي يجلب البيانات
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // في حالة استلام البيانات بنجاح، قم بعرضها في الصفحة
                    document.getElementById('customerData').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        };
    </script>
</body>
</html>
