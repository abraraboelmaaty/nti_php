<?php 
    require 'dbconnection.php';
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        $message ='';
    if(filter_var($id,FILTER_VALIDATE_INT)){

    $sql = "select * from products where id = ".$id;
    $opperation = mysqli_query($connection,$sql);

    if(mysqli_num_rows($opperation)==0){
        $message = 'id not found';
    }else{
        $data = mysqli_fetch_assoc($opperation);
    }

    

}else{
    $message = 'invalid id';
}

    if(strlen($message)>0){
        $_SESSION['massage'] = $message;
        header('Location: display.php');
    }

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  </head>


  <body>
    <div class="container">
        <h2 class='mt-5'>Edit adta</h2>

        <form   action="<?php  echo $_SERVER['PHP_SELF']; ?>"   method="post"  enctype ="multipart/form-data">
    
            <div class="form-group">
            <label for="InputName">Name</label>
            <input type="text"   name="name" value="<?php echo $data['name']?>"  class="form-control" id="InputName"  placeholder="name..."   aria-describedby="" placeholder="Enter Name">
            </div>

      

            <div class="form-group">
            <label for="InputCode">code</label>
            <input type="number" name="code" value="<?php echo $data['code']?>"class="form-control" id="InputCode"  placeholder="code..">
            </div>
    
    
            <div class="form-group">
            <label for="InputPrice">price</label>
            <input type="number" name="price" value="<?php echo $data['price']?>" class="form-control" id="InputPrice"  placeholder="price...">
            </div>

            <div class="form-group">
            <label for="InputCategory">category</label>
            <input type="text"  name="category" value="<?php echo $data['category']?>" class="form-control" id="InputCategory" placeholder="category.." aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <input type='hidden' name='id' value="<?php echo $data['id']?>">
      
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <div>
      <?php 

        
        //handel form
        //clean fuction
        function Clean($input){

          $input = trim($input);
          $input = htmlspecialchars($input);  
          $input = stripcslashes($input);
      
          return $input;
         }

         $errorMessage = array();

        if($_SERVER['REQUEST_METHOD'] == "POST"){  
        $name     = Clean($_POST['name']);
        $code     = Clean($_POST['code']);
        $price    = Clean($_POST['price']);
        $category = Clean($_POST['category']);
        $id       = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
        $message  = ''; 

        //name validation 
        if(empty($name)){
          $errorMessage['name'] = 'name field requried';
        }else{
          if(strlen($name) <= 3){
          $errorMessage['name']  = "Name must be => 3 char";
          }elseif (!preg_match("^[a-zA-Z ]*$^",$name)) {
              
              $errorMessage['name']  = "only chars allowed";

          }    
        }

         //code validation
         if(empty($code)){
          $errorMessage['code'] = "code field required";
          }elseif(!filter_var($code,FILTER_VALIDATE_INT)){
            $errorMessage['code'] = 'code must be integer';
          }
        

        //validation price 
        if(empty($price)){
            $errorMessage['price'] = "price field required";
        }elseif(!filter_var($price,FILTER_VALIDATE_INT)){
          $errorMessage['price'] = 'price must be integer';
        }
        
        //validation category
        if(empty($category)){
          $errorMessage['category'] = 'category filed is requried';
        }elseif (!preg_match("^[a-zA-Z ]*$^",$category)) {
              
          $errorMessage['category']  = "only chars allowed";
         }//elseif(strlen($category) >= 50){
        //   $errorMessage['category']  = "category must be <= 50 char";

         // validate id 
        if(!filter_var($id,FILTER_VALIDATE_INT)){

        $errorMessage['id'] = "Invalid ID";
         }

        //print error massege 
        if(count($errorMessage) > 0){
 
          foreach($errorMessage as $key => $data){
      
            echo $key.' >>> '.$data.'<br>';
          }
        }else{
            $sql = "update products set name = '$name', code=$code, price=$price, category='$category' where id =".$id;
            $opperation = mysqli_query($connection,$sql);
        }
        //print error massege
       if(count($errorMessage) ==  0){
  
    

        $sql = "update products set name = '$name', code=$code, price=$price, category='$category' where id =".$id;
        $opperation = mysqli_query($connection,$sql);

        if($opperation){ 
        $message =  'data updated';
         }else{
        $message =  'error try again ';
        }

        $_SESSION['message'] = $message;
        header("Location: display.php");

        }else{
        $_SESSION['errorMessage'] = $errorMessage;   
        header("Location: update.php?id=".$id); 
        }




        }
      
      ?>
    </div>

    </div>
   

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  </body>
</html>

