<?php

class Pegawai extends Controller {
    public function __construct(){
        $this->load_model('Perpustakaan');
        if ($_SESSION['user']['role'] == 2) {
            header('Location: http://localhost/Perpustakaan/Error1/');
        }
    }

    public function index(){
        $this->view('pegawai');
    }

    public function tampilPegawai(){
        echo json_encode($this->model->selectAll('perpustakaan_pegawai'));
    }


    public function insertPegawai(){
        $max = $this->model->maxPegawai();
        $id_pegawai = $max[0]['max(id_pegawai)'];
        $no_data = (int)substr($id_pegawai, 3, 3);
        $no_data++;
        $id = 'PG-'.sprintf('%03s', $no_data);

        $namaGambar = $_FILES['gambar']['name'];
        $tnGambar = $_FILES['gambar']['tmp_name'];

        $gambarExt = explode(".",$namaGambar);
        $gambarActualExt = strtolower(end($gambarExt));
        $namaGambar = uniqid('', false).".".$gambarActualExt;
        $gambarDestinasi = 'assets/image_admin/'.$namaGambar;


        $insert = $this->model->insertPegawai($id, $_POST['nama'], $_POST['email'], $_POST['nomor'], $_POST['username'], md5($_POST['password']), $namaGambar, $_POST['role']);
        if ($insert) {
            move_uploaded_file( $tnGambar, $gambarDestinasi);
            echo 'berhasil';
        }else{
            header('HTTP/1.1 500 Internal Server Error');
        }
    }

    public function hapusPegawai(){
        $cariG = $this->model->singlePegawai($_POST['id']);
        if (count($cariG) > 0) {
            if (file_exists("assets/image_admin/".$cariG[0]['poto'])) {
                unlink("assets/image_admin/".$cariG[0]['poto']);
            }else {
                header('HTTP/1.1 500 Internal Server Error');
            }
        }
        $delete = $this->model->hapusPegawai($_POST['id']);
        if ($delete) {
            echo 'berhasil';
            if ($_SESSION['id'] === $_POST['id']) {
                Session::delete();
                header('Location: http://localhost/Perpustakaan/home/login');
            }
        }else {
            header('HTTP/1.1 500 Internal Server Error');
        }
    }

    public function editPegawai(){
        if ($_POST['checkbox'] === "true") {
            $cariG = $this->model->singlePegawai($_POST['id']);
            if (count($cariG) > 0) {
                if (file_exists("assets/image_admin/".$cariG[0]['poto'])) {
                    unlink("assets/image_admin/".$cariG[0]['poto']);
                }else {
                    header('HTTP/1.1 500 Internal Server Error');
                }
                $namaGambar = $_FILES['gambar']['name'];
                $tnGambar = $_FILES['gambar']['tmp_name'];

                $gambarext = explode(".", $namaGambar);
                $gambarActualExt = strtolower(end($gambarext));
                $namaGambar = uniqid('', false).".".$gambarActualExt;
                $gambarDestinasi = 'assets/image_admin/'.$namaGambar;
            
                $edit = $this->model->editPegawaiG($_POST['id'], $_POST['nama'], $_POST['email'], $_POST['nomor'], $_POST['username'], $namaGambar);
            }else{
                header('HTTP/1.1 500 Internal Server Error');
            }
        }else {
            $edit = $this->model->editPegawai($_POST['id'], $_POST['nama'], $_POST['email'], $_POST['nomor'], $_POST['username']);
        }
        if ($edit) {
            if ($_SESSION['user']['id'] === $_POST['id']) Session::set($_POST['username']);
                
            if (isset($namaGambar)) {
                move_uploaded_file($tnGambar, $gambarDestinasi);
                if ($_SESSION['user']['id'] === $_POST['id']) {
                    $_SESSION['user']['img'] = $namaGambar;
                    $gambar = $namaGambar;
                }
            }
            $selesai = ['echo'=>'selesai', "gambar" => (isset($gambar)) ? $gambar : null];
            echo json_encode($selesai);

        }else {
            header('HTTP/1.1 500 Internal Server Error');
        }
    }

    public function editPassword(){
        $edit = $this->model->editPasswordPegawai($_POST['id'], md5($_POST['password']));

        if ($edit) {
            echo 'berhasil';
        }else{
            header('HTTP/1.1 500 Internal Server Erro');
        }
    }
}


?>