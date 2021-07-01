<?php 


include "operation/connection.php";
include "header.php";
include 'navbar.php';



if(!isset( $_SESSION['id'])){
   
    header('Location: login.php');
 }

 $id = $_GET['id'];

 $sql = "SELECT `status` FROM `book` WHERE book.id =".$id;
  $op = mysqli_query($con,$sql);
 
  $data = mysqli_fetch_assoc($op);
  if($data['status']=== 'notAvilable'){
      ?>

       <div class = "container mt-5" >
           <h3 style="color:red">this book not avilable to brrow</h3>
                </div>
    

     <?php
      exit();


  }
 

 $message = '';



$errors = [];
if($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['id'])){
        $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
    }
 }else{
     $message ='bad request method';
 }

 


  $book_id = filter_var($id,FILTER_VALIDATE_INT);
  //
//  echo $book_id;
//  exit();





// handling post request
   if($_SERVER['REQUEST_METHOD'] == "POST"){
   
    $brrowDate     = clean($_POST['brrowDate']);
    $returnDate    = clean($_POST['returnDate']);
    $book_id       =clean($_POST['book_id']);
    $user_id       =clean($_POST['user_id']);








    if(empty($brrowDate)){
        $errors['brrowDate'] = "Empty Field";
    }
    


    if(empty($returnDate)){
        $errors['returnDate'] = "Empty Field";
    }elseif(strtotime($returnDate) < $brrowDate){
        $errors['returnDate'] = "return date must be next brrow date";

    }
    




     if(count($errors) == 0){

     $sql = "INSERT INTO `borrowbooks`( `borrowDate`, `returnDate`, `borrowerId`, `bookId`) VALUES('$brrowDate','$returnDate',$user_id,$book_id)"; 

      $op = mysqli_query($con,$sql);
    //   print_r($op);
    //   exit();

      if($op){
          $message = "brrow";
          header("Location: profile.php");
        //   $sql = "SELECT `cobiedNumber`,`status` FROM `book` WHERE book.id =".$book_id;
        //   $op = mysqli_query($con,$sql);
        //   $data = mysqli_fetch_assoc($op);
        //   $copies = $data['cobiedNumber'];
        //   $copies--;
        //   if($copies<=0){
        //     $sql ="UPDATE `book` SET`status`= 'notAvilable' WHERE book.id = ".$book_id;
        //     $op = mysqli_query($con,$sql);
        //     $sql ="UPDATE `book` SET`cobiedNumber`= $copies WHERE book.id = ".$book_id;
        //     $op = mysqli_query($con,$sql);
        //    }elseif($copies>0){
        //     $sql ="UPDATE `book` SET`status`= 'avilable' WHERE book.id = ".$book_id;
        //     $op = mysqli_query($con,$sql);
        //   }
         
      }else{
          $message = "Try Again";
      }
   
     }else{
         foreach($errors as $key => $value){
             echo '*'.$key.' >>> '.$value.'<br>';
         }
     }

 echo $message;
// echo $book_id;
 



 
   }   





?>
<body>
<div class="container">
                    
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Brrow Book</h3></div>
                <div class="card-body">
                    <form  action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                        <div class="form-group">
                            <label class="small mb-1" for="inputStartDate">brrow Date</label>
                            <input class="form-control py-4" id="inputStartDate" type="date" name="brrowDate" placeholder="Enter brrower Date" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputEndDate">return Date</label>
                            <input class="form-control py-4" id="inputEndDate" type="date" name="returnDate" placeholder="Enter return Date" />
                        </div>
                        <div class="form-group">
                            <!-- <label class="small mb-1" for="inputEndDate">Password</label> -->
                            <input class="form-control py-4" type="hidden" id="inputEndDate" value="<?php echo $book_id;?>" name="book_id"  placeholder="Enter return Date" />
                        </div>
                        <div class="form-group">
                            <!-- <label class="small mb-1" for="inputEndDate">Password</label> -->
                            <input class="form-control py-4" type="hidden" id="inputEndDate" value="<?php echo $_SESSION['id'];?>"  name="user_id" placeholder="Enter return Date" />
                        </div>

                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                            <input type="submit"  value="Brrow" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include 'footer.php';
?>