
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, intial-scale=1.0">
        <title>form validation</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h3 class="mt-4">Form validation</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" name="name" class="form-control" id="inputName" >
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword4">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Linkedin url</label>
                    <input type="url" name="linkedin" class="form-control" id="inputAddress2" >
                </div>
                <div class="form-check d-flex flex-row">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male" >
                    <label class="form-check-label" for="exampleRadios1">
                    male
                    </label>
                </div>       
                <div class="form-check d-flex flex-row">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
                    <label class="form-check-label" for="exampleRadios2">
                    female
                    </label>
                </div>
                <button type="submit" class="btn btn-primary mt-3" >submit</button>
            </form>
        </div>    
        
        <div class='container'>
        <?php

        session_start();
        


        function clean($input){
            $input = trim($input);
            $input = htmlspecialchars($input);
            $input = stripslashes($input);
            return $input;
        }

        $errorMessage = array();

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $name     = clean($_POST['name']);
            $email    = clean($_POST['email']);
            $password = clean($_POST['password']);
            $address  = clean($_POST['address']);
            $linked   = clean($_POST['linkedin']);
            $gender   = clean($_POST['gender']);  

            //name validation 
            if(empty($name)){
                $errorMessage['name'] = 'name field requried';
            }else{
                if(strlen($name) < 6){
                  $errorMessage['name']  = "Name must be => 6";
                }elseif (!preg_match("^[a-zA-Z ]*$^",$name)) {
                    
                    $errorMessage['name']  = "only chars allowed";
      
                }    
          }

            //email validation
            if(empty($email)){
                $errorMessage['email'] = "email field required";
             }else{

              if(!(filter_var($email,FILTER_VALIDATE_EMAIL))){    
                  $errorMessage['email']  = "invalid email";
              }
          
             }

            //password validation
            if(empty($password)){
                $errorMessage['password'] = "password field required";
            }else{
         
                if(!preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})^",$password)){
                 $errorMessage['password'] = "password must be at least 8 char,1digit,1 upper case letter ,1 lowercase letter,and 1 special char"; 
                }
         
            }

            //address validation 
            if(empty($address)){
                $errorMessage['address'] = "address field required";
            }

            //address validation 
            if(empty($linked)){
                $errorMessage['linkedin'] = "linkedin url field required";
            }else{

                if(!(filter_var($linked,FILTER_VALIDATE_URL))){    
                    $errorMessage['linkedin']  = "invalid url";
                }
            
               }

            //gender validation 
            if(empty($gender)){
                $errorMessage['gender'] = "gender field required";
            }

             // print errorMessage 
            if(count($errorMessage) > 0){

            foreach($errorMessage as $key => $value){
    
            echo $key.' >>> '.$value.'<br>';
    
            }
        }else{

            $userData = array($name,$email,$password,$address,$gender,$linked);
               
                $_SESSION['userData']  = $userData;
            
                  }
        
            echo $name.'<br>'.  $email.'<br>'.$password.'<br>'.$address.'<br>'.$linked.'<br>'.$gender;
        }
        ?> 
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        
    </body>  

</html>  


 