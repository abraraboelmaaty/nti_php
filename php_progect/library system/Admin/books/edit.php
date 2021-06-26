
<?php 

include '../operation/functions.php';
include "../operation/cheackLogin.php";
include '../operation/connection.php';
include "../header.php";

# Handle Get Request ..... 
$errors  = [];
$message = "";


if($_SERVER['REQUEST_METHOD'] == "GET"){
  
  if(isset($_GET['id'])){

      $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

      if(filter_var($id,FILTER_VALIDATE_INT)){
          
  
          $sql = "select * from book where id  =".$id;
      
          $op  = mysqli_query($con,$sql);

          $count = mysqli_num_rows($op);
  
          



    if($count == 0){
      $message = "invalid Id";  
      $errors['id'] = 1 ;

    }


  
      }else{
          $message = "inValid id value";
          $erros['id'] = 1 ;
      }


  }else{
    $message     = "Id Not Founded";  
    $erros['id'] = 1 ;
  }

  


    if(count($errors) > 0 ){
        $_SESSION['message'] = $message;
        header("Location: display.php");
    }else{
        $data = mysqli_fetch_assoc($op);
    }

}







$sql = "select * from auther";
$op  = mysqli_query($con,$sql);
$autherDate = mysqli_fetch_assoc($op); 


$sql = "select * from puplisher";
$op  = mysqli_query($con,$sql);
$publisherDate = mysqli_fetch_assoc($op); 

// select book category
$sql = "select * from category";
$op  = mysqli_query($con,$sql);

//handling post method
if($_SERVER['REQUEST_METHOD'] == "POST"){

$name         = clean($_POST['name']);
$code         = clean($_POST['code']);
$description  = clean($_POST['description']);
$copied       = Clean($_POST['copied']);
$auther       = $_POST['auther'];
$publisher    = $_POST['publisher'];
$image        = '';
$category_id  = filter_var($_POST['category_id'],FILTER_SANITIZE_NUMBER_INT);
$id           = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
// $auther_id    = filter_var($_POST['auther_id'],FILTER_SANITIZE_NUMBER_INT);
// $publisher_id = filter_var($_POST['publisher_id'],FILTER_SANITIZE_NUMBER_INT);
$oldImage     = $_POST['oldImage'];

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

//validate code
if(empty($code)){

    $errors['code'] = "code Field Required";
      
    }else{
         if(strlen($code) < 3){
           $errors['code']  = "code must be >= 3";
         }   
    }

// validate description 
if(empty($description)){
   
    $errors['description'] = "description Field Required";
       
    }else{
          if(strlen($description) < 20){
            $errors['description']  = "description must be >= 20";
        }
    }

//validate copied
    if(empty($copied)){
   
        $errors['copied'] = "copied Field Required";
           
        }


//validate publisher
// if(empty($publisher)){

//     $errors['publisher'] = "publisher Field Required";
      
//     }else{
//          if(strlen($publisher) < 3){
//            $errors['publisher']  = "publisher must be >= 3";
//          }elseif (!preg_match("/^[a-zA-Z\s*']+$/",$publisher)) { 
            
//              $errors['publisher']  = "Only chars allowed";
    
//          }    
//     }

//validate auther
// if(empty($auther)){

//     $errors['auther'] = "auther Field Required";
      
//     }else{
//          if(strlen($auther) < 3){
//            $errors['auther']  = "auther must be >= 3";
//          }elseif (!preg_match("/^[a-zA-Z\s*']+$/",$auther)) { 
            
//              $errors['auther']  = "Only chars allowed";
    
//         }    
// }

//validate category
if(empty($category_id)){
    $errors['category_id'] = "Category Field Required";   
    }


//imge
if(!empty($_FILES['image']['name'])){

    $fileTempPath  = $_FILES['image']['tmp_name'];
    $fileName      = $_FILES['image']['name'];
    
    // echo $fileTempPath;
    // exit();

    $fileExtension =   explode(".",$fileName);
    
    $newName = rand().time().'.'.strtolower($fileExtension[1]);

     $allowedExtensions = array('png','jpg');

     if(in_array($fileExtension[1],$allowedExtensions)){

     
      
      $uploaded_folder = "./uploads/";

      $desPath = $uploaded_folder.$newName;

     if(!move_uploaded_file($fileTempPath,$desPath)){
        $errors['image'] = "Error in Uplading file";  
     }else{
         $image =  $newName;

         if(file_exists("./uploads/".$oldImage)){
            unlink("./uploads/".$oldImage);
        }
     }


     }else{

        $errors['image'] =  'Not Allowed Extension';
     }
    }else{

        $image  = $oldImage;
       

    }


if(count($errors) == 0){

    // $sql = "INSERT INTO `auther`(`name`) VALUES('$auther')";
    // $op = mysqli_query($con,$sql);
    // $auther_id = mysqli_insert_id($con);

    // $sql = "INSERT INTO `puplisher`( `name`) VALUES('$publisher')";
    // $op = mysqli_query($con,$sql);
    // $publisher_id = mysqli_insert_id($con);

    // $sql = "UPDATE `auther` SET `name`='$auther' WHERE id=".$auther_id;
    // $op = mysqli_query($con,$sql);

    // $sql = "UPDATE `puplisher` SET `name`='$publisher' WHERE id=".$auther_id;
    // $op = mysqli_query($con,$sql);

    $addBy = $_SESSION['id'];
    $sql = " UPDATE `book` SET `name`='$name',`code`='$code',`descreption`='$description',`cobiedNumber`='$copied',`categoryId`='$category_id',`photo`='$image' WHERE id=".$id;
    $op = mysqli_query($con,$sql);

    if($op){
        $message = "updated";
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
                        <li class="breadcrumb-item active">Dashboard  >> (update book)</li>
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
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="small mb-1" for="input Name">Name</label>
                            <input class="form-control py-4"  name="name" value="<?php echo $data['name'];?>" id="input Name" type="text" placeholder="Enter book name"  required />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="input code">code</label>
                            <input class="form-control py-4"  name="code" value="<?php echo $data['code'];?>" id="input code" type="text" placeholder="Enter book code"  required />
                        </div>

                        <div class="form-group">
                            <label class="small mb-1">Description</label>
                             <textarea class="form-control py-4" name="description"><?php echo $data['descreption'];?></textarea>
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="input copied">copied number</label>
                            <input class="form-control py-4"  name="copied" value="<?php echo $data['cobiedNumber'];?>" id="input copied" type="number" placeholder="Enter copied number of book"  required />
                        </div>

                        <!-- <div class="form-group">
                            <label class="small mb-1" for="inputautherName">auther</label>
                            <input class="form-control py-4"  name="auther" value="<?//php echo $autherDate['name'];?>" id="inputautherName" type="text" placeholder="Enter book auther"  required />
                        </div> -->

                        <!-- <div class="form-group">
                            <label class="small mb-1" for="inputpublisherName">publisher</label>
                            <input class="form-control py-4"  name="publisher" value="<?//php echo $publisherDate['name'];?>" id="inputpublisherName" type="text" placeholder="Enter book publisher"  required />
                        </div> -->

                        
                        <div class="form-group">
                            <label class="small mb-1">Upload Image</label>
                            <input type="file" class="form-control" name="image">
                            <img src="uploads/<?php echo $data['photo'];?>" width="50px" height="50px">
                       </div>
                        

                        <div class="form-group">
                            <label for="exampleInputPassword1">book category</label>
                            <select  class="form-control"   name="category_id" >
   
                                <?php
                                    while($fetchedData = mysqli_fetch_assoc($op)){
                                ?>
                                <option value="<?php echo $fetchedData['id'];?>"
                                <?php if($fetchedData['id']==$data['categoryId']){ echo 'selected';}?>>
                                <?php echo $fetchedData['name'];?></option>
                                <?php
                                        }   
                                ?>

                            </select>


                        </div>

                        <input type="hidden" value="<?php echo $data['id'];?>" name="id">
                        <input type="hidden" value="<?php echo $data['photo'];?>" name="oldImage">
                         
                            


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
           