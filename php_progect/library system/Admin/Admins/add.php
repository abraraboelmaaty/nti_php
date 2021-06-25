
<?php 

include '../operation/connection.php';
include '../operation/functions.php';
include "../header.php";


// select Admin Role

$sql = "select * from admin_role";
$op  = mysqli_query($con,$sql);

$errors  = [];
$message = ""; 
if($_SERVER['REQUEST_METHOD'] == "POST"){

$name     = clean($_POST['name']);
$email    = clean($_POST['email']);
$password = clean($_POST['password']);
$phone    = Clean($_POST['phone']);
$role     = $_POST['role_id'];

//validate name
if(empty($name)){

$errors['name'] = "Name Field Required";
  
}else{
     if(strlen($name) < 3){
       $errors['name']  = "Name must be >= 3";
     }elseif (!preg_match("/^[a-zA-Z\s*']+$/",$name)) { 
        
         $errors['name']  = "Only chars allowed";

     }    
}



// Validate email 
if(empty($email)){
 $errors['email'] = "Email Field Required";
}else{

// filter_var($email,FILTER_VALIDATE_EMAIL))) == flase || 0 
if(!(filter_var($email,FILTER_VALIDATE_EMAIL))){    
   $errors['email']  = "Invalid Email";
}

}




// Validate Password . 
if(empty($password)){
  $errors['password'] = "Password Field Required";
}else{

  if(strlen($password) < 6){
   $errors['password'] = "Password Must Be >= 6 "; 
  }

}



//validate phone

if(empty($phone)){
    $errors['phone'] = "phone Field Required";
       
    }else{
          if(strlen($phone) < 10){
            $errors['phone']  = "phone must be >= 10";
          }
          elseif (!preg_match("/^\d{11}$/",$phone)) { 
              
              $errors['phone']  = "Only Numbers allowed";
 
          }    
    }



//validate admin role
    if(empty($role)){
        $errors['role'] = "role Field Required";   
        }



if(count($errors) == 0){

    $password = sha1($password);
    $sql = " INSERT INTO `admin`( `email`, `password`, `userName`, `phone`, `role_id`) VALUES ('$email','$password','$name','$phone',$role)";
    $op = mysqli_query($con,$sql);

    if($op){
        $message = "Inserted";
    }else{
        $message = "Try Again";
    }

    $_SESSION['message'] = $message;
     header("Location: display.php");
   }else{
      $_SESSION['error_messsage'] = $errors;
      header("Location: add.php");
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
                        <li class="breadcrumb-item active">Dashboard  >> (add Admin)</li>
                    </ol>

            <?php 

                if(isset($_SESSION['error_messsage'])){
                    foreach($_SESSION['error_messsage'] as $key => $value){
                        echo $key. ' : ' . $value .'<br>';
                    }
                }

               echo $message;
            ?>
                 <!-- form  -->
                <div class="card-body">
                    <form  action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <div class="form-group">
                            <label class="small mb-1" for="input Name">Name</label>
                            <input class="form-control py-4"  name="name" id="inputEmailName" type="text" placeholder="Enter Admin userName"  required />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="input Email">email</label>
                            <input class="form-control py-4"  name="email" id="inputEmailEmail" type="email" placeholder="Enter Admin Email"  required />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="input Password">password</label>
                            <input class="form-control py-4"  name="password" id="input Password" type="password" placeholder="Enter Admin Password"  required />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="input Phone">phone</label>
                            <input class="form-control py-4"  name="phone" id="input Phone" type="text" placeholder="Enter Admin Phone"  required />
                        </div>

                        

                        <div class="form-group">
                            <label for="exampleInputPassword1">Admin Role</label>
                            <select  class="form-control"   name="role_id" >
   
                                <?php
                                    while($data = mysqli_fetch_assoc($op)){
                                ?>
                                <option value="<?php echo $data['id'];?>"><?php echo $data['title'];?></option>
                                <?php
                                        }   
                                ?>

                            </select>


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
           