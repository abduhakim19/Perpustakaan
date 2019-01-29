<?php

require_once 'model/Koneksi.php';

class Perpustakaan extends Koneksi {

    public  function login($user, $pw){
        $stmt = $this->conn->prepare('SELECT * FROM perpustakaan_pegawai WHERE username  = ? AND password  = ?');

        $stmt->execute([$user, $pw]);
        return $stmt->fetchAll();
    }
    public function JumlahData($table){
        $stmt = $this->conn->prepare('SELECT * FROM '.$table);

        $stmt->execute();
        return $stmt->rowCount();
    }

    public function singlePegawai($id){
        $stmt = $this->conn->prepare('SELECT poto from perpustakaan_pegawai WHERE id_pegawai = ? ');

        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    public function selectAll($table){
        $stmt = $this->conn->prepare('SELECT * FROM '.$table);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function countJumlahPinjam(){
        $stmt = $this->conn->prepare('select tanggal_pinjam, id_anggota, count(id_pinjam) as jumlah from perpustakaan_pinjam GROUP BY DATE_FORMAT(tanggal_pinjam, "%Y%m")');

        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function jumlahBukuKategori($id){
        $stmt = $this->conn->prepare('SELECT * FROM perpustakaan_buku WHERE id_jenis= ?');

        $stmt->execute([$id]);

        return $stmt->rowCount();
    }

    public function maxAnggota(){
        $stmt = $this->conn->prepare('SELECT max(id_anggota) FROM perpustakaan_anggota');

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function maxPegawai(){
        $stmt = $this->conn->prepare('SELECT max(id_pegawai) FROM perpustakaan_pegawai');

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function maxBuku(){
        $stmt = $this->conn->prepare('SELECT max(id_buku) FROM perpustakaan_buku');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function maxPeminjaman(){
        $stmt = $this->conn->prepare('SELECT max(id_pinjam) FROM  perpustakaan_pinjam');

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function selectAnggota($id, $kelas){
        $stmt = $this->conn->prepare('SELECT * FROM perpustakaan_anggota as a inner join data_murid as b on a.id_data_murid=b.Id_data_murid  inner join murid as c on c.id_murid = b.id_murid inner join data_murid_pivot_kelas as d on d.id_pivot_kelas = b.id_pivot_kelas inner join kelas on d.id_kelas = kelas.id_kelas inner join jurusan on d.id_jurusan = jurusan.id_jurusan WHERE c.Nama LIKE ? AND  b.id_pivot_kelas = ? LIMIT 6');

        $cek = $stmt->execute(['%'.$id.'%', $kelas]);
        
        return $stmt->fetchAll();
    }

    public function selectBuku(){
        $stmt = $this->conn->prepare('SELECT * FROM perpustakaan_buku inner join perpustakaan_buku_jenis on perpustakaan_buku_jenis.id_jenis = perpustakaan_buku.id_jenis');

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function selectSingleBuku($id){
        $stmt = $this->conn->prepare('SELECT * FROM perpustakaan_buku inner join perpustakaan_buku_jenis on perpustakaan_buku_jenis.id_jenis = perpustakaan_buku.id_jenis WHERE nama_buku LIKE ? ');

        $stmt->execute(['%'.$id.'%']);

        return $stmt->fetchAll();
    }

    public function selectPeminjaman($id){
        $stmt = $this->conn->prepare('SELECT * FROM perpustakaan_pinjam as a inner join perpustakaan_buku as b on a.id_buku = b.id_buku inner join perpustakaan_pinjam_status as c on a.id_status_pinjam = c.id_status inner join perpustakaan_buku_jenis as d on b.id_jenis = d.id_jenis inner join perpustakaan_denda as e on a.id_denda = e.id_denda WHERE a.id_anggota = ? ORDER BY nama_status ASC');

        $stmt->execute([$id]);

        return $stmt->fetchAll();
    }

    public function selectdiffDatePinjam($id){
        $stmt = $this->conn->prepare('SELECT datediff(date(now()), tanggal_kembali) as jarak from perpustakaan_pinjam WHERE id_pinjam  = ?');

        $stmt->execute([$id]);

        return $stmt->fetchAll();
    }


    public function tampilLaporanTanggal($dari, $sampai){
        $stmt = $this->conn->prepare('SELECT * FROM perpustakaan_pinjam as a inner join perpustakaan_buku as b on a.id_buku = b.id_buku inner join perpustakaan_pinjam_status as c on a.id_status_pinjam = c.id_status inner join perpustakaan_buku_jenis as d on b.id_jenis = d.id_jenis inner join perpustakaan_anggota as e on e.id_anggota = a.id_anggota inner join data_murid as f on f.Id_data_murid = e.id_data_murid inner join murid as g on f.id_murid = g.id_murid  WHERE tanggal_pinjam between ? and ?');

        $stmt->execute([$dari, $sampai]);
        return $stmt->fetchAll();
    }

    public function selectAnggotaId($id){
        $stmt = $this->conn->prepare('SELECT * FROM perpustakaan_anggota as e inner join data_murid as f on f.Id_data_murid = e.id_data_murid inner join murid as g on f.id_murid = g.id_murid inner join data_murid_pivot_kelas as h on f.id_pivot_kelas = h.id_pivot_kelas inner join kelas on h.id_kelas = kelas.id_kelas inner join jurusan on jurusan.id_jurusan  = h.id_jurusan WHERE e.id_anggota =  ?');

        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    public function selectPeminjamanAll($id){
        $stmt = $this->conn->prepare('SELECT * FROM perpustakaan_pinjam as a inner join perpustakaan_buku as b on a.id_buku = b.id_buku inner join perpustakaan_pinjam_status as c on a.id_status_pinjam = c.id_status inner join perpustakaan_buku_jenis as d on b.id_jenis = d.id_jenis WHERE a.id_anggota = ?');

        $stmt->execute([$id]);

        return $stmt->fetchAll();
    }

    public function selectPeminjamanKelas($kelas){
        $stmt = $this->conn->prepare('SELECT nama_buku,nis, nama_status, nama_jenis, Nama, tanggal_pinjam,tanggal_kembali  FROM perpustakaan_pinjam as a inner join perpustakaan_buku as b on a.id_buku = b.id_buku inner join perpustakaan_pinjam_status as c on a.id_status_pinjam = c.id_status inner join perpustakaan_buku_jenis as d on b.id_jenis = d.id_jenis inner join perpustakaan_anggota as e on a.id_anggota = e.id_anggota inner join data_murid as f on e.id_data_murid = f.Id_data_murid inner join murid as h on h.id_murid = f.id_murid inner join data_murid_pivot_kelas as g on f.id_pivot_kelas = g.id_pivot_kelas inner join jurusan  on g.id_jurusan = jurusan.id_jurusan inner join kelas on g.id_kelas = kelas.id_kelas WHERE g.id_kelas = ? ORDER BY h.Nama ASC');

        $stmt->execute([$kelas]);

        return $stmt->fetchAll();
    }

    public function insertBukuJenis($nama){
        $stmt = $this->conn->prepare('INSERT INTO perpustakaan_buku_jenis(nama_jenis) values( :nama )');

        $cek = $stmt->execute(['nama' => $nama]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function insertKelas($jenjang, $grade){
        $stmt = $this->conn->prepare('INSERT INTO kelas(jenjang, grade) VALUES( ?,  ?)');

        $cek = $stmt->execute([$jenjang, $grade]);
        $id = $this->conn->lastInsertId();
        if ($cek) {
            return $id;            
        }else{
            return null;
        }
    }

    public function insertPivot($jurusan, $idKelas){
        $stmt = $this->conn->prepare('INSERT INTO data_murid_pivot_kelas(id_kelas, id_jurusan) VALUES( ? , ?)');

        $cek = $stmt->execute([$idKelas, $jurusan]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function insertWaktu($waktu){
        $stmt = $this->conn->prepare('INSERT INTO perpustakaan_waktu(lama_waktu_hari) values( :waktu )');

        $cek = $stmt->execute(['waktu' => $waktu]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function insertBuku($id, $nama, $id_jenis, $jumlah, $tgl){
        $stmt = $this->conn->prepare('INSERT INTO perpustakaan_buku(id_buku, nama_buku, id_jenis, jumlah_buku, tanggal_masuk) VALUES (:id, :nama, :jenis, :jumlah, :tgl)');
        
        $cek = $stmt->execute(['id'=>$id, 'nama' => $nama, 'jenis'=> $id_jenis, 'jumlah' => $jumlah, 'tgl'=>$tgl]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function insertAnggota($id, $id_data_murid){
        $stmt = $this->conn->prepare('INSERT INTO perpustakaan_anggota(id_anggota, id_data_murid) VALUES(:id, :id_data)');

        $cek = $stmt->execute(['id'=>$id, 'id_data'=>$id_data_murid]);

        if ($cek) {
            return true;
        }
        return false;
    }

    public function insertPeminjaman($id, $idAnggota, $idBuku, $tglPinjam){
        $stmt = $this->conn->prepare('INSERT INTO perpustakaan_pinjam(id_pinjam, id_anggota, id_buku, tanggal_pinjam, tanggal_kembali) VALUES(:idP, :idA, :idB, NOW(), :tglP)');

        $cek  = $stmt->execute(['idP' => $id, 'idA' => $idAnggota, 'idB' => $idBuku, 'tglP' => $tglPinjam]);

        if($cek){
            return true;
        }
        return false;
    }

    public function insertPegawai($id, $nama, $email, $nmr, $username, $password, $gambar, $role){
        $stmt = $this->conn->prepare('INSERT INTO perpustakaan_pegawai (id_pegawai, nama_pegawai, email, nomor_handphone, poto, username, password, role) VALUES(? , ? , ?, ?, ?, ?, ?, ?)');

        $cek = $stmt->execute([$id, $nama, $email, $nmr,  $gambar,$username, $password, $role]);

        if ($cek) {
            return true;
        }
        return false;
    }

    public function hapusAnggota($id){
        $stmt = $this->conn->prepare('DELETE a,b FROM perpustakaan_anggota as a  LEFT join perpustakaan_pinjam as b on a.id_anggota = b.id_anggota  WHERE a.id_anggota = ?');

        $cek = $stmt->execute([$id]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function hapusPeminjaman($id){
        $stmt = $this->conn->prepare('DELETE FROM perpustakaan_pinjam WHERE id_pinjam = ?');

        $cek = $stmt->execute([$id]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function hapusKategori($id){
        $stmt = $this->conn->prepare("DELETE FROM perpustakaan_buku_jenis WHERE id_jenis = :id");

        $cek = $stmt->execute(['id' => $id]);
        if($cek){
            return true;
        }   
        return false;
    }

    public function hapusPivotKelas($id){
        $stmt = $this->conn->prepare('DELETE a,b FROM  data_murid_pivot_kelas as a inner join kelas as b on a.id_kelas = b.id_kelas WHERE a.id_pivot_kelas = ?');

        $cek = $stmt->execute([$id]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function hapusBuku($id){
        $stmt = $this->conn->prepare("DELETE FROM perpustakaan_buku WHERE id_buku = :id");

        $cek = $stmt->execute(['id' => $id]);
        if($cek){
            return true;
        }   
        return false;
    }

    public function hapusWaktu($id){
        $stmt = $this->conn->prepare("DELETE FROM perpustakaan_waktu WHERE id_waktu = :id");

        $cek = $stmt->execute(['id' => $id]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function  hapusPeminjamanAll(){
        $stmt = $this->conn->prepare("DELETE FROM perpustakaan_pinjam");

        $cek = $stmt->execute();
        if ($cek) {
            return true;
        }
        return false;
    }

    public function hapusPegawai($id){
        $stmt = $this->conn->prepare('DELETE FROM perpustakaan_pegawai WHERE id_pegawai = ?');

        $cek = $stmt->execute([$id]);
        if ($cek) {
            return true;
        }
        return false;
    }


    public function editPegawai($id, $nama, $email, $nmr, $username){
        $stmt = $this->conn->prepare('UPDATE perpustakaan_pegawai SET nama_pegawai = :nama, email = :email, nomor_handphone = :nmr, username=:username WHERE id_pegawai = :id');

        $cek = $stmt->execute(['nama' => $nama, 'email'=>$email, 'nmr' => $nmr, 'username'=>$username,'id' =>$id]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function editPegawaiG($id, $nama, $email, $nmr, $username, $gambar){
        $stmt = $this->conn->prepare('UPDATE perpustakaan_pegawai SET nama_pegawai = :nama, email = :email, nomor_handphone = :nmr, username=:username, poto=:gambar WHERE id_pegawai = :id');

        $cek = $stmt->execute(['nama' => $nama, 'email'=>$email, 'nmr' => $nmr, 'username'=>$username,'id' =>$id, 'gambar'=>$gambar]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function editPasswordPegawai($id, $pass){
        $stmt = $this->conn->prepare('UPDATE perpustakaan_pegawai SET password = ? WHERE id_pegawai = ?');

        $cek = $stmt->execute([$pass, $id]);
        if ($cek) {
            return true;
        }
        return false;
    }
    public function editKategori($id, $nama){
        $stmt = $this->conn->prepare("UPDATE perpustakaan_buku_jenis SET nama_jenis=:nama WHERE id_jenis=:id ");

        $cek = $stmt->execute(['id' => $id, 'nama'=>$nama]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function editWaktu($total, $id){
        $stmt = $this->conn->prepare('UPDATE perpustakaan_waktu SET lama_waktu_hari = :total WHERE id_waktu=:id');

        $cek = $stmt->execute(['id'=> $id, 'total'=>$total]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function editBuku($nama, $id_jenis, $jumlah_buku, $jumlah_pinjam, $tgl, $id){
        $stmt = $this->conn->prepare("UPDATE perpustakaan_buku SET nama_buku=:nama , id_jenis=:id_jenis, jumlah_buku=:jumlah_buku, jumlah_pinjam=:jumlah_pinjam, tanggal_masuk=:tanggal_masuk WHERE id_buku=:id");

        $cek = $stmt->execute(['nama' => $nama, 'id_jenis' => $id_jenis, 'jumlah_buku'=>$jumlah_buku, 'jumlah_pinjam'=>$jumlah_pinjam, 'tanggal_masuk' => $tgl, 'id'=>$id]);

        if ($cek) {
            return true;
        }
        return false;
    }

    public function editStatusPeminjaman($idPinjam, $idStatus, $denda){
        $stmt = $this->conn->prepare("UPDATE perpustakaan_pinjam SET id_status_pinjam = :statusP, denda = :denda WHERE id_pinjam = :id");

        $cek = $stmt->execute(['statusP' => $idStatus, 'id'=> $idPinjam, 'denda'=>$denda]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function kurangStokBuku($id){
        $stmt = $this->conn->prepare('UPDATE perpustakaan_buku SET jumlah_pinjam  = jumlah_pinjam - 1 WHERE id_buku = ?');

        $cek = $stmt->execute([$id]);
        if ($cek) {
            return true;
        }else {
            return false;
        }
    }

    public function tambahStokBuku($id){
        $stmt = $this->conn->prepare('UPDATE perpustakaan_buku SET jumlah_pinjam  = jumlah_pinjam + 1 WHERE id_buku = ?');

        $cek = $stmt->execute([$id]);
        if ($cek) {
            return true;
        }else {
            return false;
        }
    }

    public function editPivotKelas($id, $jurusan, $jenjang, $grade){
        $stmt = $this->conn->prepare('UPDATE data_murid_pivot_kelas as a inner join kelas as b on a.id_kelas = b.id_kelas SET a.id_jurusan = :idJurusan, b.jenjang = :jenjang, b.grade= :grade WHERE a.id_pivot_kelas = :id');

        $cek = $stmt->execute(['id' => $id, 'idJurusan'=>$jurusan, 'jenjang' => $jenjang, 'grade'=>$grade]);
        if ($cek) {
            return true;
        }
        return false;
    }

    public function editDenda($jarak, $denda){
        $stmt = $this->conn->prepare('UPDATE perpustakaan_denda SET jangka= ?, harga= ? WHERE id_denda=1 ');

        $cek = $stmt->execute([$jarak, $denda]);
        if ($cek) {
            return true;
        }
        return false;
    }
}

?>