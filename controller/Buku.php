<?php

class Buku extends Controller {
    public function __construct(){
       $this->load_model('Perpustakaan');
    }

    public function index(){
        
        $this->view('buku');
    }

    public function kategori(){
        $this->view('kategori');
    }

    public function waktu(){
        $this->view('waktu');
    }

    public function denda(){
        $this->view('denda');
    }

    public function tampilKategori(){
        echo json_encode($this->model->selectAll('perpustakaan_buku_jenis'));
    }

    public function tampilBuku(){
        $select = $this->model->selectBuku();
        if (isset($_GET['id'])) {
            $select = $this->model->selectSingleBuku($_GET['id']);
        }
        echo json_encode($select);
    }

    public function tampilDenda(){
        echo json_encode($this->model->selectAll('perpustakaan_denda'));
    }

    public function insertPivotKelas(){
        $idKelas = $this->model->insertKelas($_POST['jenjang'], $_POST['grade']);
        if ($idKelas !== null) {
            $insertPivot = $this->model->insertPivot($_POST['jurusan'], $idKelas);
            if ($insertPivot) {
                echo 'berhasil';
            }else {
                header('HTTP/1.1 500 Internal Server Error');
            }
        }else{
            header('HTTP/1.1 500 Internal Server Error');
        }
    }

    public function tampilWaktu(){
        $data = $this->model->selectAll('perpustakaan_waktu');  
        
        $jsonbaru = [];
        foreach($data as $v){
            extract($v);
            $total = $lama_waktu_hari;
            $years = ($total / 365) ;
		    $years = floor($years);
		    $month = ($total % 365) / 30.5;
		    $month = floor($month); 
            $days = ($total % 365) % 30.5;
                      
            $jsonbaru[] = ["id_waktu"=>$id_waktu, "rinciwaktu" => ['tahun' => $years, 'bulan'=> $month, 'hari'=>$days],'lama_waktu_hari' => $lama_waktu_hari] ;
        }
        echo json_encode($jsonbaru);
    }

    public function insertWaktu(){
        $tahun = $_POST['tahun'];
        $bulan = $_POST['bulan'];
        $hari = $_POST['hari'];
        if ($hari <= 3) {
            if ($hari > 0) {
                if ($bulan > 5) {
                    $bulan++;
                }
            }elseif ($hari == 0) {
                $bulan++;
            }
        }
        $jamTahun = $tahun * 365;
        $jamBulan = $bulan * 30;
        $total = $jamTahun+$jamBulan+$hari;

        $insert  = $this->model->insertWaktu($total);
        if ($insert) {
            echo 'berhasil';
        }else {
            header('HTTP/1.1 500 Internal Server Error');
        }

    }

    public function insertKategori(){
        
        $insert = $this->model->insertBukuJenis($_POST['nama']);
        if ($insert) {
            echo 'berhasil';
        }else {
            header('HTTP/1.1 500 Internal Server Error');
        }
    }

    public function insertBuku(){
        $max = $this->model->maxBuku();

        $maxID = $max[0]['max(id_buku)'];
        $no_buku = (int) substr($maxID, 3, 4);
        $no_buku = $no_buku +1;

        $tgl = $_POST['tgl'];
        $date = str_replace('/', '-', $tgl);

        $newID = 'BK-'.sprintf("%04s", $no_buku);

        $insert = $this->model->insertBuku($newID,$_POST['nama'], $_POST['id_kategori'], $_POST['jumlah'], date('Y-m-d', strtotime($date)));
        if ($insert) {
            echo 'berhasil';
        }else {
            header('HTTP/1.1 500 Internal Server Error');
        }
    }


    public function hapusPivotKelas(){
        $hapus = $this->model->hapusPivotKelas($_POST['id']);

        if ($hapus) {
            echo 'berhasil';
        }else{
            header('HTTP/1.1 500 Internal Server Error');
        }
    }
    public function hapusKategori(){
        $hapus = $this->model->hapusKategori($_POST['id']);
        if ($hapus) {
            echo 'berhasil';
        }else {
            header('HTTP/1.1 500 Internal Server Error');
        }   
    }

    public function hapusBuku(){
        $hapus = $this->model->hapusBuku($_POST['id']);
        if ($hapus) {
            echo 'berhasil';
        }else {
            header('HTTP/1.1 500 Internal Server Error');
        }
    }

    public function hapusWaktu(){
        $hapus = $this->model->hapusWaktu($_POST['id']);
        if (!$hapus) {
            header('HTTP/1.1 500 Internal Server Error');
        }
    }

    public function editPivotKelas(){
        $edit = $this->model->editPivotKelas($_POST['id'], $_POST['jurusan'], $_POST['jenjang'], $_POST['grade']);
        
        if ($edit) {
            echo 'berhasil';
        }else{
            header('HTTP/1.1 500 Internal Server Error');
        }
    }

    public function editKategori(){
        $edit = $this->model->editKategori($_POST['id'], $_POST['nama']);
        if ($edit) {
            echo "berhasil";
        } else {
            header('HTTP/1.1 500 Internal Server Error');
        }
    }

    public function editWaktu(){
        $tahun = $_POST['tahun'];
        $bulan = $_POST['bulan'];
        
        $hari = $_POST['hari'];
        if ($hari <= 3) {
            if ($hari > 0) {
                if ($bulan > 5) {
                    $bulan++;
                }
            }elseif ($hari == 0) {
                $bulan++;
            }
        }
        $jamTahun = $tahun * 365;
        $jamBulan = $bulan * 30;
        
        $total = $jamTahun+$jamBulan+$hari;
        $edit= $this->model->editWaktu($total, $_POST['id']);
        if ($edit) {
            echo 'berhasil';
        }else {
            header('HTTP/1.1 500 Internal Server Error');
        }
    }

    public function editBuku(){

        $tgl = $_POST['tgl'];
        $date = str_replace('/', '-', $tgl);

        $edit  = $this->model->editBuku($_POST['nama'], $_POST['id_kategori'], $_POST['jumlahBuku'], $_POST['jumlahPinjam'] , date('Y-m-d', strtotime($date)), $_POST['id']);
        if ($edit) {
            echo "berhasil";
        }else {
            header('HTTP/1.1 500 Internal Server Error');
        }
    }

    public function editDenda(){
        $edit = $this->model->editDenda($_POST['jarak'], $_POST['denda']);
        if ($edit) {
            echo 'berhasil';
        }else{
            header('HTTP/1.1 500 Internal Server Error');
        }
    }
}


?>