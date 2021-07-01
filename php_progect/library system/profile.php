<?php 


include "operation/connection.php";
include "header.php";
include 'navbar.php';


if(!isset( $_SESSION['id'])){
   
    header('Location: login.php');
 }

  

 
 $message = '';

$errors = [];

 $user_id = $_SESSION['id'];

 
// $data =[];

$sql = "select borrowbooks.id,borrowbooks.borrowDate,borrowbooks.returnDate,book.name as book_name ,book.cobiedNumber as copies ,auther.name as book_auther ,puplisher.name as book_publisher FROM borrowbooks join book on borrowbooks.bookId = book.id join auther on book.autherId = auther.id join puplisher on book.puplisherId = puplisher.id join borrower on borrowbooks.borrowerId = borrower.id where borrower.id =".$user_id;
$op = mysqli_query($con,$sql);

// $data = mysqli_fetch_assoc($op);

// $hour = 12;

// $today = strtotime($hour . ':00:00'); 
// if($today==strtotime($data['returnDate'])){
//     $data['copies']++;
//     $sql_delete = "DELETE FROM `borrowbooks` WHERE returnDate=".$today;
//     $op_delete = mysqli_query($con,$sql_delete);
// }

  


  

?>

<body>

<div class= row>
       
         <?php 
            include 'sideNave.php';
         ?> 

        <div class = "col-md-9 col-sm-6>">
            <sestion class="">
                
                <div class="row">
                <div class="card-body mt-5">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                         
                                            <tr>
                                                <th>#id</th>
                                                <th>borrowDate</th>
                                                <th>returnDate</th>
                                                <th>Book_name</th>
                                                <th>book_auther</th>
                                                <th>book_publisher</th>
                                               
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php
                                            
                                            while($data = mysqli_fetch_assoc($op)){
                                                
                                        ?>
                                            <tr>
                                                <td><?php echo $data ['id'];?></td>
                                                <td><?php echo $data['borrowDate'];?></td> 
                                                <td><?php echo $data['returnDate'];?></td> 
                                                <td><?php echo $data['book_name'];?></td> 
                                                <td><?php echo $data['book_auther'];?></td> 
                                                <td><?php echo $data['book_publisher'];?></td>    
                                                
                                            </tr>
                                        <?php
                                        } 
                                        ?>    
                                        </tbody>
                                    </table>
                                </div>
                            </div>           
                </div> 
            
            </session>
        </div>    
    </div> 

<?php 
    include 'footer.php';
?>