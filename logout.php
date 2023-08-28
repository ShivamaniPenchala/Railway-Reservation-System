<?php 
    session_start();
    if(isset($_SESSION["uname"])){
        $_SESSION["uname"]= null;
        unset($_SESSION["uname"]);    
    }
    if(isset($_SESSION["adminuname"])){
        $_SESSION["adminuname"]= null;
        unset($_SESSION["adminuname"]);    
    }
    session_destroy();
    header("location: index.php?logout=1");
 ?>