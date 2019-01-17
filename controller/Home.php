<?php

class Home extends Controller {

    public function __construct(){
        $this->load_model('Perpustakaan');   
    }

    public function index(){
        $this->view('dashboard');
    }

    public function login(){
        $this->view('login');
    }

    public function loginAction(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $login = $this->model->login($username, md5($password));
        if (count($login) > 0) {
            Session::set($username);
            $_SESSION['id_user'] = $login[0]['id_pegawai'];
            $_SESSION['pesan'] = 'loginB';
            $_SESSION['img'] = $login[0]['poto'];
            header('Location: http://localhost/Perpustakaan/home');
        }else {
            $_SESSION['namawow'] = $username;
            $_SESSION['pesan'] = 'loginG';
            header('Location: http://localhost/Perpustakaan/home/login');
        }
    }

    public function logout(){
        Session::delete();
        header('Location: http://localhost/Perpustakaan/home/login');
    }
}


?>