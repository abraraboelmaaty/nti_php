<?php

$student = ['name'=>'abrar','id'=>1];
$data = json_encode($student);


$json=fopen('json.txt','a') or die('unuble to open');
fwrite($json,$data) ;
fclose($json);

?>