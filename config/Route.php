<?php

class Route
{
    public function __construct($path)
    {
        self::page($path);
    }

    private function page($path)
    {
        if (class_exists($path[0])) {
            $menu = (empty($path[1])) ? 'index' : $path[1];
            $params = null;
            for ($i = 2; $i < sizeof($path); $i++) {
                if (!empty($path[$i])) $params[] = $path[$i];
                else break;
            }

            $controller = new $path[0];
            if (method_exists($controller, $menu)) $controller->{$menu}($params);
            else return include 'view/404.php';
        } else {
            include 'view/404.php';
        }
    }
}
