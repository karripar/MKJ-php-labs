<?php
require_once __DIR__ .'/../config/config.php';
?>

<section id="register-form">
    <form action="<?php echo $site_url; ?>/operations/insertUser.php" method="POST">
    <h2>Register</h2>
        <div class="form-control">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-control">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

        </div>
        <div class="form-control">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <button type="submit" class="btn">Register</button>
    </form>
</section>
