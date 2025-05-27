<?php

use App\Controllers\{
    BrokenAccessControlController,
    Controller,
    CryptographicFailuresController,
    InsecureDesignController,
    InjectionController,
    SecurityLoggingAndMonitoringFailuresController,
    SecurityMisconfigurationController,
    SoftwareAndDataIntegrityFailuresController,
    SSRFController,
    VulnerableOutdatedComponentsController,
    AdminController,
    IdentificationAndAuthenticationFailuresController
};

require_once 'App/Core/Router.php';

use App\Core\Router;

$router = Router::getInstance();

// Thêm route cho ứng dụng
$router->addRoute('GET', '/', [Controller::class, 'index']);
$router->addRoute('GET', '/broken-access-control', [BrokenAccessControlController::class, 'index']);
$router->addRoute('GET', '/cryptographic-failures', [CryptographicFailuresController::class, 'index']);
$router->addRoute('GET', '/insecure-design', [InsecureDesignController::class, 'index']);
$router->addRoute('GET', '/injection', [InjectionController::class, 'index']);
$router->addRoute('GET', '/security-logging-and-monitoring-failures', [SecurityLoggingAndMonitoringFailuresController::class, 'index']);
$router->addRoute('GET', '/security-misconfiguration', [SecurityMisconfigurationController::class, 'index']);
$router->addRoute('GET', '/software-and-data-integrity-failures', [SoftwareAndDataIntegrityFailuresController::class, 'index']);
$router->addRoute('GET', '/ssrf', [SSRFController::class, 'index']);
$router->addRoute('GET', '/vulnerable-and-outdated-components', [VulnerableOutdatedComponentsController::class, 'index']);
$router->addRoute('GET', '/identification-and-authentication-failures', [IdentificationAndAuthenticationFailuresController::class, 'index']);

// test broken-access-control
$router->addRoute('GET', '/login', [BrokenAccessControlController::class, 'loginForm']);
$router->addRoute('POST', '/login', [BrokenAccessControlController::class, 'login']);
$router->addRoute('POST', '/logout', [BrokenAccessControlController::class, 'logout']);
$router->addRoute('POST', '/post/comment', [InjectionController::class, 'commentNew']);
$router->addRoute('POST', '/post/comment/del', [InjectionController::class, 'commentDelete']);

$router->addRoute('GET', '/admin', [BrokenAccessControlController::class, 'admin']);
$router->addRoute('GET', '/admin/posts', [BrokenAccessControlController::class, 'adminPost']);
$router->addRoute('GET', '/post', [InjectionController::class, 'post']);


// admin router
$router->addRoute('GET', '/admin/user', [AdminController::class, 'addUser']);
$router->addRoute('POST', '/admin/user', [AdminController::class, 'addUserForm']);
$router->addRoute('GET', '/admin/user/edit', [AdminController::class, 'editUser']);
$router->addRoute('POST', '/admin/user/edit', [AdminController::class, 'editUserForm']);
$router->addRoute('POST', '/admin/user/delete', [AdminController::class, 'deleteUserForm']);

$router->addRoute('GET', '/admin/posts/add', [AdminController::class, 'addPost']);
$router->addRoute('POST', '/admin/posts/add', [AdminController::class, 'addPostForm']);
$router->addRoute('GET', '/admin/posts/edit', [AdminController::class, 'editPost']);
$router->addRoute('POST', '/admin/posts/edit', [AdminController::class, 'editPostForm']);
$router->addRoute('POST', '/admin/posts/delete', [AdminController::class, 'deletePostForm']);


// cyptographic failures
$router->addRoute('GET', '/register', [CryptographicFailuresController::class, 'registerForm']);
$router->addRoute('POST', '/register', [CryptographicFailuresController::class, 'register']);