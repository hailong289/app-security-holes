<?php
require_once 'App/Core/Router.php';
use App\Core\Router;
$router = Router::getInstance();

// Thêm route cho ứng dụng
$router->addRoute('GET', '/',[\App\Controllers\Controller::class, 'index']);