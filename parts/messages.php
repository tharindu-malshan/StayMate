
<?php
// Show error message
if (isset($_SESSION['error'])) {
    echo '<p class="message-error" role="status">';
    echo escape($_SESSION['error']);
    echo '</p>';

    unset($_SESSION['error']);
}

// Show success message
if (isset($_SESSION['success'])) {
    echo '<p class="message-success" role="status">';
    echo escape($_SESSION['success']);
    echo '</p>';

    unset($_SESSION['success']);
}
?>
