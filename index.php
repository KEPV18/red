<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>red voda</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <h2>Welcome to our family</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="register_post.php" method="post"> <!-- تم تعديل الخط هنا ليشير إلى صفحة process.php -->
                <h1>Create Account</h1>
                <input type="text" name="fullname" placeholder="Full Name" required> <!-- تم إضافة الخاصية required للحقول الإلزامية -->
                <input type="email" name="email" placeholder="Email" required> <!-- تم إضافة الخاصية required للحقول الإلزامية -->
                <input type="text" name="phone" placeholder="Phone" required> <!-- تم إضافة الخاصية required للحقول الإلزامية -->
                <input type="text" name="whatsapp" placeholder="WhatsApp" required> <!-- تم إضافة الخاصية required للحقول الإلزامية -->
                <input type="text" name="username" placeholder="Username" required> <!-- تم إضافة الخاصية required للحقول الإلزامية -->
                <input type="password" name="password" placeholder="Password" required> <!-- تم إضافة الخاصية required للحقول الإلزامية -->
                <input type="text" name="additional_details" placeholder="Additional Details">
                <button type="submit">Sign Up</button> <!-- تم تحويل الزر إلى نوع submit ليقوم بإرسال النموذج -->
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <h1>Sign in</h1>
                <input type="username" placeholder="username" />
                <input type="password" placeholder="Password" />
                <a href="#">Forgot your password?</a>
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <h1>Here is the original red genie</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>
            Created with <i class="fa fa-heart"></i> by
            <a target="_blank" href="https://github.com/KEPV18">kepv</a>
        </p>
    </footer>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>

</html>
