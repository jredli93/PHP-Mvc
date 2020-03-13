<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\Product;
use \Core\View;

class Home extends \Core\Controller
{
    public function index()
    {
        $products = Product::getProducts();
        $comments = Comment::getComments();

        View::render('index.php', [
            'products' => $products,
            'comments' => $comments
        ]);
    }
}
