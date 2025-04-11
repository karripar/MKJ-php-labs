<?php
// deleteData.php
session_start();

if (!isset($_SESSION["user"])) {
  header('Location: ' . $site_url . '/user.php');
  exit;
}

require_once __DIR__ . '/../db/dbconnect.php';
require_once __DIR__ . '/../config/config.php';

if (!empty($_POST['media_id'])) {
  $media_id = $_POST['media_id'];

  $sql = "DELETE FROM MediaItems WHERE media_id = :media_id";

  $filesql = "SELECT filename FROM MediaItems WHERE media_id = :media_id";


  $data = array(
    'media_id' => $media_id,
  );

  if ($_SESSION['user']['user_level_id'] == 2) {
    $filesql .= " AND user_id = :user_id";
    $sql .= " AND user_id = :user_id";
    $data['user_id'] = $_SESSION['user']['user_id'];
  }
  ;



  try {
    $fileSTH = $DBH->prepare($filesql);
    $fileSTH->execute($data);
    $row = $fileSTH->fetch();
    unlink(__DIR__ . '/../uploads/' . $row['filename']);

    $STH = $DBH->prepare($sql);
    $STH->execute($data);

    if ($fileSTH->rowCount() > 0) {
      echo "File deleted successfully.";
    } else {
      echo "No file deleted. Check if the media_id exists.";
    }


    if ($STH->rowCount() > 0) {
      echo "Data deleted successfully.";
      header('Location: ' . $site_url);
    } else {
      echo "No rows deleted. Check if the media_id exists.";
    }
  } catch (PDOException $e) {
    echo "Could not delete data from the database.";
    file_put_contents(__DIR__ . '/../logs/PDOErrors.txt', 'deleteData.php - ' . $e->getMessage(), FILE_APPEND);
  }
} else {
  echo "No media_id provided.";
}
?>