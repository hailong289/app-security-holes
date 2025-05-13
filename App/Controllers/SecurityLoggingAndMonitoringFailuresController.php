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
        return $this->view('security_logging_and_monitoring_failures');
    }
}