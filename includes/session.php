<?php

ini_set("session.use_strict_mode", "1");

session_set_cookie_params([
    "httponly" => true,
    "samesite" => "Lax"
]);

session_start();

if (empty($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
}