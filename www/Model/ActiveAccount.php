<?php
    require('../Controller/Config.php');
    require('../Controller/SendMail.php');
    if(isset($_POST['active'])){
        //update isActived = 1
        $username = $_GET['username'];
        $sql = "UPDATE __account SET isActived = 1 WHERE username = '$username'";
        $result = mysqli_query($conn,$sql);
        //get email from account
        $getEmail = "SELECT * FROM __account WHERE username = '$username'";
        $result_getEmail = mysqli_query($conn,$getEmail);
        $row_getEmail = mysqli_fetch_assoc($result_getEmail);
        $email = $row_getEmail['email'];
        $content = "Your account has been activated! Please login to your account and change password in first time";
        $title = "Account Activated";
        sendMail($email, $content, $title);
        if($result){
            header('location: ../View/manageAccount.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    if(isset($_POST['deny'])){
        //update isActived = 1
        $username = $_GET['username'];
        $sql = "UPDATE __account SET isActived = 2 WHERE username = '$username'";
        $result = mysqli_query($conn,$sql);
        $content = "Your account has been denied!";
        $title = "Account Denied";
        sendMail($email, $content, $title);
        if($result){
            header('location: ../View/manageAccount.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }



    if(isset($_POST['unblock'])){
        $username = $_GET['username'];
        $sql = "UPDATE __account SET abnormal = 0 WHERE username = '$username'";
        $result = mysqli_query($conn,$sql);
        $content = "Your account has been unblocked!";
        $title = "Account Unblocked";
        sendMail($email, $content, $title);
        if($result){
            header('location: ../View/manageAccount.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>