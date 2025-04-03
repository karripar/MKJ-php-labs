<?php
require_once __DIR__ . '/inc/header.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'):
    if (isset($_POST['remember'])):
        $_SESSION['username'] =  $_POST['username'];
    else:
        unset($_SESSION['username']);
    endif;
    header('Location: ' . $_SERVER['PHP_SELF']);
endif;
?>

<form style="display: flex; flex-direction: column; margin: auto; width: 20rem; margin-top: 10rem;"
    action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

    <?php
    $checked = isset($_SESSION['username']) ? 'checked' : '';
    ?>

    <input type="text" name="username" id="username" value="<?php echo $_SESSION['username'] ?? ''; ?>"
        placeholder="Username" checked="
        <?php echo $checked?>
        " />
    <label for="username">Username</label>

    <input type="checkbox" name="remember" />
    <label for="remember">Remember me</label>
    <input type="submit" />

</form>

<?php
require_once __DIR__ . '/inc/footer.php';

?>