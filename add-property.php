<?php
require_once __DIR__ . '/auth/form.php';
requireLogin();
if ($_SESSION['role'] !== 'owner') {
    http_response_code(403);
    exit('Only property owners can open this page.');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Property - StayMate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/add-property.css">
    <link rel="stylesheet" href="assets/css/site.css">
</head>
<body>

    <div class="form-container">
        <div class="form-header">
            <i class="fa-solid fa-building-circle-arrow-right"></i>
            <h2>Add New Property</h2>
            <p>Preview your listing before publishing is available.</p>
        </div>

        <form id="listing-form">
            <div class="input-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="e.g. Sunny Single Room near University" required>
            </div>

            <div class="input-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Describe the room, facilities, rules..." required></textarea>
            </div>

            <div class="row">
                <div class="input-group">
                    <label for="price">Price (LKR / month)</label>
                    <input type="number" id="price" name="price" placeholder="15000" required min="0">
                </div>
                <div class="input-group">
                    <label for="roomtype">Room Type</label>
                    <select id="roomtype" name="roomtype" required>
                        <option value="" disabled selected>Select type</option>
                        <option value="Single">Single</option>
                        <option value="Shared">Shared</option>
                        <option value="Apartment">Apartment</option>
                        <option value="Hostel">Hostel</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="input-group">
                    <label for="genderPreference">Gender Preference</label>
                    <select id="genderPreference" name="genderPreference" required>
                        <option value="" disabled selected>Select</option>
                        <option value="Male">Male Only</option>
                        <option value="Female">Female Only</option>
                        <option value="Mixed">Mixed</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="availabilityStatus">Availability Status</label>
                    <select id="availabilityStatus" name="availabilityStatus" required>
                        <option value="Available">Available</option>
                        <option value="Booked">Booked</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="input-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" placeholder="Nugegoda" required>
                </div>
                <div class="input-group">
                    <label for="district">District</label>
                    <input type="text" id="district" name="district" placeholder="Colombo" required>
                </div>
            </div>

            <div class="row">
                <div class="input-group">
                    <label for="latitude">Latitude (optional)</label>
                    <input type="number" step="any" id="latitude" name="latitude" placeholder="6.8649">
                </div>
                <div class="input-group">
                    <label for="longitude">Longitude (optional)</label>
                    <input type="number" step="any" id="longitude" name="longitude" placeholder="79.8997">
                </div>
            </div>

            <button type="submit" class="submit-btn">
                <i class="fa-solid fa-plus"></i> Preview listing
            </button>
        </form>
        <p id="preview" role="status"></p>

        <a href="dashboard.php" class="back-link">
            <i class="fa-solid fa-arrow-left"></i> Back to Dashboard
        </a>
    </div>

    <script>
        document.getElementById('listing-form').addEventListener('submit', function (event) {
            event.preventDefault();
            const fields = event.currentTarget.elements;
            document.getElementById('preview').textContent =
                'Preview: ' + fields.title.value + ' in ' + fields.city.value +
                ' — LKR ' + fields.price.value + ' per month. Listing has not been saved.';
        });
    </script>
</body>
</html>
