<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Comment;
use Core\Session;
use Core\View;
use http\Exception;
use http\Params;

class Comments extends Controller
{
    public function insert()
    {
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['comment'])) {
            $comment = $_POST;

            Comment::insert($comment);

            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        else {
            throw new \Exception('Please fill in all the fields');
        }
    }

    public function admin() {
        if(Session::get('loggedIn') == 1) {

            $comments = Comment::getAllComments();

            View::render('admin.php', [
                'comments' => $comments
            ]);
        }
        else {
            header('Location: /');
        }
    }

    public function publish() {

        $id = $this->route_params['id'];

        Comment::publish($id);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
