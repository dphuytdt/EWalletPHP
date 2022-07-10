<?php
    require('../Controller/Config.php');
    require '../Controller/SendMail.php';
    //select from __accepttransfer
    $sql = "SELECT * FROM __accepttransfer WHERE isAccepted = 0";
    $result = mysqli_query($conn,$sql);
    $sql1 = "SELECT * FROM __accepttransfer WHERE isAccepted = 2";
    $result1 = mysqli_query($conn,$sql1);
    $sql2 = "SELECT * FROM __accepttransfer WHERE isAccepted = 1";
    $result2 = mysqli_query($conn,$sql2);

    if(isset($_POST['accept'])){
        $id = $_GET['transfer'];
        $sql_getTransferInfo = "SELECT * FROM __accepttransfer WHERE id = $id";
        $result_getTransferInfo = mysqli_query($conn,$sql_getTransferInfo);
        $row_getTransferInfo = mysqli_fetch_assoc($result_getTransferInfo);

        $moneyTransfer = $row_getTransferInfo['amount'];
        $usernameSend = $row_getTransferInfo['usernamesend'];
        $usernameReceive = $row_getTransferInfo['username'];

        //update __accepttransfer
        $sql = "UPDATE __accepttransfer SET isAccepted = 1 where id = $id";
        mysqli_query($conn,$sql);
        //update __money set money = money - $money where username = $username
        $sql = "UPDATE __money SET money = money - '$moneyTransfer' WHERE username = '$usernameSend'";
        mysqli_query($conn,$sql);
        //update __mycard set money = money + $money where username = $username
        $sql = "UPDATE __money SET money = money + '$moneyTransfer' WHERE username = '$usernameReceive'";
        mysqli_query($conn,$sql);
        //select from account
        $sql = "SELECT * FROM __account WHERE username = '$usernameReceive'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $email = $row['email'];
            $sql = "INSERT INTO __transactionhistory(transactiontype,amount,executiontime,status)
            VALUES ('transfer','$moneyTransfer',NOW(),1)";
            //CREATE OPT WITH 6 number
            // $opt = rand(100000,999999);
            // //insert into __isOTP
            // $sql = "INSERT INTO __isotp(username,opt,date) VALUES ('$usernameSend','$opt',NOW())";
            $result = mysqli_query($conn,$sql);
            sendMail($email,$moneyTransfer,$usernameSend);

            echo "<script>alert('Success');window.location.href='../View/acceptTransfer.php';</script>";
        }

    }

    if(isset($_POST['deny'])){
        $id = $_GET['transfer'];
        $sql = "UPDATE __accepttransfer SET isAccepted = 2 where id = $id";
        $result = mysqli_query($conn,$sql);
        //get email
        $sql = "SELECT * FROM __accepttransfer WHERE id = $id";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
        //get email from account
        $sql = "SELECT * FROM __account WHERE username = '$username'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $sql = "INSERT INTO __transactionhistory(transactiontype,amount,executiontime,status)
        VALUES ('transfer','0',NOW(),2)";
        $result = mysqli_query($conn,$sql);
        $email = $row['email'];
        $content = "Your request has been denied!";
        $title = "Request Denied";
        sendMail($email,$content,$title);
        echo "<script>alert('Success');window.location.href='../View/acceptTransfer.php';</script>";
    }
?>