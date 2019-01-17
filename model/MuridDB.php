<?php

require_once 'model/Koneksi.php';
class MuridDB extends Koneksi {

    public function maxData($table, $field){
        $stmt = $this->conn->prepare("SELECT max($field) from ".$table);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function maxMurid(){
        $stmt = $this->conn->prepare("SELECT max(Id_data_murid) from data_murid");

        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function selectAll($table){
        $stmt = $this->conn->prepare('SELECT * FROM '.$table);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function selectPivotKelas($jurusan){
        $stmt = $this->conn->prepare('SELECT * FROM data_murid_pivot_kelas as d inner join kelas on kelas.id_kelas =  d.id_kelas inner join jurusan on jurusan.id_jurusan = d.id_jurusan WHERE d.id_jurusan = ?');

        $stmt->execute([$jurusan]);

        return $stmt->fetchAll();
    }

    public function selectPivotKelasAll(){
        $stmt = $this->conn->prepare('SELECT * FROM data_murid_pivot_kelas as d inner join kelas on kelas.id_kelas =  d.id_kelas inner join jurusan on jurusan.id_jurusan = d.id_jurusan');

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function selectDataMM($id){
        $stmt = $this->conn->prepare('SELECT * FROM data_murid as d inner join murid as e on e.id_murid =  d.id_murid WHERE d.id_data_murid = ?');

        $stmt->execute([$id]);

        return $stmt->fetchAll();
    }


    public function selectDataMuridTable(){
        $stmt = $this->conn->prepare('SELECT a.Id_data_murid, c.Nama, c.nis, a.nisn, c.foto ,c.tempat_lahir, c.tanggal_lahir, kelas.* , jurusan.* FROM data_murid as a inner join murid as c on c.id_murid = a.id_murid inner join data_murid_pivot_kelas as d on d.id_pivot_kelas = a.id_pivot_kelas inner join kelas on d.id_kelas = kelas.id_kelas inner join jurusan on d.id_jurusan = jurusan.id_jurusan');

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function selectDataMurid($id){
        $stmt = $this->conn->prepare('SELECT ibu.*, ayah.*, wali.*, a.*, b.*, c.*, d.*,jurusan.*, kelas.*, e.*, ibu.nik as ibuNik, ibu.tanggal_lahir as ibutgl, ibu.id_pendidikan as ibuPend, ibu.id_penghasilan as ibuPeng, ibu.pekerjaan as ibuPekerjaan, ibu.nomor_handphone as ibuNH, Ayah.nik as AyahNik, Ayah.tanggal_lahir as Ayahtgl, Ayah.id_pendidikan as AyahPend, Ayah.id_penghasilan as AyahPeng, Ayah.pekerjaan as AyahPekerjaan, Ayah.nomor_handphone as AyahNH, Wali.nik as WaliNik, Wali.tanggal_lahir as Walitgl, Wali.id_pendidikan as WaliPend, Wali.id_penghasilan as WaliPeng, Wali.pekerjaan as WaliPekerjaan, Wali.nomor_handphone as WaliNH,h.nama_penghasilan as WaliNamaPeng, f.nama_penghasilan as IbuNamaPeng, g.nama_penghasilan as AyahNamaPeng, i.nama_pendidikan as IbuNamaPend, j.nama_pendidikan as AyahNamaPend, k.nama_pendidikan as WaliNamaPend FROM data_murid as a inner join murid_alamat as b on a.id_alamat = b.id_alamat inner join murid as c on c.id_murid = a.id_murid inner join data_murid_pivot_kelas as d on d.id_pivot_kelas = a.id_pivot_kelas inner join kelas on d.id_kelas = kelas.id_kelas inner join jurusan on d.id_jurusan = jurusan.id_jurusan inner join data_murid_pivot_orangtua as e on a.id_pivot_orangtua = e.id_pivot_orangtua inner join ayah on e.id_ayah = ayah.id_ayah inner join ibu on e.id_ibu = ibu.id_ibu inner join wali on e.id_wali = wali.id_wali inner join penghasilan as f on ibu.id_penghasilan = f.id_penghasilan inner join penghasilan as g on ayah.id_penghasilan = g.id_penghasilan inner join penghasilan as h on wali.id_penghasilan = h.id_penghasilan inner join pendidikan as i on ibu.id_pendidikan = i.id_pendidikan inner join pendidikan as j on ayah.id_pendidikan = j.id_pendidikan inner join pendidikan as k on wali.id_pendidikan = k.id_pendidikan WHERE Id_data_murid =  ?');

        $stmt->execute([$id]);

        return $stmt->fetchAll();
    }

    public function selectDataMuridww(){
        $stmt = $this->conn->prepare('SELECT a.*, b.*, c.*, d.*,jurusan.*, kelas.* FROM data_murid as a inner join murid_alamat as b on a.id_alamat = b.id_alamat inner join murid as c on c.id_murid = a.id_murid inner join data_murid_pivot_kelas as d on d.id_pivot_kelas = a.id_pivot_kelas inner join kelas on d.id_kelas = kelas.id_kelas inner join jurusan on d.id_jurusan = jurusan.id_jurusan');

        $stmt->execute();

        return $stmt->fetchAll();
    }


    public function selectSingleDataMurid($id, $kelas){
        $stmt = $this->conn->prepare('SELECT * FROM data_murid as a inner join murid as c on c.id_murid = a.id_murid inner join data_murid_pivot_kelas as d on d.id_pivot_kelas = a.id_pivot_kelas inner join kelas on d.id_kelas = kelas.id_kelas inner join jurusan on d.id_jurusan = jurusan.id_jurusan WHERE c.Nama LIKE ? AND  a.id_pivot_kelas = ? LIMIT 6');

        $stmt->execute(['%'.$id.'%', $kelas]);

        return $stmt->fetchAll();
    }

    public function selectAnggota(){
        $stmt = $this->conn->prepare('SELECT * FROM perpustakaan_anggota as z inner join data_murid as a on z.id_data_murid = a.Id_data_murid inner join murid as c on c.id_murid = a.id_murid inner join data_murid_pivot_kelas as d on d.id_pivot_kelas = a.id_pivot_kelas inner join kelas on d.id_kelas = kelas.id_kelas inner join jurusan on d.id_jurusan = jurusan.id_jurusan inner join murid_agama as e on e.id_agama = c.id_agama inner join murid_jeniskelamin as f on f.id_jenis_kelamin = c.Id_jenis_kelamin ');

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function insertMurid($nis, $nama, $idK,$tmptL, $tglL, $nomor, $idA, $poto){
        $stmt = $this->conn->prepare('INSERT INTO murid(nis, nama, id_jenis_kelamin, tempat_lahir, tanggal_lahir, nomor_handphone, id_agama, foto) VALUES (:nis, :nama, :id_kelamin,:tempat_lahir, :tanggal_lahir, :nomor, :id_agama, :foto)');

        $cek = $stmt->execute(['nis' => $nis, 'nama'=>$nama, 'id_kelamin'=> $idK, 'nomor'=>$nomor, 'id_agama'=>$idA, 'foto'=>$poto, 'tempat_lahir'=>$tmptL, 'tanggal_lahir'=>$tglL]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function insertAlamat($alamat, $kelurahan, $kecamatan, $kota, $provinsi, $kdpos){
        $stmt = $this->conn->prepare('INSERT INTO murid_alamat (alamat, kelurahan, kecamatan, kota, provinsi, kode_pos) VALUES(:alamat, :kelurahan, :kecamatan, :kota, :provinsi, :kdpos)');


        $cek = $stmt->execute(['alamat'=>$alamat, 'kelurahan'=>$kelurahan, 'kecamatan'=>$kecamatan, 'kota'=>$kota, 'provinsi'=>$provinsi, 'kdpos'=>$kdpos]);

        if ($cek) {
            return true;
        }
        return false;

    }

    public function insertIbu($nama, $nik, $tgl, $idpend, $pekerjaan, $idpeng, $nomor){
        
        $stmt = $this->conn->prepare("INSERT INTO ibu (nama_ibu, nik, tanggal_lahir, id_pendidikan, pekerjaan, id_penghasilan, nomor_handphone) VALUES(:nama, :nik, :tgl, :idpend, :peker, :id_peng, :nmr)");

        $cek = $stmt->execute(['nama'=>$nama, 'nik'=>$nik, 'tgl'=>$tgl, 'idpend'=>$idpend, 'peker'=>$pekerjaan, 'id_peng'=>$idpeng, 'nmr'=>$nomor]);

        if ($cek) {
            return true;
        }
        return false;

    }

    public function insertAyah($nama, $nik, $tgl, $idpend, $pekerjaan, $idpeng, $nomor){
        $stmt = $this->conn->prepare("INSERT INTO ayah (nama_ayah, nik, tanggal_lahir, id_pendidikan, pekerjaan, id_penghasilan, nomor_handphone) VALUES(:nama, :nik, :tgl, :idpend, :peker, :id_peng, :nmr)");

        $cek = $stmt->execute(['nama'=>$nama, 'nik'=>$nik, 'tgl'=>$tgl, 'idpend'=>$idpend, 'peker'=>$pekerjaan, 'id_peng'=>$idpeng, 'nmr'=>$nomor]);

        if ($cek) {
            return true;
        }
        return false;
    }

    public function insertWali($nama, $nik, $tgl, $idpend, $pekerjaan, $idpeng, $nomor){
        $stmt = $this->conn->prepare("INSERT INTO wali (nama_wali, nik, tanggal_lahir, id_pendidikan, pekerjaan, id_penghasilan, nomor_handphone) VALUES(:nama, :nik, :tgl, :idpend, :peker, :id_peng, :nmr)");

        $cek = $stmt->execute(['nama'=>$nama, 'nik'=>$nik, 'tgl'=>$tgl, 'idpend'=>$idpend, 'peker'=>$pekerjaan, 'id_peng'=>$idpeng, 'nmr'=>$nomor]);

        if ($cek) {
            return true;
        }
        return false;
    }

    public function insertPivotOrangtua($id_ayah, $id_ibu, $id_wali){
        $stmt = $this->conn->prepare('INSERT INTO data_murid_pivot_orangtua(id_ayah, id_ibu, id_wali) VALUES(:id_ayah, :id_ibu, :id_wali)');

        $cek = $stmt->execute(['id_ayah'=>$id_ayah, 'id_ibu'=>$id_ibu, 'id_wali'=>$id_wali]);

        if ($cek) {
            return true;
        }
        return false;
    }

    public function insertDataMurid($iddata, $idm, $idk, $ido, $ida, $nisn, $bb, $tb, $warga){
        $stmt = $this->conn->prepare('INSERT INTO data_murid(id_data_murid, id_murid, id_pivot_kelas, id_pivot_orangtua, id_alamat, nisn, berat_badan, tinggi_badan, kewarganegaraan) VALUES(:id_data, :id_murid, :id_kelas, :id_ortu, :id_alamat, :nisn, :berat_badan, :tinggi_badan, :warga)');

        $cek = $stmt->execute(['id_data'=>$iddata, 'id_murid'=>$idm, 'id_kelas'=>$idk, 'id_ortu'=>$ido, 'id_alamat'=>$ida, 'nisn'=>$nisn, 'berat_badan'=>$bb, 'tinggi_badan'=>$tb, 'warga'=>$warga]);

        if ($cek) {
            return true;
        }

        return false;
    }

    public function insertAgama($nama){
        $stmt = $this->conn->prepare('INSERT INTO murid_agama(nama_agama) VALUES( ? )');

        $cek = $stmt->execute([$nama]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function insertPenghasilan($nama){
        $stmt = $this->conn->prepare('INSERT INTO penghasilan(nama_penghasilan) VALUES( ? )');

        $cek = $stmt->execute([$nama]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function insertPendidikan($nama){
        $stmt = $this->conn->prepare('INSERT INTO pendidikan(nama_pendidikan) VALUES( ? )');

        $cek = $stmt->execute([$nama]);
        if ($cek) {
            return true;       
        }
        return false;
    }

    public function insertJurusan($nama){
        $stmt = $this->conn->prepare('INSERT INTO jurusan(nama_jurusan) VALUES( ? )');

        $cek = $stmt->execute([$nama]);
        if($cek){
            return true;
        }
        return false;
    }

    public function hapusDataMurid($id){
        $stmt = $this->conn->prepare('DELETE a, b,c, e, ibu, wali, ayah FROM data_murid as a inner join murid_alamat as b on a.id_alamat = b.id_alamat inner join murid as c on c.id_murid = a.id_murid inner join data_murid_pivot_orangtua as e on a.id_pivot_orangtua = e.id_pivot_orangtua inner join ayah on e.id_ayah = ayah.id_ayah inner join ibu on e.id_ibu = ibu.id_ibu inner join wali on e.id_wali = wali.id_wali WHERE a.Id_data_murid = ?');

        $cek = $stmt->execute([$id]);

        if($cek){
            return true;
        }
        return false;
    }

    public function hapusAgama($id){
        $stmt = $this->conn->prepare('DELETE FROM murid_agama WHERE id_agama = ?');

        $cek = $stmt->execute([$id]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function hapusPendidikan($id){
        $stmt = $this->conn->prepare('DELETE FROM pendidikan WHERE id_pendidikan = ?');

        $cek = $stmt->execute([$id]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function hapusPenghasilan($id){
        $stmt = $this->conn->prepare('DELETE FROM penghasilan WHERE id_penghasilan = ?');

        $cek = $stmt->execute([$id]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function hapusJurusan($id){
        $stmt = $this->conn->prepare('DELETE FROM jurusan WHERE id_jurusan  = ?');
        $cek = $stmt->execute([$id]);

        if ($id) {
            return true;
        }
        return false;
    }

    public function editAgama($id, $nama){
        $stmt = $this->conn->prepare('UPDATE murid_agama SET nama_agama = ? WHERE id_agama = ?');

        $cek = $stmt->execute([$nama, $id]);

        if ($cek) {
            return true;
        }
        return false;
    }

    public  function editPendidikan($id, $nama){
        $stmt = $this->conn->prepare('UPDATE pendidikan SET nama_pendidikan  = ? WHERE id_pendidikan = ?');

        $cek = $stmt->execute([$nama, $id]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function editPenghasilan($id, $nama){
        $stmt = $this->conn->prepare('UPDATE penghasilan SET nama_penghasilan = ? WHERE id_penghasilan = ?');

        $cek = $stmt->execute([$nama, $id]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function editDataMurid($id, $nis, $nisn, $nama, $idjk, $tmptL, $tglL, $nmrH, $poto, $idAgama, $beratB, $tinggiB, $id_kelas, $kewarganegaraan, $namaIbu, $nikIbu, $tanggalLIbu, $pendidikanIbu, $penghasilanIbu, $nomorHIbu, $namaAyah, $nikAyah, $tanggalLAyah, $pendidikanAyah, $penghasilanAyah, $nomorHAyah, $namaWali, $nikWali, $tanggalLWali, $pendidikanWali, $penghasilanWali, $nomorHWali, $Alamat, $Kelurahan, $Kecamatan, $Kota, $Provinsi, $KdPos, $pekerjaanIbu, $pekerjaanAyah, $pekerjaanWali){
        $stmt = $this->conn->prepare('UPDATE data_murid as a inner join murid_alamat as b on a.id_alamat = b.id_alamat inner join murid as c on c.id_murid = a.id_murid inner join data_murid_pivot_orangtua as e on a.id_pivot_orangtua = e.id_pivot_orangtua inner join ayah on e.id_ayah = ayah.id_ayah inner join ibu on e.id_ibu = ibu.id_ibu inner join wali on e.id_wali = wali.id_wali SET 
        
        a.nisn = :nisn , a.id_pivot_kelas = :idKelas , a.berat_badan = :berat_badan , a.tinggi_badan = :tinggi_badan , 
         
        b.alamat = :alamat , b.kelurahan = :kelurahan , b.kecamatan = :kecamatan , b.kota = :kota , b.provinsi = :provinsi , b.kode_pos = :kdPos , 
        
        c.nis = :nis , c.Nama = :nama , c.Id_jenis_kelamin = :idjk, c.tempat_lahir = :tmptL , c.tanggal_lahir = :tglL , c.nomor_handphone = :nmrH , c.id_agama = :idAgama , c.foto= :foto , 
        
        ibu.nama_ibu = :namaIbu , ibu.nik = :nikIbu , ibu.tanggal_lahir = :tglIbu , ibu.id_pendidikan = :idPendIbu, ibu.pekerjaan = :pekerIbu , ibu.id_penghasilan = :pengIbu, ibu.nomor_handphone = :nmrIbu, 
        
        ayah.nama_ayah = :namaAyah , ayah.nik = :nikAyah , ayah.tanggal_lahir = :tglAyah , ayah.id_pendidikan = :idPendAyah, ayah.pekerjaan = :pekerAyah , ayah.id_penghasilan = :pengAyah , ayah.nomor_handphone = :nmrAyah , 
        
        wali.nama_wali = :namaWali , wali.nik = :nikWali , wali.tanggal_lahir = :tglWali , wali.id_pendidikan = :idPendWali , wali.pekerjaan = :pekerWali , wali.id_penghasilan = :pengWali , wali.nomor_handphone = :nmrWali 
        
        WHERE a.Id_data_murid = :idDataMurid');

        $cek = $stmt->execute(['idDataMurid'=>$id,'nisn' =>$nisn, 'idKelas'=>$id_kelas, 'nis'=>$nis, 'berat_badan'=>$beratB, 'tinggi_badan'=>$tinggiB, 'alamat' => $Alamat, 'kelurahan'=>$Kelurahan, 'kecamatan'=>$Kecamatan, 'kota'=>$Kota, 'provinsi'=>$Provinsi, 'kdPos'=>$KdPos, 'nama' =>$nama, 'idjk'=>$idjk, 'tmptL'=>$tmptL, 'tglL' =>$tglL, 'nmrH'=>$nmrH, 'idAgama'=>$idAgama, 'foto'=>$poto, 'namaIbu'=>$namaIbu, 'nikIbu'=>$nikIbu, 'tglIbu'=>$tanggalLIbu, 'idPendIbu'=>$pendidikanIbu, 'pekerIbu'=>$pekerjaanIbu, 'pengIbu'=>$penghasilanIbu, 'nmrIbu'=>$nomorHIbu, 'namaAyah'=>$namaAyah, 'nikAyah'=>$nikAyah, 'tglAyah'=>$tanggalLAyah, 'idPendAyah'=>$pendidikanAyah, 'pekerAyah'=>$pekerjaanAyah, 'pengAyah'=>$penghasilanAyah,'nmrAyah'=>$nomorHAyah, 'namaWali'=>$namaWali, 'nikWali'=>$nikWali, 'tglWali'=>$tanggalLWali, 'idPendWali'=>$pendidikanWali, 'pekerWali'=>$pekerjaanWali, 'pengWali'=>$penghasilanWali, 'nmrWali'=>$nomorHWali]);


        if ($cek) {
            return true;
        }
        return false;
    }

    public function editDataMuridNoPict($id, $nis, $nisn, $nama, $idjk, $tmptL, $tglL, $nmrH, $idAgama, $beratB, $tinggiB, $id_kelas, $kewarganegaraan, $namaIbu, $nikIbu, $tanggalLIbu, $pendidikanIbu, $penghasilanIbu, $nomorHIbu, $namaAyah, $nikAyah, $tanggalLAyah, $pendidikanAyah, $penghasilanAyah, $nomorHAyah, $namaWali, $nikWali, $tanggalLWali, $pendidikanWali, $penghasilanWali, $nomorHWali, $Alamat, $Kelurahan, $Kecamatan, $Kota, $Provinsi, $KdPos, $pekerjaanIbu, $pekerjaanAyah, $pekerjaanWali){


        $stmt = $this->conn->prepare("UPDATE data_murid as a inner join murid_alamat as b on a.id_alamat = b.id_alamat inner join murid as c on c.id_murid = a.id_murid inner join data_murid_pivot_orangtua as e on a.id_pivot_orangtua = e.id_pivot_orangtua inner join ayah on e.id_ayah = ayah.id_ayah inner join ibu on e.id_ibu = ibu.id_ibu inner join wali on e.id_wali = wali.id_wali SET  
         
        a.nisn = :nisn , a.id_pivot_kelas = :idKelas , a.berat_badan = :berat_badan , a.tinggi_badan = :tinggi_badan , 


        b.alamat = :alamat, b.kelurahan = :kelurahan , b.kecamatan = :kecamatan , b.kota = :kota , b.provinsi = :provinsi , b.kode_pos = :kdPos , 

        c.nis = :nis , c.Nama = :nama , c.Id_jenis_kelamin = :idjk , c.tempat_lahir = :tmptL , c.tanggal_lahir = :tglL, c.nomor_handphone = :nmrH , c.id_agama = :idAgama , 
 
        
        ibu.nama_ibu = :namaIbu , ibu.nik = :nikIbu , ibu.tanggal_lahir = :tglIbu , ibu.id_pendidikan = :idPendIbu , ibu.pekerjaan = :pekerIbu , ibu.id_penghasilan = :pengIbu, ibu.nomor_handphone = :nmrIbu,

        ayah.nama_ayah = :namaAyah , ayah.nik = :nikAyah , ayah.tanggal_lahir = :tglAyah , ayah.id_pendidikan = :idPendAyah, ayah.pekerjaan = :pekerAyah , ayah.id_penghasilan = :pengAyah , ayah.nomor_handphone = :nmrAyah , 

        wali.nama_wali =  :namaWali, wali.nik = :nikWali , wali.tanggal_lahir = :tglWali , wali.id_pendidikan = :idPendAyah , wali.pekerjaan = :pekerWali , wali.id_penghasilan = :pengWali , wali.nomor_handphone =  :nmrWali
        
        WHERE a.Id_data_murid = :idDataMurid");

        $cek = $stmt->execute(['idDataMurid'=>$id,'nisn' =>$nisn, 'idKelas'=>$id_kelas, 'nis'=>$nis, 'berat_badan'=>$beratB, 'tinggi_badan'=>$tinggiB, 'alamat' => $Alamat, 'kelurahan'=>$Kelurahan, 'kecamatan'=>$Kecamatan, 'kota'=>$Kota, 'provinsi'=>$Provinsi, 'kdPos'=>$KdPos, 'nama' =>$nama, 'idjk'=>$idjk, 'tmptL'=>$tmptL, 'tglL' =>$tglL, 'nmrH'=>$nmrH, 'idAgama'=>$idAgama, 'namaIbu'=>$namaIbu, 'nikIbu'=>$nikIbu, 'tglIbu'=>$tanggalLIbu, 'idPendIbu'=>$pendidikanIbu, 'pekerIbu'=>$pekerjaanIbu, 'pengIbu'=>$penghasilanIbu, 'nmrIbu'=>$nomorHIbu, 'namaAyah'=>$namaAyah, 'nikAyah'=>$nikAyah, 'tglAyah'=>$tanggalLAyah, 'idPendAyah'=>$pendidikanAyah, 'pekerAyah'=>$pekerjaanAyah, 'pengAyah'=>$penghasilanAyah,'nmrAyah'=>$nomorHAyah, 'namaWali'=>$namaWali, 'nikWali'=>$nikWali, 'tglWali'=>$tanggalLWali, 'idPendWali'=>$pendidikanWali, 'pekerWali'=>$pekerjaanWali, 'pengWali'=>$penghasilanWali, 'nmrWali'=>$nomorHWali]);


        if ($cek) {
            return true;
        }
        return false;
    }

    public function editJurusan($id, $nama){
        $stmt = $this->conn->prepare('UPDATE jurusan SET nama_jurusan = ? WHERE id_jurusan = ?');

        $cek = $stmt->execute([$nama, $id]);

        if ($cek) {
            return true;
        }
        return false;
    }
}


?>