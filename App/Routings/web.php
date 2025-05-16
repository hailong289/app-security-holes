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
    VulnerableOutdatedComponentsController
};
require_once 'App/Core/Router.php';
use App\Core\Router;
$router = Router::getInstance();

// Thêm route cho ứng dụng
$router->addRoute('GET', '/',[Controller::class, 'index']);
$router->addRoute('GET', '/broken-access-control', [BrokenAccessControlController::class, 'index']);
$router->addRoute('GET', '/cryptographic-failures', [CryptographicFailuresController::class, 'index']);
$router->addRoute('GET', '/insecure-design', [InsecureDesignController::class, 'index']);
$router->addRoute('GET', '/injection', [InjectionController::class, 'index']);
$router->addRoute('GET', '/security-logging-and-monitoring-failures', [SecurityLoggingAndMonitoringFailuresController::class, 'index']);
$router->addRoute('GET', '/security-misconfiguration', [SecurityMisconfigurationController::class, 'index']);
$router->addRoute('GET', '/software-and-data-integrity-failures', [SoftwareAndDataIntegrityFailuresController::class, 'index']);
$router->addRoute('GET', '/ssrf', [SSRFController::class, 'index']);
$router->addRoute('GET', '/vulnerable-outdated-components', [VulnerableOutdatedComponentsController::class, 'index']);

// test broken-access-control
$router->addRoute('GET', '/test/login', [BrokenAccessControlController::class, 'loginForm']);
$router->addRoute('POST', '/test/login', [BrokenAccessControlController::class, 'login']);