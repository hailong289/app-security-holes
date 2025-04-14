<?php

namespace App\Core;

use App\Database\DB;

class BaseController {
     public function view($name, $data = [])
     {
         return [
             'type' => 'view',
             'path' => $name,
             'data' => $data
         ];
     }

     public function redirect($url)
     {
         return [
             'type' => 'redirect',
             'path' => $url
         ];
     }

     public function json($data)
     {
          return [
              'type' => 'json',
              'data' => $data
          ];
     }

     public function useModel($model)
     {
         require_once APP_PATH . 'App/Models/' . ucfirst($model) . '.php';
         $modelClass = "App\\Models\\" . ucfirst($model);
         if (!class_exists($modelClass)) {
             throw new \Exception("Model not found: " . $model);
         }
         $modelNew = new $modelClass();
         $modelNew->db = DB::getInstance();
         return $modelNew;
     }
}