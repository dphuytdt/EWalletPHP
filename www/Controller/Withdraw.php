<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    require 'config.php';
    require 'SendMail.php';
    ob_start();
    session_start();
    if(isset($_POST['recharge'])){
        //check card from __mycard
        $username = $_SESSION['username'];
        $currentDate =  date("Y-m-d");
        $cardNumber = $_POST['card'];
        //echo $cardNumber;
        $sql = "SELECT * FROM __card WHERE cardNumber = $cardNumber";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0 ){
            //check cvv and expiration
            $row = mysqli_fetch_assoc($result);
            if($row['cvv'] == $_POST['cvv'] && $row['expiration'] == $_POST['expiration']){
               
                //Only 2 withdrawals can be made per day.
                $sql = "SELECT * FROM __mycard WHERE cardnumber = $cardNumber";
                $result = mysqli_query($conn,$sql);

                $rowCardInfo = mysqli_fetch_assoc($result);
                $timesWithdraw = $rowCardInfo['times'];

                $isSameDate = (strtotime($currentDate) - strtotime($rowCardInfo['date'])) / (60 * 60 * 24);
                if($isSameDate == 1){
                    //reset date = null and times = 0
                    $timesWithdraw = 2;
                }
                else if($timesWithdraw == 2){
                    echo "<script>alert('You have already made 2 withdrawals today');window.location.href='../View/withdraw.php';</script>";
                }
                else {
                    $amount = $_POST['amount'];
                    //check money >= amount
                    $sql = "SELECT * FROM __money WHERE username = '$username'";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0){
                        $row = mysqli_fetch_assoc($result);
                        $money = $row['money'];
                        $realMoney = $amount + round(($amount*0.05));
                        if($money >= $realMoney){
                           if($amount >= 5000000){
                                //insert into __accepwithdraw
                                $sql = "INSERT INTO __accepwithdraw (username,cardnumber,money,date,isAccepted)
                                VALUES ('$username','$_POST[card]','$amount','$currentDate',0)";
                                $result = mysqli_query($conn,$sql);
                                $sql = "UPDATE __mycard SET times = $timesWithdraw+1 WHERE cardNumber = '$_POST[card]'";
                                $result = mysqli_query($conn,$sql);

                                echo "<script>alert('Your Money is more than 5 Million. Wait for accept withdraw from admin');window.location.href='../View/withdraw.php';</script>";
                           } else {
                                //random otp code with 6 digits
                                $otp = rand(100000,999999);
                                //insert into __isOTP
                                $sql = "INSERT INTO __isOTP (username,cardnumber,otp,date)
                                VALUES ('$username','$_POST[card]','$otp','$currentDate')";
                                $title = "OTP code";
                                $content = "Your OTP code is: $otp";
                                //select email from username in __account
                                $sql = "SELECT * FROM __account WHERE username = '$username'";
                                $result = mysqli_query($conn,$sql);
                                $row = mysqli_fetch_assoc($result);
                                $email = $row['email'];
                                sendMail($email,$content,$title);
                                //set_time_limit(60);
                                echo "<script>alert('Please check your mail to get OTP');window.location.href='../View/completeWithdraw.php';</script>";
                           }
                            
                        } else {
                            
                            $sql = "INSERT INTO __transactionhistory(transactiontype,amount,executiontime,status)
                                VALUES ('Withdraw',0,'$currentDate',0)";
                            $result = mysqli_query($conn,$sql);
                            echo "<script>alert('Not enough money');window.location.href='../View/withdraw.php';</script>";
                        }
                    }
                }
                    
            }
            } else {
                echo "<script>alert('CVV or Expiration is incorrect');window.location.href='../View/withDraw.php';</script>";
            }
        } else {
            echo "<script>alert('Card is not exist');window.location.href='../View/withDraw.php';</script>";
        }
        

        
        // if(isset['check_otp']){
        //     //select otp from table __isOTP
        //     $sql = "SELECT * FROM __isOTP WHERE username = '$username'";
        //     $result = mysqli_query($conn,$sql);
        //     if(mysqli_num_rows($result) > 0){
        //         $row = mysqli_fetch_assoc($result);
        //         if($row['otp'] == $_POST['otp']){
        //             //update __mycard
        //             $sql = "UPDATE __money SET money = money - '$realMoney' WHERE username = '$username'";
        //             $result = mysqli_query($conn,$sql);
                                
        //             $sql = "UPDATE __mycard SET money = money + $amount, date = '$currentDate', times = $timesWithdraw +1 WHERE cardNumber = '$_POST[card]'";
                                        
        //             $result = mysqli_query($conn,$sql);
        //             $sql = "INSERT INTO __transactionhistory(transactiontype,amount,executiontime,status)
        //             VALUES ('Withdraw','$amount','$currentDate',1)";
        //             $result = mysqli_query($conn,$sql);
                               
        //         }
        //     } else {
        //         echo "<script>alert('OTP is incorrect');window.location.href='../View/withDraw.php';</script>";

        //     }
        // }
        
?>