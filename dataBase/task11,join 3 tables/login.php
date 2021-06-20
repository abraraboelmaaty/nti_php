<?php 
  require 'dbConnection.php';
   

  # clean code function ... 
  function Clean($input){
    
    $input = trim($input);
    $input = htmlspecialchars($input);   // < &lt; > &gt;
    $input = stripcslashes($input);

    return $input;
   }


  if($_SERVER['REQUEST_METHOD'] == "POST"){
    // CODE ... 


    $email    = Clean($_POST['email']);
    $password = Clean($_POST['password']);
    
    $errorMessages = [];



      // Validate email 
      if(empty($email)){
        $errorMessages['email'] = "Email Field Required";
     }else{
      
      // filter_var($email,FILTER_VALIDATE_EMAIL))) == flase || 0 
      if(!(filter_var($email,FILTER_VALIDATE_EMAIL))){    
          $errorMessages['email']  = "Invalid Email";
      }
  
     }
  
  
     // Validate Password . 
     if(empty($password)){
         $errorMessages['password'] = "Password Field Required";
     }else{
  
         if(strlen($password) < 6){
          $errorMessages['password'] = "Password Must Be >= 6 "; 
         }
  
     }



      if(count($errorMessages) == 0){

        // login code ..... 
        $password = sha1($password); 
        $sql = "select * from users where email='$email' and password = '$password' " ;

        $op = mysqli_query($con,$sql);

        $count = mysqli_num_rows($op);

        if($count == 1){
            // login code .... 

          $data = mysqli_fetch_assoc($op);
          
          $_SESSION['id']   =  $data['id'] ;
          $_SESSION['name'] =  $data['name'] ;

         header("Location: display.php");

        }else{
            echo 'Error in Email || Password try again ';
        }

      }else{


        foreach($errorMessages as $key => $messages){

            echo '*'.$key.' :  '.$messages.'<br>';
        }




      }







  }



?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
  <h2>Login</h2>

  <form   action="<?php  echo $_SERVER['PHP_SELF']; ?>"   method="post"  enctype ="multipart/form-data">


  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1"> Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>

</body>
</html>
