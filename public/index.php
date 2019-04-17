<?php

session_start();

date_default_timezone_set('Europe/Paris');

//echo '<pre>'.print_r($_SESSION['user'], true).'</pre>';
//session_destroy();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../src/routing.php';
