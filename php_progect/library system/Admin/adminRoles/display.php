
<?php 

include '../operation/functions.php';
include "../operation/cheackLogin.php";
include '../operation/connection.php';
include "../header.php";

$sql  = "SELECT * FROM admin_role where 1";
$op = mysqli_query($con,$sql);


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
                        <?php 
                        
                            if(isset($_SESSION['message'])){
                        ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><?php echo $_SESSION['message'];?></li>
                        </ol>
                        <?php 
                           unset($_SESSION['message']);
                           unset($_SESSION['error_message']);
                            }
                            
                        ?>        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                 admin Roles
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                         
                                            <tr>
                                                <th>#id</th>
                                                <th>title</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php
                                            
                                            while($data = mysqli_fetch_assoc($op)){
                                                
                                        ?>
                                            <tr>
                                                <td><?php echo $data ['id'];?></td>
                                                <td><?php echo $data['title'];?></td>    
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

include "../footer.php";

?>
               