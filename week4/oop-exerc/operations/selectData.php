<?php 

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
global $DBH;
global $site_url;
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ .'/../db/dbconnect.php';
require_once __DIR__ . '/../MediaProject/MediaItemDBOps.class.php';

use MediaProject\MediaItemDBOps;

if (!isset($_SESSION['user'])) {
    header("Location: $site_url/user.php");
    exit;
};

$mediaItemDBOps = new MediaItemDBOps($DBH);
$mediaItems = $mediaItemDBOps->getMediaItems();

foreach ($mediaItems as $mediaItem): 
    $row = $mediaItem->getMediaItem();
    ?>
    <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><img src="./uploads/<?php echo $row['filename']; ?>" alt="<?php echo $row['title']; ?>" /></td>
            <td>
                <?php
                if ($_SESSION['user']['user_id'] == $row['user_id'] || $_SESSION['user']['user_level_id'] == 1):
                    ?>
                    <button id="modify-button" class="update-btn" data-id="<?php echo $row['media_id']; ?>">Modify</button>
                    <form action="<?php echo $site_url; ?>/operations/deleteData.php" method="POST" style="display:inline;">
                        <input type="hidden" name="media_id" value="<?php echo $row['media_id']; ?>">
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                    <?php
                endif;
                ?>

            </td>
        </tr>
<?php
endforeach;