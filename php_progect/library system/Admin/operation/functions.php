<?php 



session_start();
 # clean code function ... 
 function clean($input){
    
    $input = trim($input);
    $input = htmlspecialchars($input);   
    $input = stripcslashes($input);

    return $input;
   }



// get url

function url($url){
  return "http://".$_SERVER['HTTP_HOST']."/php_nti/nti_php/php_progect/library%20system/Admin/".$url;
}

?>