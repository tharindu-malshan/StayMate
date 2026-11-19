<?php

// Include form functions
require_once __DIR__ . '/form.php';

// Check form submission
checkForm();

// Get email and password from the form
$email = strtolower(trim(formValue('email')));
$password = formValue('password');

// Check email and password
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password === '') {
    goToPage('login.php', 'error', 'Enter your email and password.');
}

// Connect to the database
require_once __DIR__ . '/../includes/db.php';

// Find the user by email
$query = $conn->prepare(
    'SELECT user_id, full_name, email, phone, role, password_hash, is_blocked
     FROM users WHERE email = ?'
);

// Add email to the query
$query->bind_param('s', $email);

// Run the query
$query->execute();

// Get user details
$result = $query->get_result();
$user = $result->fetch_assoc();

// Check whether the user exists
if (!$user) {
    goToPage('login.php', 'error', 'Unable to sign in with these details.');
}
// Check account status and password
if (
    $user['is_blocked'] ||
    empty($user['password_hash']) ||
    !password_verify($password, $user['password_hash'])
    ) 
    {goToPage('login.php', 'error', 'Unable to sign in with these details.');
}
