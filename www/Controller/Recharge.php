<?php
    require 'config.php';
    ob_start();
    session_start();
    if(isset($_POST['recharge'])){
        //check card number
        $card = $_POST['card'];
        $expiration= $_POST['expiration'];
        $cvv = $_POST['cvv'];
        //checkc ard in __card
        $sql = "SELECT * FROM __card WHERE cardnumber = '$card' and expiration = '$expiration' and cvv = '$cvv'"; 
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            //check card = '111111'
            if($row['cardnumber'] == '111111'){
                //insert into __historyrecharge
                $sql = "INSERT INTO __historyrecharge(username,cardnumber,dateRecharge,value) 
                        VALUES ('".$_SESSION['username']."','$card','".date('Y-m-d')."','".$_POST['amount']."')";
                $result = mysqli_query($conn,$sql);
                $sql = "UPDATE __money SET money = money + ".$_POST['amount']." WHERE username = '".$_SESSION['username']."'";
                $result = mysqli_query($conn,$sql);
                if($result){
                    echo "<script>alert('Recharge success');window.location.href='../View/recharge.php';</script>";
                }
                else{
                    echo "<script>alert('Recharge fail');window.location.href='../View/recharge.php';</script>";
                }
            } else if($row['cardnumber'] == '222222'){
                //maximum insert is 1000000
                if($_POST['amount'] <= 1000000){
                    //insert into __historyrecharge
                    $sql = "INSERT INTO __historyrecharge(username,cardnumber,dateRecharge,value) 
                            VALUES ('".$_SESSION['username']."','$card','".date('Y-m-d')."','".$_POST['amount']."')";
                    $result = mysqli_query($conn,$sql);
                    $sql = "INSERT INTO __transactionhistory(transactiontype,amount,executiontime,status)
                    VALUES ('recharge','".$_POST['amount']."','".date('Y-m-d')."',1)";
                    $result = mysqli_query($conn,$sql);
                    $sql = "UPDATE __money SET money = money + ".$_POST['amount']." WHERE username = '".$_SESSION['username']."'";
                    $result = mysqli_query($conn,$sql);
                   
                    if($result){
                        echo "<script>alert('Recharge success');window.location.href='../View/recharge.php';</script>";
                    }
                    else{
                        echo "<script>alert('Recharge fail');window.location.href='../View/recharge.php';</script>";
                        $sql = "INSERT INTO __transactionhistory(transactiontype,amount,executiontime,status)
                        VALUES ('Recharge',0,'".date('Y-m-d')."',0)";
                        $result = mysqli_query($conn,$sql);
                    }
                } else{
                    echo "<script>alert('Maximum recharge is 1000000');window.location.href='../View/recharge.php';</script>";
                }
            } else {
                $sql = "INSERT INTO __historyrecharge(username,cardnumber,dateRecharge,value) 
                VALUES ('".$_SESSION['username']."','$card','".date('Y-m-d')."','".$_POST['amount']."')";
                $result = mysqli_query($conn,$sql);
                //update __money
                $sql = "UPDATE __money SET money = money + ".$_POST['amount']." WHERE username = '".$_SESSION['username']."'";
                $result = mysqli_query($conn,$sql);
               
                //insert to my
                echo "<script>alert('Card is out of money');window.location.href='../View/recharge.php';</script>";
               
            }
            //select from mycard check username
                  
        } else{
            echo "<script>alert('This card is not supported');window.location.href='../View/recharge.php';</script>";
        }
    }

?>