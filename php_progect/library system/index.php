<?php

// include './operation/functions.php';
// include "./operation/cheackLogin.php";

include "./operation/connection.php";
include "header.php";
include 'navbar.php';
// session_start();
// $ggg = $_SESSION['id'];
// echo $ggg;
// exit();

$errorMessage = [];
$search = '';

    //form validate
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $search = clean($_POST['search']);

        if(empty($search)){
            $errorMessage['search'] = 'search field requried';
        }else{
            if (!preg_match("^[a-zA-Z ]*$^",$search)) {
                
                $errorMessage['search']  = "only chars allowed";
  
            }    
      }
      //print error message
      if(count($errorMessage) > 0){

        foreach($errorMessage as $key => $value){

        echo $key.' >>> '.$value.'<br>';

        }
    }
}

  //query
  $sql = "select book.id, book.name,book.photo,auther.name as autherName FROM book JOIN auther on book.autherId=auther.id where book.name like'%$search%' or auther.name LIKE '%$search%'";
  $op = mysqli_query($con,$sql); 

//   $sql  = "SELECT * FROM category where 1";
//   $op_cat = mysqli_query($con,$sql);
//   $count = mysqli_num_rows($op);
    // var_dump ($count);
    // exit();
?>

    <section class="slider">
        <div class = 'container'>
            <form action='<?php echo $_SERVER['PHP_SELF'];?>' method="POST" enctype ="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-9">
                        <input style="margin-top: 300px;margin-left: 30px;" type="text" name="search" class="form-control" id="inputPassword">
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" style="margin-top: 300px;" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>
        </div>        
    </section>

    <div class= row>
       
         <?php 
            include 'sideNave.php';
         ?> 

        <div class = "col-md-9 col-sm-6>">
            <sestion class="desplayBooks">
                
                <div class="row">
                <?php 
                        while($data = mysqli_fetch_assoc($op)){
                    ?>
                    
                    <div class="col-lg-4 col-md-2 col-sm-12 mt-5 ">
                        <a class=' nav-link text-info'href='bookdetiles.php?id=<?php echo $data['id'];?>'>
                            <div class="card" style="width: 18rem;">
                                <img src="./Admin/books/uploads/<?php echo $data['photo'];?>" class="card-img-top" alt="coverLost">
                                <div class="card-body" style="height: 145px;">
                                   <p style="color: #17a2b8;font-size: larger;">bookname: <?php echo $data['name'];?></p>
                                   <p style="color: #17a2b8;font-size: larger;">autherName: <?php echo $data['autherName'];?></p>
                                </div>
                            </div>
                        </a>      
                    </div>
                    <?php 
                        }
                    ?>               
                </div> 
            
            </session>
        </div>    
    </div>  
    
    <?php 
        include 'footer.php';
    ?>