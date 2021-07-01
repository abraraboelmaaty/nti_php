
<?php 
    include "./operation/functions.php";
    // include "./operation/cheackLogin.php"
//     session_start();
// $ggg = $_SESSION['id'];
// echo $ggg;
// exit();
    
?>
      <body>
        <section class="header-navbar sticky-top ">
            <nav class="navbar navbar-expand-lg navbar-light bg-light  pt-4 pb-4">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img class="logo horizontal-logo" src="image/logo1.png" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" 
                    data-toggle="collapse" data-target="#navbarSupportedContent"
                     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
              
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto ">
                           
                            <li class=" nav-item">
                                <a class=" nav-link text-info h4" href="index.php">Home</a>
                            </li> 
                                     
                            <li class="nav-item">

                                <?php if(isset( $_SESSION['id'])){?>
                                <a class=' nav-link text-info h4' href='<?php echo url('profile.php');?>'>profile</a>
                                <?php
                                    }else{
                                    ?>
                                 <a class=' nav-link text-info h4' href='<?php echo url('signUp.php');?>'>signup</a>  
                                <?php
                                    }
                                ?>
                                
                            </li>
                          
                            <li class="nav-item">
                                <?php if(isset( $_SESSION['id'])){?>
                                <a class=' nav-link text-info h4' href='<?php echo url('logout.php');?>'>logout</a>
                                <?php
                                    }else{
                                    ?>
                                 <a class=' nav-link text-info h4' href='<?php echo url('login.php');?>'>login</a>  
                                <?php
                                    }
                                ?>
                                
                                
                            </li>
                            <li class="nav-item">
                                <a class=" nav-link text-info h4" href='<?php echo url('contact.php');?>'>contact</a>
                            </li> 
                        </ul>
                    </div>
                </div>
            </nav>
            
        </section>