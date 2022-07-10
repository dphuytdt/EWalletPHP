<?php
    require 'Config.php';
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: View/home.php");
    }else{
        header("Location: View/login.php");
    }
    //check otp form database
    $username = $_SESSION['usernameOTP'];
    $otp = $_POST['otp'];
    $sql = "SELECT * FROM __account WHERE username = '$username'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $otp_db = $row['OTP'];
        if($otp == $otp_db){
            //destroy session
            //render to home
            //set otp in database = 0
            $sql = "UPDATE __account SET OTP = 0 WHERE username = '$username'";
            $result = mysqli_query($conn,$sql);
            if($result){
                header('Location: ../View/__changePWD.php');
            }else{
                echo "Change password fail";
            }
        
        }else{
            echo "Wrong OTP";
        }
    }else{
        echo "Wrong username";
    }


    
?>