<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: View/home.php");
    }else{
        header("Location: View/login.php");
    }
?>
