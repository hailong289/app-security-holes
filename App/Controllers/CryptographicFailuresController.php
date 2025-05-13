<?php

namespace App\Controllers;

use App\Core\BaseController;
/**
 *  2. Cryptographic Failures
 */
class CryptographicFailuresController extends BaseController
{
    public function index()
    {
        return $this->view('cryptographic_failures');
    }

}