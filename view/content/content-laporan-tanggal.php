<html>

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/data-tables/datatables.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/bootstrap/css/bootstrap.min.css" />

    <link href="<?=BASE_URL?>/assets/gijgo/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/css/content/content-laporan.css" />


    <div class="jContent mt-3 mb-3">
        Laporan Peminjaman Tanggal
    </div>
    <div class="card mb-5">
        <div class="card-body pl-4 pt-4 pb-4 pr-4">
            <div class="row mb-1">
                <div class="col-lg-4">
                    Dari
                </div>
                <div class="col-lg-4">
                    Sampai
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-4">
                    <input type="text" name="" class="form-control" id="tglDari" autocomplete=off>
                </div>
                <div class="form-group col-lg-4">
                    <input type="text" name="" class="form-control" id="tglSampai" autocomplete=off>
                </div>
                <div class="col-lg-4">
                    <button type="button" class="btn btn-primary btn-cari btn-md float-left">Cari</button>
                </div>
            </div>
            <div class="table-responsive pr-0 pl-0">
                    <table id="tablekategori" class="table table-striped table-data display w-100" style="font-size: 14px;">
                        <thead>
                            <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">NIS</th>
                                    <th scope="col">Nama Murid</th>
                                    <th scope="col">Nama Buku</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Tgl P</th>
                                    <th scope="col">Tgl K</th>
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

    <script src="<?=BASE_URL?>/assets/js/content/content-laporan-tanggal.js"></script>

    <!-- sweetalert2 -->
    <script src="<?=BASE_URL?>/assets/sweetalert2/sweetalert2.all.min.js"></script>

    <script src="<?=BASE_URL?>/assets/gijgo/js/gijgo.min.js" type="text/javascript"></script>
</html>