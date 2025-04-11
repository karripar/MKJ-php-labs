<?php

session_start();
session_destroy();

global $site_url;
require_once __DIR__ . "/../config/config.php";

header("Location: $site_url/user.php");

