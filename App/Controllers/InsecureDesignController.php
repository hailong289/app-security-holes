<?php

namespace App\Controllers;

use App\Core\BaseController;

/**
 * 4. Insecure Design
 */
class InsecureDesignController extends BaseController
{
    public function index()
    {
        return $this->view('layout', [
            'page' => 'insecure_design',
            'menu' => menu(),
        ]);
    }

}