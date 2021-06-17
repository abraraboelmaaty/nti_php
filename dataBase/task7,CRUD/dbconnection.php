<?php

session_start();

$server = 'localhost';
$dbUser = 'root';
$dbPssword = '';
$dbName = 'php_nti';

$connection = mysqli_connect($server,$dbUser,$dbPssword,$dbName);

if(!$connection){
    die('Error:'.mysqli_connect_error());
}

?>