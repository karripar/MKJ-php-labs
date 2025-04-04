<?php
// upload.php
session_start();

require_once __DIR__ . '/../db/dbconnect.php';
require_once __DIR__ .'/../config/config.php';

if (!empty($_FILES['file']) && !empty($_POST['title']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $filename = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
    $filetype = $_FILES['file']['type'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $destination = __DIR__ . '/../uploads/' . $filename;

    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user']['user_id'] ?? 1; // Default to 1 if not set

    // Allow any image or video MIME type
    if (strpos($filetype, 'image/') === 0 || strpos($filetype, 'video/') === 0) {
        if (move_uploaded_file($tmp_name, $destination)) {
            echo 'File uploaded successfully';
        } else {
            echo 'Error moving file to destination';
        }
    } else {
        exit('Invalid file type. Only images and videos are allowed.');
    }

    $sql = 'INSERT INTO MediaItems (title, description, filename, filesize, media_type, user_id) VALUES (:title, :description, :filename, :filesize, :media_type, :user_id)';

    $data = [
        'title' => $title,
        'description' => $description,
        'filename' => $filename,
        'filesize' => $filesize,
        'media_type' => $filetype,
        'user_id' => $user_id // Assuming user_id is 1 for this example
    ];



    try {
        $STH = $DBH->prepare($sql);
        $STH->execute($data);
        echo 'Data inserted successfully';
        if ($STH->rowCount() > 0) {
            header('Location: ' . $site_url);
        } else {
            echo 'No rows inserted. Check your data.';
        }
    } catch (PDOException $err) {
        echo 'Error inserting data: ' . $err->getMessage();
        file_put_contents(__DIR__ . '/../logs/PDOErrors.txt', 'insertData - ' . $err->getMessage(), FILE_APPEND);
    }


} else {
    exit('No file uploaded or invalid input.');
}
?>