<?php
require_once 'assets/data-tables/ssp.class.php';
require_once 'config/config.php';
require_once 'core/Route.php';
require_once 'core/Controller.php';
require_once 'core/Session.php';
require_once 'controller/Error1.php';
$url = (isset($_SERVER['PATH_INFO'])) ? explode ('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];

session_start();

Router::route($url);

?>