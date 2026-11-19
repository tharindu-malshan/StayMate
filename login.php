<?php
require_once __DIR__ . '/auth/form.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - StayMate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/site.css">
</head>
<body>

    <div class="login-container">

        <div class="welcome-section">
            <div class="logo-icon"><img src="img/staymate_logo-removebg-preview.png" alt="StayMate"></div>
            <h1>Welcome Back!</h1>
            <p>
                We are happy to see you again.<br>
                Login to continue your journey<br>
                and explore new stays.
            </p>
        </div>

        <div class="login-section">
            <h2>Sign In</h2>
            <p class="subtitle">Enter your details to access your account</p>

            <?php require __DIR__ . '/parts/messages.php'; ?>

            <form action="auth/login_process.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?= escape($_SESSION['csrf_token']) ?>">
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" id="email" name="email" autocomplete="username"
                            placeholder="Enter your email" required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="password" name="password" autocomplete="current-password" placeholder="Enter your password" required>
                    </div>
                </div>

                <?php require __DIR__ . '/parts/password-toggle.php'; ?>
                <button type="submit" class="login-btn">Login</button>

                <div class="register">
                    Do not have an account?
                    <a href="register.php">Create Account</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
