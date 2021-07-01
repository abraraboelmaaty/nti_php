<?php

include "operation/connection.php";
include 'header.php';
include 'navbar.php';

$message = '';

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['id'])){
        $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    }
 }else{
     $message ='bad request method';
 }


$id = filter_var($id,FILTER_VALIDATE_INT);

$sql = "select book.id, book.name,book.photo,auther.name as autherName FROM book JOIN auther on book.autherId=auther.id where book.categoryId=".$id;
$op = mysqli_query($con,$sql); 


?>
<body>
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