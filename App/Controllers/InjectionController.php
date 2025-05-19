<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\User;
use App\Models\Post;

/**
 * 3. Injection
 */
class InjectionController extends BaseController
{
    protected $menu;
    protected User $users;
    protected Post $posts;
    public function __construct()
    {
        $this->menu = menu();
        $this->users = $this->useModel('user');
        $this->posts = $this->useModel('post');
    }
    public function index()
    {
        $path = '/post?id=' . $_GET['url'];
        return $this->view('layout', [
            'page' => 'injection',
            'menu' => $this->menu,
            'path' => $path

        ]);
    }

    public function post()
    {
        $postId = $_GET['id'];
        if (empty($postId)) {
            $posts = $this->posts->getPostByPublishedAll();
            return $this->view('pages.postNew',[
                'posts' => $posts,
            ]);
        } else {

            $post = $this->posts->getPostById($postId);
            if (empty($post)) {
                return $this->view('pages.404', [
                    'menu' => $this->menu,
                    'message' => 'Bài viết không tồn tại hoặc đã bị xóa.',
                ]);
            }
            return $this->view('pages.post', [
                'post' => $post[0],
            ]);
        }
    }
}
