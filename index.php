<?php
session_start();
define('APP_PATH', __DIR__ . '/');
require 'vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
require_once 'App/Routings/web.php';
require_once 'App/Core/BaseController.php';
require_once 'App/AppHandle.php';
require_once 'App/database/DB.php';
require_once 'App/Core/helper.php';


use App\Appilaction;

$app = new Appilaction();
$app->run();
