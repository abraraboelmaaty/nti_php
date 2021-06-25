<?php 

 # clean code function ... 
 function clean($input){
    
    $input = trim($input);
    $input = htmlspecialchars($input);   
    $input = stripcslashes($input);

    return $input;
   }


?>