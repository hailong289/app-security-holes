<?php
namespace App\Controllers;
use App\Core\BaseController;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class Controller extends BaseController {

   protected User $user;
   public function __construct()
   {
       $this->user = $this->useModel('user');
   }

   public function index()
   {
       $data = $this->user->getlist();
       return $this->view('index', $data);
   }

   public function download()
   {}

   public function admin()
   {
       return $this->view('index');
   }

   public function componentWithKnownVulnerabilities()
   {
       $request = Request::createFromGlobals();
       return $this->json([
           'Host' => $request->headers->get('host'),
           'Full URL' => $request->getSchemeAndHttpHost() . $request->getRequestUri()
       ]);
   }
}