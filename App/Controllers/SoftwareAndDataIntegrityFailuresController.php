<?php

namespace App\Controllers;

use App\Core\BaseController;

/**
 * 8. Software and Data Integrity Failures
 */
class SoftwareAndDataIntegrityFailuresController extends BaseController
{
    public function index()
    {
        return $this->view('software_and_data_integrity_failures');
    }
}