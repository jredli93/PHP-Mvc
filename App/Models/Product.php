<?php

namespace App\Models;

use Core\Model;
use PDO;
use PDOException;

class Product extends Model {

    public static function getProducts() {
        try {
            $db = static::getDB();

            $stmt = $db->query('SELECT image, title, description FROM products');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}