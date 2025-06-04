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
        if (isset($_GET['url'])) {
            $request = $this->ssrf($_GET['url']);
            return $this->view('layout', [
                'page' => 'ssrf',
                'menu' => menu(),
                'message' => $request['message'],
                'response' => $request['response'],
                'status' => $request['status'],
            ]);
        }
        return $this->view('layout', [
            'page' => 'ssrf',
            'menu' => menu(),
        ]);
    }

    public function ssrf($url)
    {
        try {
            $content = file_get_contents($url);
//            echo $content;
            return [
                'response' => $content,
                'message' => 'Yêu cầu thành công',
                'url' => $url,
                'status' => 'success'
            ];
        } catch (\Exception $e) {
            return [
                'response' => null,
                'message' => $e->getMessage(),
                'url' => $url,
                'status' => 'error'
            ];
        }
    }
}