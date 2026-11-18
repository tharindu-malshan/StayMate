<?php
require_once __DIR__ . '/auth/form.php';
$properties = require __DIR__ . '/sample/properties.php';

function filterValue($key)
{
    $value = $_GET[$key] ?? '';
    return is_string($value) ? trim($value) : '';
}

$search = filterValue('q');
$type = filterValue('type');
$gender = filterValue('gender');
$maxPrice = filterValue('price');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Properties - StayMate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/properties.css">
    <link rel="stylesheet" href="assets/css/site.css">
</head>
<body>

    <?php require __DIR__ . '/parts/navigation.php'; ?>

    <div class="container">
        <div class="page-header">
            <h1>Browse Properties</h1>
            <p>Browse sample rooms, boarding places and hostels.</p>
        </div>

        <form class="filters" method="get">
            <div class="filter-group"><label for="q">Town, district or property name</label>
                <input id="q" name="q" value="<?= escape($search) ?>"></div>
            <div class="filter-group"><label for="type">Room type</label>
                <select name="type" id="type"><option value="">Any</option>
                    <?php foreach (['Single', 'Shared', 'Apartment', 'Hostel'] as $option): ?>
                        <option <?= $type === $option ? 'selected' : '' ?>><?= $option ?></option>
                    <?php endforeach; ?>
                </select></div>
            <div class="filter-group"><label for="gender">Gender preference</label>
                <select name="gender" id="gender"><option value="">Any</option>
                    <?php foreach (['Male', 'Female', 'Mixed'] as $option): ?>
                        <option <?= $gender === $option ? 'selected' : '' ?>><?= $option ?></option>
                    <?php endforeach; ?>
                </select></div>
            <div class="filter-group"><label for="price">Maximum price (LKR)</label>
                <input type="number" min="0" id="price" name="price" value="<?= escape($maxPrice) ?>"></div>
            <button class="filter-btn" type="submit">Filter</button>
        </form>

        <div class="property-grid">
        <?php $count = 0; ?>
        <?php foreach ($properties as $id => $room): ?>
            <?php
            $location = $room['city'] . ', ' . $room['district'];
            if ($search !== '' && stripos($room['title'] . ' ' . $location, $search) === false) continue;
            if ($type !== '' && $type !== $room['type']) continue;
            if ($gender !== '' && $gender !== $room['gender']) continue;
            if ($maxPrice !== '' && $room['price'] > (float) $maxPrice) continue;
            $count++;
            ?>
            <article class="property-card">
                <div class="property-img">
                    <i class="fa-solid fa-building"></i>
                    <span class="badge"><?= escape($room['status']) ?></span>
                </div>
                <div class="property-body">
                    <h3><a href="property-details.php?id=<?= $id ?>"><?= escape($room['title']) ?></a></h3>
                    <p class="location"><?= escape($location) ?></p>
                    <p class="price">LKR <?= number_format($room['price']) ?> <span>/ month</span></p>
                    <p><?= escape($room['type']) ?></p>
                </div>
            </article>
        <?php endforeach; ?>
        <?php if ($count === 0): ?><p>No rooms match these filters.</p><?php endif; ?>
        </div>
    </div>

    <footer>
        &copy; 2026 StayMate. Simple boarding &amp; property finder.
    </footer>

</body>
</html>
