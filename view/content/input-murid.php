<html>


    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/data-tables/datatables.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/bootstrap/css/bootstrap.min.css" />
    <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/font-awesome/css/all.min.css" />
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/animate/animate.css" />

    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/css/content/content-murid.css" />


    <link href="<?=BASE_URL?>/assets/gijgo/css/gijgo.min.css" rel="stylesheet" type="text/css" />



    <!-- Tampilkan Data TABLE -->
    <div class="data">
        <div class="jContent mt-3 mb-3"  >
            Data Murid
        </div>
        <div class="card mb-5">
        <div class="card-body pl-4 pt-4 pb-4 pr-4">
            <div class="row">
                <div class="col mb-4">
                    <button type="button" class="btn btn-primary btn-tambah btn-md float-left">Tambah Murid</button>
                </div>
            </div>
            <!-- EDIT DATA MURID -->
            <div class="table-responsive pr-0 pl-0">
                <table id="tablekategori" class="table table-striped table-data display w-100" style="font-size: 14px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIS</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Tgl Lahir</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    </div>

    <div class="loader" style="display: none;"></div>
    <!-- INFO MURID -->
    <div class="info" style="display: none;">
        <div class="jContent mt-3 mb-3"  >
            Info  Murid
        </div>
        <div class="card mb-5">
        <div class="card-body pl-5 pt-4 pb-4 pr-4">
        <div class="row">
        <div class="col-lg-8">
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-3 ">
                        Nama 
                    </div>
                    <div class="col-lg-9 inamaM">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-3 ">
                        NISN 
                    </div>
                    <div class="col-lg-9 inisnM">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-3">
                        NIS 
                    </div>
                    <div class="col-lg-9 inisM">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-3">
                        Tempat Lahir 
                    </div>
                    <div class="col-lg-9 itmptL">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-3 ">
                        Tanggal Lahir 
                    </div>
                    <div class="col-lg-9 itglLM">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-3">
                        Alamat
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-12 ialamat">
                                
                            </div>
                        </div>
                        <div class="row mt-1 k">
                            <div class="col-lg-3">
                                Kelurahan
                            </div>
                            <div class="col-lg-9 ikelurahan">
                                
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-3">
                                Kecamatan
                            </div>
                            <div class="col-lg-9 ikecamatan">
                                
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-3">
                                Kota
                            </div>
                            <div class="col-lg-9 ikota">
                                
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-3 ">
                                Provinsi
                            </div>
                            <div class="col-lg-9 iprovinsi">
                                
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-3 ">
                                Kode Pos
                            </div>
                            <div class="col-lg-9 ikdpos">
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-3">
                        Jurusan
                    </div>
                    <div class="col-lg-9 ijurusan">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-3 ">
                        Kelas
                    </div>
                    <div class="col-lg-9 ikelas">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-3">
                        Jenis Kelamin 
                    </div>
                    <div class="col-lg-9 ijk">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-3">
                        Agama
                    </div>
                    <div class="col-lg-9 iagama">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-3">
                        Nomor Telepon
                    </div>
                    <div class="col-lg-9 inmrtelepon">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-3">
                        Warga Negara
                    </div>
                    <div class="col-lg-9 iwn">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                                Berat Badan
                            </div>
                            <div class="col-lg-6 ibb">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6 ">
                                Tinggi Badan
                            </div>
                            <div class="col-lg-6 itb">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="divBugkusG w-100">
                    <img src="" class="gmbrProfil" alt="" srcset="">
                </div>
            </div>  
        </div>
        <div class="row mt-3">
            <div class="col-lg-5 mr-3">
                <div class="row pl-0 pr-0">
                    <div class="col-lg-12 pl-1 pr-0">
                        <p style="font-size: 22px;">Ibu</p>
                    </div>
                </div>
                
                <div class="row border pl-0 pr-0 mb-2 pt-1 pb-1 ">
                    <div class="col-lg-4 pl-1 pr-0">
                        Nama
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 inamaIbu">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0">
                        NIK
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 inikIbu">
                        24355353
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0">
                        Tanggal Lahir
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 itglLIbu">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0">
                        Pendidikan
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 inpendIbu">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0">
                        Pekerjaan
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 ipekIbu">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0">
                        Penghasilan
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 ipengIbu">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0">
                        Nomor Telepon
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 inmrIbu">
                        
                    </div>
                </div>

            </div>
            <div class="col-lg-5 ml-3">
                <div class="row pl-0 pr-0">
                    <div class="col-lg-12 pl-1 pr-0">
                        <p style="font-size: 22px;">Bapak</p>
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0">
                        Nama
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 inamaBapak">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0 ">
                        NIK
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 inikBapak">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0 ">
                        Tanggal Lahir
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 itglLBapak">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0">
                        Pendidikan
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 ipendBapak">
                       
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0">
                        Pekerjaan
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 ipekBapak">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0">
                        Penghasilan
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 ipengBapak">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0">
                        Nomor Telepon
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 inmrBapak">
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mt-4">
                <div class="row pl-0 pr-0">
                    <div class="col-lg-12 pl-1 pr-0">
                        <p style="font-size: 22px;">Wali</p>
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0">
                        Nama
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 inamaWali">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0">
                        NIK
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 inikWali">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0">
                        Tanggal Lahir
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 itglLWali">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0">
                        Pendidikan
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 ipendWali">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0">
                        Pekerjaan
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 ipekWali">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0">
                        Penghasilan
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 ipengWali">
                        
                    </div>
                </div>
                <div class="row border mb-2 pt-1 pb-1">
                    <div class="col-lg-4 pl-1 pr-0">
                        Nomor Telepon
                    </div>
                    <div class="col-lg-8 pl-1 pr-0 inmrWali">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 pl-0 mt-3">
                <button class="btn btn-primary btn-kembali-info pl-5 pr-5 pt-2 pb-2">Kembali</button>
            </div>
        </div>
        </div>
    </div>
    </div>



        <?php
        
        if(isset($_SESSION['pesan']) && $_SESSION['pesan'] == 'insertBisa'){
        ?>  
        <script>
            const toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            })

            toast({
                type: 'success',
                title: "Data Berhasil Disimpan"
            })
        </script>
    <?php
        }else if(isset($_SESSION['pesan']) && $_SESSION['pesan'] == 'editbisa'){
    ?>
        
        <script>
            const toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            })

            toast({
                type: 'success',
                title: "Data Berhasil Diedit"
            })
        </script>
    <?php
        }else if(isset($_SESSION['pesan']) && $_SESSION['pesan'] == 'edittdkbisa'){
            ?>
            <script>
            const toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            })

            toast({
                type: 'error',
                title: "Data Gagal Diedit"
            })
        </script>
            <?php
        }
        $_SESSION['pesan'] = '';
    ?>

    <!-- INPUT DATA MURID -->
    <div class="input-murid" style="display: none;">
    <div class="jContent mt-3 mb-3">
        Input Data Murid
    </div>


    <form action="http://localhost/Perpustakaan/Murid/insertMurid" method="post" enctype="multipart/form-data">
    <div class="card mb-4 ">
        <div class="card-header">
            Input Data Murid
        </div>
        <div class="card-body pl-5 pt-4 pb-4 pr-5">
                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="text" class="form-control" name="nis" id="nis">
                </div>
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" name="nisn" id="nisn">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama">
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamain</label>
                    <select name="jk" id="jk" class="form-control">
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="tempatL">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempatL" id="tempatL">
                </div>
                <div class="form-group">
                    <label for="tanggalL">Tanggal Lahir</label>
                    <input type="text" class="form-control" name="tanggalL" id="tanggalL">
                </div>
                <div class="form-group">
                    <label for="Alamat">Alamat</label>
                    <input type="text" name="Alamat" id="Alamat" class="form-control">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Kelurahan">Kelurahan</label>
                        <input type="text" name="Kelurahan" id="Kelurahan" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Kecamatan">Kecamatan</label>
                        <input type="text" name="Kecamatan" id="Kecamatan" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="Kota">Kota</label>
                        <input type="text" name="Kota" id="Kota" class="form-control">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="Provinsi">Provinsi</label>
                        <input type="text" name="Provinsi" id="Provinsi" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="kdPos">Kode Pos</label>
                        <input type="text" name="kdPos" id="kdPos" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select name="agama" class="form-control" id="agama">
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="kewarganegaraan">Kewarganegaraan</label>
                    <input type="text" class="form-control" name="kewarganegaraan" id="kewarganegaraan">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" class="form-control" id="jurusan">
                                <option value="">Pilih Jurusan</option>
                            </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Kelas">Kelas</label>
                        <select name="Kelas" class="form-control" id="Kelas">
                            <option>Pilih Kelas</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nomorH">Nomor Handphone</label>
                    <input type="text" class="form-control" name="nomorH" id="nomorH">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tinggiB">Tinggi Badan</label>
                        <input type="text" class="form-control" name="tinggiB" id="tinggiB">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="beratB">Berat Badan</label>
                        <input type="text" class="form-control" name="beratB" id="beratB">
                    </div>
                </div>
                <div class="form-group">
                        
                        <label for="poto">Foto Murid</label>
                        <input type="file" name="poto" id="poto" class="form-control epoto">
                        <div class="BPGambar mt-2">
                            <img src="" class="PGambar" />
                        </div>
                </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Input Data Ibu
        </div>
        <div class="card-body pl-5 pt-4 pb-4 pr-5">
                <div class="form-group">
                    <label for="namaIbu">Nama</label>
                    <input type="text" class="form-control" name="namaIbu" id="namaIbu">
                </div>
                <div class="form-group">
                    <label for="nikIbu">NIK</label>
                    <input type="text" class="form-control" name="nikIbu" id="nikIbu">
                </div>
                <div class="form-group">
                    <label for="tanggalLIbu">Tanggal Lahir</label>
                    <input type="text" name="tanggalLIbu" id="tanggalLIbu" class="form-control">
                </div>
                <div class="form-group">
                <label for="pendidikanIbu">Pendidikan Terakhir</label>
                    <select name="pendidikanIbu" class="form-control selectPendidikan" id="pendidikanIbu">
                    <option value="5">Pilih Pendidikan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pekerjaanIbu">pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaanIbu" id="pekerjaanIbu">
                </div>
                <div class="form-group">
                    <label for="penghasilanIbu">Penghasilan</label>
                        <select name="penghasilanIbu" class="form-control selectPenghasilan" id="penghasilanIbu">
                        <option value="3">Pilih Penghasilan</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="nomorHIbu">Nomor Handphone</label>
                    <input type="text" name="nomorHIbu" id="nomorHIbu" class="form-control">
                </div>
            </div>
        </div>
        

        <div class="card mt-4">
        <div class="card-header">
            Input Data Ayah
        </div>
        <div class="card-body pl-5 pt-4 pb-4 pr-5">
                <div class="form-group">
                    <label for="namaAyah">Nama</label>
                    <input type="text" class="form-control" name="namaAyah" id="namaAyah">
                </div>
                <div class="form-group">
                    <label for="nikAyah">NIK</label>
                    <input type="text" class="form-control" name="nikAyah" id="nikAyah">
                </div>
                <div class="form-group">
                    <label for="tanggalLAyah">Tanggal Lahir</label>
                    <input type="text" name="tanggalLAyah" id="tanggalLAyah" class="form-control">
                </div>
                <div class="form-group">
                <label for="pendidikanAyah">Pendidikan Terakhir</label>
                    <select name="pendidikanAyah" class="form-control selectPendidikan" id="pendidikanAyah">
                    <option value="5">Pilih Pendidikan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pekerjaanAyah">pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaanAyah" id="pekerjaanAyah">
                </div>
                <div class="form-group">
                    <label for="penghasilanAyah">Penghasilan</label>
                        <select name="penghasilanAyah" class="form-control selectPenghasilan" id="penghasilanAyah">
                        <option value="3">Pilih Penghasilan</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="nomorHAyah">Nomor Handphone</label>
                    <input type="text" name="nomorHAyah" id="nomorHAyah" class="form-control">
                </div>
            </div>
        </div>

        <div class="card mt-4">
        <div class="card-header">
            Input Data Wali
        </div>
        <div class="card-body pl-5 pt-4 pb-4 pr-5">
                <div class="form-group">
                    <label for="namaWali">Nama</label>
                    <input type="text" class="form-control" name="namaWali" id="namaWali">
                </div>
                <div class="form-group">
                    <label for="nikWali">NIK</label>
                    <input type="text" class="form-control" name="nikWali" id="nikWali">
                </div>
                <div class="form-group">
                    <label for="tanggalLWali">Tanggal Lahir</label>
                    <input type="text" name="tanggalLWali" id="tanggalLWali" class="form-control">
                </div>
                <div class="form-group">
                <label for="pendidikanWali">Pendidikan Terakhir</label>
                    <select name="pendidikanWali" class="form-control selectPendidikan" id="pendidikanWali">
                    <option value="5">Pilih Pendidikan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pekerjaanWali">pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaanWali" id="pekerjaanWali">
                </div>
                <div class="form-group">
                    <label for="penghasilanWali">Penghasilan</label>
                        <select name="penghasilanWali" class="form-control selectPenghasilan" id="penghasilanWali">
                        <option value="3">Pilih Penghasilan</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="nomorHWali">Nomor Handphone</label>
                    <input type="text" name="nomorHWali" id="nomorHWali" class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary pb-2 pt-2 mb-2 mt-4 w-100  mb-5" id="btn-submit" >Submit</button>
    </form>
    </div>


    
    
        <div class="edit-murid" style="display: none;">
    <div class="jContent mt-3 mb-3">
        Edit Data Murid
    </div>
    
    <form action="http://localhost/Perpustakaan/Murid/editMurid" method="post" enctype="multipart/form-data">
    <div class="card mb-4 ">
        <div class="card-header">
            Edit Data Murid
        </div>
        <div class="card-body pl-5 pt-4 pb-4 pr-5">
                <div class="form-group">
                    <label for="nis">ID Murid</label>
                    <input type="text" class="form-control" name="id" id="eid" readonly>
                </div>
                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="text" class="form-control" name="nis" id="enis">
                </div>
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" name="nisn" id="enisn">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="enama">
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamain</label>
                    <select name="jk" id="ejk" class="form-control">
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="tempatL">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempatL" id="etempatL">
                </div>
                <div class="form-group">
                    <label for="tanggalL">Tanggal Lahir</label>
                    <input type="text" class="form-control" name="tanggalL" id="etanggalL">
                </div>
                <div class="form-group">
                    <label for="Alamat">Alamat</label>
                    <input type="text" name="Alamat" id="eAlamat" class="form-control">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Kelurahan">Kelurahan</label>
                        <input type="text" name="Kelurahan" id="eKelurahan" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Kecamatan">Kecamatan</label>
                        <input type="text" name="Kecamatan" id="eKecamatan" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="Kota">Kota</label>
                        <input type="text" name="Kota" id="eKota" class="form-control">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="Provinsi">Provinsi</label>
                        <input type="text" name="Provinsi" id="eProvinsi" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="kdPos">Kode Pos</label>
                        <input type="text" name="kdPos" id="ekdPos" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select name="agama" class="form-control" id="eagama">
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="kewarganegaraan">Kewarganegaraan</label>
                    <input type="text" class="form-control" name="kewarganegaraan" id="ekewarganegaraan">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" class="form-control" id="ejurusan">
                                <option value="">Pilih Jurusan</option>
                            </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="EKelas">Kelas</label>
                        <select name="Kelas" class="form-control" id="eKelas">
                            <option value="">Pilih Kelas</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nomorH">Nomor Handphone</label>
                    <input type="text" class="form-control" name="nomorH" id="enomorH">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tinggiB">Tinggi Badan</label>
                        <input type="text" class="form-control" name="tinggiB" id="etinggiB">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="beratB">Berat Badan</label>
                        <input type="text" class="form-control" name="beratB" id="eberatB">
                    </div>
                </div>
                <div class="form-group">
                    
                    <label for="poto">Foto Murid</label>
                        <input type="file" name="poto" id="epoto" class="form-control">
                        <div class="row">
                            <div class="col">
                                <input type="checkbox" name="ubah_foto" value="true"> Ceklis Untuk mengubah foto
                            </div>
                        </div>
                        <div class="EBPGambar mt-2">
                            <img src="" class="EPGambar" style="width: 100%; height: 100%;"/>
                        </div>
                </div>

        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Edit Data Ibu
        </div>
        <div class="card-body pl-5 pt-4 pb-4 pr-5">
                <div class="form-group">
                    <label for="namaIbu">Nama</label>
                    <input type="text" class="form-control" name="namaIbu" id="enamaIbu">
                </div>
                <div class="form-group">
                    <label for="nikIbu">NIK</label>
                    <input type="text" class="form-control" name="nikIbu" id="enikIbu">
                </div>
                <div class="form-group">
                    <label for="tanggalLIbu">Tanggal Lahir</label>
                    <input type="text" name="tanggalLIbu" id="etanggalLIbu" class="form-control">
                </div>
                <div class="form-group">
                <label for="pendidikanIbu">Pendidikan Terakhir</label>
                    <select name="pendidikanIbu" class="form-control " id="ependidikanIbu">
                    <option value="5">Pilih Pendidikan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pekerjaanIbu">pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaanIbu" id="epekerjaanIbu">
                </div>
                <div class="form-group">
                    <label for="penghasilanIbu">Penghasilan</label>
                        <select name="penghasilanIbu" class="form-control" id="epenghasilanIbu">
                        <option value="3">Pilih Penghasilan</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="nomorHIbu">Nomor Handphone</label>
                    <input type="text" name="nomorHIbu" id="enomorHIbu" class="form-control">
                </div>
            </div>
        </div>
        

        <div class="card mt-4">
        <div class="card-header">
            Edit Data Ayah
        </div>
        <div class="card-body pl-5 pt-4 pb-4 pr-5">
                <div class="form-group">
                    <label for="namaAyah">Nama</label>
                    <input type="text" class="form-control" name="namaAyah" id="enamaAyah">
                </div>
                <div class="form-group">
                    <label for="nikAyah">NIK</label>
                    <input type="text" class="form-control" name="nikAyah" id="enikAyah">
                </div>
                <div class="form-group">
                    <label for="tanggalLAyah">Tanggal Lahir</label>
                    <input type="text" name="tanggalLAyah" id="etanggalLAyah" class="form-control">
                </div>
                <div class="form-group">
                <label for="pendidikanAyah">Pendidikan Terakhir</label>
                    <select name="pendidikanAyah" class="form-control" id="ependidikanAyah">
                    <option value="5">Pilih Pendidikan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pekerjaanAyah">pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaanAyah" id="epekerjaanAyah">
                </div>
                <div class="form-group">
                    <label for="penghasilanAyah">Penghasilan</label>
                        <select name="penghasilanAyah" class="form-control" id="epenghasilanAyah">
                        <option value="3">Pilih Penghasilan</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="nomorHAyah">Nomor Handphone</label>
                    <input type="text" name="nomorHAyah" id="enomorHAyah" class="form-control">
                </div>
            </div>
        </div>

        <div class="card mt-4">
        <div class="card-header">
            Edit Data Wali
        </div>
        <div class="card-body pl-5 pt-4 pb-4 pr-5">
                <div class="form-group">
                    <label for="namaWali">Nama</label>
                    <input type="text" class="form-control" name="namaWali" id="enamaWali">
                </div>
                <div class="form-group">
                    <label for="nikWali">NIK</label>
                    <input type="text" class="form-control" name="nikWali" id="enikWali">
                </div>
                <div class="form-group">
                    <label for="tanggalLWali">Tanggal Lahir</label>
                    <input type="text" name="tanggalLWali" id="etanggalLWali" class="form-control">
                </div>
                <div class="form-group">
                <label for="pendidikanWali">Pendidikan Terakhir</label>
                    <select name="pendidikanWali" class="form-control " id="ependidikanWali">
                    <option value="5">Pilih Pendidikan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pekerjaanWali">pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaanWali" id="epekerjaanWali">
                </div>
                <div class="form-group">
                    <label for="penghasilanWali">Penghasilan</label>
                        <select name="penghasilanWali" class="form-control" id="epenghasilanWali">
                        <option value="3">Pilih Penghasilan</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="nomorHWali">Nomor Handphone</label>
                    <input type="text" name="nomorHWali" id="enomorHWali" class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary pb-2 pt-2 mb-2 mt-4 w-100 mb-5" id="btn-submit" >Edit</button>
    </form>
    </div>


    
 
    <script src="<?=BASE_URL?>/assets/jquery/jquery.js"></script>
    
    <!-- Datatables -->
    <script type="text/javascript" charset="utf8" src="<?=BASE_URL?>/assets/data-tables/datatables.min.js"></script>

    <script src="<?=BASE_URL?>/assets/js/content/content-murid.js"></script>

    <!-- sweetalert2 -->
    <script src="<?=BASE_URL?>/assets/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?=BASE_URL?>/assets/gijgo/js/gijgo.min.js" type="text/javascript"></script>
</html>