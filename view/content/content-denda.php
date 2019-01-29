<html>

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/data-tables/datatables.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/bootstrap/css/bootstrap.min.css" />
    <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/font-awesome/css/all.min.css" />
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/animate/animate.css" />

    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/css/content/content-kategori-buku.css" />


    <div class="jContent mt-3 mb-3">
        Data Denda
    </div>
    <div class="card mb-5">
        <div class="card-body pl-4 pt-4 pb-4 pr-4">
            <div class="row">
                <div class="col" id="refresisi">
                    <div class="form-group col-4">
                        <label for="jarak">Jarak (Hari)</label>
                        <input type="text" name="jarak" class="form-control" id="jarak" readonly>
                    </div>

                    <div class="form-group col-4" id="isidenda">
                        <label for="jarak">Biaya (Rp.)</label>
                        <input type="text" name="denda" class="form-control" id="denda" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-4 pl-4">
                        <button class="btn btn-primary" id="btnEdit">Edit</button>
                    </div>
            </div>
        </div>
    </div>


    
 
    <script src="<?=BASE_URL?>/assets/jquery/jquery.js" ></script>
    
    <!-- Datatables -->
    <script type="text/javascript" charset="utf8" src="<?=BASE_URL?>/assets/data-tables/datatables.min.js"></script>

    <script src="<?=BASE_URL?>/assets/js/content/content-denda.js"></script>

    <!-- sweetalert2 -->
    <script src="<?=BASE_URL?>/assets/sweetalert2/sweetalert2.all.min.js"></script>
</html>