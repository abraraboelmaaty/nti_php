<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, intial-scale=1.0">
        <title>form validation</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    </head>
    <body>
        <div class='container mt-4'>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"  enctype ="multipart/form-data">
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" name="name" class="form-control" id="inputName" >
                </div>
                <div class="form-group ">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail4">
                </div>
                <div class="form-group">
                    <label for="jobTitle">Address</label>
                    <input type="text" name="jobTitle" class="form-control" id="jobTitle" placeholder="1234 Main St">
                </div>
                <div class="custom-file ">
                    <label class="custom-file-label" for="CustomFile">Choose file...</label>
                    <input type="file" name='file' class="custom-file-input" id="CustomFile">
                </div>
                <button type="submit" class="btn btn-primary mt-3" >submit</button>
            </form>
            <?php
                $errorMessage = array();
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    //clean function
                    function clean($input){
                        $input = trim($input);
                        $input = htmlspecialchars($input);
                        $input = stripslashes($input);
                        return $input;
                    }
                    //get form inputs
                    $name     = clean($_POST['name']);
                    $email    = clean($_POST['email']);
                    $jobTitle = clean($_POST['jobTitle']);
                    
                    

                    //upload file 
                    //cheack if input file is empty
                    if(!empty($_FILES['file']['name'])){
                        $fileTmpPath = $_FILES['file']['tmp_name'];
                        $fileNme     = $_FILES['file']['name'];

                        //find file extension
                        $fileExtensions = explode('.',$fileNme);

                        //set new file name
                        $newFileName = rand().time().$fileExtensions[0].'.'.$fileExtensions[1];
                        
                        $allowExtensions = array('pdf','PDF');

                        if(in_array($fileExtensions[1],$allowExtensions)){
                            $uploadedFolderPath = './uploads/';
                            $fileDesPath = $uploadedFolderPath.$newFileName;
                            if(move_uploaded_file($fileTmpPath,$fileDesPath)){
                                echo 'file uploaded';
                            }else{
                                echo 'file not uploaded';
                            }
                        }else{
                            echo 'not allowed extension';
                        }
                    }else{
                        echo 'please upload file'.'<br>';
                    }
                    //end upload

                    //form validation

                    //name validation 
                    if(empty($name)){
                        $errorMessage['name'] = 'name field requried';
                    }else{
                        if(strlen($name) < 6){
                        $errorMessage['name']  = "Name must be => 6 char";
                        }elseif (!preg_match("^[a-zA-Z ]*$^",$name)) {
                            
                            $errorMessage['name']  = "only chars allowed";
            
                        }    
                    }

                    //email validation
                    if(empty($email)){
                    $errorMessage['email'] = "email field required";
                    }else{

                    if(!(filter_var($email,FILTER_VALIDATE_EMAIL))){    
                    $errorMessage['email']  = "invalid email";
                    }
                    }

                    //jobTitle validation 
                    if(empty($jobTitle)){
                    $errorMessage['jobTitle'] = "jobTitle field required";
                    }else{
                        if(strlen($jobTitle) < 6){
                        $errorMessage['jobTitle']  = "jobTitle must be => 6 char";
                        }
                    }
                    if(count($errorMessage) > 0){

                        foreach($errorMessage as $key => $value){
                
                        echo $key.' >>> '.$value.'<br>';
                
                        }
                    }
                    // echo $name.'<br>'.$email.'<br>'.$jobTitle.'<br>';
                }
            ?>  
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    </body> 