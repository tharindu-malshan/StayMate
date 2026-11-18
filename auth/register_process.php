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

