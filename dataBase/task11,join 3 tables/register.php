<?php 

require 'dbConnection.php';


  # fetch Departments .... 

  $sql = "select * from departments";
  $op  = mysqli_query($con,$sql);
  $count = mysqli_num_rows($op);
  




  # clean code function ... 
  function Clean($input){
    
    $input = trim($input);
    $input = htmlspecialchars($input);   // < &lt; > &gt;
    $input = stripcslashes($input);

    return $input;
   }


   $errorMessages = array();

   if($_SERVER['REQUEST_METHOD'] == "POST"){

    // code ....
 
      $name       = Clean($_POST['name']);
      $email      = Clean($_POST['email']);
      $password   = Clean($_POST['password']);
      $nationalId = Clean($_POST['nationalId']);
      $age        = Clean($_POST['age']);
      $dep_id     =  Clean($_POST['dep_id']);
 
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
 
 
 
 
    // Validate Password . 
    if(empty($password)){
        $errorMessages['password'] = "Password Field Required";
    }else{
 
        if(strlen($password) < 6){
         $errorMessages['password'] = "Password Must Be >= 6 "; 
        }
 
    }


     // Validate nationalID 


   if(empty($age)){
    $errorMessages['nationalId'] = "Age Field Required";
  
   }
   elseif(!filter_var($age,FILTER_VALIDATE_INT)){
      
       $errorMessages['anationalId'] = "Invalid nationalID";

   }
 
   // Validate age 


   if(empty($age)){
     $errorMessages['age'] = "Age Field Required";
   
    }elseif( !(($age > 0) && ($age <= 100) )){

        $errorMessages['age'] = "Age must be between 1 to 100";

    }elseif(!filter_var($age,FILTER_VALIDATE_INT)){
       
        $errorMessages['age'] = "Invalid Age";

    }




   // Validate dep_id 


   if(empty($dep_id)){
    $errorMessages['dep_id'] = "Age Field Required";
  
   }elseif( !(($dep_id > 0) && ($dep_id <= 100) )){

       $errorMessages['dep_id'] = "department must be> 0";

   }elseif(!filter_var($dep_id,FILTER_VALIDATE_INT)){
      
       $errorMessages['dep_id'] = "Invalid Age";

   }




    



 
     // PRINT ERROR MESSAGES 
     if(count($errorMessages) > 0){
 
         foreach($errorMessages as $key => $data){
     
           echo $key.' >>> '.$data.'<br>';
     
         }
       }else{
 
    // db 

      $password = sha1($password);  // md5
       $sql = "insert into nationalids(national_id) values ($nationalId)";
      //  $mysqli->query($sql);
      //  $last_id = $mysqli->insert_id;
      //  echo $last_id;
       $op  =  mysqli_query($con,$sql);
       $last_id = mysqli_insert_id($con);
      //  echo $last_id;
      //  $nat_id = "SELECT LAST_INSERT_ID() FROM nationalids";
      // echo $nat_id;
       $sql = "insert into users (name,email,password,nationalId,age,dep_id) values ('$name','$email','$password',$last_id,$age,$dep_id)";
      //  "select MAX(id) from nationalids";

       $op  =  mysqli_query($con,$sql);

if($op){
   
  header("Location: display.php"); 
}else{
  echo 'Error Try Again !!';
}
 
       }
     
   


    }
    





?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
  <h2>Register</h2>

  <form   action="<?php  echo $_SERVER['PHP_SELF']; ?>"   method="post"  enctype ="multipart/form-data">
 
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text"   name="name"  class="form-control" id="exampleInputName"     aria-describedby="" placeholder="Enter Name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="nationalID">nationalID</label>
    <input type="number" name="nationalId" class="form-control" id="nationalID"  placeholder="nationalID">
  </div>
 
 
  <div class="form-group">
    <label for="exampleInputPassword1">age</label>
    <input type="number" name="age" class="form-control"  placeholder="age">
  </div>
  

  <div class="form-group">
  <label for="exampleInputPassword1">Department</label>
   <select  class="form-control"   name="dep_id" >
   
   <?php 
   
     if($count > 0){
    while($data = mysqli_fetch_assoc($op)){
   ?>
   <option value="<?php echo $data['id'];?>"><?php echo $data['name'];?></option>
<?php
        }
      }else{
         echo '<option>No Available departments</option>';

      }
 ?>

   </select>


  </div>




  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>

















