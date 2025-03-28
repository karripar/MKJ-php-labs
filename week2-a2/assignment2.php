<?php
require_once __DIR__ . '/inc/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'):
    if (isset($_POST['remember'])):
        setcookie('username', $_POST['username']);
    else:
        setcookie('username', '', time() - 3600);
    endif;
endif;
?>

<form style="display: flex; flex-direction: column; margin: auto; width: 20rem; margin-top: 10rem;"
    action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

    <input type="text" name="username" value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>"
        placeholder="Username" />
    <label for="username">Username</label>
    
    <input type="checkbox" name="remember" />
    <label for="remember">Remember me</label>
    <input type="submit" />

</form>

<?php
require_once __DIR__ . '/inc/footer.php';

?>