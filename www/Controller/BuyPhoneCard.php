<?php
    require 'config.php';
    ob_start();
    session_start();
    if(isset($_POST['buycard'])){
        //get card and valuation and insert to __buyphonecard
        //create serial with 9 number by random
        $username = $_SESSION['username'];
      
        $card = $_POST['card'];
        $valuation = $_POST['valuation'];
        $date = date('Y-m-d');
        $temp = 0;

        //check money in __money
        $sql = "SELECT * FROM __money WHERE username = '$username'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $money = $row['money'];
            if($money >= $valuation){
                $amount = $_POST['amount'];
                for($i = 0; $i < $amount; $i++){
                    //check if viettel 
                    if($card == 'viettel'){
                        //randome number with 9
                        $serial = rand(100000000,999999999);
                        $code = rand(1111100000 ,1111199999);
                        $sql = "INSERT INTO __buyphonecard(username,cardtype,cardvalue,serial,code,date) 
                        VALUES ('$username','$card','$valuation','$serial','$code','$date')";
                        $result = mysqli_query($conn,$sql);
        
                        $temp = $temp + $valuation;
                    } 
                    if($card == 'mobiphone'){
                        //randome number with 9
                        $serial = rand(100000000,999999999);
                        $code = rand(2222200000 ,2222299999);
                        $sql = "INSERT INTO __buyphonecard(username,cardtype,cardvalue,serial,code,date) 
                        VALUES ('$username','$card','$valuation','$serial','$code','$date')";
                        $result = mysqli_query($conn,$sql);
        
                        $temp = $temp + $valuation;
                    } 
                    if($card == 'vinaphone'){
                        //randome number with 9
                        $serial = rand(100000000,999999999);
                        $code = rand(3333300000 ,3333399999);
                        $sql = "INSERT INTO __buyphonecard(username,cardtype,cardvalue,serial,code,date) 
                        VALUES ('$username','$card','$valuation','$serial','$code','$date')";
                        $result = mysqli_query($conn,$sql);
        
                        $temp = $temp + $valuation;
                    } 
                  
                }

                //insert into __transactionhistory
                $sql = "INSERT INTO __transactionhistory(transactiontype,amount,executiontime,status)
                VALUES ('buycard','$temp','$date',1)";
                $result = mysqli_query($conn,$sql);
                //update money in __money
                //select money in __money
                $sql = "SELECT * FROM __money WHERE username = '$username'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    $money = $row['money'];
                    if($money - $temp >= 0){
                        $sql = "UPDATE __money SET money = money - $temp WHERE username = '$username'";
                        $result = mysqli_query($conn,$sql);
                    } else {
                        $sql = "UPDATE __money SET money = 0 WHERE username = '$username'";
                        $result = mysqli_query($conn,$sql);
                    }
                }
               
                echo "<script>alert('Buy Successfully');window.location.href='../View/buyPhoneCard.php';</script>";
            } else {
                $sql = "INSERT INTO __transactionhistory(transactiontype,amount,executiontime,status)
                VALUES ('Buy card',0,'$date',0)";
                $result = mysqli_query($conn,$sql);
                echo "<script>alert('Not enough money');window.location.href='../View/buyPhoneCard.php';</script>";
            }
        }

    }

    //select * from __buyphonecard
    $sql = "SELECT * FROM __buyphonecard WHERE username = '$username'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $card = $row['cardtype'];
        $valuation = $row['cardvalue'];
        $serial = $row['serial'];
        $code = $row['code'];
        $date = $row['date'];
    }
?>