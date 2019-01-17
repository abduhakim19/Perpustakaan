<html>

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/data-tables/datatables.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/bootstrap/css/bootstrap.min.css" />
    <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/font-awesome/css/all.min.css" />
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/animate/animate.css" />

    
    <link href="<?=BASE_URL?>/assets/gijgo/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/css/content/content-anggota.css" />

    <div class="table-data">
    <div class="jContent mt-3 mb-3">
        Data Anggota
    </div>
    <div class="card mb-4">
        <div class="card-body pl-4 pt-4 pb-4 pr-4 ">
            <div class="row mb">
                <div class="col-lg-6 mt-4 ">
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <select name="jurusan" id="jurusan" class="form-control">
                                    <option value="jurusan">Pilih Jurusan</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <select name="kelas" id="kelas" class="form-control">
                                    <option value="kelas">Pilih Kelas</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row ">
                                <div class="form-group col-lg-9">
                                    <input type="text" id="cari" class="form-control" placeholder="Cari Nama..." autocomplete=off>
                                    <div class="content-bawah border rounded w-100">
                                        
                                    </div>
                                    
                                </div>
                            <button type="button" class="col-lg-3 btn btn-tambah btn-primary btn-md">Tambah</button>
                            </div>
                        </div>
                            
                </div>
                    
                <div class="col-lg-6 mb-5">

                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label for="nis">NIS</label>
                            <input type="text" name="nis" id="nis" class="form-control" readonly>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="nisn">NISN</label>
                            <input type="text" name="nisn" id="nisn" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" readonly>
                    </div>
                    <div class="form-group ">
                        <label for="tgl">Tanggal Lahir</label>
                        <input type="text" name="tgl" id="tgl" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="table-responsive pr-0 pl-0">
                <table id="tablekategori" class="table table-striped table-data display w-100" style="font-size: 14px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIP</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    </div>
    <div class="loader" style="display: none;"></div>
    <div class="infoAnggota" style="display: none;">
    <div class="jContent mt-3 mb-3">
        Info Anggota
    </div>
    <div class="card mb-5">
        <div class="card-body pl-4 pt-4 pb-4 pr-4 ">
            <div class="row mb-2">
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
                </div>
                <div class="col-lg-4 kananG">
                    <div class="divBugkusG w-75">
                        <img src="<?=BASE_URL?>/assets/web_image/judul.jpg" class="gmbrProfil" alt="" srcset="">
                    </div>
                
                </div>
            </div>
            <div class="row mt-0">
                <div class="col-lg-12 mt-0">
                    <div class="table-responsive pr-0 pl-0">
                        <div class="jtable mb-2">Riwayat Peminjaman</div>
                        <table id="tablePinjam" class="table table-striped table-data display w-100" style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama Buku</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Tgl Pinjam</th>
                                    <th scope="col">Tgl Kembali</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                        </table>
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
 
    <script src="<?=BASE_URL?>/assets/jquery/jquery.js"></script>
    
    <!-- Datatables -->
    <script type="text/javascript" charset="utf8" src="<?=BASE_URL?>/assets/data-tables/datatables.min.js"></script>

    <script src="<?=BASE_URL?>/assets/js/content/content-anggota.js"></script>

    <!-- sweetalert2 -->
    <script src="<?=BASE_URL?>/assets/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?=BASE_URL?>/assets/gijgo/js/gijgo.min.js" type="text/javascript"></script>
    <script src="<?=BASE_URL?>/assets/qrcodejs/qrcode.min.js" type="text/javascript"></script>
</html>