<?php
    require 'config.php';
    require 'SendMail.php';
    require 'CheckLogin.php';
    //if login create token
    if (isset($_SESSION['username'])) {
        $token = md5(uniqid(rand(), TRUE));
        $_SESSION['token'] = $token;
    }
    ob_start();
    if(isset($_POST['submit'])){
        $username = $_POST['account'];
        //GET EMAIL FROM USERNAME
        $sql = "SELECT * FROM __account WHERE username = '$username'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $email = $row['email'];
        }
        //create token is random number 0-9 with length 6
        $token = substr(str_shuffle('0123456789'), 0, 6);
        //echo $token;
        //insert token to database
        $sql = "INSERT INTO __istoken(username,token) values ('$username','$token')";
        $result = mysqli_query($conn,$sql);
        $title = "Addition Information";
        $content = "Please click this link to add your 
        information: http://localhost/webFinal/www/View/updateIndentityCard.php?token=$token";
        sendMail($email,$content,$title);
        echo "<script>alert('Send Request Successfully');window.location.href='../View/additionalInformation.php';</script>";

    }

    if(isset($_POST['resend'])){
        $username =  $_SESSION['token'];
        //get image 
        $image_front_id = $_FILES['image_front_id']['name'];
        $image_back_id = $_FILES['image_back_id']['name'];
        $image_front_id_tmp = $_FILES['image_front_id']['tmp_name'];
        $image_back_id_tmp = $_FILES['image_back_id']['tmp_name'];
        $image_front_id_size = $_FILES['image_front_id']['size'];
        $image_back_id_size = $_FILES['image_back_id']['size'];
        $image_front_id_type = $_FILES['image_front_id']['type'];
        $image_back_id_type = $_FILES['image_back_id']['type'];
        $image_front_id_error = $_FILES['image_front_id']['error'];
        $image_back_id_error = $_FILES['image_back_id']['error'];
        $image_front_id_ext = explode('.', $image_front_id);
        $image_back_id_ext = explode('.', $image_back_id);
        $image_front_id_ext = strtolower(end($image_front_id_ext));
        $image_back_id_ext = strtolower(end($image_back_id_ext));
        $image_front_id_new_name = uniqid('', true).'.'.$image_front_id_ext;
        $image_back_id_new_name = uniqid('', true).'.'.$image_back_id_ext;
        $image_front_id_destination = $uploads_dir.'/'.$image_front_id_new_name;
        //get image destination to save ind atabase
        $image_front_id_destination_db = '../Resource/upload/'.$image_front_id_new_name;
        $image_back_id_destination_db = '../Resource/upload/'.$image_back_id_new_name;
        $image_back_id_destination = $uploads_dir.'/'.$image_back_id_new_name;
        //update in __account
        $sql = "UPDATE __account SET 
        frontImg= '$image_front_id_destination_db',
        backImg = '$image_back_id_destination_db' WHERE username = '$username'";  
        $result = mysqli_query($conn,$sql);  
        //echo "<script>alert('Update Indentity Card Successfully');window.location.href='../View/home.php';</script>";
    }

?>