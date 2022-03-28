<?php 
require_once "./back/db_function.php";
require_once "./back/function.php";
ob_start();
require_once "./front/header.php";
require_once $content;
require_once "./front/footer.php";
$pagecontent = ob_get_clean();
$transkey = (extractkeys($pagecontent));
$menutrans = menutrans($transkey);
$maptrans = maptrans($menutrans);
echo finaltrans($pagecontent, $maptrans);