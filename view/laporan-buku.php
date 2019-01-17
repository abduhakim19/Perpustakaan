<!DOCTYPE html>
<html>
<head>
    <title>Laporan Buku</title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>/assets/css/kategori.css"  />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>/assets/bootstrap/css/bootstrap.min.css"  />
</head>
<body>
<div class="container-fluid h-100">
    <div class="row">
        <div class="col-lg-2 bg-left pl-0 pr-0 sticky-top" style="height: 100vh; overflow: auto"> 
            <?php $this->layout('navbar') ?>
        </div>
        <div class="col-lg-10 container">
            <div class="row h-10">
                <div class="col">
                    <?php $this->layout('header')?>
                </div>
            </div>
            <div class="row" >
                <div class="col bg-content pb-4" style="height: 440px;">
                    <?php $this->content('content-laporan-buku'); ?>
                </div>
            </div>
            <div class="row posisi-absolute">
                <div class="col pl-0 pr-0">
                   <?php $this->layout('footer'); ?>
                </div>
            </div>
        </div>
    </div>
  </div>
</body>
</html>