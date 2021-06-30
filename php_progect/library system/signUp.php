<?php    

include "operation/functions.php";
// include "operation/cheackLogin.php";
include "operation/connection.php";
include 'header.php';


$errors  = [];
$message = ""; 
if($_SERVER['REQUEST_METHOD'] == "POST"){

$firstName       = clean($_POST['firstName']);
$middleName     = clean($_POST['middleName']);
$lastName        = clean($_POST['lastName']);
$email           = clean($_POST['email']);
$userName        = clean($_POST['userName']);
$password        = Clean($_POST['password']);
$confirmPassword = Clean($_POST['confirmPassword']);
$phone           = Clean($_POST['phone']);
$street          = Clean($_POST['street']);
$neighborhood    = Clean($_POST['neighborhood']);
$cityName        = Clean($_POST['cityName']);
$governorate     = Clean($_POST['governorate']);
$gender          = $_POST['gender'];



//validate first name
if(empty($firstName)){

$errors['name'] = "Name Field Required";
  
}else{
     if(strlen($firstName) < 3){
       $errors['firstName']  = "firstName must be >= 3";
     }elseif (!preg_match("/^[a-zA-Z\s*']+$/",$firstName)) { 
        
         $errors['firstName']  = "Only chars allowed";

     }    
}

//validate middle name
if(empty($middleName)){

    $errors['middleName'] = "middleName Field Required";
      
    }else{
         if(strlen($middleName) < 3){
           $errors['middleName']  = "middleName must be >= 3";
         }elseif (!preg_match("/^[a-zA-Z\s*']+$/",$middleName)) { 
            
             $errors['middleName']  = "Only chars allowed";
    
         }    
    }

//validate last name
if(empty($lastName)){

    $errors['lastName'] = "lastName Field Required";
      
    }else{
         if(strlen($lastName) < 3){
           $errors['lastName']  = "lastName must be >= 3";
         }elseif (!preg_match("/^[a-zA-Z\s*']+$/",$lastName)) { 
            
             $errors['lastName']  = "Only chars allowed";
    
         }    
    }    

//validate user name
if(empty($userName)){

    $errors['userName'] = "userName Field Required";
      
    }else{
         if(strlen($userName) < 3){
           $errors['userName']  = "userName must be >= 3";
         }elseif (!preg_match("/^[a-zA-Z\s*']+$/",$userName)) { 
            
             $errors['userName']  = "Only chars allowed";
    
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

//validation confirm password
if($confirmPassword !== $password){
    $errors['confirmPassword'] = 'confirmPassword must be = password';
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

// validate address

//validate street 
if(empty($street)){

    $errors['street'] = "street Field Required";
      
    }else{
         if(strlen($street) < 5){
           $errors['street']  = "street must be >= 5";
         }elseif (!preg_match("/^(?=.*[a-zA-Z])(?=.*\d)\s*/",$street)) { 
            
             $errors['street']  = "must contain numbers and char";
    
         }    
    }

//validation neighborhood
if(empty($neighborhood)){

    $errors['neighborhood'] = "neighborhood Field Required";
      
    }else{
         if(strlen($neighborhood) < 3){
           $errors['neighborhood']  = "neighborhood must be >= 3";
         }elseif (!preg_match("/^[a-zA-Z\s*']+$/",$neighborhood)) { 
            
             $errors['neighborhood']  = "Only chars allowed";
    
         }    
    }

//validation city
if(empty($cityName)){

    $errors['cityName'] = "cityName Field Required";
      
    }else{
         if(strlen($cityName) < 3){
           $errors['cityName']  = "cityName must be >= 3";
         }elseif (!preg_match("/^[a-zA-Z\s*']+$/",$cityName)) { 
            
             $errors['cityName']  = "Only chars allowed";
    
         }    
}   

//validation governorate
if(empty($governorate)){

    $errors['governorate'] = "governorate Field Required";
      
    }else{
         if(strlen($governorate) < 3){
           $errors['governorate']  = "governorate must be >= 3";
         }elseif (!preg_match("/^[a-zA-Z\s*']+$/",$governorate)) { 
            
             $errors['governorate']  = "Only chars allowed";
    
         }    
    }



if(count($errors) == 0){

    $sql = "INSERT INTO `adderss`(`street`, `neighborhood`, `city`, `governorate`) VALUES('$street','$neighborhood','$cityName','$governorate')";
    $op = mysqli_query($con,$sql);
    $last_id = mysqli_insert_id($con);


    $password = sha1($password);
    $sql = " INSERT INTO `borrower`(`firstName`, `middleName`, `lastName`, `userName`, `password`, `email`, `gender`, `phoneNum`, `address`) VALUES ('$firstName','$middleName','$lastName','$userName','$password','$email','$gender','$phone',$last_id)";
    $op = mysqli_query($con,$sql);

    if($op){
        $message = "Inserted";
    }else{
        $message = "Try Again";
    }

    $_SESSION['message'] = $message;
     header("Location: login.php");
     unset($_SESSION['message']);
    
   }else{
      $_SESSION['error_messsage'] = $errors;
      header("Location: signUp.php");
      unset($_SESSION['error_message']);
   }  



?>

    <body class="bg-light">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <?php 
                        if(isset($_SESSION['error_messsage'])){
                            foreach($_SESSION['error_messsage'] as $key => $value){
                                echo $key. ' : ' . $value .'<br>';
                            }
                        }
                        
                        echo $message;
                        
                        }
                        ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header bg-dark"><h3 class="text-center font-weight-light my-4" style="color: white;">Create Account</h3></div>
                                    <div class="card-body bg-dark">
                                        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" style="color: white;" for="inputFirstName">First Name</label>
                                                        <input class="form-control py-4" name="firstName" id="inputFirstName" type="text" placeholder="Enter first name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" style="color: white;" for="inpuMiddleName">middle Name</label>
                                                        <input class="form-control py-4" name="middleName" id="inpuMiddleName" type="text" placeholder="Enter middle name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" style="color: white;" for="inputLastName">Last Name</label>
                                                        <input class="form-control py-4" name="lastName" id="inputLastName" type="text" placeholder="Enter last name" />
                                                    </div>
                                                </div>            

                                            </div>


                                            <div class="form-group">
                                                <label class="small mb-1" style="color: white;" for="inputUserName">UserName</label>
                                                <input class="form-control py-4" name="userName" id="inputUserName" type="text" aria-describedby="emailHelp" placeholder="Enter user name" />
                                            </div>

                                            <div class="form-group">
                                                <label class="small mb-1"  style="color: white;" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" name="email" id="inputEmailAddress" type="text" aria-describedby="emailHelp" placeholder="Enter email address" />
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" style="color: white;" for="inputPassword">Password</label>
                                                        <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" style="color: white;" for="inputConfirmPassword">Confirm Password</label>
                                                        <input class="form-control py-4" name="confirmPassword" id="inputConfirmPassword" type="password" placeholder="Confirm password" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="small mb-1" style="color: white;" for="inputPhone">Phone</label>
                                                <input class="form-control py-4" name="phone" id="inputPhone" type="text" aria-describedby="emailHelp" placeholder="Enter phone number" />
                                            </div>


                                            <div class="form-row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="small mb-1" style="color: white;" for="inputStreet">StreetName</label>
                                                        <input class="form-control py-4" name="street" id="inputStreet" type="text" placeholder="street name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="small mb-1" style="color: white;"  for="inputNeighborhood">neighborhoodName</label>
                                                        <input class="form-control py-4" name="neighborhood" id="inputNeighborhood" type="text" placeholder="Enter Neighborhood Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="small mb-1" style="color: white;"  for="inputCity">cityName</label>
                                                        <input class="form-control py-4" name="cityName" id="inputCity" type="text" placeholder="Enter city name" />
                                                    </div>
                                                </div> 
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="small mb-1" style="color: white;" for="inputGovernorate">GovernorateName</label>
                                                        <input class="form-control py-4" name="governorate" id="inputGovernorate" type="text" placeholder="Enter governorate name" />
                                                    </div>
                                                </div>            

                                            </div>

                                              
                                            <div class="form-group">
                                                <label class="small mb-1 d-block" style="color: white;">Gender</label>
                                                <input name="gender"   type="radio"   value="male" />
                                                <label >male</label>
                                                <input  name="gender"  type="radio"  value= "female" />
                                                <label >Female</label>
                                            </div>

                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <input type="submit" class="btn btn-primary" value="SignUp"> 
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center bg-dark">
                                        <div class="small"><a href="<?php echo url('login.php');?>">Have an account? Go to login</a></div>
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


  
