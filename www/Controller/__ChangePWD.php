<?php
    require_once 'Config.php';
 
    ob_start();
    session_start();
    
    if(isset($_POST['change_password'])){
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // $username = $_SESSION['username'];
        $username = ($_SESSION['username'] == null) ? $_SESSION['usernameOTP'] : $_SESSION['username'];
        $sql = "SELECT * FROM __account WHERE username = '$username'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
                if($new_password == $confirm_password){
                    $sql = "UPDATE __account SET password = '$new_password', status = 1 WHERE username = '$username'";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        //render to home
                        echo "<script>alert('Success');window.location.href='../View/login.php';</script>";
                    }else{
                        echo "<script>alert('Change password fail');window.location.href='../View/changeFirstPassword.php';</script>";
                    }
                }else{
                    echo "<script>alert('Confirm password not match');window.location.href='../View/changeFirstPassword.php';</script>";
                }
            }

    }
?>