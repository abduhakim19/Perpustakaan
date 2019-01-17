<?php

class Controller {
    public $model;
    public function load_model($model){
        if (file_exists('model/'.$model.'.php')) {
            require_once 'model/'.$model.'.php';
            if (class_exists($model)) {
                $this->model = new $model;
            }
        }
    }

    public function view($view){
        require_once 'view/'.$view.'.php';
    }

    public function layout($view){
        require_once 'view/layout/'. $view .'.php';
    }

    public function content($view){
        require_once 'view/content/'.$view.'.php';
    }
}


?>