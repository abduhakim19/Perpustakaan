<?php

    class Session {
        public static function exists(){
            return (isset($_SESSION['username']))? true : false;
        }

        public function get(){
            return $_SESSION['username'];
        }

        public static function set($name){
            $_SESSION['username'] = $name;
        }

        public static function delete(){
            session_destroy();
        }
    }

?>