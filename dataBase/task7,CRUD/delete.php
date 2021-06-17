<?php 

require 'dbconnection.php'; 
$id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
$message ='';
if(filter_var($id,FILTER_VALIDATE_INT)){

    $sql = "delete from products where id = ".$id;
    $opperation = mysqli_query($connection,$sql);

    if($opperation){
        $message = 'product deleted';
    }else {
        $message = 'error in delete product';
    }

}else{
    $message = 'invalid id';
}

$_SESSION['massage'] = $message;

header("Location: display.php");

?>