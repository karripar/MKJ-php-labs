<?php
session_start();
require_once __DIR__ . '/config/config.php';



if (!isset($_SESSION['user'])) {
    header('Location: '. $site_url . '/user.php');
    exit;
}



require_once __DIR__ . '/inc/header.php';
require_once __DIR__ . '/inc/main.php';
require_once __DIR__ . '/inc/footer.php';
