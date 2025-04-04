<?php
session_start();
require_once __DIR__ . '/../db/dbconnect.php';
require_once __DIR__ . '/../config/config.php';

if (!empty($_POST['media_id']) && !empty($_POST['user_id'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user']['user_id'];
    $media_id = $_POST['media_id'];

    $sql = 'UPDATE MediaItems SET title = :title, description = :description WHERE media_id = :media_id AND user_id = :user_id';

    try {
        $data = [
            'title' => $title,
            'description' => $description,
            'user_id' => $user_id,
            'media_id' => $media_id
        ];

        $STH = $DBH->prepare($sql);
        $STH->execute($data);
        echo $STH->rowCount();

        if ($STH->rowCount() > 0) {
            header('Location: '.$site_url);
        } else {
            echo 'No rows updated. Check if the media_id and user_id match.';
        }

    } catch (Exception $e) {
        echo 'Error updating data: ' . $e->getMessage();
        file_put_contents(__DIR__ . '/../logs/PDOErrors.txt', 'updateData - ' . $e->getMessage(), FILE_APPEND);
    }


} else {
    exit('Invalid initial values.');
}