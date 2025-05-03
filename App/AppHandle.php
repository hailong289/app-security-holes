<?php
namespace App;
use App\Core\Router;

class Appilaction {
    private Router $router;

    public function __construct()
    {
        $this->router = Router::getInstance();
    }

    public function run()
    {
        try {
            $requestMethod = $_SERVER['REQUEST_METHOD'];
            $requestPath = $_SERVER['REQUEST_URI'];

            $response = $this->router->dispatch($requestMethod, $requestPath);

            if ($response) {
                $type = $response['type'] ?? 'none';
                switch ($type) {
                    case 'view':
                        $viewFile = APP_PATH . 'App/Views/' . str_replace('.', '/', $response['path']) . '.php';
                        if (file_exists($viewFile)) {
                            if (!empty($response['data'])) {
                                extract($response['data']);
                            }
                            require $viewFile;
                        } else {
                            http_response_code(404);
                            echo "404 Not Found";
                        }
                        break;
                    case 'json':
                        header('Content-Type: application/json');
                        echo json_encode($response['data']);
                        break;
                    case 'redirect':
                        header('Location: ' . $response['path']);
                        exit;
                        break;
                    default:
                        echo $response;
                        break;
                }
            } else {
                http_response_code(404);
                echo "404 Not Found";
            }
        } catch (\Throwable $e) {
            http_response_code(500);
            echo "500 Internal Server Error: " . $e->getMessage();
        }
    }

}