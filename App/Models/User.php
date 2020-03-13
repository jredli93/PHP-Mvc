<?php

namespace App\Models;

use Core\Model;
use Core\Session;
use PDO;
use PDOException;

class User extends Model {

    public static function login() {
        $username= isset($_POST['username']) ? $_POST['username'] : '';
        $pass = isset($_POST['password']) ? $_POST['password'] : '';


        try {
            $db = static::getDB();

            $pass = md5($pass);

            $stmt = $db->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':password', $pass);

            $stmt->execute();

            $admin = $stmt->fetchAll();
            $check = $stmt->rowCount();

            if ($check > 0 && $admin[0]['username'] == 'admin') {
                Session::set('loggedIn', true);
                Session::set('username', $admin[0]['username']);

                header('location: admin');
            } else {
                echo 'Error logging you in';
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public static function destroy() {
        session_destroy();
    }
}