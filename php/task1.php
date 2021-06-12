<?php

$age = 20 ;
if($age >= 18 ){
    echo('eligible to vote');
}else{
    echo('not eligible to vote');
}


$age = 17 ;
if($age >= 18 ){
    echo('<br>'.'eligible to vote');
}else{
    echo('<br>'.'not eligible to vote');
}

echo ($age >= 18 ) ? '<br>'.'eligible to vote' : '<br>'.'not eligible to vote';
?>