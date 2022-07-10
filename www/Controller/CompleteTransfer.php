<?php
    session_start();
    require 'Config.php';
    //check otp form database
    $username = $_SESSION['username'];
    if(isset($_POST['check_otp'])){
        $otp = $_POST['otp'];
        //$tradingCode = $_POST['tradingCode'];
        //select email from __account
        $sql = "SELECT * FROM __account WHERE username = '$username'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
        $sql = "SELECT * FROM __isotp WHERE username = '$email' and OTP = '$otp' ";
        $result = mysqli_query($conn,$sql);
        echo mysqli_num_rows($result);
        // if(mysqli_num_rows($result) > 0){
        //     echo "<script>alert('Confirm OTP success!');window.location.href='../View/completeTransfer.php';</script>";
        // }
    }
?>