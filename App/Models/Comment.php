<?php

namespace App\Models;

use Core\Model;
use PDO;
use PDOException;

class Comment extends Model {

    public static function getComments() {
        try {
            $db = static::getDB();

            $stmt = $db->query('SELECT author, email, comment FROM comments WHERE published = 1');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getAllComments() {
        try {
            $db = static::getDB();

            $stmt = $db->query('SELECT * FROM comments');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function insert($comment) {
        try {
            $db = static::getDB();

            $stmt = $db->prepare('INSERT INTO comments (author, email, comment) VALUES (:author, :email, :comment)');

            $stmt->bindParam(':author', $comment['name']);
            $stmt->bindParam(':email', $comment['email']);
            $stmt->bindParam(':comment', $comment['comment']);

            return $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function publish($id) {
        try {
            $db = static::getDB();

            $stmt = $db->prepare('UPDATE comments 
                SET published = CASE  
                    WHEN published = 0 THEN 1
                    WHEN published = 1 THEN 0
                    ELSE published
                END
                WHERE id = :id');

            $stmt->bindParam(':id',  $id);

            return $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}