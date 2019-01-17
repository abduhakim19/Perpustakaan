<html>
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/bootstrap/css/bootstrap.min.css" />
    
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/font-awesome/css/all.min.css" />
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/animate/animate.css" />

    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/css/layout/navbar.css" />

    <nav class="navbar navbar-style w-100 pl-0 pr-0 pt-0" >
        <ul class="navbar-nav w-100">
            <li class="nav-item bg-user"> 
                <div class="g-user w-50 mx-auto mt-3">
                    <img id="g-user" src="<?=BASE_URL?>/assets/image_admin/<?=$_SESSION['img']?>">
                </div>
                <div id="n-user" class="n-user text-center mt-2 mb-2">
                    hi , <?=Session::get()?>
                </div>
            </li>
            <li class="nav-item mt-2">
                <a href="<?=BASE_URL?>/Home/" class="w-100"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="<?=BASE_URL?>/Peminjaman/"> <i class="far fa-save"></i> Peminjaman</a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown1-toggle collapsed"  data-toggle="collapse" data-target="#wow1" style="cursor: pointer;"> 
                    <i class="fas fa-book"></i> Buku
                </a>
                <div id="wow1" class="collapse  bg-wow rounded-0 pt-0 pb-0" style="border-left: 3px solid white;">
                    <a class="dropdown-item bg-dropdownwow" href="<?=BASE_URL?>/Buku/">Buku</a>
                    <a class="dropdown-item" href="<?=BASE_URL?>/Buku/Kategori">Kategori</a>
                    <a class="dropdown-item" href="<?=BASE_URL?>/Buku/Waktu">Waktu Pengembalian</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="<?=BASE_URL?>/Anggota/"> <i class="fas fa-users"></i> Data Anggota</a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown1-toggle collapsed" data-toggle="collapse" data-target="#wow" style="cursor: pointer;"> 
                    <i class="fas fa-address-book"></i> Murid 
                </a>
                
                <div id ="wow" class=" collapse  bg-wow rounded-0 pt-0 pb-0" style="border-left: 3px solid white;">
                    <a class="dropdown-item bg-dropdownwow" href="<?=BASE_URL?>/Murid/">Input Murid</a>
                    <a class="dropdown-item" href="<?=BASE_URL?>/Murid/Jurusan">Jurusan</a>
                    <a class="dropdown-item" href="<?=BASE_URL?>/Murid/Kelas">Kelas</a>
                    <a class="dropdown-item" href="<?=BASE_URL?>/Murid/Agama">Agama</a>
                    <a class="dropdown-item" href="<?=BASE_URL?>/Murid/Penghasilan">Penghasilan Orangtua</a>
                    <a class="dropdown-item" href="<?=BASE_URL?>/Murid/p=Pendidikan">Pendidikan Orangtua</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="dropdown1-toggle collapsed" data-toggle="collapse" data-target="#wowaja" style="cursor: pointer;"> 
                    <i class="fas fa-file-word"></i></i>  Laporan 
                </a>
                
                <div id ="wowaja" class=" collapse  bg-wow rounded-0 pt-0 pb-0" style="border-left: 3px solid white;">
                    <a class="dropdown-item bg-dropdownwow" href="<?=BASE_URL?>/Laporan/">Peminjaman Perorang</a>
                    <a class="dropdown-item" href="<?=BASE_URL?>/Laporan/Kelas">Peminjaman Perkelas</a>
                    <a class="dropdown-item" href="<?=BASE_URL?>/Laporan/Tanggal">Peminjaman Pertanggal</a>
                    <a class="dropdown-item" href="<?=BASE_URL?>/Laporan/Buku">Buku</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="<?=BASE_URL?>/Pegawai/"><i class="fas fa-users-cog"></i>  Pegawai</a>
            </li>

            <li class="nav-item">
                <a href="<?=BASE_URL?>/BackUp/"><i class="fas fa-retweet"></i>  Back Up</a>
            </li>
            
        </ul>
    </nav>

    <script src="<?=BASE_URL?>/assets/jquery/jquery.js" ></script>

    <script src="<?=BASE_URL?>/assets/bootstrap/js/bootstrap.bundle.js"></script>
    
    <script src="<?=BASE_URL?>/assets/js/layout/navbar.js" ></script>
</html>