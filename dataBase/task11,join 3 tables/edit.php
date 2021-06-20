<?php 

  require 'dbConnection.php';
 
   if(isset($_SESSION['id'])){



  if($_SERVER['REQUEST_METHOD'] == "GET"){

    $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $message = '';

    if(filter_var($id,FILTER_VALIDATE_INT)){
        // CODE 
     
        $sql = "select * from users where id=".$id;
        $op  = mysqli_query($con,$sql);

         if(mysqli_num_rows($op) == 0){
             $message = "Id not found";
         }else{
             $data = mysqli_fetch_assoc($op);
         }

    
    }else{
           $message = "Invalid id";
    }
  


    if(strlen($message) > 0){

        $_SESSION['message'] = $message;
        header("Location: display.php");
    }
  } 







  # Functio to clean inputs .... 

  function Clean($input){
    
    $input = trim($input);
    $input = htmlspecialchars($input);   // < &lt; > &gt;
    $input = stripcslashes($input);

    return $input;
   }


   $errorMessages = array();


   # form handling 
if($_SERVER['REQUEST_METHOD'] == "POST"){

 // code ....
 
 $name     = Clean($_POST['name']);
 $email    = Clean($_POST['email']);
 $age      = Clean($_POST['age']);
 $id       = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
 $message  = ''; 


 # METHOD 2 ... 

if(empty($name)){

$errorMessages['name'] = "Name Field Required";
   
}else{
      if(strlen($name) < 3){
        $errorMessages['name']  = "Name must be >= 3";
      }elseif (!preg_match("/^[a-zA-Z-']*$/",$name)) {
          # code...
          $errorMessages['name']  = "Only chars allowed";

      }    
}



// Validate email 
if(empty($email)){
  $errorMessages['email'] = "Email Field Required";
}else{

// filter_var($email,FILTER_VALIDATE_EMAIL))) == flase || 0 
if(!(filter_var($email,FILTER_VALIDATE_EMAIL))){    
    $errorMessages['email']  = "Invalid Email";
}

}

// Validate age 
if(empty($age)){
$errorMessages['age'] = "Age Field Required";

}elseif( !(($age > 0) && ($age <= 100) )){

   $errorMessages['age'] = "Age must be between 1 to 100";

}elseif(!filter_var($age,FILTER_VALIDATE_INT)){
  
   $errorMessages['age'] = "Invalid Age";

}


 // validate id 
 if(!filter_var($id,FILTER_VALIDATE_INT)){

 $errorMessages['id'] = "Invalid ID";
}




// PRINT ERROR MESSAGES 
if(count($errorMessages) ==  0){
  
    // db

  $sql = "update users set name = '$name' , email = '$email' , age=$age  where id = ".$id;
  $op  =  mysqli_query($con,$sql);

  if($op){ 
     $message =  'Data updated';
   }else{
     $message =  'Error Try Again !!';
    }

    $_SESSION['message'] = $message;
    header("Location: display.php");

  }else{
    $_SESSION['errorMessage'] = $errorMessages;   
    header("Location: edit.php?id=".$id); 
   }

  

}













?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">




  <h2>Edit Account</h2>

  <form   action="<?php  echo $_SERVER['PHP_SELF']; ?>"   method="post"  enctype ="multipart/form-data">
 
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text"   name="name"  value="<?php echo $data['name'];?>" class="form-control" id="exampleInputName"     aria-describedby="" placeholder="Enter Name">
  </div>

    <input type="hidden" name="id"  value="<?php echo $data['id'];?>">

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text"  name="email" value="<?php echo $data['email'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
 
  <div class="form-group">
    <label for="exampleInputPassword1">age</label>
    <input type="number" name="age" value="<?php echo $data['age'];?>" class="form-control"  placeholder="age">
  </div>
  
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

</body>
</html>





<?php 

 

  if(isset( $_SESSION['errorMessage'])){

   // print_r( $_SESSION['errorMessage']);
       foreach($_SESSION['errorMessage'] as $key => $data){

      echo '*'.$key.' >>> '.$data.'<br>';

    }

  }



   }else{

    header("Location: login.php");

   }



?>
