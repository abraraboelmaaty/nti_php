<?php 
   include "operation/connection.php";
   include "operation/functions.php";
   include 'header.php';

    
  if($_SERVER['REQUEST_METHOD'] == "POST"){

    $email    = clean($_POST['email']);
    $password = clean($_POST['password']);
    
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
        $sql = "select * from borrower where email='$email' and password = '$password' " ;

        $op = mysqli_query($con,$sql);

        $count = mysqli_num_rows($op);

        if($count == 1){
 
          $data = mysqli_fetch_assoc($op);
          
          $_SESSION['id']   =  $data['id'];
         

         header("Location: index.php");

        }else{
            echo 'Error in Email || Password try again ';
        }

      }
      
      
      else{


        foreach($errors as $key => $messages){

            echo '*'.$key.' :  '.$messages.'<br>';
        }
      }

  }
?>

<body class="bg-light">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" />
                                            </div>

                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="btn btn-primary" href="index.php">Login</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="http://localhost/php_nti/nti_php/php_progect/library%20system/signUp.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>



<?php 
    include 'footer.php';
?>