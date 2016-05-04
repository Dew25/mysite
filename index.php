<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    require_once "myLoader.php";
    //регистрация автозагрузчика
    spl_autoload_register('myLoader');

 echo md5(md5(md5('user')));echo '<br>';
 //phpinfo();
// echo "<br>".time();
// print_r(getdate(time()));
// echo "<br>year=".getdate(time())['year'];
// echo "<br>TimeZone: ".date_default_timezone_get();
// $dt=new DateTime();
// echo "<br> Zone=". $dt->getTimeZone()->getName();
    $app= new Application();
    $app->run();
