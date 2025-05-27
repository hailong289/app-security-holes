<?php
namespace App\Controllers;
use App\Core\BaseController;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class Controller extends BaseController
{
    protected User $user;
    protected $menu;

    public function __construct()
    {
        $this->user = $this->useModel('user');
        $this->menu = menu();
    }

    public function index()
    {
        return $this->view('index', [
            'menu' =>  $this->menu
        ]);
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