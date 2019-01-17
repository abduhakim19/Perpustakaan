<?php

class Laporan extends Controller {

    public function __construct(){
        $this->load_model('Perpustakaan');
    }

    public function index(){
        $this->view('laporan');
    }

    public function tanggal(){
        $this->view('laporan-tanggal');
    }

    public function kelas(){
        $this->view('laporan-kelas');
    }

    public function buku(){
        $this->view('laporan-buku');
    }

    public function exportExcel(){
        $this->view('export/excel');
    }

    public function exportWord(){
        $this->view('export/word');
    }

    public function exportExcelTanggal(){
        $this->view('export/excelTanggal');
    }

    public function exportExcelKelas(){
        $this->view('export/excelKelas');
    }

    public function exportWordKelas(){
        $this->view('export/wordKelas');
    }

    public function exportWordTanggal(){
        $this->view('export/wordTanggal');
    }

    public function exportWordBukuAll(){
        $this->view('export/wordBukuAll');
    }

    public function exportExcelAll(){
        $this->view('export/excelBukuAll');
    }

    public  function exportWordBukKat(){
        $this->view('export/wordBukuKat');
    }

    public function exportExcelBukuKat(){
        $this->view('export/excelBukuKat');
    }

    public function tampilLaporanTanggal(){
        $tglDari = $_GET['dari'];
        $tglSampai = $_GET['sampai'];

        $tglDari = str_replace('/', '-', $tglDari);
        $tglDari = date('Y-m-d', strtotime($tglDari));

        $tglSampai = str_replace('/', '-', $tglSampai);
        $tglSampai = date('Y-m-d', strtotime($tglSampai));
        echo json_encode($this->model->tampilLaporanTanggal($tglDari, $tglSampai));
    }

    public function tampilPeminjamanKelas(){
        if ($_GET['kelas']) {
            echo json_encode($this->model->selectPeminjamanKelas($_GET['kelas']));
        }
    }

}


?>