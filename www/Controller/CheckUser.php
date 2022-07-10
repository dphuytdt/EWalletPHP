<?php
    //check user
    require 'Config.php';
    require_once 'SendOTP.php';
    session_start();

    $email = $_POST['email'];
    //check user from VerifyUser.php is the same to database
    if(isset($_POST['verified'])){
        $sql = "SELECT * FROM __account WHERE email = '$email'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $otp = $row['otp'];
            $phone = $row['phone'];
            $email = $row['email'];
            $username = $row['username'];
            $_SESSION['usernameOTP'] = $username;
            $sendOTP = new SendOTP();
            $sendOTP->sendOTP($username,$email);
            //render to check otp
            echo "<script>alert('Success');window.location.href='../View/resetPassword.php';</script>";
        }else{
            echo($username . ".");
        }
    }
?>