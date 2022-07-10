<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'Config.php';
    //get username from label
    class sendOTP {
    function sendOTP($username,$email){
        

        $mail = new PHPMailer(true);
        $otp = rand(100000,999999);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'dphuytdt@gmail.com';
            $mail->Password   = 'dpqzohteizgxxdfu';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('dphuytdt@gmail.com', 'Wallets Mailer(no reply)');
            $mail->addAddress($email);     // Add a recipien
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Account information';
           
            $mail->Body    = 'Username: '.$username.'<br>OTP: '.$otp;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            //insert otp to database
            $sql = "UPDATE __account SET otp = '$otp' WHERE username = '$username'";
            $conn = mysqli_connect("localhost","root","","account");
            $result = mysqli_query($conn,$sql);
            if($result){
                echo "Message has been sent";
            }else{
                echo "Message has not been sent";
            } 
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>