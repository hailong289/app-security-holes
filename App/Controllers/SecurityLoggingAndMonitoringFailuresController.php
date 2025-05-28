<?php

namespace App\Controllers;

use App\Core\BaseController;

/**
 * 9. Security Logging and Monitoring Failures
 */
class SecurityLoggingAndMonitoringFailuresController extends BaseController
{
    public function index()
    {
        return $this->view('layout', [
            'page' => 'security_logging_and_monitoring_failures',
            'menu' => menu(),
        ]);
    }
}