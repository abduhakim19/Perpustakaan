<?php

class BackUp extends Controller {
    public function __construct(){
        $this->load_model('Perpustakaan');
        if ($_SESSION['user']['role'] == 2) {
            header('Location: http://localhost/Perpustakaan/Error1/');
        }
    }

    public function index(){
        $this->view('backup');
        
    }

    public function print(){
        if($_POST['ya'] === "true"){
            $this->view('export/excelPeminjamanAll');
        }
    }

    public function hapus(){
        echo $_GET['ya'];
        if ($_GET['ya'] === "true") {
            $hapus = $this->model->hapusPeminjamanAll();
            if ($hapus) {
                $_SESSION['pesan'] = 'eksporB';
                header('Location: http://localhost/Perpustakaan/BackUp/');
            }else{
                $_SESSION['pesan'] = 'eksporG';
                header('Location: http://localhost/Perpustakaan/BackUp/');
            }
        }
    }

    public function tampil(){
        $table= "perpustakaan_pinjam";

            $qjoin = 'as a inner join perpustakaan_buku as b on a.id_buku = b.id_buku inner join perpustakaan_pinjam_status as c on a.id_status_pinjam = c.id_status inner join perpustakaan_buku_jenis as d on b.id_jenis = d.id_jenis inner join perpustakaan_anggota as e on e.id_anggota = a.id_anggota inner join data_murid as f on f.Id_data_murid = e.id_data_murid inner join murid as g on f.id_murid = g.id_murid inner join data_murid_pivot_kelas as h on h.id_pivot_kelas = f.id_pivot_kelas inner join kelas on kelas.id_kelas=h.id_kelas inner join jurusan on jurusan.id_jurusan = h.id_jurusan ORDER BY tanggal_pinjam ASC';

            $primary = 'id_pinjam';

            $kolom = [
                ['db' => 'id_pinjam', 'dt'=>'id'],
                ['db' => 'nis', 'dt'=>'nis'],
                ['db' => 'Nama', 'dt'=>'nama'],
                ['db' => 'nama_jenis', 'dt'=>'nama_kategori'],
                ['db' => 'nama_buku', 'dt'=>'nama_buku'],
                ['db' => 'nama_jenis', 'dt'=>'nama_kategori'],
                ['db' => 'tanggal_pinjam', 'dt'=>'tanggal_pinjam'],
                ['db' => 'tanggal_kembali', 'dt'=>'tanggal_kembali'],
                ['db' => 'nama_status', 'dt'=>'status'],
                ['db' => 'jenjang', 'dt'=>'jenjang'],
                ['db' => 'grade', 'dt'=>'grade']

            ];

            $sql_conn = [
                'user' => DB_USER,
                'pass' => DB_PASS,
                'db' => DB_NAME,
                'host' => DB_HOST
            ];

            echo json_encode(SSP::complex(
                $_GET, $sql_conn, $table, $primary, $kolom, null, null, $qjoin
            ));
    }
}


?>