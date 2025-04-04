<?php
// upload.php

require_once __DIR__ . '/../db/dbconnect.php';
require_once __DIR__ .'/../config/config.php';

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql = 'INSERT INTO Users (username, password, email, user_level_id) VALUES (:username, :password, :email, 2)';

    $data = [
        'username' => $username,
        'password' => password_hash($password, PASSWORD_BCRYPT), // Hash the password
        'email' => $email
    ];



    try {
        $STH = $DBH->prepare($sql);
        $STH->execute($data);
        echo 'User created successfully';
        if ($STH->rowCount() > 0) {
            header('Location: ' . $site_url . '/user.php?message=User created successfully');
        } else {
            echo 'No user inserted. Check your data.';
        }
    } catch (PDOException $err) {
        echo 'Error inserting data: ' . $err->getMessage();
        file_put_contents(__DIR__ . '/../logs/PDOErrors.txt', 'insertUser.php - ' . $err->getMessage(), FILE_APPEND);
    }


} else {
    exit('No user added!');
}
?>