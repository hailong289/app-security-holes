<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

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
        $this->comment = $this->useModel('comment');

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

            return $this->view('pages.postNew', [
                'posts' => $posts,

            ]);
        } else {

            $post = $this->posts->getPostByIdPublish($postId);
            if (empty($post)) {
                return $this->view('pages.404', [
                    'menu' => $this->menu,
                    'message' => 'Bài viết không tồn tại hoặc đã bị xóa.',
                ]);
            }
            $comments = $this->comment->getCommentByPostId($postId);
            return $this->view('pages.post', [
                'post' => $post[0],
                'comments' => $comments,

            ]);
        }
    }

    public function commentNew()
    {
        $postId = $_POST['post_id'];
        $userId = $_POST['user_id'];
        $content = $_POST['content'];
        if (empty($postId) || empty($userId) || empty($content)) {
            return $this->redirect('/post?id=' . $postId);
        }
        $this->comment->addCommentByPostId($postId, $userId, $content);
        return $this->redirect('/post?id=' . $postId);
    }

    public function commentDelete()
    {
        $commentId = $_POST['comment_id'];
        $postId = $_POST['post_id'];
        $userId = $_POST['user_id'];
        if (empty($commentId) || empty($postId)) {
            return $this->redirect('/post?id=' . $postId);
        }
        $this->comment->deleteCommentById($commentId, $postId, $userId);
        return $this->redirect('/post?id=' . $postId);
    }

}
