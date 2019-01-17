<html>
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/css/content/content-laporan.css" />

    <?php
        if(isset($_SESSION['pesan']) && $_SESSION['pesan'] == 'eksporB'){
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
                title: "Data Berhasil di Back Up"
            })
        </script>
    <?php
        }else if( isset($_SESSION['pesan']) && $_SESSION['pesan'] == 'eksporG' ){
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
                title: "Data Gagal di Back Up"
            })
        </script>

            <?php
        }
        $_SESSION['pesan'] = '';
    ?>
    <div class="jContent mt-3 mb-3">
        Back Up Database
    </div>
    <div class="card">
        <div class="card-body">
            Back Up database ini adalah untuk menghapus data semua data peminjaman jika sudah melebihi batasnya dan memindahkan semua isinya ke dalam file excel 
            <button class="btn btn-primary float-right mt-5" id="btnEksport">Eksport</button>
        </div>
    </div>


    <script src="<?=BASE_URL?>/assets/jquery/jquery.js" ></script>


    <script src="<?=BASE_URL?>/assets/js/plugin-jquery/jquery-redirect.js"></script>
    

    <script src="<?=BASE_URL?>/assets/js/content/content-backup.js"></script>
    <!-- sweetalert2 -->
    <script src="<?=BASE_URL?>/assets/sweetalert2/sweetalert2.all.min.js"></script>
</html>