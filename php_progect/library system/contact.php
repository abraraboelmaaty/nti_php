<?php 
   require './operation/functions.php';
   require './operation/connection.php';
   include 'header.php';

   if($_SERVER['REQUEST_METHOD'] == "POST"){

    $email    = clean($_POST['email']);
    $password = clean($_POST['password']);
    $textMessage=clean($_POST['textMessage']);
    
    $errors = [];

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

      if(count($errors) == 0){

        // handling login
        $password = sha1($password); 
        $sql = "" ;

        $op = mysqli_query($con,$sql);

     

      }
      
      
      else{


        foreach($errors as $key => $messages){

            echo '*'.$key.' :  '.$messages.'<br>';
        }
      }
    }
?>
<div class ="container mt-5">
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password"  name="password" class="form-control" id="exampleInputPassword1">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" name="textMessage" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php 
 include "footer.php"
?>