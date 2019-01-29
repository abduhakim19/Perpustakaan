<html>

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/data-tables/datatables.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/bootstrap/css/bootstrap.min.css" />
    <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/font-awesome/css/all.min.css" />
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/animate/animate.css" />

    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/css/content/content-peminjaman.css" />


    <div class="jContent mt-3 mb-3">
        Data Kategori
    </div>
    <div class="card mb-4">
        <div class="card-body pl-4 pt-4 pb-4 pr-4">
            <div class="row mb-3">
                <div class="col-lg-6 mt-4">
                    
                        <div class="row mb-1">
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
                        <div class="row">
                            <div class="form-group col-lg-9">
                                <input type="text" name="cNama" id="cNama" placeholder="Cari Nama..." class="form-control">
                                <div class="content-bawah border rounded w-100">
                                
                                </div>
                            </div>
                            <div class="col-lg-3">
                            <button type="button" class="btn btn-primary btnCari">Cari Murid</button>
                        </div>
                    </div>         
                </div>
                <div class="col-lg-6">
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label for="">NISN</label>
                            <input type="text" name="" id="nisn" class="form-control" readonly>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="">NIS</label>
                            <input type="text" name="" id="nis" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="" id="nama" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="cariBuku">Nama Buku</label>
                        <input type="text" name="cariBuku" id="cariBuku" class="form-control" placeholder="Cari Nama Buku..">
                            <div class="content-bawahBuku border rounded w-100">
                            
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="">Tenggang Waktu</label>
                        <select name="" id="selectWaktu" class="form-control">
                            <option value="">Pilih Waktu</option>
                        </select>
                    </div>
                    
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">ID Buku</label>
                        <input type="text" name="kategoritxt" id="kategoritxt" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Waktu Pinjam</label>
                        <input type="text" name="" id="tglPin" class="form-control" readonly>
                    </div>
                    <button class="btn btn-primary btnPinjam">Pinjam Buku</button>
                    
                </div>
            </div>
            <div class="table-responsive pr-0 pl-0">
                    <table id="tablekategori" class="table table-striped table-data display w-100" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Nama Buku</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Tgl Pinjam</th>
                                <th scope="col">Tgl Kembali</th>
                                <th scope="col">Status</th>
                                <th scope="col">Denda</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
            </div>
        </div>
    </div>


    
 
    <script src="<?=BASE_URL?>/assets/jquery/jquery.js" ></script>
    
    <!-- Datatables -->
    <script type="text/javascript" charset="utf8" src="<?=BASE_URL?>/assets/data-tables/datatables.min.js"></script>

    <script src="<?=BASE_URL?>/assets/js/content/content-peminjaman.js"></script>

    <!-- sweetalert2 -->
    <script src="<?=BASE_URL?>/assets/sweetalert2/sweetalert2.all.min.js"></script>
</html>