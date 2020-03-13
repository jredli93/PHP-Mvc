<?php

namespace App\Controllers;

use App\Models\User;
use Core\Controller;
use Core\View;

class Users extends Controller {

    public function login() {
        User::login();
    }

    public function logout() {
        User::destroy();

        header('Location: /');
    }
}
