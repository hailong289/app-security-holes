<?php

namespace App\Controllers;

use App\Core\BaseController;

/**
 * 6. Vulnerable and Outdated Components
 */
class VulnerableOutdatedComponentsController extends BaseController
{
    public function index()
    {
        return $this->view('layout', [
            'page' => 'vulnerable_outdated_components',
            'menu' => menu(),
        ]);
    }
}