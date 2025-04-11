<?php
require_once __DIR__ . '/inc/login-form.php';
echo $_GET['message'] ?? null;
require_once __DIR__ .'/inc/register-form.php';
require_once __DIR__ .'/db/dbconnect.php';
require_once __DIR__ .'/config/config.php';