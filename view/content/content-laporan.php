<html>

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/data-tables/datatables.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/bootstrap/css/bootstrap.min.css" />
    <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/font-awesome/css/all.min.css" />
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/animate/animate.css" />

    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/css/content/content-laporan.css" />


    <div class="jContent mt-3 mb-3">
        Laporan Peminjaman Perorang
    </div>
    <div class="card mb-5">
        <div class="card-body pl-4 pt-4 pb-4 pr-4">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <select name="" id="jurusan" class="form-control">
                            <option value="">Pilih Jurusan</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <select name="" id="kelas" class="form-control">
                            <option value="">Pilih Kelas</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputNama" autocomplete=off />
                        <div class="content-bawah border rounded w-100">
                                        
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <button type="button" class="btn btn-primary btn-cari btn-md float-left">Cari Nama</button>
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
                            </tr>
                        </thead>
                    </table>
            </div>
            <div class="row pl-0 pr-0  mt-3">
                <div class="col-lg-2 bg-warnig  pr-0">
                    <button class="btn btn-primary btn-Doc" >Export to Doc</button>
                </div>
                <div class="col-lg-1 pr-0 pl-0">
                    <button class="btn btn-primary btn-Excel">Export to Excel</button>
                </div>
            </div>
        </div>
    </div>


    
 
    <script src="<?=BASE_URL?>/assets/jquery/jquery.js" ></script>
    <script src="<?=BASE_URL?>/assets/js/plugin-jquery/jquery-redirect.js"></script>
    
    <!-- Datatables -->
    <script type="text/javascript" charset="utf8" src="<?=BASE_URL?>/assets/data-tables/datatables.min.js"></script>

    <script src="<?=BASE_URL?>/assets/js/content/content-laporan.js"></script>

    <!-- sweetalert2 -->
    <script src="<?=BASE_URL?>/assets/sweetalert2/sweetalert2.all.min.js"></script>
</html>