<?php
    require 'config.php';
    require '../Controller/SendMail.php';
    ob_start();
    session_start();
    $tradingCode = rand(100000,999999);
    if(isset($_POST['recharge'])){
        //check username and amount
        $username = $_POST['account'];
        $usernamesend = $_SESSION['username'];
        $amount = $_POST['amount'];
        $sql = "SELECT * FROM __money WHERE username = '$usernamesend'";
        $result = mysqli_query($conn,$sql);
        $dateSend = date("Y-m-d H:i:s");
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $money = $row['money'];
            if($money >= $amount){
               if($amount > 5000000){
                    //insert into __accepttransfer
                    $sql = "INSERT INTO __accepttransfer(usernamesend, username, amount, date)
                    VALUES ('$usernamesend','$username','$amount','$dateSend')";
                    $result = mysqli_query($conn,$sql);
                    showAlert("Amount is more than 5000000. Waiting for accept transfer", "../View/transfer.php");
               } else {
                    $temp = $money - $amount;
                    $sql = "UPDATE __money SET money = $temp WHERE username = '$_SESSION[username]'";
                    $result = mysqli_query($conn,$sql);
                    //update __money
                    $sql = "UPDATE __money SET money = money + $amount WHERE username = '$_POST[account]'";
                    $result = mysqli_query($conn,$sql);
                    //select infor from account
                    $sql = "SELECT * FROM __account WHERE username = '$_POST[account]'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($result);
                    $opt = rand(100000,999999);
                    //date now
                    $date = date("Y-m-d H:i:s");
                    $email = $row['email'];
                    $sql = "INSERT INTO __isotp(username,tradingcode,OTP,date) VALUES ('$email','$tradingCode','$opt','$date')";
                    $result = mysqli_query($conn,$sql);
                    $sql = "INSERT INTO __transactionhistory(transactiontype,amount,executiontime,status)
                    VALUES ('Transfer','$amount','$dateSend',1)";
                    $result = mysqli_query($conn,$sql);
                    // $content = "You have received $amount from $usernamesend";
                    // $subject = "Transfer";
                    // sendMail($email, $content, $subject);
                    echo "<script>alert('Confirm OTP in your mail to transfer!');
                    window.location.href='../View/completeTransfer.php';</script>";
               }
            } else {
                
                $sql = "INSERT INTO __transactionhistory(transactiontype,amount,executiontime,status)
                VALUES ('transfer',0,'$dateSend',0)";
                echo "<script>alert('Not enough money');window.location.href='../View/transfer.php';</script>";
            }
        }
       
    } else {
        echo "<script>alert('Please input username or money');window.location.href='../View/transfer.php';</script>";
    }


    function showAlert($message, $href)
    {
        echo "<script>
        alert('$message');
        window.location.href='$href';
        </script>";
    }
?>
