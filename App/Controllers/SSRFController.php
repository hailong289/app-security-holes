<?php

namespace App\Controllers;

use App\Core\BaseController;

/**
 * 10. Server-Side Request Forgery
 */
class SSRFController extends BaseController
{
    public function index()
    {
        return $this->view('ssrf');
    }

    public function ssrf()
    {
        $url = $_GET['url'] ?? null;

        if ($url) {
            $response = file_get_contents($url);
            echo $response;
        } else {
            echo "No URL provided.";
        }
    }
}