<?php

class Murid extends Controller {

    public function __construct(){
        $this->load_model('MuridDB');
    }

    public function index(){
        $this->view('input-murid');
    }

    public function jurusan(){
        $this->view('jurusan');
    }

    public function kelas(){
        $this->view('kelas');
    }
    public function agama(){
        $this->view('agama');
    }

    public function penghasilan(){
        $this->view('penghasilan');
    }

    public function pendidikan(){
        $this->view('pendidikan');
    }

    public function tampilAnggota(){
        echo json_encode($this->model->selectAnggota());
    }


    public function tampilSingleData(){
        if (isset($_GET['id'])) {
            $dataMurid = $this->model->selectSingleDataMurid($_GET['id'], $_GET['kelas']);
        }

        echo  json_encode($dataMurid);
    }

    public function tampilDataMuridTabel(){
        echo json_encode($this->model->selectDataMuridTable());
    }

    public function tampilDataMurid(){
        if (isset($_GET['id'])) {
        $data = [];
        $dataMurid = $this->model->selectDataMurid($_GET['id']);

        foreach ($dataMurid as $v){
            extract($v);

            $data[] = [
                "id" => $Id_data_murid,
                "murid" => [
                    "id" => $id_murid,
                    "nama" => $Nama,
                    "nis" => $nis,
                    "nisn" => $nisn,
                    "tempat_lahir" => $tempat_lahir,
                    "tanggal_lahir" => $tanggal_lahir,
                    "nomor_handphone" => $nomor_handphone,
                    "jurusan" => [
                        "id_pivot" => $id_pivot_kelas,
                        "jurusan" => $id_jurusan,
                        "jurusan"=>$nama_jurusan,

                        "kelas" => [
                            "id" => $id_kelas,
                            "grade" => $grade,
                            "jenjang" => $jenjang,
                        ]
                    ],
                    "agama" => [
                        "id_agama" => $id_agama,
                    ],
                    "jenis_kelamin" => [
                        "id_jk" => $Id_jenis_kelamin,
                    ],
                    "foto" => $foto,
                    "berat_badan" => $berat_badan,
                    "tinggi_badan" => $tinggi_badan,
                    "warganegara" => $kewarganegaraan
                ],

                "ibu" => [
                    "id" => $id_ibu,
                    "nama" =>$nama_ibu,
                    "nik" => $ibuNik,
                    "tanggal_lahir"=>$ibutgl,
                    "pekerjaan" =>  $ibuPekerjaan,
                    "nomor_handphone"=>$ibuNH,
                    "pendidikan" => [
                        "id" =>$ibuPend,
                        "nama" => $IbuNamaPend
                    ],
                    "penghasilan" => [
                        "id" =>$ibuPeng,
                        "nama"=>$IbuNamaPeng
                    ],
                ],

                "ayah" => [
                    "id" => $id_ayah,
                    "nama" =>$nama_ayah,
                    "nik" => $AyahNik,
                    "tanggal_lahir"=>$Ayahtgl,
                    "pekerjaan" =>  $AyahPekerjaan,
                    "nomor_handphone"=>$AyahNH,
                    "pendidikan" => [
                        "id" =>$AyahPend,
                        "nama" => $AyahNamaPend
                    ],
                    "penghasilan" => [
                        "id" =>$AyahPeng,
                        "nama"=>$AyahNamaPeng
                    ],
                ],
                "wali" => [
                    "id" => $id_wali,
                    "nama" =>$nama_wali,
                    "nik" => $WaliNik,
                    "tanggal_lahir"=>$Walitgl,
                    "pekerjaan" =>  $WaliPekerjaan,
                    "nomor_handphone"=>$WaliNH,
                    "pendidikan" => [
                        "id" =>$WaliPend,
                        "nama" => $WaliNamaPend
                    ],
                    "penghasilan" => [
                        "id" =>$WaliPeng,
                        "nama"=>$WaliNamaPeng
                    ],
                ],
                "alamat" => [
                    "id" => $id_alamat,
                    "alamat" => $alamat,
                    "kelurahan" => $kelurahan,
                    "kecamatan"=>$kecamatan,
                    "kota"=>$kota,
                    "provinsi"=>$provinsi,
                    "kode_pos"=>$kode_pos
                ]
            ];
        }
        
        echo json_encode($data);   
        }
    }

    public function tampilJenisK(){
        echo json_encode($this->model->selectAll('murid_jeniskelamin'));
    }

    public function tampilAgama(){
        echo json_encode($this->model->selectAll('murid_agama'));
    }

    public function tampilPivotKelas(){
        if (isset($_POST['select'])) {
            echo json_encode($this->model->selectPivotKelas($_POST['select']));
        }
    }

    public function tampilPivotKelasAll(){
        echo json_encode($this->model->selectPivotKelasAll());
    }


    public function tampilJurusan(){
        echo json_encode($this->model->selectAll('jurusan'));
    }

    public function tampilPendidikan(){
        echo json_encode($this->model->selectAll('pendidikan'));
    }

    public function tampilPenghasilan(){
        echo json_encode($this->model->selectAll('penghasilan'));
    }

    public function insertMurid(){
   
        $nis = $_POST['nis'];
        $nisn =  $_POST['nisn'];
        $nama =  $_POST['nama'];
        $idjk =  $_POST['jk'];
        $tmptL = $_POST['tempatL'];
        $tglL =  $_POST['tanggalL'];
        $nmrH =  $_POST['nomorH'];
        $poto = $_FILES['poto']['name'];
        $idAgama = $_POST['agama'];
        $TNgambar = $_FILES['poto']['tmp_name'];
        $beratB =  $_POST['beratB'];
        $tinggiB =  $_POST['tinggiB'];
        $id_kelas = $_POST['Kelas'];
        $kewarganegaraan = $_POST['kewarganegaraan'];

        $tglL = str_replace('/', '-', $tglL);
        $tglL = date('Y-m-d', strtotime($tglL));

        
        //Ibu
        $namaIbu = $_POST['namaIbu'];
        $nikIbu =  $_POST['nikIbu'];
        $tanggalLIbu =  $_POST['tanggalLIbu'];
        $pendidikanIbu =  $_POST['pendidikanIbu'];
        $pekerjaanIbu = $_POST['pekerjaanIbu'];
        $penghasilanIbu =  $_POST['penghasilanIbu'];
        $nomorHIbu =  $_POST['nomorHIbu'];

        $tanggalLIbu = str_replace('/', '-', $tanggalLIbu);
        $tanggalLIbu = date('Y-m-d', strtotime($tanggalLIbu));
        
        //Ayah
        $namaAyah = $_POST['namaAyah'];
        $nikAyah =  $_POST['nikAyah'];
        $tanggalLAyah =  $_POST['tanggalLAyah'];
        $pendidikanAyah =  $_POST['pendidikanAyah'];
        $pekerjaanAyah = $_POST['pekerjaanAyah'];
        $penghasilanAyah =  $_POST['penghasilanAyah'];
        $nomorHAyah =  $_POST['nomorHAyah'];

        $tanggalLAyah = str_replace('/', '-', $tanggalLAyah);
        $tanggalLAyah = date('Y-m-d', strtotime($tanggalLAyah));

        //Wali
        $namaWali = $_POST['namaWali'];
        $nikWali =  $_POST['nikWali'];
        $tanggalLWali =  $_POST['tanggalLWali'];
        $pendidikanWali =  $_POST['pendidikanWali'];
        $pekerjaanWali = $_POST['pekerjaanWali'];
        $penghasilanWali =  $_POST['penghasilanWali'];
        $nomorHWali =  $_POST['nomorHWali'];

        $tanggalLWali = str_replace('/', '-', $tanggalLWali);
        $tanggalLWali = date('Y-m-d', strtotime($tanggalLWali));

        //Alamat
        $Alamat = $_POST['Alamat'];
        $Kelurahan =  $_POST['Kelurahan'];
        $Kecamatan =  $_POST['Kecamatan'];
        $Kota =  $_POST['Kota'];
        $Provinsi = $_POST['Provinsi'];
        $kdPos =  $_POST['kdPos'];
        


        $gambarext = explode(".",$poto);
        $gambarActualExt = strtolower(end($gambarext));
        $gambarNameNew = uniqid('', false).".".$gambarActualExt;
    
        $gambarDestination = "assets/database_image/".$gambarNameNew;
        echo $gambarNameNew;
        $insertMurid = $this->model->insertMurid($nis, $nama, $idjk, $tmptL, $tglL, $nmrH ,$idAgama, $gambarNameNew);
        if ($insertMurid) {
            move_uploaded_file($TNgambar, $gambarDestination);
            echo 'berhasil';
        }else {
            echo 'tidak insert murid';
        }

        $insertIbu = $this->model->insertIbu($namaIbu, $nikIbu, $tanggalLIbu, $pendidikanIbu, $pekerjaanIbu, $penghasilanIbu, $nomorHIbu );

        $insertAyah = $this->model->insertAyah($namaAyah, $nikAyah, $tanggalLAyah, $pendidikanAyah, $pekerjaanAyah, $penghasilanAyah, $nomorHAyah);

        $insertWali = $this->model->insertWali($namaWali, $nikWali, $tanggalLWali, $pendidikanWali, $pekerjaanWali, $penghasilanWali, $nomorHWali );

        $insertAlamat = $this->model->insertAlamat($Alamat, $Kelurahan, $Kecamatan, $Kota, $Provinsi, $kdPos);
    

        if ($insertIbu && $insertAyah && $insertWali) {
            echo 'masuk';   
            $idIbu =  $this->model->maxData('ibu', 'id_ibu');
            $idIbu = $idIbu[0]['max(id_ibu)'];
            echo $idIbu;
            $idAyah = $this->model->maxData('ayah', 'id_ayah');
            $idAyah = $idAyah[0]['max(id_ayah)'];
            $idWali = $this->model->maxData('wali', 'id_wali');
            $idWali = $idWali[0]['max(id_wali)'];

            $insertPivotOrtu = $this->model->insertPivotOrangtua($idAyah, $idIbu, $idWali);
        }else {
            echo 'tidak input data ortu';
        }

        if ($insertPivotOrtu) {
            $id_ortu = $this->model->maxData('data_murid_pivot_orangtua', 'id_pivot_orangtua');
            $id_ortu = $id_ortu[0]['max(id_pivot_orangtua)'];
        }else {
            echo 'tidak input pivot Ortu';
        }

        if ($insertAlamat) {
            $id_alamat = $this->model->maxData('murid_alamat', 'id_alamat');
            $id_alamat = $id_alamat[0]['max(id_alamat)'];
        }else {
            echo 'tidak input alama';
        }

        if ($id_alamat != null && $id_ortu != null) {
            $max = $this->model->maxData('data_murid', 'Id_data_murid');

            $id_murid = $this->model->maxData('murid', 'id_murid');
            $id_murid = $id_murid[0]['max(id_murid)'];

            $maxID = $max[0]['max(Id_data_murid)'];
            $no_data = (int) substr($maxID, 3, 4);
            $no_data = $no_data +1;
            $newID = 'MR-'.sprintf("%04s", $no_data);
            $insertDataMurid = $this->model->insertDataMurid($newID, $id_murid, $id_kelas, $id_ortu, $id_alamat, $nisn, $beratB, $tinggiB, $kewarganegaraan);

            if ($insertDataMurid) {
                $_SESSION['pesan'] = "insertBisa";
                header('Location: http://localhost/Perpustakaan/murid/');
            }else {
                header('HTTP/1.1 500 Internal Server Error');
            }
        }else {
            header('HTTP/1.1 500 Internal Server Error');
        }
    }


    public function insertAgama(){
        $insert = $this->model->insertAgama($_POST['nama']);
        if ($insert) {
            echo 'berhasil';
        }else{
            header('HTTP/1.1 500 Internal Server Error');
        }
    }

    public function insertPenghasilan(){
        $insert = $this->model->insertPenghasilan($_POST['nama']);
        if ($insert) {
            echo 'berhasil';
        }else {
            header('HTTP/1.1 500 Internal Server Erro');
        }
    }    

    public function insertPendidikan(){
        $insert = $this->model->insertPendidikan($_POST['nama']);
        if ($insert) {
            echo 'berhasil';
        }else{
            header('HTTP/1.1 500 Internal Server Error');
        }
    }

    public function insertJurusan(){
        $insert = $this->model->insertJurusan($_POST['nama']);
        if ($insert) {
            echo 'berhasil';
        }else{
            header('HTTP/1.1 500 Internal Server Error');
        }
    }

    public function hapusJurusan(){
        $hapus = $this->model->hapusJurusan($_POST['id']);
        if ($hapus) {
            echo 'berhasil';
        }else{
            header('HTTP/1.1 500 Internal Server Error');
        }
    }

    public function hapusMurid(){
        $delete = $this->model->hapusDataMurid($_POST['id']);
        if ($delete) {
            unlink("assets/database_image/".$_POST['gambar']);
            echo 'berhasil';
        }else {
            header('Http/1.1 500 Internal Server Error');
        }
    }

    public function hapusAgama(){
        $delete  = $this->model->hapusAgama($_POST['id']);
        if ($delete) {
            echo 'berhasil';
        }else {
            header('Http/1.1 500 Internal Server Error');
        }
    }

    public function hapusPendidikan(){
        $delete = $this->model->hapusPendidikan($_POST['id']);
        if ($delete) {
            echo 'berhasil';
        }else {
            header('Http/1.1 500 Internal Server Error');
        }
    }

    public function hapusPenghasilan(){
        $delete  = $this->model->hapusPenghasilan($_POST['id']);
        if ($delete) {
            echo 'berhasil';
        }else {
            header('Http/1.1 500 Internal Server Error');
        }
    }

    public function editMurid(){
        $id = $_POST['id'];
        $nis = $_POST['nis'];
        $nisn =  $_POST['nisn'];
        $nama =  $_POST['nama'];
        $idjk =  $_POST['jk'];
        $tmptL = $_POST['tempatL'];
        $tglL =  $_POST['tanggalL'];
        $nmrH =  $_POST['nomorH'];
        $poto = $_FILES['poto']['name'];
        $idAgama = $_POST['agama'];
        $TNgambar = $_FILES['poto']['tmp_name'];
        $beratB =  $_POST['beratB'];
        $tinggiB =  $_POST['tinggiB'];
        $id_kelas = $_POST['Kelas'];
        $kewarganegaraan = $_POST['kewarganegaraan'];

        $tglL = str_replace('/', '-', $tglL);
        $tglL = date('Y-m-d', strtotime($tglL));

        
        
        //Ibu
        $namaIbu = $_POST['namaIbu'];
        $nikIbu =  $_POST['nikIbu'];
        $tanggalLIbu =  $_POST['tanggalLIbu'];
        $pendidikanIbu =  $_POST['pendidikanIbu'];
        $pekerjaanIbu = $_POST['pekerjaanIbu'];
        $penghasilanIbu =  $_POST['penghasilanIbu'];
        $nomorHIbu =  $_POST['nomorHIbu'];

        $tanggalLIbu = str_replace('/', '-', $tanggalLIbu);
        $tanggalLIbu = date('Y-m-d', strtotime($tanggalLIbu));
        
        //Ayah
        $namaAyah = $_POST['namaAyah'];
        $nikAyah =  $_POST['nikAyah'];
        $tanggalLAyah =  $_POST['tanggalLAyah'];
        $pendidikanAyah =  $_POST['pendidikanAyah'];
        $pekerjaanAyah = $_POST['pekerjaanAyah'];
        $penghasilanAyah =  $_POST['penghasilanAyah'];
        $nomorHAyah =  $_POST['nomorHAyah'];

        $tanggalLAyah = str_replace('/', '-', $tanggalLAyah);
        $tanggalLAyah = date('Y-m-d', strtotime($tanggalLAyah));

        //Wali
        $namaWali = $_POST['namaWali'];
        $nikWali =  $_POST['nikWali'];
        $tanggalLWali =  $_POST['tanggalLWali'];
        $pendidikanWali =  $_POST['pendidikanWali'];
        $pekerjaanWali = $_POST['pekerjaanWali'];
        $penghasilanWali =  $_POST['penghasilanWali'];
        $nomorHWali =  $_POST['nomorHWali'];

        $tanggalLWali = str_replace('/', '-', $tanggalLWali);
        $tanggalLWali = date('Y-m-d', strtotime($tanggalLWali));

        //Alamat
        $Alamat = $_POST['Alamat'];
        $Kelurahan =  $_POST['Kelurahan'];
        $Kecamatan =  $_POST['Kecamatan'];
        $Kota =  $_POST['Kota'];
        $Provinsi = $_POST['Provinsi'];
        $kdPos =  $_POST['kdPos'];

        $gambarext = explode(".",$poto);
        $gambarActualExt = strtolower(end($gambarext));
        $gambarNameNew = uniqid('', false).".".$gambarActualExt;
        $gambarDestination = "assets/database_image/".$gambarNameNew;
        $data = $this->model->selectDataMM($_POST['id']);
        
        if (isset($_POST['ubah_foto'])) {
            if (is_file("assets/database_image/".$data[0]['foto'])) {
                unlink("assets/database_image/".$data[0]['foto']);
            }

            $update = $this->model->editDataMurid($id, $nis, $nisn, $nama, $idjk, $tmptL, $tglL, $nmrH, $gambarNameNew, $idAgama, $beratB, $tinggiB, $id_kelas, $kewarganegaraan, $namaIbu, $nikIbu, $tanggalLIbu, $pendidikanIbu, $penghasilanIbu, $nomorHIbu, $namaAyah, $nikAyah, $tanggalLAyah, $pendidikanAyah, $penghasilanAyah, $nomorHAyah, $namaWali, $nikWali, $tanggalLWali, $pendidikanWali, $penghasilanWali, $nomorHWali, $Alamat, $Kelurahan, $Kecamatan, $Kota, $Provinsi, $kdPos, $pekerjaanIbu, $pekerjaanAyah, $pekerjaanWali);
 
            move_uploaded_file($TNgambar, $gambarDestination);
            
        }else {
            $update = $this->model->editDataMuridNoPict($id, $nis, $nisn, $nama, $idjk, $tmptL, $tglL, $nmrH, $idAgama, $beratB, $tinggiB, $id_kelas, $kewarganegaraan, $namaIbu, $nikIbu, $tanggalLIbu, $pendidikanIbu, $penghasilanIbu, $nomorHIbu, $namaAyah, $nikAyah, $tanggalLAyah, $pendidikanAyah, $penghasilanAyah, $nomorHAyah, $namaWali, $nikWali, $tanggalLWali, $pendidikanWali, $penghasilanWali, $nomorHWali, $Alamat, $Kelurahan, $Kecamatan, $Kota, $Provinsi, $kdPos, $pekerjaanIbu, $pekerjaanAyah, $pekerjaanWali);
        }
        

        if ($update) {
            $_SESSION['pesan'] = 'editbisa';
            header('Location: http://localhost/Perpustakaan/Murid/');
        }else {
            $_SESSION['pesan'] = 'edittdkbisa';
            header('Location: http://localhost/Perpustakaan/Murid/');
        }
    }

    public function editAgama(){
        $edit = $this->model->editAgama($_POST['id'], $_POST['nama']);
        if ($edit) {
            echo 'berhasil';
        }else {
            header('Http/1.1 500 Internal Server Error');
        }
    }

    public function editPendidikan(){
        $edit = $this->model->editPendidikan($_POST['id'], $_POST['nama']);
        if ($edit) {
            echo 'berhasil';
        }else {
            header('Http/1.1 500 Internal Server Error');
        }
    }

    public function editPenghasilan(){
        $edit = $this->model->editPenghasilan($_POST['id'], $_POST['nama']);
        if ($edit) {
            echo 'berhasil';
        }else {
            header('Http/1.1 500 Internal Server Error');
        }
    }

    public function editJurusan(){
        $edit = $this->model->editJurusan($_POST['id'], $_POST['nama']);
        if ($edit) {
            echo 'berhasil';
        }else  {
            header('Http/1.1 500 Internal Server Error');
        }
    }
}


?>