<html>
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/data-tables/datatables.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/bootstrap/css/bootstrap.min.css" />
    <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/font-awesome/css/all.min.css" />
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/animate/animate.css" />

    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/css/content/content-pegawai.css" />

    <div class="jContent mt-3 mb-3">
        Data Pegawai
    </div>
    <div class="card mb-4">
        <div class="card-body pl-4 pt-4 pb-4 pr-4">
            <div class="row">
                <div class="col mb-4">
                    <button class="btn btn-primary btn-tambah">Tambah Pegawai</button>
                </div>
            </div>
            <div class="table-responsive pr-0 pl-0">
                <table id="tablepegawai" class="table table-stiped table-data display w-100" style="font-size: 14px">

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nomor</th>
                        <th scope="col">Username</th>
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

    <script src="<?=BASE_URL?>/assets/js/content/content-pegawai.js"></script>

    <!-- sweetalert2 -->
    <script src="<?=BASE_URL?>/assets/sweetalert2/sweetalert2.all.min.js"></script>
</html>