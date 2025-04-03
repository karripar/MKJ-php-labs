<?php
require_once __DIR__ . '/../db/dbconnect.php';


// join usernames from users table
$sql = 'SELECT MediaItems .*, Users.username FROM MediaItems
        LEFT JOIN Users ON MediaItems.user_id = Users.user_id
        ORDER BY created_at DESC';

try {
    $STH = $DBH->query($sql);
    $STH->setFetchMode(PDO::FETCH_ASSOC);

    while($row = $STH->fetch()):
    ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><img src="<?php echo $row['filename']; ?>" alt="<?php echo $row['title']?>" /></td>
        </tr>
    <?php
    endwhile;

} catch (PDOException $err) {
    echo 'Could not connect to database.';
}

?>

<tr>
    <td>Lorem</td>
    <td>Ipsumnjsofj</td>
    <td>12.3.2000</td>
    <td>Pasi</td>
    <td><img src="" alt="" /></td>
</tr>