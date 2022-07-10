<?php
    require('../Controller/Config.php');
    require('../Controller/SendMail.php');
    $sql = "SELECT * FROM __accepwithdraw WHERE isAccepted = 0 order by date desc";
    $result = mysqli_query($conn,$sql);
    $sql1 = "SELECT * FROM __accepwithdraw WHERE isAccepted = 2 order by date desc";
    $result1 = mysqli_query($conn,$sql1);
    $sql2 = "SELECT * FROM __accepwithdraw WHERE isAccepted = 1 order by date desc";
    $result2 = mysqli_query($conn,$sql2);
    if(isset($_POST['accept'])){
        $id = $_GET['withdraw'];
        $currentDate =  date("Y-m-d");

        $getWithDrawInfo = "SELECT * FROM __accepwithdraw WHERE id = $id";
        $result_getWithDrawInfo = mysqli_query($conn,$getWithDrawInfo);
        
        if(mysqli_num_rows($result_getWithDrawInfo) > 0){
            $row_getWithDrawInfo = mysqli_fetch_assoc($result_getWithDrawInfo);

            $amount = $row_getWithDrawInfo['money'];
            $username = $row_getWithDrawInfo['username'];
            $cardNumber = $row_getWithDrawInfo['cardnumber'];

            $getMoney = "SELECT * FROM __money WHERE username = '$username'";
            $result_getMoney = mysqli_query($conn,$getMoney);
            $row_getMoney = mysqli_fetch_assoc($result_getMoney);

            $realMoney = $amount + round(($amount*0.05));
            $money = $row_getMoney['money'];
            //get email from account
            $getEmail = "SELECT * FROM __account WHERE username = '$username'";
            $result_getEmail = mysqli_query($conn,$getEmail);
            $row_getEmail = mysqli_fetch_assoc($result_getEmail);
            $email = $row_getEmail['email'];
            if($money >= $realMoney){
                $sql = "UPDATE __accepwithdraw SET isAccepted = 1 where id = $id";
                mysqli_query($conn,$sql);
                $sql = "UPDATE __money SET money = money - '$realMoney' WHERE username = '$username'";
                $result = mysqli_query($conn,$sql);
                
                $sql = "UPDATE __mycard SET money = money + $amount, date = '$currentDate', cardNumber = $cardNumber";
                        
                $result = mysqli_query($conn,$sql);
                $content = "Your withdraw request has been accepted";
                //echo $email;
                $title = "Withdraw request accepted";
                $sql = "INSERT INTO __transactionhistory(transactiontype,amount,executiontime,status)
                VALUES('Withdraw','$amount','$currentDate',1)";
                               
                $result = mysqli_query($conn,$sql);
                sendMail($email, $content, $title);
                echo "<script>alert('Withdraw Successfully');window.location.href='../View/acceptWithDraw.php';</script>";
             } else {
                 echo "<script>alert('User not enough money');window.location.href='../View/acceptWithDraw.php';</script>";
             }
           
        }
        //echo "<script>alert('$temp');window.location.href='../View/acceptTrade.php';</script>";
       
    }

    if(isset($_POST['deny'])){
        $username = $_GET['username'];
        $sql = "UPDATE __accepwithdraw SET isAccepted = 2 where id = '$id'";
        $result = mysqli_query($conn,$sql);
        $getEmail = "SELECT * FROM __account WHERE username = '$username'";
        $result_getEmail = mysqli_query($conn,$getEmail);
        $row_getEmail = mysqli_fetch_assoc($result_getEmail);
        $email = $row_getEmail['email'];
        $sql = "INSERT INTO __transactionhistory(transactiontype,amount,executiontime,status)
        VALUES('Withdraw','$amount','$currentDate',0)";
        $result = mysqli_query($conn,$sql);
        $content = "Your withdraw request has been denied! Please contact admin for more information";
        $title = "Withdraw request denied";
        sendMail($email, $content, $title);
        echo "<script>alert('Success');window.location.href='../View/acceptWithDraw.php';</script>";
    }
?>