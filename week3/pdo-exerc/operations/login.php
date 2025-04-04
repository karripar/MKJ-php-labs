<?php
session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ .'/../db/dbconnect.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $sql = "SELECT * FROM Users WHERE username = :username";
    $data = [
        'username' => $_POST['username'],
    ];
    $STH = $DBH->prepare($sql);
    $STH->execute($data);
    $user = $STH->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user;
        // redirect to secret page
        header('Location: '. $site_url);
        exit;
    } else {
        echo 'Invalid username or password';
    }
}