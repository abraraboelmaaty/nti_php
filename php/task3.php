
<?php
    $months = array('jan','feb','march','april','may');
    foreach($months as $key => $month){
    
        if($month=='april'){
            unset($months[$key]);
        }
        echo $month .'<br>';
    }
    $months = array_values($months);
    foreach($months as $key => $month){
    
      
        echo $key .' => ' .$month .'<br>';
    }
    
?>
