<?php

namespace App\Controllers;
use App\Core\BaseController;

/**
 *  1. Broken Access Control
 */
class BrokenAccessControlController extends BaseController
{
    public function index()
    {
        return $this->view('broken_access_control');
    }
}