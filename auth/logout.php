<?php
require_once __DIR__ . '/form.php';
checkForm();

$_SESSION = [];
session_destroy();
header('Location: ../login.php', true, 303);
exit;
