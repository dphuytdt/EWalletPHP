<?php
    require('../Controller/Config.php');
    if(isset($_POST['view'])){
        $username = $_GET['username'];
       
        $sql = "SELECT * FROM __account WHERE username = '$username'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $username = $row['username'];
            $email = $row['email'];
            $phone = $row['phone'];
            $dob = $row['dob'];
            $image_front_id = $row['frontImg'];
            $image_back_id = $row['backImg'];
              
            //if isVerified = 0 $status = not verified else verified
            if($row['isActived'] == 0){
                $status = "Not verified";
            }else{
                $status = "Verified";
            }            
           
        }
        
    }

?>