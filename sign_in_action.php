<?php require_once 'config.php'; ?>
<?php require_once 'library.php'; ?>
<?php
    
    if(checkSignIn()){
        header("Location: home.php");
    }
?>

<?php

    if(isset($_POST['sign_in'])){
//        print_r($_POST);
      
        
        $email = $_POST['email'];
        $upass = $_POST['password'];
        $criteria = array("email"=> $email);
        $query = $collection->findOne($criteria);
        //var_dump($query);
        if(empty($query)){
            
            echo "Email ID is not registered.";
            echo "Either <a href='sign_up'>Sign Up</a> with the new Email ID or <a href='sign_in.php'>Sign In</a> with an already registered ID";
        }
        else{
            
                $pass = $query["password"];
                if(password_verify($upass,$pass)){
                    $var = setsession($email);
//                    echo"<pre>";   
//                    print_r($_SESSION);
                  
                    
                    if($var){
                        
                    header("Location: home.php");
                    }
                    else{
                        echo "Some error";
                    }
                }
                else{
                    echo "You have entered a wrong password";
                    echo "<br>";
                    echo "Either <a href='register'>Register</a> with the new Email ID or <a href='login.php'>Login</a> with an already registered ID";
                }
                
            
        
        }
    }
    

?>