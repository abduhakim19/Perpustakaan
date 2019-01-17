<?php

class Router {
    public static function route($url) {
        $controller = (isset($url[0])) ? $url[0] : 'home';
        array_shift($url);

        $method = (isset($url[0])) ? $url[0] : 'index';
        array_shift($url);

        if(!Session::exists()) {
            if($method == 'loginAction'){
                echo 'wow';
            }else if ( $method !== 'login') {
                header('Location: http://localhost/Perpustakaan/home/login');
            }
        }
        if (file_exists('controller/'.$controller.'.php')) {
            require_once 'controller/'.$controller.'.php';
            if (method_exists($controller, $method) && is_callable([$controller, $method])) {
                $dispatch = new $controller($controller, $method);
                call_user_func([$dispatch, $method], []);
            }else if ($method == '') {
                $dispatch = new $controller($controller, 'index');
                call_user_func([$dispatch, 'index']);
            }else {
            $dispatch = new Error1('Error1', 'index');
            call_user_func([$dispatch, 'index']);
            }
        }else {
            $dispatch = new Error1('Error1', 'index');
            call_user_func([$dispatch, 'index']);
        } 
    }

}



?>