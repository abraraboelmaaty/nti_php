
<?php 
    include "./operation/connection.php";

    $sql  = "SELECT * FROM category where 1";
    $op_cat = mysqli_query($con,$sql);
?>
<div class = "col-md-3 col-sm-0>">
            <div class="displayCategory mt-5">
                <ul class="list-group list-group-flush">
                    <?php
                        while($data = mysqli_fetch_assoc($op_cat)){
                    ?>
                        <a class=' nav-link text-info' href="categoriesBooks.php?id=<?php echo $data['id'];?>">
                            <li class="list-group-item"><?php echo $data['name'];?></li>
                        </a>

                    <?php
                        } 
                    ?>      
                </ul>
            </div>   
        </div>