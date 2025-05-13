<?php

namespace App\Controllers;

use App\Core\BaseController;

/**
 * 3. Injection
 */
class InjectionController extends BaseController
{
    public function index()
    {
        return $this->view('injection');
    }
}