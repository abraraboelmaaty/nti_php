<?php 

session_start();

foreach($_SESSION['userData'] as $key => $value){
    
    echo $key.' >>> '.$value.'<br>';
  }
?>