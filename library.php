<?php
    require_once 'config.php';
    session_start();

    function sign_up($document){
        global $collection;
        $collection->insertOne($document);
        return true;
    }
    
    function checkUsername($username){
        global $collection;
        $temp = $collection->findOne(array('username'=> $username));
        if(empty($temp)){
        return true;
        }
        else{
            return false;
        }
    }
    
    function setSession($username){
        $_SESSION["userLoggedIn"] = 1;
        global $collection;
        $temp = $collection->findOne(array('username'=> $username));
        $_SESSION["email"] = $temp["email"];
        $_SESSION["username"] = $username;
        return true;
        
    }

    function checkSignIn(){
        
        //var_dump($_SESSION);
        
        if(isset($_SESSION["userLoggedIn"])){
            return true;
        }
        else{
            return false;
        }
    }
    // function removeall(){
    //     unset($_SESSION["userLoggedIn"]);
    //     unset($_SESSION["uname"]);
    //     unset($_SESSION["username"]);
    //     return true;
    // }

?>