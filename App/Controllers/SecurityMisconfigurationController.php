<?php

namespace App\Controllers;

use App\Core\BaseController;

/**
 * 5. Security Misconfiguration
 */
class SecurityMisconfigurationController extends BaseController
{
    public function index()
    {
        return $this->view('layout', [
            'page' => 'security_misconfiguration',
            'menu' => menu(),
        ]);
    }
}