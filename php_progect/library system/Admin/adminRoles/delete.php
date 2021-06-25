<?php 

include '../operation/connection.php';
$message = '';

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['id'])){
        $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        if(filter_var($id,FILTER_VALIDATE_INT)){
            $sql = "delete from admin_role where id=".$id;
            $op = mysqli_query($con,$sql);
            if($op){
                $message = 'item deleted';
            }else {
                $message = 'error in delete';
            }
        }else{
            $message = 'invalid id';
        }
    }else{
        $message = 'id not found';
    }
}else{
    $message = 'bad request method';
}

$_SESSION['message'] = $message;
header('Location: display.php');
?>