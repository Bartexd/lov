<?php

// APP DEBUGING MODE (On/Off)
ini_set('display_errors', 'On');

use App\App;

session_start();

include __DIR__ . "/../app/configs/config.php";

require __DIR__ . "/../app/App.php";
require __DIR__ . "/../vendor/autoload.php";


$app = new App();