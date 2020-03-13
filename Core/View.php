<?php

namespace Core;

class View
{
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = "../App/Views/";

        if (is_readable($file . '/' . $view)) {
            require $file .'/inc/header.php';
            require $file . '/' . $view;
            require $file .'/inc/footer.php';
        } else {
            throw new \Exception("$file not found");
        }
    }
}
