<?php
//session
session_start();

//dbms connection
define('SITEURL','http://localhost/Pet-Adaptation-Vet-Community-main/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','pet adaptation & vet community');
    $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) ;
    $db_select= mysqli_select_db($conn,'pet adaptation & vet community');

    ?>