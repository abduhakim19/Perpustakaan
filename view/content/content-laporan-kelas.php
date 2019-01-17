<html>
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/data-tables/datatables.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/bootstrap/css/bootstrap.min.css" />

    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/css/content/content-laporan.css" />

    <div class="jContent mt-3 mb-3">
        Laporan Perkelas
    </div>
    <div class="card mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    Jurusan
                </div>
                <div class="col-lg-4">
                    Kelas
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-4">
                    <select name="" id="jurusan" class="form-control">
                        <option value=" ">Pilih Jurusan</option>
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <select name="" id="kelas" class="form-control">
                        <option value="">Pilih Kelas</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <button class="btn btn-primary btn-cari">Cari</button>
                </div>
            </div>
            <div class="table-responsive pr-0 pl-0">
                <table id="tablekelas" class="table table-striped table-data display w-100" style="font-size: 14px;">
                    <thead>
                        <th scope="col">#</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nama Buku</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Status</th>
                    </thead>
                </table>
            </div>
            <div class="row pl-0 pr-0 mt-3" >
                <div class="col-lg-2 pr-0">
                    <button class="btn btn-primary btn-Doc">
                        Export to Doc                
                    </button>
                </div>
                <div class="col-lg-2 pl-2">
                    <button class="btn btn-primary btn-Excel">
                        Export to Excel
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script src="<?=BASE_URL?>/assets/jquery/jquery.js" ></script>
    <script src="<?=BASE_URL?>/assets/js/plugin-jquery/jquery-redirect.js"></script>
    
    <!-- Datatables -->
    <script type="text/javascript" charset="utf8" src="<?=BASE_URL?>/assets/data-tables/datatables.min.js"></script>

    <script src="<?=BASE_URL?>/assets/js/content/content-laporan-kelas.js"></script>

    <!-- sweetalert2 -->
    <script src="<?=BASE_URL?>/assets/sweetalert2/sweetalert2.all.min.js"></script>
</html>