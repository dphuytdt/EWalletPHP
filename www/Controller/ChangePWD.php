<?php
    require_once 'Config.php';
    ob_start();
    session_start();
    if(isset($_POST['changePassword'])){
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM __account WHERE username = '$username'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            //check old password match to database
            $row = mysqli_fetch_assoc($result);
            if($row['password'] == $old_password){
                if($new_password == $confirm_password){
                    $sql = "UPDATE __account SET password = '$new_password' WHERE username = '$username'";
                    mysqli_query($conn,$sql);
                    echo "<script>alert('Success');window.location.href='../View/changePWD.php';</script>";
                }
                else{
                    echo "<script>alert('Confirm password is not match');window.location.href='../View/changePWD.php';</script>";
                }
            }
            else{
                echo "<script>alert('Old password is not correct');window.location.href='../View/changePWD.php';</script>";
            }
        }
    }



 
?>