<?php

require_once __DIR__ . '/form.php';

// Check form submission
checkForm();

// Get values from the registration form
$name = trim(formValue('full_name'));
$email = strtolower(trim(formValue('email')));
$phone = trim(formValue('phone'));
$role = formValue('role');
$password = formValue('password');
$confirmPassword = formValue('confirmPassword');

// Show an error and return to registration page
function registerError($message){
    goToPage('register.php', 'error', $message);
}
// Check full name
if ($name === '' || mb_strlen($name, 'UTF-8') > 100) {
    registerError('Enter a name of up to 100 characters.');
}
// Check phone number
if ($phone === '' || mb_strlen($phone, 'UTF-8') > 20) {
    registerError('Enter a phone number of up to 20 characters.');
}
// Check user role
if ($role !== 'user' && $role !== 'owner') {
    registerError('Select User or Property Owner.');
}
// Check password rules
$tooShort = mb_strlen($password, 'UTF-8') < 8;
$tooLong = strlen($password) > 72;
$hasNullByte = strpos($password, "\0") !== false;

if ($tooShort || $tooLong || $hasNullByte) {
    registerError('Use at least 8 characters and at most 72 bytes for your password.');
}

// Check if both passwords match
if ($password !== $confirmPassword) {
    registerError('Passwords do not match.');
}

// Connect to the database
require_once __DIR__ . '/../includes/db.php';

// Hash the password before saving
$hash = password_hash($password, PASSWORD_DEFAULT);

// Save the new user
try {
    $query = $conn->prepare(
        'INSERT INTO users (full_name, email, phone, role, password_hash)
         VALUES (?, ?, ?, ?, ?)'
    );

    $query->bind_param('sssss', $name, $email, $phone, $role, $hash);
    $query->execute();

} catch (mysqli_sql_exception $e) {

    // Check if the email already exists
    if ($e->getCode() === 1062) {
        registerError('This email is already registered.');
    }

    registerError('Could not create your account. Please try again.');
}
// Redirect to login after successful registration
goToPage('login.php', 'success', 'Account created. Please sign in.');