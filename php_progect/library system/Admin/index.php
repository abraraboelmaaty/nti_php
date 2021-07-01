
<?php 

include './operation/functions.php';
include "./operation/cheackLogin.php";
include './operation/connection.php';
include "header.php";

$sql  = "select 
            book.* , category.name as categoryName , auther.name as autherName, puplisher.name as publisherName, admin.userName as addBy
        from 
            book 
        join 
            category 
        on 
            book.categoryId = category.id
        join 
            auther 
        on 
            book.autherId = auther.id 
        join 
            puplisher 
        on 
            book.puplisherId = puplisher.id
        join 
            admin 
        on 
            book.admin_id = admin.id";
$op = mysqli_query($con,$sql);




?>


    <body class="sb-nav-fixed">

<?php 
     include 'nav.php';
?>


        <div id="layoutSidenav">
<?php 
    include 'sideNav.php';
?>  


            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                        
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                 books
                            </div> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#id</th>
                                                <th>name</th>
                                                <th>code</th>
                                                <th>description</th>
                                                <th>copied</th>
                                                <th>status</th>
                                                <!-- <th>admin_id</th> -->
                                                <!-- <th>publisher_id</th> -->
                                                <!-- <th>auther_id</th> -->
                                                <!-- <th>category_id</th> -->
                                                <th>cover</th>
                                                <th>category</th>
                                                <th>authername</th>
                                                <th>publisherName</th>
                                                <th>addBy</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php
                                            
                                            while($data = mysqli_fetch_assoc($op)){
                                                
                                        ?>
                                            <tr>
                                                <td><?php echo $data ['id'];?></td>
                                                <td><?php echo $data['name'];?></td>
                                                <td><?php echo $data ['code'];?></td>
                                                <td><?php echo substr($data['descreption'],0,30);?></td>  
                                                <td><?php echo $data ['cobiedNumber'];?></td>
                                                <td><?php echo $data['status'];?></td>  
                                                <!-- <td><?php //echo $data['admin_id'];?></td>  -->
                                                <!-- <td><?php //echo $data['puplisherId'];?></td>  -->
                                                <!-- <td><?php //echo $data['autherId'];?></td>  -->
                                                <!-- <td><?php //echo $data['categoryId'];?></td>  -->
                                                <td><img  src="./books/uploads/<?php echo $data['photo'];?>" width="100px"></td> 
                                                <td><?php echo $data['categoryName'];?></td>
                                                <td><?php echo $data['autherName'];?></td>
                                                <td><?php echo $data['publisherName'];?></td>   
                                                <td><?php echo $data['addBy'];?></td>  
                                                <td>
                                                    <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                                                    <a href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-warning m-r-1em'>Edit</a>
                                                </td>
                                            </tr>
                                        <?php
                                        } 
                                        ?>    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                      

                            



                        </div>
                    </div>
                </main>
            </div>   
        </div>     

<?php 

include "footer.php";

?>
               