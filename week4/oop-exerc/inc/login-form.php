<?php
require_once __DIR__ .'/../config/config.php';
?>

<section id="login-form">
    <form action="<?php echo $site_url?>/operations/login.php" method="POST">
    <h2>Login</h2>
        <div class="form-control">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-control">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

        </div>
        <button type="submit" class="btn">Login</button>
    </form>
</section>
