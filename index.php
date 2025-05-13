<?php
require 'vendor/autoload.php';
define('APP_PATH', __DIR__ . '/');
require_once 'App/Routings/web.php';
require_once 'App/Core/BaseController.php';
require_once 'App/AppHandle.php';
require_once 'App/database/DB.php';
require_once 'App/Core/helper.php';


use App\Appilaction;

$app = new Appilaction();
$app->run();
