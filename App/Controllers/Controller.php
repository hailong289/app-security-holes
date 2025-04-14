<?php
namespace App\Controllers;
use App\Core\BaseController;

class Controller extends BaseController {
   public function index()
   {
       return $this->view('index');
   }
}