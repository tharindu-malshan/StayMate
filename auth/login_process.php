<?php

// Include form functions
require_once __DIR__ . '/form.php';

// Check form submission
checkForm();

// Get email and password from the form
$email = strtolower(trim(formValue('email')));
$password = formValue('password');
