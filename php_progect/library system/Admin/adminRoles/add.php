
<?php 

    include '../operation/functions.php';
    include "../operation/cheackLogin.php";
    include '../operation/connection.php';
    
    include "../header.php";


    $errors = [];
    $message ="";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = clean($_POST['title']);
    
    
    if(empty($title)){
        $errors ['title']= 'empty field';
    }elseif(strlen($title)<3){
        $errors ['title'] = 'length must be => 3';
    }else{
        $patern = '/^[a-zA-Z\s*]+$/';
        if(!preg_match($patern,$title)){
            $errors['title'] = 'title must be char';
        }
    }

    if(count($errors) == 0){

        $sql = "INSERT INTO `admin_role`( `title`) VALUES ('$title')";
  
        $op = mysqli_query($con,$sql);

       
  
        if($op){
            $message = "Inserted";
        }else{
            $message = "Try Again";
        }
  
       }
   
}
?>


    <body class="sb-nav-fixed">

<?php 
     include '../nav.php';
?>


        <div id="layoutSidenav">
<?php 
    include '../sideNav.php';
?>  


            <div id="layoutSidenav_content">
                <main>

                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                <?php 

                    if(count($errors)>0){
                        foreach($errors as $key => $value){
                            echo $key. ' => ' . $value .'<br>';
                        }
                    }

                    echo $message;
                ?>
                     <!-- form  -->
                    <div class="card-body">
                        <form  action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Title</label>
                                <input class="form-control py-4"  name="title" id="inputEmailAddress" type="text" placeholder="Enter Role title"  required />
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                <input type="submit" class="btn btn-primary" value="Save"> 
                            </div>
                        </form>
                    </div>
                    </div>
                </main>
            </div> 
        </div>      

<?php 

include "../footer.php";

?>
               