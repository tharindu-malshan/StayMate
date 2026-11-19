<?php
require_once __DIR__ . '/auth/form.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StayMate - Find Your Perfect Stay</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/site.css">
</head>
<body>

    
    <?php require __DIR__ . '/parts/navigation.php'; ?>

   
    <section class="hero">
        <h1>Find Your Perfect Stay</h1>
        <p>Discover student-friendly boarding places, rooms and hostels. Search by town or district, then filter by room type.</p>
        <form class="search-box" action="properties.php" method="get">
            <input type="text" id="homeSearch" aria-label="Town, district or property name" name="q" placeholder="Search by city, district or property name...">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
        </form>
    </section>

    
    <section class="section">
        <h2 class="section-title">Why Choose StayMate?</h2>
        <div class="features">
            <div class="feature-card">
                <i class="fa-solid fa-magnifying-glass-location"></i>
                <h3>Easy Search</h3>
                <p>Search by town or district and filter by room type or price.</p>
            </div>
            <div class="feature-card">
                <i class="fa-solid fa-shield-halved"></i>
                <h3>Room Details</h3>
                <p>See the room type, location and availability in each sample listing.</p>
            </div>
            <div class="feature-card">
                <i class="fa-solid fa-star"></i>
                <h3>Reviews & Ratings</h3>
                <p>See how student reviews and ratings appear on a listing.</p>
            </div>
            <div class="feature-card">
                <i class="fa-solid fa-wallet"></i>
                <h3>Monthly Prices</h3>
                <p>Compare monthly rents in Sri Lankan rupees.</p>
            </div>
        </div>
    </section>

    
    <section class="section" style="background:#fff; border-radius:20px; margin:0 20px 40px;">
        <h2 class="section-title">How It Works</h2>
        <div class="steps">
            <div class="step">
                <div class="step-num">1</div>
                <h3>Create Account</h3>
                <p>Register as a user or a property owner.</p>
            </div>
            <div class="step">
                <div class="step-num">2</div>
                <h3>Search & Browse</h3>
                <p>Find rooms by location, price and preferences.</p>
            </div>
            <div class="step">
                <div class="step-num">3</div>
                <h3>View a Listing</h3>
                <p>Open a room to see its rent, facilities and availability.</p>
            </div>
            <div class="step">
                <div class="step-num">4</div>
                <h3>Compare rooms</h3>
                <p>Try another town or price limit to compare your options.</p>
            </div>
        </div>
    </section>

    
    <div class="cta">
        <h2>Are you a Property Owner?</h2>
        <p>Create an owner account to preview how your room listing will look.</p>
        <?php if (empty($_SESSION['user_id'])): ?>
            <a href="register.php?role=owner">Register as Owner</a>
        <?php elseif ($_SESSION['role'] === 'owner'): ?>
            <a href="add-property.php">Preview a listing</a>
        <?php else: ?>
            <a href="properties.php">Browse properties</a>
        <?php endif; ?>
    </div>

    <footer>
        &copy; 2026 StayMate. Simple boarding &amp; property finder for students.
    </footer>

</body>
</html>
