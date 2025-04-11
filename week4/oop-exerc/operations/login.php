<?php

session_start();

global $DBH;
global $site_url;
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../db/dbconnect.php';
require_once __DIR__ . '/../MediaProject/UserDBOps.class.php';


use MediaProject\UserDBOps;

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $userDBOps = new UserDBOps($DBH);
    $user = $userDBOps->login();
    
    if ($user) {
        $_SESSION['user'] = $user->getUser();
        header("Location: $site_url/index.php");
        exit;
    } else {
        echo "Invalid username or password.";
    }
} else {
    echo "Please enter username and password.";
}