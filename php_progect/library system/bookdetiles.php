<?php

// include './operation/functions.php';
// include "./operation/cheackLogin.php";
include "./operation/connection.php";
include "header.php";
include 'navbar.php';


$message = '';

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['id'])){
        $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    }
 }else{
     $message ='bad request method';
 }


$book_id = filter_var($id,FILTER_VALIDATE_INT);

$sql = "select book.* , auther.name as autherName ,auther.information as autherInfo, category.name as categoryName,puplisher.name as publisherName from book join auther on book.autherId = auther.id join category on book.categoryId = category.id join puplisher on book.puplisherId = puplisher.id  where book.id =  ".$book_id;
$op = mysqli_query($con,$sql);
// $data = mysqli_fetch_assoc($op);
// print_r($data);

$count = mysqli_num_rows($op);


if($count == 0){
    $message = "invalid Id";  
}



?>
<body>
<div class= row>
       
         <?php 
            include 'sideNave.php';
         ?> 

        <div class = "col-md-9 col-sm-12>">
            <sestion class="displayBooks">
                
                <div class="row"> 
                    <?php 
                        while($data = mysqli_fetch_assoc($op)){
                    ?>

                    <div class="col-md-10 col-sm-12 mt-5 ">

                        <div class="card mb-3" >
                            <div class="row no-gutters">
                                
                                <div class="col-md-6 sm-12">
                                    <img src="./Admin/books/uploads/<?php echo $data['photo'];?>" style="margin: 40px;" alt="cover">
                                </div>
                                <div class="col-md-6 sm-12">
                                    <div class="card-body">
                                        <h5 class="card-title custemTitle" style="margin: 30px 0px;"><?php echo $data['name'];?></h5>
                                        <p class="card-text" style="color: #17a2b8;font-size: larger;">auther:<spane style="margin-left: 67px;"><?php echo $data['autherName'];?></spane></p>
                                        <p class="card-text"style="color: #17a2b8;font-size: larger;">category:<spane style="margin-left: 50px;"><?php echo $data['categoryName'];?></spane></p>
                                        <p class="card-text"style="color: #17a2b8;font-size: larger;">publisher:<spane style="margin-left: 47px;"><?php echo $data['publisherName'];?></spane></p>
                                        <p class="card-text"style="color: #17a2b8;font-size: larger;">code:<spane style="margin-left: 84px;"><?php echo $data['code'];?></spane></p>
                                        <p class="card-text"style="color: #17a2b8;font-size: larger;">status:<spane style="margin-left: 80px;"><?php echo $data['status'];?></spane></p>
                                        <a href='brrowBook.php?id=<?php echo $data['id'];?>' class="btn btn-primary">Brrow</a>
                                    </div>
                                </div>
                                


                            </div>
                        </div>

                        <div class="card col-sm-12 mt-5">
                            <h5 class="card-title " style="margin: 30px 0px;">about auther</h5>
                            <h4 class="card-title " style="margin-bottom: 30px;"><?php echo $data['autherName'];?></h5>
                            <p class="card-text" style="color: #17a2b8;font-size: larger;"><?php echo $data['autherInfo'];?></p>                    
                        </div>

                        <div class="card col-sm-12 mt-5">
                            <h5 class="card-title " style="margin: 30px 0px;">book deccription</h5>
                            <h4 class="card-title " style="margin-bottom: 30px;"><?php echo $data['name'];?></h5>
                            <p class="card-text" style="color: #17a2b8;font-size: larger;"><?php echo $data['descreption'];?></p>                    
                        </div>

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