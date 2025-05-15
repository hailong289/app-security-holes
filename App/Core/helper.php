<?php
if (!function_exists('getBaseUrl')) {
    function getBaseUrl()
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        return $protocol . '://' . $host;
    }
}

if (!function_exists('url')) {
     function url($path)
     {
         return getBaseUrl() . $path;
     }
}

if (!function_exists('config')) {
    function config($key, $default = null)
    {
        if (isset($_ENV[$key])) {
            return $_ENV[$key] ?? $default;
        }

        if (getenv($key)) {
            return getenv($key);
        }

        return $default;
    }
}