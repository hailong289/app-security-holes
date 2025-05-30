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
        if (isset($_GET['download'])) {
            $result = $this->downloadSoftware();
            return $this->view('layout', [
                'page' => 'software_and_data_integrity_failures',
                'menu' => menu(),
                'status' => $result['status'],
                'message' => $result['message'],
            ]);
        }
        return $this->view('layout', [
            'page' => 'software_and_data_integrity_failures',
            'menu' => menu(),
        ]);
    }

    public function downloadSoftware() {
        if (isset($_GET['file'])) {
            $filePath = APP_PATH . 'public/'.$_GET['file'];
            if (!file_exists($filePath)) {
                http_response_code(404);
                die('Error: File not found.');
            }

            // Set headers for file download
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.$_GET['file'].'"');
            header('Content-Length: ' . filesize($filePath));
            header('Cache-Control: no-cache');

            // Output the file
            readfile($filePath);
            exit;
        }
        // Giả lập URL tải xuống (thực tế sẽ là một file hoặc API)
//        $downloadUrl = 'https://filesamples.com/samples/video/3gp/sample_640x360.3gp';

//        try {
//            // Lỗi: Không kiểm tra tính toàn vẹn của file tải xuống
//            // Không sử dụng hash (MD5, SHA) hoặc chữ ký số để xác minh
//            $ch = curl_init();
//            curl_setopt($ch, CURLOPT_URL, $downloadUrl);
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//            $response = curl_exec($ch);
//
//            if ($response === false) {
//                throw new \Exception(curl_error($ch));
//            }
//
//            curl_close($ch);
//            return [
//                'status' => 'success',
//                'message' => "Tải xuống file thành công. Nội dung: " . substr($response, 0, 100) . "..."
//            ];
//        } catch (\Exception $e) {
//            return [
//                'message' => 'Lỗi khi tải xuống: ' . $e->getMessage(),
//                'status' => 'error',
//            ];
//        }
    }
}