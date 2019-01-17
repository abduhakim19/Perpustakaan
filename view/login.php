<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>/assets/bootstrap/css/bootstrap.min.css"  />

    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/assets/font-awesome/css/all.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>/assets/css/login.css" />
    <!-- sweetalert2 -->
    <script src="<?=BASE_URL?>/assets/sweetalert2/sweetalert2.all.min.js"></script>
</head>
<body>
    <?php
        if(isset($_SESSION['pesan']) && $_SESSION['pesan'] == 'loginG'){
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
                title: "Username atau Password Salah"
            })
        </script>
    <?php
        }
        $_SESSION['pesan'] = '';
    ?>
    <div class="container-fluid h-100 justify-content-center">
    <div class="row justify-content-center align-middle h-100">
        <div class="col-lg-3 text-center align-self-center bg-login">
            <div class="row">
                <div class="col-12 bg-info text-center jApps pt-2 pb-2">
                    Aplikasi Perpustakaan
                </div>
            </div>
            <div class="jLogin text-center mb-3 mt-2">
                Login
            </div>
            <form action="<?=BASE_URL?>/home/loginAction" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user mx-auto"></i></span>
                    </div>
                    <input type="text" class="form-control" name="username" value="<?php $nama = (isset($_SESSION['namawow'])) ? $_SESSION['namawow'] : '';echo $nama;?>" placeholder="Username">
                </div>
                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-lock mx-auto"></i></span>
                    </div>
                    <input type="password" class="form-control rounded-right pr-45" id="pass" name="password" placeholder="Password">
                    <span class="lihat mr-2">
                        <i id="logo" class="fas fa-eye-slash mx-auto" aria-hidden="true" onclick="lihat(this)"></i>
                    </span>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-4 mb-4">Submit</button>
            </form>
       </div>
    </div>
</div>

<?php
$_SESSION['namawow'] = '';
?>
<script src="<?=BASE_URL?>/assets/jquery/jquery.js"></script>



<script src="<?=BASE_URL?>/assets/js/login.js"></script>
</body>
</html>