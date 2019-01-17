<?php

class Peminjaman extends Controller{
    public function __construct(){
        $this->load_model('Perpustakaan');
    }

    public function index(){
        
        $this->view('peminjaman');
    }

    public function isiSemuaPeminjaman(){
        echo json_encode($this->model->countJumlahPinjam());
    }

    public function tampilDataAnggota(){
        echo json_encode($this->model->selectAnggota($_GET['id'], $_GET['kelas']));
    }

    public function tampilPeminjaman(){
        if (isset($_GET['id'])) {
            echo json_encode($this->model->selectPeminjaman($_GET['id']));
        }
    }

    public function tampilHistoryPeminjaman(){
        if (isset($_GET['id'])) {
            echo json_encode($this->model->selectPeminjamanAll($_GET['id']));
        }
    }

    public function insertPeminjaman(){
        $jumlah = $this->model->JumlahData('perpustakaan_pinjam');
        if ($jumlah < 7000) {
            $max  = $this->model->maxPeminjaman();
            $maxID = $max[0]['max(id_pinjam)'];

            $no_pinjam = (int) substr($maxID, 3, 5);
            $no_pinjam +=1;
            $id = 'PJ-'.sprintf("%05s", $no_pinjam);

            $insert = $this->model->insertPeminjaman($id, $_POST['id_anggota'], $_POST['id_buku'], $_POST['tgl_kembali'] );
            if ($insert) {
                echo 'berhasil';
            }else {
                header('HTTP/1.1 500 Internal Server Error');
            }
        }else{
            echo 'sudahfull';
        }
        
    }

    public function hapusPeminjaman(){
        $hapus = $this->model->hapusPeminjaman($_POST['id']);
        $kurang  = true;
        if($_POST['idStatus'] == 2){
            $kurang = $this->model->kurangStokBuku($_POST['idBuku']);
        }
        if ($hapus && $kurang) {
            echo 'berhasil';
        }else {
            header('HTTP/1.1 500 Internal Server Error');
        }
    }

    public function editStatus(){
        $edit = $this->model->editStatusPeminjaman($_POST['idPinjam'], $_POST['idStatus']);
        if ($_POST['idStatus'] == 2) {
            $kurang = $this->model->tambahStokBuku($_POST['idBuku']);
        }else if($_POST['idStatus'] == 1){
            $kurang = $this->model->kurangStokBuku($_POST['idBuku']);
        }
        
        if ($edit && $kurang) {
            echo 'berhasil';
        }else {
            header('HTTP/1.1 500 Internal Server Error');
        }
    }
}


?>