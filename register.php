<?php
require_once __DIR__ . '/auth/form.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - StayMate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/css/site.css">
</head>
<body>

    <div class="register-container">

        <div class="welcome-section">
            <div class="logo-icon"><img src="img/staymate_logo-removebg-preview.png" alt="StayMate"></div>
            <h1>Join Us!</h1>
            <p>
                Create your account and start<br>
                exploring amazing destinations,<br>
                rooms and boarding places.
            </p>
        </div>

        <div class="register-section">
            <h2>Create Account</h2>
            <p class="subtitle">Register to start your journey</p>

            <?php require __DIR__ . '/parts/messages.php'; ?>

            <form action="auth/register_process.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?= escape($_SESSION['csrf_token']) ?>">

                <div class="input-group">
                    <label for="full_name">Full Name</label>
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="full_name" name="full_name" autocomplete="name" maxlength="100" placeholder="Enter your full name" required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="email">Email Address</label>
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" id="email" name="email" autocomplete="email" maxlength="150" placeholder="Enter your email" required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="phone">Phone Number</label>
                    <div class="input-field">
                        <i class="fa-solid fa-phone"></i>
                        <input type="tel" id="phone" name="phone" autocomplete="tel" maxlength="20" placeholder="Enter your phone number" required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="role">Role</label>
                    <div class="input-field">
                        <i class="fa-solid fa-circle-user"></i>
                        <select id="role" name="role" required>
                            <option value="" disabled <?= ($_GET['role'] ?? '') !== 'owner' ? 'selected' : '' ?>>Select your role</option>
                            <option value="user">User - Looking for a room</option>
                            <option value="owner" <?= ($_GET['role'] ?? '') === 'owner' ? 'selected' : '' ?>>Property Owner</option>
                        </select>
                    </div>
                </div>

                <div class="input-group">
                    <label for="regPassword">Password</label>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" id="regPassword" minlength="8" autocomplete="new-password" placeholder="At least 8 characters" required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="confirmPassword" id="confirmPassword" autocomplete="new-password" placeholder="Confirm your password" required>
                    </div>
                </div>

                <?php require __DIR__ . '/parts/password-toggle.php'; ?>
                <button type="submit" class="register-btn">Create Account</button>

                <div class="login-link">
                    Already have an account?
                    <a href="login.php">Login</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
