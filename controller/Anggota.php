<?php

class Anggota extends Controller {
    public function __construct(){
        $this->load_model('Perpustakaan');
    }

    public function index(){
        
        $this->view('anggota');
    }

    

    public function insertAnggota(){
        if (isset($_POST['id_data_murid'])) {
            $max = $this->model->maxAnggota();
    

            $maxID = $max[0]['max(id_anggota)'];
            $no_data = (int) substr($maxID, 4, 4);

            $no_data = $no_data + 1;
            $newID = 'Ang-'.sprintf("%04s", $no_data);

            $insert = $this->model->insertAnggota($newID, $_POST['id_data_murid']);
            if ($insert) {
                echo 'berhasil';
            }else {
                header('Http/1.1 500 Internal Server Error');
            }
        }
    }

    public function hapusAnggota(){
        if (isset($_POST['id'])) {
            
            $delete = $this->model->hapusAnggota($_POST['id']);
            var_dump($delete);
            if ($delete) {
                echo 'berhasil';
            }else {
                header('Http/1.1 500 Internal Server Error');
            }
        }else {
            header('Http/1.1 500 Internal Server Error');
        }
    }
}


?>