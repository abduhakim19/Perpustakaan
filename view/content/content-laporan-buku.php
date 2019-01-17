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

    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/css/content/content-laporan.css" />


    <div class="jContent mt-3 mb-3">
        Laporan Peminjaman Tanggal
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card"> 
                <div class="card-body pl-4 pt-4 pb-4 pr-4">
                    <div class="row mb-3">
                        <div class="col-lg-12" >
                            <p style="font-size: 20px;"> Print Semua Data Buku</p>
                        </div>
                    </div>
                    <div class="row pl-0 pr-0  mt-3">
                        <div class="col-lg-6 bg-warnig  pr-0">
                            <button class="btn btn-primary btn-word-All" >Export to Doc</button>
                        </div>
                        <div class="col-lg-6 pr-0 pl-0">
                            <button class="btn btn-primary btn-excel-All">Export to Excel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card"> 
                <div class="card-body pl-4 pt-4 pb-4 pr-4">
                    <div class="row mb-3">
                        <div class="col-lg-12" >
                            <p style="font-size: 20px;"> Print Data Buku Berdasarkan : </p>
                            <div class="form-group">
                                <select name="" id="input-jenis" class="form-control">
                                    <option value="">Pilih Jenis</option>
                                </select>
                            </div>  
                        </div>
                    </div>
                    <div class="row pl-0 pr-0  mt-3">
                        <div class="col-lg-6 bg-warnig  pr-0">
                            <button class="btn btn-primary btn-word-Kat" >Export to Doc</button>
                        </div>
                        <div class="col-lg-6 pr-0 pl-0">
                            <button class="btn btn-primary btn-excel-Kat">Export to Excel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    
 
    <script src="<?=BASE_URL?>/assets/jquery/jquery.js" ></script>
    
    <!-- Datatables -->
    <script type="text/javascript" charset="utf8" src="<?=BASE_URL?>/assets/data-tables/datatables.min.js"></script>

    <script src="<?=BASE_URL?>/assets/js/content/content-laporan-buku.js"></script>

    <!-- sweetalert2 -->
    <script src="<?=BASE_URL?>/assets/sweetalert2/sweetalert2.all.min.js"></script>
</html>