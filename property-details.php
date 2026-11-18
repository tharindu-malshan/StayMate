<?php
require_once __DIR__ . '/auth/form.php';
$properties = require __DIR__ . '/sample/properties.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id || !isset($properties[$id])) {
    http_response_code(404);
    exit('Room not found. <a href="properties.php">Browse properties</a>');
}
$room = $properties[$id];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details - StayMate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/property-details.css">
    <link rel="stylesheet" href="assets/css/site.css">
</head>
<body>

    <?php require __DIR__ . '/parts/navigation.php'; ?>

    <div class="container">
        <a href="properties.php" class="back-link"><i class="fa-solid fa-arrow-left"></i> Back to properties</a>

        <div class="detail-card">
            <div class="detail-img">
                <i class="fa-solid fa-building"></i>
            </div>
            <div class="detail-body">
                <div class="detail-header">
                    <h1 id="propTitle"><?= escape($room['title']) ?></h1>
                    <div class="price-tag" id="propPrice">LKR <?= number_format($room['price']) ?> <span>/month</span></div>
                </div>

                <div class="info-grid">
                    <div class="info-item">
                        <strong>Location</strong>
                        <i class="fa-solid fa-location-dot"></i> <span id="propLocation"><?= escape($room['city'] . ', ' . $room['district']) ?></span>
                    </div>
                    <div class="info-item">
                        <strong>Room Type</strong>
                        <i class="fa-solid fa-bed"></i> <span id="propRoom"><?= escape($room['type']) ?></span>
                    </div>
                    <div class="info-item">
                        <strong>Gender Preference</strong>
                        <i class="fa-solid fa-venus-mars"></i> <span id="propGender"><?= escape($room['gender']) ?></span>
                    </div>
                    <div class="info-item">
                        <strong>Availability</strong>
                        <i class="fa-solid fa-circle-check"></i> <span id="propStatus"><?= escape($room['status']) ?></span>
                    </div>
                </div>

                <h3 style="margin-bottom:10px;">Description</h3>
                <p class="description" id="propDesc"><?= escape($room['description']) ?></p>

                <p>Sample listing</p>
            </div>
        </div>

        <!-- Reviews -->
        <div class="reviews">
            <h2><i class="fa-solid fa-star"></i> Sample reviews</h2>
            <div id="reviewsList">
                <div class="review-item">
                    <div class="review-header">
                        <strong>Student User</strong>
                        <span class="stars">4 out of 5</span>
                    </div>
                    <p class="review-comment">Clean room and friendly owner. Good location for university students.</p>
                </div>
                <div class="review-item">
                    <div class="review-header">
                        <strong>Guest</strong>
                        <span class="stars">4 out of 5</span>
                    </div>
                    <p class="review-comment">Very secure and well maintained. Highly recommended.</p>
                </div>
            </div>

        </div>
    </div>

    <footer>
        &copy; 2026 StayMate
    </footer>

</body>
</html>
