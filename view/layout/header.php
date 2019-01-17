<html>
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/css/layout/header.css" />

    <div class="row bg-header">
        <div class="col">
            <div class=" float-right mt-4 mr-4 bg-logout">
                <a>Logout <i class="fas fa-sign-out-alt ml-1"></i></a> 
            </div>
            <div class="jAplikasi mt-3 ml-3">
                Aplikasi Perpustakaan
            </div>
        </div>
    </div>
    <div class="row bg-link">
        <div class="col pt-2 text-link">
            <?php 
                $url = (isset($_SERVER['PATH_INFO'])) ? explode ('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];
                $controller = (isset($url[0])) ? $url[0] : 'Home';
                array_shift($url);
        
                $method = (isset($url[0])) ? $url[0] : ' ';
                array_shift($url);
            ?>
            <a href="<?=BASE_URL?>/<?=$controller?>"><?=$controller?><a> / <?=$method?>
        </div>
    </div>

    <script src="<?=BASE_URL?>/assets/jquery/jquery.js"></script>
    
    <script src="<?=BASE_URL?>/assets/js/header.js"></script>
    <!-- sweetalert2 -->
    <script src="<?=BASE_URL?>/assets/sweetalert2/sweetalert2.all.min.js"></script>
    
    

</html>