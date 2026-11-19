
<nav class="navbar" aria-label="Main navigation">

    <div class="logo">StayMate</div>

    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="properties.php">Properties</a>

<?php
 // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
?>

    <a href="dashboard.php">Dashboard</a>
    <a href="profile.php">Profile</a>

<!-- Logout form -->
    <form action="auth/logout.php" method="post">

    <input  type="hidden"
            name="csrf_token"
            value="<?php echo escape($_SESSION['csrf_token']); ?>">

    <button type="submit" class="nav-logout"> Log out</button>
                     
    </form>

<?php
    } else {
?>

    <a href="login.php">Sign in</a>
    <a href="register.php" class="btn-nav">Register</a>

<?php
}
?>

    </div>
</nav>
