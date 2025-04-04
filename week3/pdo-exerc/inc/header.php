<?php
require_once __DIR__ .'/../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="./style.css" />
    <script src="./js/main.js" defer></script>
    <title>MediaItems</title>
  </head>
  <body>
    <div class="container">
      <header>
        <h1>MediaItems</h1>
        <nav>
          <ul>
            <li>
              <a href="<?php echo $site_url; ?>">Home</a>
            </li>
            <li>
              <a href="<?php echo $site_url; ?>/user.php">Login/Register</a>
            </li>
          </ul>
        </nav>
      </header>
    </div>