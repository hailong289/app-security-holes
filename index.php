<?php
define('APP_PATH', __DIR__ . '/');
require_once 'App/Routings/web.php';
require_once 'App/Core/BaseController.php';
require_once 'App/AppHandle.php';
require_once 'App/database/DB.php';


use App\Appilaction;

$app = new Appilaction();
$app->run();
