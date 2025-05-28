<?php

namespace App\Controllers;

use App\Core\BaseController;
/**
 *  7. Identification and Authentication Failures
 */
class IdentificationAndAuthenticationFailuresController extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {
        return $this->view('layout', [
            'page' => 'identification_and_authentication_failures',
            'menu' => menu(),
        ]);
    }
}