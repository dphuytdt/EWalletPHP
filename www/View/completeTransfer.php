<!DOCTYPE html> 
<html>
<head>
    <title>Confirm Transfer</title>
    <meta charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script   script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Resource/css/style.css">
    <script src="../Resource/js/main.js"></script>
</head>
<body>
    <?php
        require 'layout/header.php';
        //require_once '../Controller/Transfer.php';
    ?>
        <br><br><br><br><br><br><br><br>
        <form action="../Controller/CompleteTransfer.php" method="POST">
            <label for="otp">OTP</label>
            <a></a>
            <input type="text" name="otp" id="otp" required>
            <input type="submit" name="check_otp" value="Enter">
            <button type="button" onclick="window.location.href='../View/home.php'">Cancel</button>
        </form>
    </div>
    </body>