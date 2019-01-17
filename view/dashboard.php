<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>/assets/css/dashboard.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=BASE_URL?>/assets/bootstrap/css/bootstrap.min.css" />
</head>
<body>
<div class="container-fluid h-100">
    <div class="row">
        <div class="col-lg-2 bg-left pl-0 pr-0 sticky-top" style="height: 100vh; overflow: auto"> 
            <?php $this->layout('navbar') ?>
        </div>
        <div class="col-lg-10">
            <div class="row">
                <div class="col">
                    <?php $this->layout('header')?>
                </div>
            </div>
            <div class="row">
                <div class="col bg-content" >
                    <?php $this->content('content-dashboard') ?>
                </div>
            </div>
            <div class="row bg-warning ">
                <div class="col pl-0 pr-0 h-100 posisi-relative">
                    <?php $this->layout('footer') ?>
                </div>
            </div>
        </div>
    </div>
  </div>
</body>
</html>