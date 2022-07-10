<?php
    require 'Config.php';
    require '../Controller/SendMail.php';
    $uploads_dir = '../Resource/upload';
    
    //check register
    if(isset($_POST['register'])){
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        //check duplicate phone or email
        $checkPhone = "SELECT * FROM __account WHERE phone = '$phone'";
        $checkEmail = "SELECT * FROM __account WHERE email = '$email'";
        $result_checkPhone = mysqli_query($conn,$checkPhone);
        $result_checkEmail = mysqli_query($conn,$checkEmail);
        $row_checkPhone = mysqli_fetch_assoc($result_checkPhone);
        $row_checkEmail = mysqli_fetch_assoc($result_checkEmail);
        if($row_checkPhone['phone'] == $phone){
            echo "<script>alert('Phone number is already used!');window.location.href='../View/login.php';</script>";
        } else if($row_checkEmail['email'] == $email){
            echo "<script>alert('Email is already used!');window.location.href='../View/login.php';</script>";
        } else {
            
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
            //username is a string have 9 length with random 0-9 characters
            $username = substr(str_shuffle('0123456789'), 0, 9);
            $password = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,6);
            $date = date('Y-m-d H:i:s');
            //insert data
            if(empty($phone_error) && empty($email_error) && empty($dob_error) && empty($image_front_id_error) && empty($image_back_id_error)){
                $sql_insert = "INSERT INTO __account(phone, email, dob, frontImg, backImg,username,password,status,error,datecreate) VALUES('$phone', '$email', '$dob', 
                '$image_front_id_destination_db', '$image_back_id_destination_db','$username','$password',0,0,'$date')";
                if(mysqli_query($conn, $sql_insert)){
                    move_uploaded_file($image_front_id_tmp, $image_front_id_destination);
                    move_uploaded_file($image_back_id_tmp,$image_back_id_destination);

                
                    
                }else{
                    echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
                }

                //insert into __money
                $sql_insert_money = "INSERT INTO __money(username,money) VALUES('$username',0)";
                //insert into __paymentRecharge
                
                if(mysqli_query($conn, $sql_insert_money)){
                    echo "";
                }else{
                    echo "Error: " . $sql_insert_money . "<br>" . mysqli_error($conn);
                }
            
                //send mail
                $content = "Your username: ".$username."<br>Your password: ".$password;
                $title = "Your account has been created!";
                SendMail($email, $content, $title);
                //render to log in
                header('Location: ../View/login.php');
            }    
        }
    }
?>