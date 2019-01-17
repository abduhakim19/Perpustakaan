<html>


    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/bootstrap/css/bootstrap.min.css" />
    <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/font-awesome/css/all.min.css" />

    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/css/content/content-dashboard.css" />

    <?php
        if(isset($_SESSION['pesan']) && $_SESSION['pesan'] == 'loginB'){
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
                title: "Selamat Datang <?=Session::get()?>"
            })
        </script>
    <?php
        }
        $_SESSION['pesan'] = '';
    ?>

    <div class="jContent mt-3 mb-3">
        Dashboard
    </div>
    <div class="row pl-3 mb-4">
        <div class="col-lg-3">
            <div class="card border-0 height-card">
                <div class="card-body pt-0 pb-0 pl-0 pr-0">
                    <div class="row h-100">
                        <div class="col-lg-4 pt-0 pb-0 pl-0 pr-0 text-center bg-icon-Admin">
                            <i class="fas fa-users-cog mt-4 ukuran-icon"></i>
                        </div>
                        <div class="col-lg-8  pl-2">
                            <div class="row mr-1">
                                <div class="col-lg-12 text-center mt-3 text-judul-card">
                                    Jumlah Pegawai
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <?php echo $this->model->JumlahData('perpustakaan_pegawai')?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card border-0 height-card">
                <div class="card-body pt-0 pb-0 pl-0 pr-0">
                    <div class="row h-100">
                        <div class="col-lg-4 pt-0 pb-0 pl-0 pr-0 text-center bg-icon-Users">
                            <i class="fas fa-address-book mt-4 ukuran-icon"></i>
                        </div>
                        <div class="col-lg-8">
                            <div class="row mr-1">
                                <div class="col-lg-12 text-center mt-3 text-judul-card">
                                    Jumlah Murid
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <?php echo $this->model->JumlahData('data_murid')?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card border-0 height-card">
                <div class="card-body pt-0 pb-0 pl-0 pr-0">
                    <div class="row h-100">
                        <div class="col-lg-4 pt-0 pb-0 pl-0 pr-0 text-center bg-icon-Member">
                            <i class="fas fa-users mt-4 ukuran-icon"></i>
                        </div>
                        <div class="col-lg-8 pl-2">
                            <div class="row mr-1">
                                <div class="col-lg-12 text-center mt-3 text-judul-card">
                                    Jumlah Anggota
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <?php echo $this->model->JumlahData('perpustakaan_anggota')?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card border-0 height-card">
                <div class="card-body pt-0 pb-0 pl-0 pr-0">
                    <div class="row h-100">
                        <div class="col-lg-4 pt-0 pb-0 pl-0 pr-0 text-center bg-icon-Books">
                            <i class="fas fa-book mt-4 ukuran-icon"></i>
                        </div>
                        <div class="col-lg-8">
                            <div class="row mr-1">
                                <div class="col-lg-12 text-center mt-3 text-judul-card">
                                    Jumlah Buku
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <?php echo $this->model->JumlahData('perpustakaan_buku')?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4 ">
        <div class="col-lg-9 pr-0">
            <div class="card border-0 mr-2">
                <div class="card-header bg-primary text-white" >
                    Peminjaman
                </div>
                <div class="card-body" style="height: auto">
                    <canvas id="statistikPeminjaman" height="190"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-3 pr-0 pl-0">
            <div class="card border-0 mr-2">
                <div class="card-header bg-primary text-white">
                    Buku
                </div>
                <div class="card-body " style="height: 320px; max-height: 320px; overflow-y: auto;">
                    <?php 
                    
                        foreach($this->model->selectAll('perpustakaan_buku_jenis') as $v){
                        ?>
                            <div class="row border-bottom mb-1">
                                <div class="col-lg-9">
                                    <?=$v['nama_jenis']?>
                                </div>
                                <div class="col-lg-3">
                                   : <?=$this->model->jumlahBukuKategori($v['id_jenis'])?>
                                </div>
                            </div>
                        <?php
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    </div>


    
 
    <script src="<?=BASE_URL?>/assets/momentjs/moment.js" ></script>
    <script src="<?=BASE_URL?>/assets/Chartjs/Chart.bundle.js"></script>
    <script src="<?=BASE_URL?>/assets/jquery/jquery.js" ></script>

    <script src="<?=BASE_URL?>/assets/js/content/content-dashboard.js"></script>

    

</html>