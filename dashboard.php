<?php
require_once __DIR__ . '/auth/form.php';
requireLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - StayMate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="assets/css/site.css">
</head>
<body>

    <?php require __DIR__ . '/parts/navigation.php'; ?>

    <main class="container">
        <div class="welcome">
            <div><h1>Welcome, <?= escape($_SESSION['user_name']) ?></h1>
            <p>You are signed in to StayMate.</p></div>
            <span class="role-badge"><?= escape(ucfirst($_SESSION['role'])) ?></span>
        </div>
        <div class="action-grid">
            <a class="action-card" href="profile.php">My profile</a>
            <a class="action-card" href="properties.php">Browse properties</a>
            <?php if ($_SESSION['role'] === 'owner'): ?>
                <a class="action-card" href="add-property.php">Preview a property listing</a>
            <?php endif; ?>
        </div>
    </main>
    <footer>
        &copy; 2026 StayMate
    </footer>

</body>
</html>
