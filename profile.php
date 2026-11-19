<?php
require_once __DIR__ . '/auth/form.php';
requireLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - StayMate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/site.css">
</head>
<body>

    <?php require __DIR__ . '/parts/navigation.php'; ?>

    <div class="container">
        <div class="profile-card">
            <div class="profile-header">
                <div class="avatar"><i class="fa-solid fa-user"></i></div>
                <h2><?= escape($_SESSION['user_name']) ?></h2>
                <p>Account type: <?= escape(ucfirst($_SESSION['role'])) ?></p>
            </div>
            <p><strong>Email</strong><br><?= escape($_SESSION['user_email']) ?></p>
            <p><strong>Phone</strong><br><?= escape($_SESSION['phone']) ?></p>
        </div>
        <a href="dashboard.php" class="back-link">
            <i class="fa-solid fa-arrow-left"></i> Back to Dashboard
        </a>
    </div>

</body>
</html>
